<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IDplan_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function fech_IDPlanYear($Year) 
    {
        $query = $this->db->query("SELECT MData.IDCard, ISNULL(MData.PName,'')+ ' ' + ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, Pos.PosName,
            (SELECT Status FROM SPL_PR_Idplan WHERE Topic = 'แบบประเมินผลการพัฒนางานตามข้อตกลง PA 1' AND IDCard = IDPlan.IDCard AND EdYear = '$Year') AS PA1,
            (SELECT Status FROM SPL_PR_Idplan WHERE Topic = 'แบบประเมินผลการพัฒนางานตามข้อตกลง PA 2' AND IDCard = IDPlan.IDCard AND EdYear = '$Year') AS PA2,
            (SELECT Status FROM SPL_PR_Idplan WHERE Topic = 'แบบสรุปผลการประเมินการพัฒนางาน PA 3' AND IDCard = IDPlan.IDCard AND EdYear = '$Year') AS PA3,
            (SELECT Status FROM SPL_PR_Idplan WHERE Topic = 'แบบประเมินตำแหน่งและวิทยฐานะ PA 4' AND IDCard = IDPlan.IDCard AND EdYear = '$Year') AS PA4,
            (SELECT Status FROM SPL_PR_Idplan WHERE Topic = 'แบบประเมินด้านผลงานทางวิชาการ PA 5' AND IDCard = IDPlan.IDCard AND EdYear = '$Year') AS PA5
        FROM SMPr_MenuStaData MData
        LEFT JOIN SPL_PR_Idplan IDPlan ON MData.IDCard = IDPlan.IDCard 
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine 
        GROUP BY  IDPlan.IDcard, MData.PName, MData.FTName, MData.LTName, Pos.PosName, Pos.ID, MData.IDCard
        ORDER BY  ISNULL(Pos.ID, 0) ASC");
        return $query;
    }

    private function checkIDPlanExists($IDCard, $Year) 
    {
        $this->db->where('IDCard', $IDCard);
        $this->db->where('EdYear', $Year);
        $query = $this->db->get('SPL_PR_Idplan');
    
        return $query->num_rows();
    }

    public function get_PersonnelData($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_MenuStaData WHERE IDCard  = '$IDCard'");
    }

    public function fech_PerformanceAgreement($IDCard, $Year) 
    {
        return $this->db->query("SELECT id, dateup, Topic, note, FileName, EdYear, IDCard, UpdatedAt, Status FROM SPL_PR_Idplan WHERE IDCard = '$IDCard' AND EdYear = '$Year' ORDER BY id ASC");
    }

    function get_IDPlanID($id)
    {
        return $this->db->get_where('SPL_PR_Idplan', array('id' => $id));
    }

    public function insert_PDO_PerformanceAgreement($EdYear, $IDCard, $dateup, $Topic, $note, $Status, $CreatedAt, $UpdatedAt, $FileName, $Attachment) 
    {
        $sql = "MERGE INTO SPL_PR_Idplan AS Target
                USING (
                    SELECT :EdYear AS EdYear,
                        :IDCard AS IDCard,
                        :dateup AS dateup,
                        :Topic AS Topic,
                        :note AS note,
                        :Status AS Status,
                        :CreatedAt AS CreatedAt,
                        :UpdatedAt AS UpdatedAt,
                        :FileName AS FileName,
                        :Attachment AS Attachment
                ) AS Source
                ON (Target.IDCard = Source.IDCard AND Target.Topic = Source.Topic)
                WHEN MATCHED THEN
                    UPDATE SET Target.EdYear = Source.EdYear,
                            Target.dateup = Source.dateup,
                            Target.note = Source.note,
                            Target.Status = Source.Status,
                            Target.UpdatedAt = Source.UpdatedAt,
                            Target.FileName = Source.FileName,
                            Target.Attachment = Source.Attachment
                WHEN NOT MATCHED BY TARGET THEN
                    INSERT (EdYear, IDCard, dateup, Topic, note, Status, CreatedAt, UpdatedAt, FileName, Attachment)
                    VALUES (Source.EdYear, Source.IDCard, Source.dateup, Source.Topic, Source.note, Source.Status, Source.CreatedAt, Source.UpdatedAt, Source.FileName, Source.Attachment);";

        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':EdYear', $EdYear, PDO::PARAM_STR);
        $stmt->bindParam(':IDCard', $IDCard, PDO::PARAM_STR);
        $stmt->bindParam(':dateup', $dateup, PDO::PARAM_STR);
        $stmt->bindParam(':Topic', $Topic, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_STR);
        $stmt->bindParam(':Status', $Status, PDO::PARAM_STR);
        $stmt->bindParam(':CreatedAt', $CreatedAt, PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $UpdatedAt, PDO::PARAM_STR);
        $stmt->bindParam(':FileName', $FileName, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);        

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_IDplan($id, $EdYear, $IDCard, $dateup, $note, $UpdatedAt, $FileName, $Attachment)
    {
        $sql = "UPDATE SPL_PR_Idplan SET EdYear = :EdYear, IDCard = :IDCard, dateup = :dateup, note = :note, UpdatedAt = :UpdatedAt, FileName = :FileName, Attachment = :Attachment
                WHERE id = :id";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':EdYear', $EdYear, PDO::PARAM_STR);
        $stmt->bindParam(':IDCard', $IDCard, PDO::PARAM_STR);
        $stmt->bindParam(':dateup', $dateup, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $UpdatedAt, PDO::PARAM_STR);
        $stmt->bindParam(':FileName', $FileName, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_Status($id, $Status) {
        $data = array('Status' => $Status);
        $this->db->where('id', $id);
        return $this->db->update('SPL_PR_Idplan', $data);
    }

    function delete_IDplan($id)
    {
        if ($this->db->delete('SPL_PR_Idplan', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function export_File($id)
    {
        $query = $this->db->get_where('SPL_PR_Idplan', array('id' => $id));
        return $query;
    }
}