<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RequestForInsignia_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function get_NationalID_UserData() 
    {  
        return $this->db->get('SPL_LOG_UserData');
    }

    public function fech_RequestForInsignia() 
    {
        return  $this->db->query("SELECT ID, Acyear, Teacher, Position, StartDate, Description, Remark, FileName, UpdatedAt FROM SPL_PR_ThaiRoyalDecoration ORDER BY  ID ASC");
    }

    public function fech_YearRequestForInsignia($Year) 
    {
        return  $this->db->query("SELECT ID, Acyear, Teacher, Position, StartDate, Description, Remark, FileName, UpdatedAt 
        FROM SPL_PR_ThaiRoyalDecoration
        WHERE Acyear = '$Year' ORDER BY  ID ASC");
    }

    public function get_Fullname() 
    {
        return  $this->db->query("SELECT ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') AS FullName, IDCard FROM SMPr_MenuStaData");
    }

    public function get_Position() 
    {
        return  $this->db->query("SELECT ID, PosName FROM SMPr_TeacherPosition ORDER BY ID ASC");
    }

    public function Insert_RequestForInsignia($Data) 
    {
        return $this->db->insert('SPL_PR_ThaiRoyalDecoration', $Data);
    }

    public function insert_PDO_RequestForInsignia($Acyear, $Teacher, $Position, $StartDate, $Description, $Remark, $FileName, $Attachment) 
    {
        $sql = "INSERT INTO SPL_PR_ThaiRoyalDecoration (Acyear, Teacher, Position, StartDate, Description, Remark, FileName, Attachment)
                VALUES (:Acyear, :Teacher, :Position, :StartDate, :Description, :Remark, :FileName, :Attachment);";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':Acyear', $Acyear, PDO::PARAM_STR);
        $stmt->bindParam(':Teacher', $Teacher, PDO::PARAM_STR);
        $stmt->bindParam(':Position', $Position, PDO::PARAM_STR);
        $stmt->bindParam(':StartDate', $StartDate, PDO::PARAM_STR);
        $stmt->bindParam(':Description', $Description, PDO::PARAM_STR);
        $stmt->bindParam(':Remark', $Remark, PDO::PARAM_STR);
        $stmt->bindParam(':FileName', $FileName, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_RequestForInsignia($ID, $Data)
    {
        $this->db->where('ID', $ID);
        $this->db->update('SPL_PR_ThaiRoyalDecoration', $Data);
        return true;
    }

    public function update_PDO_RequestForInsignia($ID, $Acyear, $Teacher, $Position, $StartDate, $Description, $Remark, $FileName, $Attachment)
    {
        $sql = "UPDATE SPL_PR_ThaiRoyalDecoration SET Acyear = :Acyear, Teacher = :Teacher, Position = :Position, StartDate = :StartDate, Description = :Description, Remark = :Remark, FileName = :FileName, Attachment = :Attachment
                WHERE ID = :ID";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':Acyear', $Acyear, PDO::PARAM_STR);
        $stmt->bindParam(':Teacher', $Teacher, PDO::PARAM_STR);
        $stmt->bindParam(':Position', $Position, PDO::PARAM_STR);
        $stmt->bindParam(':StartDate', $StartDate, PDO::PARAM_STR);
        $stmt->bindParam(':Description', $Description, PDO::PARAM_STR);
        $stmt->bindParam(':Remark', $Remark, PDO::PARAM_STR);
        $stmt->bindParam(':FileName', $FileName, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function delete_RequestForInsignia($ID)
    {
        if ($this->db->delete('SPL_PR_ThaiRoyalDecoration', array('ID' => $ID))) {
            return true;
        } else {
            return false;
        }
    }

    public function export_File_Fame($ID)
    {
        $query = $this->db->get_where('SPL_PR_ThaiRoyalDecoration', array('ID' => $ID));
        return $query;
    }

    public function fech_RequestForInsigniaExport($ID) 
    {
        return  $this->db->query("SELECT * FROM SPL_PR_ThaiRoyalDecoration WHERE ID = '$ID'");
    }
}