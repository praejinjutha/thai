<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerformanceAppraisal_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function get_Fullname() 
    {
        return  $this->db->query("SELECT ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') AS FullName, IDCard FROM SMPr_MenuStaData");
    }

    public function fech_PerformanceAppraisal() 
    {
        return  $this->db->query("SELECT ID, AcYear, Appraisee, AppraiseePosition, Appraiser, Result, Opinion, FileName, Heading, Component, Question, Remark, UpdatedAt
        FROM SPL_PR_PerformanceAppraisal ORDER BY AppraiseePosition ASC");
    }

    public function fech_PerformanceAppraisalYear($Year) 
    {
        return  $this->db->query("SELECT ID, AcYear, Appraisee, AppraiseePosition, Appraiser, Result, Opinion, FileName, Heading, Component, Question, Remark, UpdatedAt
        FROM SPL_PR_PerformanceAppraisal
        WHERE AcYear = '$Year' ORDER BY AppraiseePosition ASC");
    }

    public function fech_PerformanceAppraisalFullName($FullName) 
    {
        return  $this->db->query("SELECT ID, AcYear, Appraisee, AppraiseePosition, Appraiser, Result, Opinion, FileName, Heading, Component, Question, Remark, UpdatedAt
        FROM SPL_PR_PerformanceAppraisal
        WHERE Appraisee = '$FullName' ORDER BY AppraiseePosition ASC");
    }

    public function fech_PerformanceAppraisalAll($Year, $FullName) 
    {
        return  $this->db->query("SELECT ID, AcYear, Appraisee, AppraiseePosition, Appraiser, Result, Opinion, FileName, Heading, Component, Question, Remark, UpdatedAt 
        FROM SPL_PR_PerformanceAppraisal
        WHERE AcYear = '$Year' AND Appraisee = '$FullName' ORDER BY AppraiseePosition ASC");
    }

    public function fetch_Appraisee($IDCard) 
    {
        return  $this->db->query("SELECT Pos.PosName, ISNULL(MData.PName,'')+ ' ' + ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
        WHERE MData.IDCard = '$IDCard'");
    }

    public function fetch_AppraiseeEdit($IDCard) 
    {
        return  $this->db->query("SELECT Pos.PosName, ISNULL(MData.PName,'')+ ' ' + ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
        WHERE CONCAT(ISNULL(MData.PName,''), ' ', ISNULL(MData.FTName,''), ' ', ISNULL(MData.LTName,'')) = '$IDCard'");
    }

    public function get_PerformanceAppraisal($ID) 
    {
        return  $this->db->query("SELECT * FROM SPL_PR_PerformanceAppraisal WHERE ID = '$ID'");
    }


    public function Insert_PerformanceAppraisal($AcYear, $Appraisee, $AppraiseePosition, $Appraiser, $Heading, $Component, $Question, $Result, $Opinion, $Remark, $CreatedAt, $UpdatedAt, $FileName, $Attachment) 
    {
        $sql = "INSERT INTO SPL_PR_PerformanceAppraisal (AcYear, Appraisee, AppraiseePosition, Appraiser, Heading, Component, Question, Result, Opinion, Remark, CreatedAt, UpdatedAt, FileName, Attachment)
                VALUES (:AcYear, :Appraisee, :AppraiseePosition, :Appraiser, :Heading, :Component, :Question, :Result, :Opinion, :Remark, :CreatedAt, :UpdatedAt, :FileName, :Attachment);";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':AcYear', $AcYear, PDO::PARAM_STR);
        $stmt->bindParam(':Appraisee', $Appraisee, PDO::PARAM_STR);
        $stmt->bindParam(':AppraiseePosition', $AppraiseePosition, PDO::PARAM_STR);
        $stmt->bindParam(':Appraiser', $Appraiser, PDO::PARAM_STR);
        $stmt->bindParam(':Heading', $Heading, PDO::PARAM_STR);
        $stmt->bindParam(':Component', $Component, PDO::PARAM_STR);
        $stmt->bindParam(':Question', $Question, PDO::PARAM_STR);
        $stmt->bindParam(':Result', $Result, PDO::PARAM_STR);
        $stmt->bindParam(':Opinion', $Opinion, PDO::PARAM_STR);
        $stmt->bindParam(':Remark', $Remark, PDO::PARAM_STR);
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

    public function update_PerformanceAppraisal($ID, $AcYear, $Appraisee, $AppraiseePosition, $Appraiser, $Heading, $Component, $Question, $Result, $Opinion, $Remark, $UpdatedAt, $FileName, $Attachment)
    {
        $sql = "UPDATE SPL_PR_PerformanceAppraisal SET AcYear = :AcYear, Appraisee = :Appraisee, AppraiseePosition = :AppraiseePosition, Appraiser = :Appraiser, 
                Heading = :Heading, Component = :Component, Question = :Question, Result = :Result, Opinion = :Opinion, Remark = :Remark, UpdatedAt = :UpdatedAt, FileName = :FileName, Attachment = :Attachment
                WHERE ID = :ID";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':AcYear', $AcYear, PDO::PARAM_STR);
        $stmt->bindParam(':Appraisee', $Appraisee, PDO::PARAM_STR);
        $stmt->bindParam(':AppraiseePosition', $AppraiseePosition, PDO::PARAM_STR);
        $stmt->bindParam(':Appraiser', $Appraiser, PDO::PARAM_STR);
        $stmt->bindParam(':Heading', $Heading, PDO::PARAM_STR);
        $stmt->bindParam(':Component', $Component, PDO::PARAM_STR);
        $stmt->bindParam(':Question', $Question, PDO::PARAM_STR);
        $stmt->bindParam(':Result', $Result, PDO::PARAM_STR);
        $stmt->bindParam(':Opinion', $Opinion, PDO::PARAM_STR);
        $stmt->bindParam(':Remark', $Remark, PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $UpdatedAt, PDO::PARAM_STR);
        $stmt->bindParam(':FileName', $FileName, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function delete_PerformanceAppraisal($ID)
    {
        if ($this->db->delete('SPL_PR_PerformanceAppraisal', array('ID' => $ID))) {
            return true;
        } else {
            return false;
        }
    }
    
    public function export_File($ID)
    {
        $query = $this->db->get_where('SPL_PR_PerformanceAppraisal', array('ID' => $ID));
        return $query;
    }

    public function fech_PerformanceAppraisalExport($ID) 
    {
        return  $this->db->query("SELECT * FROM SPL_PR_PerformanceAppraisal WHERE ID = '$ID'");
    }
}