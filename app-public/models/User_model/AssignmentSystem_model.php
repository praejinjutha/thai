<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AssignmentSystem_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function fech_AssignmentSystem() 
    {
        return  $this->db->query("SELECT IdAt, Pr_id, Prsubj, EdYear, Prdate, PrDepart, PrType, PrNamete, TeaAll, FileNm, Prother, UpdatedAt FROM SMPr_Prfrom ORDER BY IdAt ASC");
    }

    public function fech_AssignmentSystemYear($Year) 
    {
        return  $this->db->query("SELECT IdAt, Pr_id, Prsubj, EdYear, Prdate, PrDepart, PrType, PrNamete, TeaAll, FileNm, Prother, UpdatedAt FROM SMPr_Prfrom WHERE EdYear = '$Year' ORDER BY IdAt ASC");
    }

    public function get_FullName() 
    {
        return  $this->db->query("SELECT IDCard, ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') as FullName FROM SMPr_MenuStaData ");
    }

    function get_Pr_id()
    {
        $query = $this->db->query("SELECT MAX(Pr_id) AS Pr_id_max FROM SMPr_Prfrom");
        return $query;
    }

    function get_AssignmentSystem($IdAt)
    {
        return $this->db->get_where('SMPr_Prfrom', array('IdAt' => $IdAt));
    }

    function insert_PDO_AssignmentSystem($EdYear, $PrType, $PrDepart, $Prsubj, $Prdate, $PrNamete, $TeaAll, $Prother, $Pr_id, $CreatedAt, $UpdatedAt, $FileNm, $Attachment) 
    {
        $sql = "INSERT INTO SMPr_Prfrom (EdYear, PrType, PrDepart, Prsubj, Prdate, PrNamete, TeaAll, Prother, Pr_id, CreatedAt, UpdatedAt, FileNm, Attachment)
        VALUES (:EdYear, :PrType, :PrDepart, :Prsubj, :Prdate, :PrNamete, :TeaAll, :Prother, :Pr_id, :CreatedAt, :UpdatedAt, :FileNm, :Attachment)";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':EdYear', $EdYear, PDO::PARAM_STR);
        $stmt->bindParam(':PrType', $PrType, PDO::PARAM_STR);
        $stmt->bindParam(':PrDepart', $PrDepart, PDO::PARAM_STR);
        $stmt->bindParam(':Prsubj', $Prsubj, PDO::PARAM_STR);
        $stmt->bindParam(':Prdate', $Prdate, PDO::PARAM_STR);
        $stmt->bindParam(':PrNamete', $PrNamete, PDO::PARAM_STR);
        $stmt->bindParam(':TeaAll', $TeaAll, PDO::PARAM_STR);
        $stmt->bindParam(':Prother', $Prother, PDO::PARAM_STR);
        $stmt->bindParam(':Pr_id', $Pr_id, PDO::PARAM_STR);
        $stmt->bindParam(':CreatedAt', $CreatedAt, PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $UpdatedAt, PDO::PARAM_STR);
        $stmt->bindParam(':FileNm', $FileNm, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_PDO_AssignmentSystem($IdAt, $EdYear, $PrType, $PrDepart, $Prsubj, $Prdate, $PrNamete, $TeaAll, $Prother, $Pr_id, $UpdatedAt, $FileNm, $Attachment)
    {
        $sql = "UPDATE SMPr_Prfrom SET EdYear = :EdYear, PrType = :PrType, PrDepart = :PrDepart, Prsubj = :Prsubj, Prdate = :Prdate, PrNamete = :PrNamete, TeaAll = :TeaAll, 
                Prother = :Prother, Pr_id = :Pr_id, UpdatedAt = :UpdatedAt, FileNm = :FileNm, Attachment = :Attachment
                WHERE IdAt = :IdAt";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':IdAt', $IdAt, PDO::PARAM_STR);
        $stmt->bindParam(':EdYear', $EdYear, PDO::PARAM_STR);
        $stmt->bindParam(':PrType', $PrType, PDO::PARAM_STR);
        $stmt->bindParam(':PrDepart', $PrDepart, PDO::PARAM_STR);
        $stmt->bindParam(':Prsubj', $Prsubj, PDO::PARAM_STR);
        $stmt->bindParam(':Prdate', $Prdate, PDO::PARAM_STR);
        $stmt->bindParam(':PrNamete', $PrNamete, PDO::PARAM_STR);
        $stmt->bindParam(':TeaAll', $TeaAll, PDO::PARAM_STR);
        $stmt->bindParam(':Prother', $Prother, PDO::PARAM_STR);
        $stmt->bindParam(':Pr_id', $Pr_id, PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $UpdatedAt, PDO::PARAM_STR);
        $stmt->bindParam(':FileNm', $FileNm, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function delete_AssignmentSystem($IdAt)
    {
        if ($this->db->delete('SMPr_Prfrom', array('IdAt' => $IdAt))) {
            return true;
        } else {
            return false;
        }
    }

    public function export_File_Fame($IdAt)
    {
        $query = $this->db->get_where('SMPr_Prfrom', array('IdAt' => $IdAt));
        return $query;
    }

    public function fech_AssignmentSystemExport($IdAt) 
    {
        return  $this->db->query("SELECT * FROM SMPr_Prfrom WHERE IdAt = '$IdAt'");
    }
    
}