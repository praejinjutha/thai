<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonnelInformation_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function get_NationalID($user_id) 
    {
        $this->db->select('NationalID');
        $this->db->where('ID', $user_id); 
        $query = $this->db->get('SPL_LOG_UserData');
        
        if ($query->num_rows() > 0) {
            return $query->row()->NationalID;
        } else {
            return null;
        }
    }

    public function Check_IDCard($IDCard) 
    {  
        return $this->db->get_where('SMPr_MenuStaData', array('IDCard'=>$IDCard));
    }

    public function insert_Data($MenuStaData, $MoneyData, $PicAll)
    {
        $this->db->insert('SMPr_MenuStaData', $MenuStaData);
        $this->db->insert('SMPr_MoneyData', $MoneyData);
        $this->db->insert('SMPr_PicAll', $PicAll);
        return true;
    }

    public function insert_PDO_Data($IDCard, $Pic)
    {
        $sql = "MERGE SMPr_PicAll AS Target
        USING (SELECT '$IDCard', :Pic) AS Source 
        (IDCard, Pic) ON (Target.IDCard = Source.IDCard)
        WHEN MATCHED THEN
        UPDATE SET Pic = Source.Pic
        WHEN NOT MATCHED THEN
        INSERT (Pic)
        VALUES (Source.Pic);";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':Pic', $Pic, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function fetch_TeacherPosition($PoType)
    {
        $query = $this->db->query("SELECT DISTINCT ID, PosName
        FROM SMPr_TeacherPosition 
        WHERE Type_Id = '$PoType'
		ORDER BY ID");
        $output .= '<option></option>';
        foreach ($query->result() as $row) {
            
            $output .= '<option value="' . $row->ID . '" class="select-fnz">' . $row->PosName . '</option>';
        }
        return $output;
    }

    function fetch_TeacherPoLevel($PoLine)
    {
        $query = $this->db->query("SELECT DISTINCT ID, Level, Pos_Id
        FROM SMPr_AcademicStanding 
        WHERE Pos_Id = '$PoLine'
        ORDER BY ID");
        if ($PoLine > 10) {
            $output .= '<option value="-" class="select-fnz">-</option>';
        }else {
            foreach ($query->result() as $row) {
                $output .= '<option value="' . $row->ID . '" class="select-fnz">' . $row->Level . '</option>';
            }
        }
        return $output;
    }


    // ดึงข้อมูลมาโชแบบ select
    public function get_Status() 
    {  
        return $this->db->get('SMPr_IdStatusBud');
    }

    public function get_TSPname() 
    {  
        return $this->db->get('SMPr_STTPname');
    }

    public function get_STPname() 
    {  
        return $this->db->get('SMPr_STPname');
    }
    public function get_OdrLev() 
    {  
        return $this->db->get('SMPr_OdrLev');
    }
    public function get_Position() 
    {
        $query = $this->db->query("SELECT PosName,idPos FROM SMPr_Pos ORDER BY IdPos ASC");
        return $query;
    }
    public function get_TeacherType() 
    {  
        $this->db->order_by('ID', 'ASC');
        return $this->db->get('SMPr_TeacherType');
    }
    public function get_SubjectGroup() 
    {  
        return $this->db->get('SPL_INFRA_SubjectGroup');
    }
    //แสดงคำนำหน้าไทย
    public function get_ThaiTitle()
    {
        return $this->db->query("SELECT IDTPname,TSPname FROM SMPr_STTPname");
    }
    //แสดงคำนำหน้าอังกฤษ
    public function get_EngTitle()
    {
        return $this->db->query("SELECT SPname,IDPname FROM SMPr_STPname");
    }

    //เพิ่มคำนำหน้าภาษาไทย
    function insert_STTPname($data)
    {
        return $this->db->insert('SMPr_STTPname', $data);
    }
    //เพิ่มคำนำหน้าภาษาอังกฤษ
    function insert_STPname($data)
    {
        return $this->db->insert('SMPr_STPname', $data);
    }
    //ลบคำนำหน้าภาษาไทย
    function delete_STTPname($ID)
    {
        if ($this->db->delete('SMPr_STTPname', array('IDTPname' => $ID))) {
            return true;
        } else {
            return false;
        }
    }
    //ลบคำนำหน้าภาษาอังกฤษ
    function delete_STPname($ID)
    {
        if ($this->db->delete('SMPr_STPname', array('IDPname' => $ID))) {
            return true;
        } else {
            return false;
        }
    }

    // แสดงข้อมูลในฐาน MenuStaData ทั้งหมด
    public function get_SMPr_MenuStaData() 
    {
        return  $this->db->query("SELECT MData.PName, ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName,MData.IDCard,POS.PosName ,AStan.Level,MData.MSalary, Money.PlaceDate
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine
        LEFT JOIN SMPr_AcademicStanding AStan ON AStan.ID = MData.PLevel  
        LEFT JOIN SMPr_MoneyData Money ON Money.IDCard = MData.IDCard ORDER BY POS.ID ASC");
    }

    // เช็ค select สถานภาพการทำงาน
    public function get_SMPr_MenuStaDataType($Status) 
    {
        return  $this->db->query("SELECT MData.PName, ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName,MData.IDCard,POS.PosName ,AStan.Level,MData.MSalary, Money.PlaceDate
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine
        LEFT JOIN SMPr_AcademicStanding AStan ON AStan.ID = MData.PLevel  
        LEFT JOIN SMPr_MoneyData Money ON Money.IDCard = MData.IDCard 
        WHERE Money.NStatus = '$Status' ORDER BY POS.ID ASC");
    }
    public function get_SMPr_MenuStaDataTypeAll($Status,$Position) 
    {
        return  $this->db->query("SELECT MData.PName, ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName,MData.IDCard,POS.PosName ,AStan.Level,MData.MSalary, Money.PlaceDate
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine
        LEFT JOIN SMPr_AcademicStanding AStan ON AStan.ID = MData.PLevel  
        LEFT JOIN SMPr_MoneyData Money ON Money.IDCard = MData.IDCard 
        WHERE Money.NStatus = '$Status' AND POS.PosName = '$Position' ORDER BY POS.ID ASC");
    }
    function fetch_Position($Status)
    {
        $query = $this->db->query("SELECT DISTINCT Pos.PosName, Pos.ID, Type_Id
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine 
        LEFT JOIN SMPr_MoneyData Money ON Money.IDCard = MData.IDCard 
        WHERE Money.NStatus = '$Status' 
		ORDER BY Pos.ID");
        $output .= '<option value="" class="select-fnz">----- แสดงตำแหน่งทั้งหมด -----</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->PosName . '" class="select-fnz">' . $row->PosName . '</option>';
        }
        return $output;
    }

    

    public function get_PersonnelData($IDCard)
    {
       $query = $this->db->query("SELECT MData.*, MNData.*,EHData.*,PAll.*,  Pos.*, TType.*, AStan.*, MData.UpdatedAt, MNData.NStatus
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_MoneyData MNData ON MData.IDCard = MNData.IDCard
        LEFT JOIN SMPr_EnhanceData EHData ON MData.IDCard = EHData.IDCard
        LEFT JOIN SMPr_PicAll PAll ON MData.IDCard = PAll.IDCard
        LEFT JOIN SMPr_TeacherPosition Pos ON MData.PoLine = Pos.ID 
        LEFT JOIN SMPr_TeacherType TType ON TType.ID = MData.PoType
        LEFT JOIN SMPr_AcademicStanding AStan ON AStan.ID = MData.PLevel
        WHERE MData.IDCard = '$IDCard'");
        return $query;
    }

    public function get_PersonnelAddress($IDCard)
    {
       $query = $this->db->query("SELECT MData.*, RA.*, CTA.*, RA.CreatedAt as RgCreatedAt, RA.UpdatedAt as RgUpdatedAt, CTA.CreatedAt as CaCreatedAt, CTA.UpdatedAt as CaUpdatedAt
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_RegisAddress RA ON RA.IDCard = MData.IDCard
        LEFT JOIN SMPr_ContactAddress CTA ON CTA.IDCard = MData.IDCard
        WHERE MData.IDCard  = '$IDCard' ");
        return $query;
    }

    public function checkIDCard($idcard)
    {
        $this->db->where('IDCard', $idcard);
        $query = $this->db->get('SMPr_RegisAddress');
        return $query->num_rows() > 0;
    }

    function getStatus()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM SMPr_IdStatusBud ORDER BY ID ASC");
        return $query;
    }
    //ไทย
    function getSTTPname()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM SMPr_STTPname  ORDER BY IDTPname ASC");
        return $query;
    }
    //อังกฤษ
    function getSTPname()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM SMPr_STPname ORDER BY IDPname ASC");
        return $query;
    }

    function getPos()
    {
        $query = $this->db->query("SELECT PosName,idPos FROM SMPr_Pos ORDER BY IdPos ASC");
        return $query;
    }

    // function getCatName()
    // {
    //     $query = $this->db->query("SELECT DISTINCT * FROM SMPr_CatePer ORDER BY IdCat ASC");
    //     return $query;
    // }

    function getTeacherType()
    {
        return $this->db->query("SELECT ID, TypeName FROM SMPr_TeacherType");
    }

    public function getTeacherTypeName($ID)
    {
        return $this->db->query("SELECT ID, REPLACE(TypeName, '*', '') AS TypeName FROM SMPr_TeacherType WHERE ID = '$ID'");
    }

    function getOdrLev()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM SMPr_OdrLev ORDER BY IdOdr ASC");
        return $query;
    }

    function getSubject_group()
    {
        $query = $this->db->query("SELECT DISTINCT * FROM SPL_INFRA_SubjectGroup ORDER BY ID ASC");
        return $query;
    }

    function delete_PersonnelId($id)
    {
        $query = $this->db->query("DELETE FROM SMPr_MenuStaData WHERE IDCard='$id';
        DELETE FROM SMPr_PicAll WHERE IDCard='$id';
        DELETE FROM SMPr_MoneyData WHERE IDCard='$id';
        DELETE FROM SMPr_EnhanceData WHERE IDCard='$id';
        DELETE FROM SMPr_RegisAddress WHERE IDCard='$id';
        DELETE FROM SMPr_ContactAddress WHERE IDCard='$id';
        DELETE FROM SMPr_RelaFamily WHERE IDCard='$id';
        DELETE FROM SMPr_EduData WHERE IDCard='$id';
        DELETE FROM SMPr_FameData WHERE IDCard='$id';
        DELETE FROM SMPr_HTrain WHERE IDCard='$id';
        DELETE FROM SMPr_HPreferment WHERE IDCard='$id';
        DELETE FROM SMPr_TeachDataSubj WHERE IDCard='$id';
        DELETE FROM SMPr_LProfession WHERE IDCard='$id';
        DELETE FROM SMPr_HVacaYear WHERE IDCard='$id';
        DELETE FROM SMPr_HChangeFL WHERE IDCard='$id';
        DELETE FROM SMPr_HRRoyal WHERE IDCard='$id'");
        // DELETE FROM SMPr_GoodYea WHERE IDCard='$id';
        return $query;
    }
    
    //ข้อมูลทั่วไปของบุคลากร
    function update_PersonnelData($IDCard, $MenuStaData, $MoneyData, $EnhanceData, $PicAll)
    {
        $this->db->trans_start(); 
        $this->db->select('*');
        $this->db->from('SMPr_MenuStaData');
        $this->db->where('IDCard', $IDCard);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            
            $this->db->where('IDCard', $IDCard);
            $this->db->update('SMPr_MenuStaData', $MenuStaData); 
            $this->db->where('IDCard', $IDCard);
            $this->db->update('SMPr_MoneyData', $MoneyData); 
            
            $this->db->where('IDCard', $IDCard);
            $this->db->update('SMPr_EnhanceData', $EnhanceData); 
            $this->db->where('IDCard', $IDCard);
            $this->db->update('SMPr_PicAll', $PicAll); 
        } else {
            $this->db->insert('SMPr_MenuStaData', $MenuStaData);
            $this->db->insert('SMPr_MoneyData', $MoneyData);
            $this->db->insert('SMPr_EnhanceData', $EnhanceData);
            $this->db->insert('SMPr_PicAll', $PicAll);
        }

        $this->db->trans_complete(); 
        
        if ($this->db->trans_status() === FALSE) {
            return false; 
        } else {
            return true;
        }
    }
    
    function update_PersonnelAddress(
        $IDCard, $RNo, $RMoo, $Rvillage, $Rsoi, $RBuid, $RRoad, $RDistrict, $RSubDistric, $RProvince, $RZipcode, $RTel, $RgCreatedAt, $RgUpdatedAt,
        $CNo, $CMoo, $Cvillage, $Csoi, $CBuid, $CRoad, $CDistrict, $CSubDistric, $CProvince, $CZipcode, $CTel, $CaCreatedAt, $CaUpdatedAt)
    {
        $RegisAddress_sql = $this->db->query("MERGE INTO SMPr_RegisAddress AS Target
        USING (SELECT '$IDCard', '$RNo', '$RMoo', '$Rvillage', '$Rsoi', '$RBuid', '$RRoad', '$RDistrict', '$RSubDistric', '$RProvince', '$RZipcode', '$RTel', '$RgCreatedAt', '$RgUpdatedAt') 
        AS Source (IDCard, RNo, RMoo, Rvillage, Rsoi, RBuid, RRoad, RDistrict, RSubDistric, RProvince, RZipcode, RTel, CreatedAt, UpdatedAt)
        ON (Target.IDCard = Source.IDCard)
        WHEN MATCHED THEN
            UPDATE SET
                RNo = Source.RNo,
                RMoo = Source.RMoo,
                Rvillage = Source.Rvillage,
                Rsoi = Source.Rsoi,
                RBuid = Source.RBuid,
                RRoad = Source.RRoad,
                RDistrict = Source.RDistrict,
                RSubDistric = Source.RSubDistric,
                RProvince = Source.RProvince,
                RZipcode = Source.RZipcode,
                RTel = Source.RTel,
                UpdatedAt = Source.UpdatedAt
        WHEN NOT MATCHED BY TARGET THEN
            INSERT (IDCard, RNo, RMoo, Rvillage, Rsoi, RBuid, RRoad, RDistrict, RSubDistric, RProvince, RZipcode, RTel, CreatedAt, UpdatedAt)
            VALUES (Source.IDCard, Source.RNo, Source.RMoo, Source.Rvillage, Source.Rsoi, Source.RBuid, Source.RRoad, Source.RDistrict, Source.RSubDistric, Source.RProvince, Source.RZipcode, Source.RTel, Source.CreatedAt, Source.UpdatedAt);");
    
        $ContactAddress_sql = $this->db->query("MERGE INTO SMPr_ContactAddress AS Target
        USING (SELECT '$IDCard', '$CNo', '$CMoo', '$Cvillage', '$Csoi', '$CBuid', '$CRoad', '$CDistrict', '$CSubDistric', '$CProvince', '$CZipcode', '$CTel', '$CaCreatedAt', '$CaUpdatedAt') 
        AS Source (IDCard, CNo, CMoo, Cvillage, Csoi, CBuid, CRoad, CDistrict,  CSubDistric, CProvince, CZipcode, CTel, CreatedAt, UpdatedAt)
        ON Target.IDCard = Source.IDCard
        WHEN MATCHED THEN
            UPDATE SET
                CNo = Source.CNo,
                CMoo = Source.CMoo,
                Cvillage = Source.Cvillage,
                Csoi = Source.Csoi,
                CBuid = Source.CBuid,
                CRoad = Source.CRoad,
                CDistrict = Source.CDistrict,
                CSubDistric = Source.CSubDistric,
                CProvince = Source.CProvince,
                CZipcode = Source.CZipcode,
                CTel = Source.CTel,
                UpdatedAt = Source.UpdatedAt
        WHEN NOT MATCHED BY TARGET THEN
            INSERT (IDCard, CNo, CMoo, Cvillage, Csoi, CBuid, CRoad, CDistrict,  CSubDistric, CProvince, CZipcode, CTel, CreatedAt, UpdatedAt)
            VALUES (Source.IDCard, Source.CNo, Source.CMoo, Source.Cvillage, Source.Csoi, Source.CBuid, Source.CRoad, Source.CDistrict, Source.CSubDistric, Source.CProvince, Source.CZipcode, Source.CTel, Source.CreatedAt, Source.UpdatedAt);");
        return true;
    }

// *****************************************  Query Family Model  *****************************************  
    function insert_PersonnelFamily($FamIDCard, $RelaFamily)
    {
        $this->db->insert('SMPr_RelaFamily', $RelaFamily);
        $this->db->where('FamIDCard', $FamIDCard) ;
        return true;

    }

    function getExistingFamIDCard($FamIDCard)
    {
        $existingFamIDCard = $this->db->get_where('SMPr_RelaFamily', ['FamIDCard' => $FamIDCard])->row();
        return $existingFamIDCard;
    }

    function get_FamIDCard($FamIDCard)
    {
        return $this->db->get_where('SMPr_RelaFamily', array('FamIDCard' => $FamIDCard));
    }

    function update_PersonnelFamily($FamIDCard, $data) 
    {
        if ($this->db->where('FamIDCard', $FamIDCard)->update('SMPr_RelaFamily', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_PersonnelFamily($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_RelaFamily WHERE IDCard = '$IDCard' ");
    }

    function delete_PersonnelFamily($FamIDCard)
    {
        if ($this->db->delete('SMPr_RelaFamily', array('FamIDCard' => $FamIDCard))) {
            return true;
        } else {
            return false;
        }
    }
    
// *****************************************  Query Contact Model  *****************************************  
    function insert_PersonnelContact($FamIDCard, $RelaFamily)
    {
        $this->db->insert('SMPr_RelaFamily', $RelaFamily);
        $this->db->where('FamIDCard', $FamIDCard) ;
        return true;
    }

// *****************************************  Query Study Model  *****************************************  
    function get_FullName()
    {
        $query = $this->db->query("SELECT FullName FROM SMItemCode WHERE status = 'Y' AND (ShortName IS NOT NULL OR FullName IS NOT NULL) ORDER BY GroupCode");
        return $query;
    }
    function get_ShortName()
    {
        $query = $this->db->query("SELECT ShortName FROM SMItemCode WHERE status = 'Y' AND (ShortName IS NOT NULL OR FullName IS NOT NULL) ORDER BY GroupCode");
        return $query;
    }

    function get_PersonnelStudy($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_EduData WHERE IDCard = '$IDCard' ");
    }
    function get_PersonnelFame($IDCard)
    {
        return $this->db->query("SELECT IDCard, FType, Agencies, RecieveYear, FileNm, P_at, CreatedAt, UpdatedAt  FROM SMPr_FameData WHERE IDCard = '$IDCard' ");
    }
    
    function getP_at_study($IDCard)
    {
        $query = $this->db->query("SELECT MAX(P_at) AS P_at_max FROM SMPr_EduData WHERE IDCard = '$IDCard'");
        return $query;
    }
    function getP_at_fame($IDCard)
    {
        $query = $this->db->query("SELECT MAX(P_at) AS P_at_max FROM SMPr_FameData WHERE IDCard = '$IDCard'");
        return $query;
    }

    function insert_PersonnelStudy($EduData)
    {
        if ($this->db->insert('SMPr_EduData', $EduData)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_PersonnelStudy($IDCard, $P_at, $data) 
    {
        $this->db->where('IDCard', $IDCard);
        $this->db->where('P_at', $P_at);
        $this->db->update('SMPr_EduData', $data);
        return true;
    }

    function delete_PersonnelStudy($IDCard, $P_at)
    {
        if ($this->db->delete('SMPr_EduData', array('IDCard' => $IDCard, 'P_at' => $P_at))) {
            return true;
        } else {
            return false;
        }
    }
    function delete_PersonnelFame($IDCard, $P_at)
    {
        if ($this->db->delete('SMPr_FameData', array('IDCard' => $IDCard, 'P_at' => $P_at))) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_PersonnelFame($FameData) 
    {
        return $this->db->insert('SMPr_FameData', $FameData);
    }

    public function insert_PDO_PersonnelFame($IDCard, $FType, $Agencies, $RecieveYear, $P_at, $FileNm, $Attachment, $CreatedAt, $UpdatedAt) 
    {
        $sql = "INSERT INTO SMPr_FameData (IDCard, FType, Agencies, RecieveYear, P_at, FileNm, Attachment, CreatedAt, UpdatedAt)
                VALUES (:IDCard, :FType, :Agencies, :RecieveYear, :P_at, :FileNm, :Attachment, :CreatedAt, :UpdatedAt);";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':IDCard', $IDCard, PDO::PARAM_STR);
        $stmt->bindParam(':FType', $FType, PDO::PARAM_STR);
        $stmt->bindParam(':Agencies', $Agencies, PDO::PARAM_STR);
        $stmt->bindParam(':RecieveYear', $RecieveYear, PDO::PARAM_INT);
        $stmt->bindParam(':P_at', $P_at, PDO::PARAM_STR);
        $stmt->bindParam(':FileNm', $FileNm, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':CreatedAt', $CreatedAt, PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $UpdatedAt, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_PersonnelFame($IDCard, $P_at, $FameData)
    {
        $this->db->where('IDCard', $IDCard);
        $this->db->where('P_at', $P_at);
        $this->db->update('SMPr_FameData', $FameData);
        return true;
    }

    public function update_PDO_PersonnelFame($IDCard, $P_at, $FType, $Agencies, $RecieveYear, $FileNm, $Attachment, $UpdatedAt)
    {
        $sql = "UPDATE SMPr_FameData SET FType = :FType, Agencies = :Agencies, RecieveYear = :RecieveYear, FileNm = :FileNm, Attachment = :Attachment, UpdatedAt = :UpdatedAt
                WHERE IDCard = :IDCard AND P_at = :P_at";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':IDCard', $IDCard, PDO::PARAM_STR);
        $stmt->bindParam(':P_at', $P_at, PDO::PARAM_STR);
        $stmt->bindParam(':FType', $FType, PDO::PARAM_STR);
        $stmt->bindParam(':Agencies', $Agencies, PDO::PARAM_STR);
        $stmt->bindParam(':RecieveYear', $RecieveYear, PDO::PARAM_INT);
        $stmt->bindParam(':FileNm', $FileNm, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
        $stmt->bindParam(':UpdatedAt', $UpdatedAt, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function export_File_Fame($IDCard, $P_at)
    {
        $query = $this->db->get_where('SMPr_FameData', array('IDCard' => $IDCard, 'P_at' => $P_at));
        return $query;
    }

// *****************************************  Query Training Model  ***************************************** 
    function get_PersonnelTraining($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_HTrain WHERE IDCard = '$IDCard' ");
    }

    public function insert_PersonnelTraining($TrainData) 
    {
        return $this->db->insert('SMPr_HTrain', $TrainData);
    }

    function getP_at_train($IDCard)
    {
        $query = $this->db->query("SELECT MAX(P_at) AS P_at_max FROM SMPr_HTrain WHERE IDCard = '$IDCard'");
        return $query;
    }

    function update_PersonnelTraining($IDCard, $P_at, $TrainData) 
    {
        $this->db->where('IDCard', $IDCard);
        $this->db->where('P_at', $P_at);
        $this->db->update('SMPr_HTrain', $TrainData);
        return true;
    }

    function delete_PersonnelTrain($IDCard, $P_at)
    {
        if ($this->db->delete('SMPr_HTrain', array('IDCard' => $IDCard, 'P_at' => $P_at))) {
            return true;
        } else {
            return false;
        }
    }

// *****************************************  Query Position Model  ***************************************** 
    function get_PersonnelPosition($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_HPreferment WHERE IDCard = '$IDCard' ");
    }

    public function insert_PersonnelPosition($PositionData) 
    {
        return $this->db->insert('SMPr_HPreferment', $PositionData);
    }

    function getP_at_position($IDCard)
    {
        $query = $this->db->query("SELECT MAX(P_at) AS P_at_max FROM SMPr_HPreferment WHERE IDCard = '$IDCard'");
        return $query;
    }

    function update_PersonnelPosition($IDCard, $P_at, $PositionData) 
    {
        $this->db->where('IDCard', $IDCard);
        $this->db->where('P_at', $P_at);
        $this->db->update('SMPr_HPreferment', $PositionData);
        return true;
    }

    function delete_PersonnelPosition($IDCard, $P_at)
    {
        if ($this->db->delete('SMPr_HPreferment', array('IDCard' => $IDCard, 'P_at' => $P_at))) {
            return true;
        } else {
            return false;
        }
    }

// *****************************************  Query Teaching Model  ***************************************** 
    function get_PersonnelTeaching($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_TeachDataSubj WHERE IDCard = '$IDCard' ");
    }

    function get_Id($IDCard)
    {
        return $this->db->query("SELECT MAX(Id) AS Id_max FROM SMPr_TeachDataSubj WHERE IDCard = '$IDCard'");
        
    }

    function get_SubjectCode()
    {
        return $this->db->query("SELECT DISTINCT * FROM SPL_AC_Subject ORDER BY ID ASC");
    }

    function get_GroupName()
    {
        return $this->db->query("SELECT DISTINCT * FROM SPL_INFRA_SubjectGroup ORDER BY ID ASC");
    }

    public function insert_PersonnelTeaching($TeachData) 
    {
        return $this->db->insert('SMPr_TeachDataSubj', $TeachData);
    }

    function update_PersonnelTeaching($IDCard, $Id, $TeachingData) 
    {
        $this->db->where('IDCard', $IDCard);
        $this->db->where('Id', $Id);
        $this->db->update('SMPr_TeachDataSubj', $TeachingData);
        return true;
    }

    function delete_PersonnelTeaching($IDCard, $EYea, $ETerm, $Lev, $Clss, $Room)
    {
        if ($this->db->delete('SMPr_TeachDataSubj', array('IDCard' => $IDCard, 'EYea' => $EYea, 'ETerm' => $ETerm, 'Lev' => $Lev, 'Clss' => $Clss, 'Room' => $Room))) {
            return true;
        } else {
            return false;
        }
    }

    function fetch_SubjectCode($GLearn)
    {
        $query = $this->db->query("SELECT DISTINCT SubjectCode + ' ' + SubjectName as fTitle, SubjectCode, SubjectGroup 
        FROM SPL_AC_Subject WHERE SubjectGroup = '$GLearn'");
        $output = '<option value="" class="select-fnz">--- เลือกวิชาที่สอน ---</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->fTitle .'" class="select-fnz">' . $row->fTitle . '</option>';
        }
        return $output;
    }

    function fetch_SubjectCodeHidden($TitlesCode)
    {
        $query = $this->db->query("SELECT DISTINCT SubjectCode + ' ' + SubjectName as fTitle, SubjectCode, SubjectGroup 
        FROM SPL_AC_Subject WHERE SubjectCode = '$TitlesCode'");
        $output = '';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->SubjectCode .'" class="select-fnz">' . $row->SubjectCode . '</option>';
        }
        return $output;
    }

    function fetch_SubjectCode_Edit($GLearn_Edit)
    {
        $rows = $this->db->query("SELECT * FROm SPL_INFRA_SubjectGroup WHERE GroupName = '$GLearn_Edit'")->row();
        $result = $rows->Sequence.'/'.$rows->GroupName;
        
        $query = $this->db->query("SELECT DISTINCT SubjectCode + ' ' + SubjectName as fTitle, SubjectCode, SubjectGroup 
        FROM SPL_AC_Subject WHERE SubjectGroup = '$result'");
        $output = '';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->fTitle . '" class="select-fnz">' . $row->fTitle . '</option>';
        }
        return $output;
    }

    function fetch_SubjectCodeHidden_Edit($TitlesCode_Edit)
    {
        $query = $this->db->query("SELECT DISTINCT SubjectCode + ' ' + SubjectName as fTitle, SubjectCode, SubjectGroup 
        FROM SPL_AC_Subject WHERE SubjectCode = '$TitlesCode_Edit'");
        $output = '';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->SubjectCode .'" class="select-fnz">' . $row->SubjectCode . '</option>';
        }
        return $output;
    }
    

// *****************************************  Query License Model  ***************************************** 
    public function insert_PersonnelLicense($LProfession) 
    {
        return $this->db->insert('SMPr_LProfession', $LProfession);
    }

    function get_PersonnelLicense($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_LProfession WHERE IDCard = '$IDCard' ");
    }

    function update_PersonnelLicense($IDCard, $LPWorkPermit, $LProfession) 
    {
        $this->db->where('IDCard', $IDCard);
        $this->db->where('LPWorkPermit', $LPWorkPermit);
        $this->db->update('SMPr_LProfession', $LProfession);
        return true;
    }

    function delete_PersonnelLicense($IDCard, $LPWorkPermit)
    {
        if ($this->db->delete('SMPr_LProfession', array('IDCard' => $IDCard, 'LPWorkPermit' => $LPWorkPermit))) {
            return true;
        } else {
            return false;
        }
    }

// *****************************************  Query Leave Model  ***************************************** 
    function get_PersonnelLeave($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_HVacaYear WHERE IDCard = '$IDCard' ");
    }
    
    function getP_at_Leave($IDCard)
    {
        $query = $this->db->query("SELECT MAX(P_at) AS P_at_max FROM SMPr_HVacaYear WHERE IDCard = '$IDCard'");
        return $query;
    }

    public function insert_PersonnelLeave($HVacaYear) 
    {
        return $this->db->insert('SMPr_HVacaYear', $HVacaYear);
    }
    
    function delete_PersonnelLeave($IDCard, $P_at)
    {
        if ($this->db->delete('SMPr_HVacaYear', array('IDCard' => $IDCard, 'P_at' => $P_at))) {
            return true;
        } else {
            return false;
        }
    }

    function getP_at_Rename($IDCard)
    {
        $query = $this->db->query("SELECT MAX(P_at) AS P_at_max FROM SMPr_HChangeFL WHERE IDCard = '$IDCard'");
        return $query;
    }

    function get_PersonnelRename($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_HChangeFL WHERE IDCard = '$IDCard' ");
    }

    public function insert_PersonnelRename($HChangeFL) 
    {
        return $this->db->insert('SMPr_HChangeFL', $HChangeFL);
    }
    
    function delete_PersonnelRename($IDCard, $P_at)
    {
        if ($this->db->delete('SMPr_HChangeFL', array('IDCard' => $IDCard, 'P_at' => $P_at))) {
            return true;
        } else {
            return false;
        }
    }

// *****************************************  Query Insignia Model  ***************************************** 
    function get_PersonnelInsignia($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_HRRoyal WHERE IDCard = '$IDCard' ");
    }

    function getP_at_Insignia($IDCard)
    {
        $query = $this->db->query("SELECT MAX(P_at) AS P_at_max FROM SMPr_HRRoyal WHERE IDCard = '$IDCard'");
        return $query;
    }

    public function insert_PersonnelInsignia($HRRoyal) 
    {
        return $this->db->insert('SMPr_HRRoyal', $HRRoyal);
    }

    function delete_PersonnelInsignia($IDCard, $P_at)
    {
        if ($this->db->delete('SMPr_HRRoyal', array('IDCard' => $IDCard, 'P_at' => $P_at))) {
            return true;
        } else {
            return false;
        }
    }

    function update_PersonnelInsignia($IDCard, $P_at, $HRRoyal) 
    {
        $this->db->where('IDCard', $IDCard);
        $this->db->where('P_at', $P_at);
        $this->db->update('SMPr_HRRoyal', $HRRoyal);
        return true;
    }


    function fetch_Titles()
    {
        return $this->db->query("SELECT DISTINCT SubjectCode + ' ' + SubjectName as fTitle, SubjectCode, SubjectGroup 
        FROM SPL_AC_Subject  WHERE SubjectGroup = $sara");
    }

// ***************************************** EXPORT EXCEL ***************************************** 
    public function get_PersonnelExport($IDCard)
    {
       $query = $this->db->query("SELECT MData.*, MNData.*,EHData.*,PAll.*, Pos.*, TType.*, AStan.*, MData.UpdatedAt, PAll.Pic, Pos.PosName
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_MoneyData MNData ON MData.IDCard = MNData.IDCard
        LEFT JOIN SMPr_EnhanceData EHData ON MData.IDCard = EHData.IDCard
        LEFT JOIN SMPr_PicAll PAll ON MData.IDCard = PAll.IDCard
        LEFT JOIN SMPr_TeacherPosition Pos ON MData.PoLine = Pos.ID 
        LEFT JOIN SMPr_TeacherType TType ON TType.ID = MData.PoType
        LEFT JOIN SMPr_AcademicStanding AStan ON AStan.ID = MData.PLevel
        WHERE MData.IDCard  = '$IDCard' ");
        return $query;
    }

    public function get_RelaFamilyExport($IDCard)
    {
        return $this->db->query("SELECT ISNULL(PName,'')+ ' ' + ISNULL(FName,'')+ ' ' + ISNULL(LName,'') AS FFullName FROM SMPr_RelaFamily WHERE IDCard = '$IDCard' AND (ReStatus = 'สามี' OR ReStatus = 'ภรรยา')");
    }

    public function get_RegisAddressExport($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_RegisAddress WHERE IDCard  = '$IDCard'");
    }

    public function get_ContactAddressExport($IDCard)
    {
        return $this->db->query("SELECT * FROM SMPr_ContactAddress WHERE IDCard  = '$IDCard'");
    }

    public function get_RelaFamily($IDCard)
    {
        return $this->db->query("SELECT ReStatus, ISNULL(PName,'')+ ' ' + ISNULL(FName,'')+ ' ' + ISNULL(LName,'') AS FullName, * FROM SMPr_RelaFamily WHERE IDCard  = '$IDCard'");
    }
}
