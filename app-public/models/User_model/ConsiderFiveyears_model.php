<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ConsiderFiveyears_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function get_NationalID_UserData() 
    {  
        return $this->db->get('SPL_LOG_UserData');
    }

    public function fech_ConsiderFiveyears($NationalID) 
    {
        return  $this->db->query("SELECT DISTINCT ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') as FullName , SRate.id, SRate.IDCard, SRate.dtp, SRate.Detail, SRate.PoNo, 
        SRate.PLevel, SRate.Salary, SRate.Ref, SRate.BudYear, SRate.Degree, SRate.NSalary, SRate.UpdatedAt, MData.PoLine
        FROM SPL_Pr_SalaryRate SRate
        LEFT JOIN SMPr_MenuStaData MData ON SRate.IDCard = MData.IDCard
        WHERE SRate.IDCard = '$NationalID'
        ORDER BY MData.PoLine ASC");
    }

    function get_SalaryRate($id)
    {
        return $this->db->get_where('SPL_Pr_SalaryRate', array('id' => $id));
    }

    public function get_Position() 
    {
        return  $this->db->query("SELECT ID, PosName FROM SMPr_TeacherPosition ORDER BY ID ASC");
    }

    public function get_Level() 
    {
        return  $this->db->query("SELECT ID, Level FROM SMPr_AcademicStanding ORDER BY ID ASC");
    }

    public function get_FullName($IDCard) 
    {
        return  $this->db->query("SELECT IDCard, ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') as FullName , IDCard
        FROM SMPr_MenuStaData WHERE IDCard = '$IDCard'");
    }

    public function fetch_IDCard($IDCard) 
    {
        return  $this->db->query("SELECT IDCard, Ministry, PZone
        FROM SMPr_MenuStaData  WHERE IDCard = '$IDCard'");
    }

    public function fetch_IDCardEdit($IDCard) 
    {
        return  $this->db->query("SELECT IDCard, Ministry, PZone
        FROM SMPr_MenuStaData  WHERE IDCard = '$IDCard'");
    }

    public function InsertConsiderFiveyears($data, $Ref, $Attachment) 
    {
        $sql = "INSERT INTO SPL_Pr_SalaryRate (IDCard, BudYear, Detail, PoNo, dtp, PLevel, Salary, Degree, NSalary, CreatedAt, UpdatedAt, Ref, Attachment)
                VALUES (:IDCard, :BudYear, :Detail, :PoNo, :dtp, :PLevel, :Salary, :Degree, :NSalary, :CreatedAt, :UpdatedAt, :Ref, :Attachment)";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':IDCard', $data['IDCard'], PDO::PARAM_STR);
        $stmt->bindParam(':BudYear', $data['BudYear'], PDO::PARAM_STR);
        $stmt->bindParam(':Detail', $data['Detail'], PDO::PARAM_STR);
        $stmt->bindParam(':PoNo', $data['PoNo'], PDO::PARAM_STR);
        $stmt->bindParam(':dtp', $data['dtp'], PDO::PARAM_STR);
        $stmt->bindParam(':PLevel', $data['PLevel'], PDO::PARAM_STR);
        $stmt->bindParam(':Salary', $data['Salary'], PDO::PARAM_STR);
        $stmt->bindParam(':Degree', $data['Degree'], PDO::PARAM_STR);
        $stmt->bindParam(':NSalary', $data['NSalary'], PDO::PARAM_STR);
        $stmt->bindParam(':CreatedAt', $data['CreatedAt'], PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $data['UpdatedAt'], PDO::PARAM_STR);
        $stmt->bindParam(':Ref', $Ref, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function delete_ConsiderFiveyears($id)
    {
        if ($this->db->delete('SPL_Pr_SalaryRate', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    function update_ConsiderFiveyears($id, $data, $Ref, $Attachment) 
    {
        $sql = "UPDATE SPL_Pr_SalaryRate SET IDCard = :IDCard, BudYear = :BudYear, Detail = :Detail, PoNo = :PoNo,
         dtp = :dtp, PLevel = :PLevel, Salary = :Salary, Degree = :Degree, NSalary = :NSalary, UpdatedAt = :UpdatedAt, Ref = :Ref, Attachment = :Attachment
                WHERE id = :id";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':IDCard', $data['IDCard'], PDO::PARAM_STR);
        $stmt->bindParam(':BudYear', $data['BudYear'], PDO::PARAM_STR);
        $stmt->bindParam(':Detail', $data['Detail'], PDO::PARAM_STR);
        $stmt->bindParam(':PoNo', $data['PoNo'], PDO::PARAM_STR);
        $stmt->bindParam(':dtp', $data['dtp'], PDO::PARAM_STR);
        $stmt->bindParam(':PLevel', $data['PLevel'], PDO::PARAM_STR);
        $stmt->bindParam(':Salary', $data['Salary'], PDO::PARAM_STR);
        $stmt->bindParam(':Degree', $data['Degree'], PDO::PARAM_STR);
        $stmt->bindParam(':NSalary', $data['NSalary'], PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $data['UpdatedAt'], PDO::PARAM_STR);
        $stmt->bindParam(':Ref', $Ref, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function export_File($id)
    {
        $query = $this->db->get_where('SPL_Pr_SalaryRate', array('id' => $id));
        return $query;
    }

    public function fech_ConsiderFiveyearsExport($id) 
    {
        return  $this->db->query("SELECT DISTINCT ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') as FullName , SRate.id, SRate.IDCard, SRate.dtp, SRate.Detail, SRate.PoNo, 
        SRate.PLevel, SRate.Salary, SRate.Ref, SRate.BudYear, SRate.Degree, SRate.NSalary, SRate.UpdatedAt, MData.PoLine
        FROM SPL_Pr_SalaryRate SRate
        LEFT JOIN SMPr_MenuStaData MData ON SRate.IDCard = MData.IDCard
        WHERE SRate.id = '$id'");
    }
}