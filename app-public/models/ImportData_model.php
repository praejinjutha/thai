<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ImportData_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function MERGE_MenuStaData(
        $IDCard,
        $PName,
        $FTName,
        $LTName,
        $PlaceBA,
        $School,
        $PoLine,
        $PoSalary,
        $Salary,
        $Salsum,
        $MSalary,
        $Subject_group, $CreatedAt, $UpdatedAt
    ) {
        $query = $this->db->query("MERGE SMPr_MenuStaData AS target  
        USING (SELECT '$IDCard', '$PName', '$FTName', '$LTName', '$PlaceBA', '$School', '$PoLine', '$PoSalary', 
        '$Salary', '$Salsum', '$MSalary', '$Subject_group', '$CreatedAt', '$UpdatedAt') AS source 
            (IDCard, PName, FTName, LTName, PlaceBA, School, PoLine, PoSalary, Salary, Salsum, MSalary, Subject_group, CreatedAt, UpdatedAt)
        ON (target.IDCard = source.IDCard)
        WHEN MATCHED THEN
        UPDATE SET
            PName = source.PName,
            FTName = source.FTName, 
            LTName = source.LTName,
            PlaceBA = source.PlaceBA,
            School = source.School, 
            PoLine = source.PoLine, 
            PoSalary = source.PoSalary,
            Salary = source.Salary,
            Salsum = source.Salsum,
            MSalary = source.MSalary,
            Subject_group = source.Subject_group,
            UpdatedAt = source.UpdatedAt
        WHEN NOT MATCHED THEN  
        INSERT (IDCard, PName, FTName, LTName, PlaceBA, School, PoLine, PoSalary, Salary, Salsum, MSalary, Subject_group, CreatedAt, UpdatedAt) 
        VALUES (source.IDCard, source.PName, source.FTName, source.LTName, source.PlaceBA, source.School, source.PoLine, 
        source.PoSalary, source.Salary, source.Salsum, source.MSalary, source.Subject_group, source.CreatedAt, source.UpdatedAt);");
        return $query;
    }

    public function SMPr_RegisAddress($IDCard)
    {
        $query = $this->db->query("MERGE SMPr_RegisAddress AS target  
        USING (SELECT '$IDCard') AS source 
            (IDCard)
        ON (target.IDCard = source.IDCard)
        WHEN MATCHED THEN
        UPDATE SET
        RNo = ''
        WHEN NOT MATCHED THEN  
        INSERT (IDCard) 
        VALUES (source.IDCard);");
        return $query;
    }

    public function SMPr_ContactAddress($IDCard)
    {
        $query = $this->db->query("MERGE SMPr_ContactAddress AS target  
        USING (SELECT '$IDCard') AS source 
            (IDCard)
        ON (target.IDCard = source.IDCard)
        WHEN MATCHED THEN
        UPDATE SET
        CNo = ''
        WHEN NOT MATCHED THEN  
        INSERT (IDCard) 
        VALUES (source.IDCard);");
        return $query;
    }

    public function SMPr_EnhanceData($IDCard)
    {
        $query = $this->db->query("MERGE SMPr_EnhanceData AS target  
        USING (SELECT '$IDCard') AS source 
            (IDCard)
        ON (target.IDCard = source.IDCard)
        WHEN MATCHED THEN
        UPDATE SET
        OrderNo = ''
        WHEN NOT MATCHED THEN  
        INSERT (IDCard) 
        VALUES (source.IDCard);");
        return $query;
    }

    public function SMPr_PicAll($IDCard)
    {
        $query = $this->db->query("MERGE SMPr_PicAll AS target  
        USING (SELECT '$IDCard') AS source 
            (IDCard)
        ON (target.IDCard = source.IDCard)
        WHEN MATCHED THEN
        UPDATE SET
        Pic = ''
        WHEN NOT MATCHED THEN  
        INSERT (IDCard) 
        VALUES (source.IDCard);");
        return $query;
    }

    public function MERGE_MoneyData($IDCard, $Sex, $NStatus, $BloodG, $Nationality, $Race, $Religion)
    {
        $query = $this->db->query("MERGE SMPr_MoneyData AS target  
        USING (SELECT '$IDCard', '$Sex', '$NStatus', '$BloodG', '$Nationality', '$Race', '$Religion') AS source 
            (IDCard, Sex, NStatus, BloodG, Nationality, Race, Religion)
        ON (target.IDCard = source.IDCard)
        WHEN MATCHED THEN
        UPDATE SET
            Sex = source.Sex,
            NStatus = source.NStatus, 
            BloodG = source.BloodG,
            Nationality = source.Nationality,
            Race = source.Race, 
            Religion = source.Religion
        WHEN NOT MATCHED THEN  
        INSERT (IDCard, Sex, NStatus, BloodG, Nationality, Race, Religion) 
        VALUES (source.IDCard, source.Sex, source.NStatus, source.BloodG, source.Nationality, source.Race, source.Religion);");
        return $query;
    }
}