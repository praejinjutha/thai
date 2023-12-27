<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HonorAward_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function fech_HonorAward() 
    {
        return  $this->db->query("SELECT TPrize.ID, TPrize.EdYear, TPrize.Date, TPrize.Recipient, TPrize.PoLine, TPrize.PrizeName, TPrize.PrizeLevel, TPrize.Organizer, TPrize.FileNm,
        TPrize.Pic1, TPrize.Pic2, TPrize.Pic3, TPrize.Pic4, TPrize.Pic5, TPrize.Pic6, UpdatedAt, Organizer
        FROM SMPr_TeacherPrize TPrize");
    }

    public function fech_HonorAwardEdYear($EdYear) 
    {
        return  $this->db->query("SELECT TPrize.ID, TPrize.EdYear, TPrize.Date, TPrize.Recipient, TPrize.PoLine, TPrize.PrizeName, TPrize.PrizeLevel, TPrize.Organizer, TPrize.FileNm,
        TPrize.Pic1, TPrize.Pic2, TPrize.Pic3, TPrize.Pic4, TPrize.Pic5, TPrize.Pic6, UpdatedAt 
        FROM SMPr_TeacherPrize TPrize WHERE TPrize.EdYear = '$EdYear' ORDER BY ID ASC");
    }

    public function fech_HonorAwardTypeAll($EdYear, $Position) 
    {
        return  $this->db->query("SELECT TPrize.ID, TPrize.EdYear, TPrize.Date, TPrize.Recipient, TPrize.PoLine, TPrize.PrizeName, TPrize.PrizeLevel, TPrize.Organizer, TPrize.FileNm,
        TPrize.Pic1, TPrize.Pic2, TPrize.Pic3, TPrize.Pic4, TPrize.Pic5, TPrize.Pic6, UpdatedAt 
        FROM SMPr_TeacherPrize TPrize WHERE TPrize.EdYear = '$EdYear' AND TPrize.PoLine = '$Position' ORDER BY ID ASC");
    }

    function fetch_Position($EdYear)
    {
        $query = $this->db->query("SELECT DISTINCT Pos.PosName, Pos.ID
        FROM SMPr_TeacherPrize TPrize
        LEFT JOIN SMPr_TeacherPosition POS ON POS.PosName = TPrize.PoLine 
        WHERE TPrize.EdYear = '$EdYear' 
		ORDER BY Pos.ID");
         $output .= '<option value="" class="select-fnz">----- เลือกตำแหน่ง -----</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->PosName . '" class="select-fnz">' . $row->PosName . '</option>';
        }
        return $output;
    }

    public function get_Fullname() 
    {
        return  $this->db->query("SELECT ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') AS FullName, IDCard FROM SMPr_MenuStaData");
    }

    public function get_Position() 
    {
        return  $this->db->query("SELECT ID, PosName FROM SMPr_TeacherPosition ORDER BY ID ASC");
    }

    public function insert_PDO_HonorAward($ID, $Data, $FileNm, $Attachment, $Pic1, $Pic2, $Pic3, $Pic4, $Pic5, $Pic6) 
    {
        $sql = "INSERT INTO SMPr_TeacherPrize (EdYear, Date, Recipient, PoLine, PrizeName, PrizeLevel, Organizer, FileNm, Attachment, Pic1, Pic2, Pic3, Pic4, Pic5, Pic6, CreatedAt, UpdatedAt)
                VALUES (:EdYear, :Date, :Recipient, :PoLine, :PrizeName, :PrizeLevel, :Organizer, :FileNm, :Attachment, :Pic1, :Pic2, :Pic3, :Pic4, :Pic5, :Pic6, :CreatedAt, :UpdatedAt)";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':EdYear', $Data['EdYear'], PDO::PARAM_STR);
        $stmt->bindParam(':Date', $Data['Date'], PDO::PARAM_STR);
        $stmt->bindParam(':Recipient', $Data['Recipient'], PDO::PARAM_STR);
        $stmt->bindParam(':PoLine', $Data['PoLine'], PDO::PARAM_STR);
        $stmt->bindParam(':PrizeName', $Data['PrizeName'], PDO::PARAM_STR);
        $stmt->bindParam(':PrizeLevel', $Data['PrizeLevel'], PDO::PARAM_STR);
        $stmt->bindParam(':Organizer', $Data['Organizer'], PDO::PARAM_STR);
        $stmt->bindParam(':FileNm', $FileNm, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic1', $Pic1, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic2', $Pic2, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic3', $Pic3, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic4', $Pic4, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic5', $Pic5, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic6', $Pic6, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':CreatedAt', $Data['CreatedAt'], PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $Data['UpdatedAt'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_PDO_HonorAward($ID, $Data, $FileNm, $Attachment, $Pic1, $Pic2, $Pic3, $Pic4, $Pic5, $Pic6)
    {
        $sql = "UPDATE SMPr_TeacherPrize SET EdYear = :EdYear, Date = :Date, Recipient = :Recipient, PoLine = :PoLine, PrizeName = :PrizeName, PrizeLevel = :PrizeLevel, Organizer = :Organizer, FileNm = :FileNm, Attachment = :Attachment, 
                Pic1 = :Pic1, Pic2 = :Pic2, Pic3 = :Pic3, Pic4 = :Pic4, Pic5 = :Pic5, Pic6 = :Pic6, UpdatedAt = :UpdatedAt
                WHERE ID = :ID";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':EdYear', $Data['EdYear'], PDO::PARAM_STR);
        $stmt->bindParam(':Date', $Data['Date'], PDO::PARAM_STR);
        $stmt->bindParam(':Recipient', $Data['Recipient'], PDO::PARAM_STR);
        $stmt->bindParam(':PoLine', $Data['PoLine'], PDO::PARAM_STR);
        $stmt->bindParam(':PrizeName', $Data['PrizeName'], PDO::PARAM_STR);
        $stmt->bindParam(':PrizeLevel', $Data['PrizeLevel'], PDO::PARAM_STR);
        $stmt->bindParam(':Organizer', $Data['Organizer'], PDO::PARAM_STR);
        $stmt->bindParam(':FileNm', $FileNm, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic1', $Pic1, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic2', $Pic2, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic3', $Pic3, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic4', $Pic4, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic5', $Pic5, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':Pic6', $Pic6, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':UpdatedAt', $Data['UpdatedAt'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function get_HonorAward($ID)
    {
        return $this->db->get_where('SMPr_TeacherPrize', array('ID' => $ID));
    }

    function delete_HonorAward($ID)
    {
        if ($this->db->delete('SMPr_TeacherPrize', array('ID' => $ID))) {
            return true;
        } else {
            return false;
        }
    }

    public function export_File_Fame($ID)
    {
        $query = $this->db->get_where('SMPr_TeacherPrize', array('ID' => $ID));
        return $query;
    }

    public function fech_HonorAwardExport($ID) 
    {
        return  $this->db->query("SELECT * FROM SMPr_TeacherPrize WHERE ID = '$ID'");
    }
}