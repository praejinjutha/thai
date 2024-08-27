<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= APP_NAME ?></title>
    <link rel="icon" type="image/x-icon" href="<?= $themes ?>assets/images/logo/icon.png">
    <meta content="<?= DESCRIPTION_NAME ?>" name="description">
    <meta content="<?= KEYWORDS_NAME ?>" name="keywords">

    <link rel="stylesheet" href="<?= $themes ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $themes ?>assets/css/auth.css">
    <link rel="stylesheet" href="<?= $themes ?>assets/css/Font-Prompt/stylesheet.css">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css'>

    <script src="//code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="<?= $themes ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<style>
body {
    background-color: #fff4dc;
    height: 100vh;
    margin: 0;
    font-family: 'Prompt', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
}

.error {
    color: #F00;
}

.error.true {
    color: #6bc900;
}

.error2 {
    color: #F00;
}

.error2.true {
    color: #6bc900;
}

.alert,
.brand,
.btn-simple,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6,
.navbar,
.td-name,
input,
option,
button,
a,
body,
button.close,
h1,
h2,
h3,
h4,
h5,
h6,
p,
td,
i {
    font-family: "promptlight";
}

.role {
    margin-top: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

}

.std-role,
.tec-role {
    display: flex;
    align-items: center;
    border: 1px solid #8c6239;
    border-radius: 5px;
    padding: 3px 15px;
    cursor: pointer;
}

.std-role:hover,
.tec-role:hover,
.std-role.active,
.tec-role.active {
    background-color: #8c6239;
    color: #ffffff;
    border: 1px solid #8c6239;
    border-radius: 5px;
}
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="padding: 2rem 5rem;">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title text-center fw-bold fs-4">ลงทะเบียนเข้าใช้งาน</h4>
                                <form id="signupForm" action="" method="POST" class="form-horizontal">
                                    <div class="role">
                                        <span class="me-2">ผู้ใช้งาน</span>
                                        <div class="tec-role" onclick="toggleActive(this)" name="role" value="teacher">
                                            <i class="fa-solid fa-user-tie me-2"></i>
                                            <span>ครู</span>
                                        </div>
                                        <div class="std-role" onclick="toggleActive(this)" name="role" value="student">
                                            <i class="fa-solid fa-user me-2"></i>
                                            <span>นักเรียน</span>
                                        </div>
                                    </div>
                                    <div id="teacher-form" class="d-none">
                                        <div class="form-group mt-5 d-flex align-items-center">
                                            <input type="text" class="form-control w-50 me-3" id="key" name="key"
                                                placeholder="กรอกรหัสผลิตภัณฑ์ (Product key)" required>
                                            <span id="statusKey"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="กรอกชื่อ - สกุล (ระบุคำนำหน้า)" required>
                                        </div>
                                        <div class="form-group mt-3 d-flex align-items-center">
                                            <input type="text" class="form-control me-3" id="idcard" name="idcard"
                                                maxlength="13" placeholder="กรอกเลขบัตรประชาชน" required>
                                            <span class="error"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="กรอกอีเมล์" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="กรอกหมายเลขโทรศัพท์" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="กรอกชื่อผู้ใช้ (Username) ประกอบด้วยอักษร A-Z, a-z, 0-9 เท่านั้น"
                                                required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="ตั้งค่ารหัสผ่าน (Password) ประกอบด้วยอักษร A-Z, a-z,
                                                0-9, !, @, #, $ เท่านั้น" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="password" class="form-control" id="confirmPassword"
                                                name="confirmPassword"
                                                placeholder="ยืนยันรหัสผ่านสำหรับเข้าสู่ระบบ (Confirm Password)"
                                                required>
                                        </div>

                                    </div>

                                    <div id="student-form" class="d-none">
                                        <div class="form-group mt-5">
                                            <input type="text" class="form-control" id="StudentNo" name="StudentNo"
                                                placeholder="กรอกเลขที่นักเรียน" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <select class="form-select" name="Titlename" id="Titlename"
                                                style="color: #6c757d" required>
                                                <option selected>เลือกคำนำหน้าชื่อ</option>
                                                <option value="เด็กชาย">เด็กชาย</option>
                                                <option value="เด็กหญิง">เด็กหญิง</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" id="Firstname" name="Firstname"
                                                placeholder="กรอกชื่อ" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" id="Lastname" name="Lastname"
                                                placeholder="กรอกนามสกุล" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" id="CitizenID" name="CitizenID"
                                                maxlength="13" placeholder="กรอกเลขบัตรประชาชน">
                                            <span class="error2"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <select class="form-select" name="ClassYear" id="ClassYear"
                                                style="color: #6c757d" required>
                                                <option selected>เลือกชั้น</option>
                                                <option value="อ.1">อนุบาล 1</option>
                                                <option value="อ.2">อนุบาล 2</option>
                                                <option value="อ.3">อนุบาล 3</option>
                                                <option value="ป.1">ประถมศึกษาปีที่ 1</option>
                                                <option value="ป.2">ประถมศึกษาปีที่ 2</option>
                                                <option value="ป.3">ประถมศึกษาปีที่ 3</option>
                                                <option value="ป.4">ประถมศึกษาปีที่ 4</option>
                                                <option value="ป.5">ประถมศึกษาปีที่ 5</option>
                                                <option value="ป.6">ประถมศึกษาปีที่ 6</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <select class="form-select" name="Room" id="Room" style="color: #6c757d"
                                                required>
                                                <option selected>เลือกห้อง</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" id="SchoolName" name="SchoolName"
                                                placeholder="กรอกชื่อโรงเรียน" required>
                                        </div>
                                    </div>
                                    <div class=" d-none" id="pdpa">
                                        <div class="form-group mt-3">
                                            <textarea class="form-control" rows="5">ข้อกำหนดและเงื่อนไขในการใช้งานที่แสดงไว้ ณ ที่นี้ (ต่อไปนี้เรียกว่า "ข้อกำหนดและเงื่อนไขฯ") ระบุถึงข้อกำหนดระหว่าง บริษัท โมด โซลูชั่น จำกัด (ต่อไปนี้เรียกว่า "บริษัทฯ") และผู้ใช้ (ต่อไปนี้เรียกว่า "ผู้ใช้") เกี่ยวกับบริการหรือคุณลักษณะใดๆ ของ เว็บไซต์ภาษาไทย (ต่อไปนี้เรียกว่า "บริการฯ") ซึ่งบริษัทฯ เป็นผู้ให้บริการ

1. คำนิยาม
คำและข้อความต่อไปนี้จะมีความหมายตามที่กำหนดไว้ด้านล่างนี้เมื่อมีการใช้ในข้อกำหนดและเงื่อนไขฯ
1.1 "เนื้อหา" หมายถึง ข้อมูล เช่น ข้อความ ไฟล์เสียง เพลง รูปภาพ วิดีโอ ซอฟต์แวร์ โปรแกรม รหัสคอมพิวเตอร์ และสิ่งอื่นๆ ที่คล้ายคลึงกัน
1.2 "เนื้อหาฯ" หมายถึง เนื้อหาที่สามารถเข้าถึงได้ผ่านทางบริการฯ
1.3 "เนื้อหาจากผู้ใช้" หมายถึง เนื้อหาที่ผู้ใช้ได้ส่ง ส่งผ่าน หรือ อัพโหลด
1.4 "ข้อกำหนดและเงื่อนไขฯ เพิ่มเติม" หมายถึง เอกสารที่บริษัทฯ ออกหรืออัพโหลดซึ่งเกี่ยวกับบริการฯ ภายใต้ชื่อ "ข้อตกลง" "แนวทางปฏิบัติ" "นโยบาย" และอื่นๆ ในทำนองเดียวกัน

2. การตกลงยอมรับข้อกำหนดและเงื่อนไขฯ
2.1 ผู้ใช้ทุกรายจะต้องใช้บริการฯ ตามข้อกำหนดที่ระบุไว้ในข้อกำหนดและเงื่อนไขฯ ผู้ใช้จะไม่สามารถใช้บริการฯ ได้เว้นเสียแต่ว่า ผู้ใช้ได้ตกลงยอมรับข้อกำหนดและเงื่อนไขฯ การตกลงยอมรับดังกล่าวมีผลสมบูรณ์และเพิกถอนมิได้
2.2 ผู้เยาว์สามารถใช้บริการฯ ได้ต่อเมื่อได้รับความยินยอมจากบิดามารดาหรือผู้ปกครองตามกฎหมายเท่านั้น นอกจากนี้ หากผู้ใช้ใช้บริการฯ แทน หรือ เพื่อวัตถุประสงค์ขององค์กรธุรกิจใดๆ จะถือว่า องค์กรธุรกิจดังกล่าวได้ตกลงยอมรับข้อกำหนดและเงื่อนไขฯ นี้ด้วยแล้ว การตกลงยอมรับดังกล่าวมีผลสมบูรณ์และเพิกถอนมิได้
2.3 การที่ผู้ใช้ใช้บริการฯ ถือว่า ผู้ใช้ได้ตกลงยอมรับข้อกำหนดและเงื่อนไขฯ การตกลงยอมรับดังกล่าวมีผลสมบูรณ์และเพิกถอนมิได้
2.4 หากมีข้อกำหนดและเงื่อนไขฯ เพิ่มเติมสำหรับบริการฯ ผู้ใช้จะต้องปฏิบัติตามข้อกำหนดและเงื่อนไขฯ เพิ่มเติมนั้นด้วยเช่นเดียวกับข้อกำหนดและเงื่อนไขฯ นี้

3. การแก้ไขข้อกำหนดและเงื่อนไขฯ
บริษัทฯ อาจแก้ไขข้อกำหนดและเงื่อนไขฯ หรือ ข้อกำหนดและเงื่อนไขฯ เพิ่มเติม เมื่อบริษัทฯ เห็นว่ามีความจำเป็น โดยไม่ต้องให้คำบอกกล่าวล่วงหน้าแก่ผู้ใช้ การแก้ไขจะมีผลบังคับเมื่อมีการประกาศข้อกำหนดและเงื่อนไขฯ ที่แก้ไข หรือข้อกำหนดและเงื่อนไขฯ เพิ่มเติมที่แก้ไขไว้ในสถานที่ที่เหมาะสมภายในเว็บไซต์ที่บริษัทฯ เป็นผู้ดำเนินงาน การที่ผู้ใช้ใช้บริการฯ ต่อไป ถือว่าผู้ใช้ได้ให้การยอมรับที่มีผลสมบูรณ์และเพิกถอนมิได้ต่อข้อกำหนดและเงื่อนไขฯ ที่แก้ไขแล้ว หรือข้อกำหนดและเงื่อนไขฯ เพิ่มเติมที่แก้ไขแล้ว ผู้ใช้ควรตรวจสอบข้อกำหนดและเงื่อนไขฯ เป็นประจำระหว่างการใช้บริการฯ เนื่องจากอาจไม่มีการแจ้งเตือนแยกต่างหากเกี่ยวกับการแก้ไขข้อกำหนดและเงื่อนไขฯ ดังกล่าว

4. บัญชี
4.1 เมื่อผู้ใช้ให้ข้อมูลเกี่ยวกับตนเองแก่บริษัทฯ ผู้ใช้จะต้องให้ข้อมูลที่เป็นจริง ถูกต้องและครบถ้วนในขณะที่ใช้บริการฯ และปรับปรุงข้อมูลดังกล่าวให้เป็นปัจจุบันอยู่ตลอดเวลา
4.2 หากผู้ใช้ลงทะเบียนรหัสผ่านในขณะที่ใช้บริการฯ ผู้ใช้จะต้องใช้ความระมัดระวังและมีความรับผิดชอบตามสมควรเพื่อไม่ให้มีการใช้รหัสผ่านในลักษณะที่ไม่ชอบด้วยกฎหมาย บริษัทฯ สามารถถือว่ากิจกรรมต่างๆ ที่ดำเนินการโดยใช้รหัสผ่านดังกล่าว เป็นกิจกรรมที่ผู้เป็นเจ้าของรหัสผ่านได้ดำเนินการด้วยตนเอง
4.3 ผู้ใช้งานที่จดทะเบียนใช้บริการฯ สามารถลบบัญชีของตนและเลิกใช้บริการฯ ได้ ไม่ว่าในเวลาใดๆ ก็ตาม
4.4 บริษัทฯ อาจระงับหรือลบบัญชีของผู้ใช้ได้โดยไม่ต้องให้คำบอกกล่าวล่วงหน้าแก่ผู้ใช้ หากบริษัทฯ เห็นว่าผู้ใช้กำลังละเมิดหรือได้ละเมิดข้อกำหนดและเงื่อนไขฯ
4.5 บริษัทฯ สงวนสิทธิที่จะลบบัญชีใดๆ ที่ไม่มีการเปิดใช้งานเป็นเวลา 1 ปีหรือนานกว่านั้นนับตั้งแต่วันที่มีการเปิดใช้งานบัญชีดังกล่าวครั้งล่าสุด โดยไม่ต้องให้คำบอกกล่าวล่วงหน้าใดๆ แก่ผู้ใช้
4.6 สิทธิที่จะใช้บริการของผู้ใช้จะสิ้นสุดลงเมื่อมีการลบบัญชีของผู้ใช้ไม่ว่าด้วยเหตุผลใดๆ ก็ตาม บัญชีจะไม่สามารถกู้คืนมาได้แม้ว่าผู้ใช้จะลบบัญชีของตนโดยไม่ได้ตั้งใจก็ตาม และบริษัทฯ ขอให้ผู้ใช้ตระหนักถึงเรื่องนี้ด้วย
4.7 บัญชีแต่ละบัญชีในบริการฯ มีไว้เพื่อการใช้งานเฉพาะและเป็นของเจ้าของบัญชีแต่เพียงผู้เดียวเท่านั้น ผู้ใช้ไม่สามารถโอนหรือให้ยืมบัญชีของตนแก่บุคคลภายนอกใดๆ และบุคคลภายนอกใดๆ ไม่สามารถรับช่วงบัญชีจากผู้ใช้ได้

5. การคุ้มครองข้อมูลส่วนบุคคล
5.1 บริษัทฯ ให้ความสำคัญแก่ความเป็นส่วนตัวของผู้ใช้ของบริษัทฯ เป็นลำดับแรก
5.2 บริษัทฯ สัญญาว่าจะคุ้มครองความเป็นส่วนตัวและข้อมูลส่วนบุคคลของผู้ใช้ของบริษัทฯ ตาม "นโยบายของไลน์ว่าด้วยการคุ้มครองข้อมูลส่วนบุคคล"
5.3 บริษัทฯ สัญญาที่จะใช้ความระมัดระวังและความใส่ใจอย่างสูงสุดเกี่ยวกับมาตรการรักษาความปลอดภัยของบริษัทฯ เพื่อให้มีการรักษาความปลอดภัยของข้อมูลใดๆ ของผู้ใช้ ทั้งหมด

6. การให้บริการฯ
6.1 ผู้ใช้จะต้องเป็นผู้รับผิดชอบจัดหาเครื่องคอมพิวเตอร์ อุปกรณ์โทรศัพท์เคลื่อนที่ อุปกรณ์สื่อสาร ระบบปฏิบัติการและการเชื่อมต่อข้อมูลที่จำเป็นสำหรับการใช้บริการฯ โดยผู้ใช้เป็นผู้ออกค่าใช้จ่ายเอง
6.2 บริษัทฯ สงวนสิทธิที่จะจำกัดการเข้าถึงบริการฯ ทั้งหมดหรือเพียงบางส่วน ขึ้นอยู่กับเงื่อนไขที่บริษัทฯ เห็นว่าจำเป็น เช่น อายุ การระบุตัวตน สถานภาพสมาชิกในปัจจุบัน และสิ่งอื่นๆ ที่คล้ายคลึงกัน
6.3 บริษัทฯ สงวนสิทธิที่จะเปลี่ยนแปลงหรือยุติบริการฯ ทั้งหมดหรือเพียงบางส่วนตามดุลยพินิจของบริษัทฯ ไม่ว่าในเวลาใดๆ ก็ตาม โดยไม่ต้องให้คำบอกกล่าวล่วงหน้าใดๆ แก่ผู้ใช้

7. การไม่สามารถพึ่งพาบริการฯ เพื่อโทรศัพท์ฉุกเฉิน
ผู้ใช้ไม่สามารถที่จะพึ่งพาบริการฯ เพื่อการโทรศัพท์ฉุกเฉินได้ เช่น การโทรไปหน่วยงานที่บังคับใช้กฎหมาย หน่วยงานด้านความปลอดภัยทางทะเล หน่วยดับเพลิง หรือบริการฉุกเฉินอื่นๆ  

 8. โฆษณา
บริษัทฯ สงวนสิทธิที่จะแสดงโฆษณาสำหรับบริษัทฯ หรือบุคคลภายนอกให้ผู้ใช้ผ่านทางบริการฯ  

 9. บริการของคู่ค้า
เนื้อหาหรือบริการอื่นๆ ที่เสนอโดยคู่ค้ารายอื่นที่ร่วมมือกับบริษัทฯ อาจจะรวมอยู่ภายในบริการฯ นี้ด้วย โดยคู่ค้าจะต้องเป็นผู้รับผิดชอบแต่เพียงผู้เดียวเกี่ยวกับเนื้อหา และ/หรือบริการที่เสนอดังกล่าว นอกจากนี้ เนื้อหาและบริการดังกล่าวอาจอยู่ภายใต้บังคับของข้อกำหนดและเงื่อนไขที่ชัดแจ้ง ฯลฯ ซึ่งคู่ค้าได้กำหนดไว้สำหรับเนื้อหาและบริการนั้น ๆ

 10. เนื้อหาฯ
10.1 บริษัทฯ อนุญาตให้ผู้ใช้ใช้เนื้อหาฯ ที่บริษัทฯ จัดให้ เพื่อวัตถุประสงค์ในการใช้บริการฯ เท่านั้น โดยเป็นการอนุญาตให้ใช้สิทธิที่โอนต่อไม่ได้ นำไปให้อนุญาตใหม่ไม่ได้  และอนุญาตให้ใช้สิทธิโดยไม่จำกัดแต่เพียงผู้เดียว (non-transferable, non-re-licensable, non-exclusive license)
10.2 ผู้ใช้จะต้องปฏิบัติตามเงื่อนไขที่เหมาะสมเมื่อใช้เนื้อหาฯ ซึ่งอาจมีค่าใช้จ่ายเพิ่มเติมและขึ้นอยู่กับระยะเวลาในการใช้งาน ถึงแม้ในกรณีที่มีถ้อยคำ เช่น "การซื้อ" "การขาย" และคำอื่นๆ ในทำนองเดียวกันปรากฏบนหน้าจอในการใช้บริการฯ บริษัทฯ จะยังคงเป็นเจ้าของสิทธิในทรัพย์สินทางปัญญาและสิทธิอื่นๆ ในเนื้อหาฯ ที่บริษัทฯ เสนอต่อผู้ใช้ และจะไม่มีการโอนสิทธิต่างๆ ดังกล่าวไปให้แก่ผู้ใช้
10.3 ผู้ใช้จะต้องไม่ใช้เนื้อหาฯ เกินจากขอบเขตของการใช้งานตามวัตถุประสงค์ของเนื้อหาฯ ในบริการฯ (ยกตัวอย่างเช่น การทำสำเนา การส่ง การทำซ้ำ และการแก้ไข)
10.4 หากผู้ใช้ต้องการที่จะสำรองเนื้อหาจากผู้ใช้ ไม่ว่าทั้งหมดหรือเพียงบางส่วน ผู้ใช้จะต้องดำเนินการดังกล่าวด้วยตนเอง บริษัทฯ จะไม่มีภาระหน้าที่ในการสำรองเนื้อหาจากผู้ใช้แต่อย่างใด
10.5 บริการฯ อาจรวมถึง คุณลักษณะการทำงานต่างๆ ที่ผู้ใช้หลายคนสามารถที่จะโพสต์ ตรวจแก้ แก้ไข และลบรายการต่างๆ ได้ ในกรณีดังกล่าว ผู้ใช้ที่โพสต์เนื้อหาจากผู้ใช้จะต้องอนุญาตให้ผู้ใช้รายอื่นๆ แก้ไขเนื้อหาจากผู้ใช้ได้
10.6 ผู้ใช้จะยังคงมีสิทธิที่เกี่ยวกับเนื้อหาจากผู้ใช้อยู่เช่นเดิม และบริษัทฯ จะไม่ได้มาซึ่งสิทธิใดๆ ในเนื้อหาดังกล่าว อย่างไรก็ตาม หากผู้ใช้รายอื่นๆ นอกจาก "เพื่อน" ของผู้ใช้สามารถมองเห็นเนื้อหาจากผู้ใช้ดังกล่าวได้ ผู้ใช้ที่โพสต์เนื้อหาจากผู้ใช้นั้นจะต้องมอบการอนุญาตให้ใช้สิทธิที่ไม่ผูกขาด ไม่มีค่าสิทธิ และใช้ได้ทุกแห่ง (worldwide, non-exclusive, royalty-free license) แก่บริษัทฯ (พร้อมด้วยสิทธิที่จะช่วงการอนุญาตให้ใช้สิทธิในเนื้อหาดังกล่าวแก่บุคคลภายนอกอื่นๆ ที่ทำงานร่วมกับบริษัทฯ) เป็นระยะเวลาที่ไม่จำกัด เพื่อใช้เนื้อหาดังกล่าว (ภายหลังจากการแก้ไขเนื้อหาดังกล่าว หากบริษัทฯ เห็นว่าจำเป็นและสมควร) เพื่อบริการต่างๆ และ/หรือเพื่อวัตถุประสงค์ในการส่งเสริมการตลาด
10.7 บริษัทฯ อาจตรวจสอบรายละเอียดของเนื้อหาจากผู้ใช้ หากบริษัทฯ เห็นว่า เนื้อหาจากผู้ใช้อาจฝ่าฝืนกฎหมายหรือข้อกำหนดและเงื่อนไขฯ อย่างไรก็ตาม บริษัทฯ ไม่มีภาระหน้าที่จะต้องดำเนินการตรวจสอบดังกล่าว
10.8 หากบริษัทฯ เห็นว่า ผู้ใช้ได้ฝ่าฝืนหรืออาจฝ่าฝืนกฎหมาย หรือข้อกำหนดและเงื่อนไขฯ ที่เกี่ยวกับเนื้อหาจากผู้ใช้ บริษัทฯ สงวนสิทธิที่จะตัดสิทธิของผู้ใช้ในการที่จะใช้เนื้อหาจากผู้ใช้ในบางลักษณะ เช่น การลบเนื้อหาจากผู้ใช้ โดยไม่ต้องให้คำบอกกล่าวล่วงหน้าแก่ผู้ใช้

11. ข้อจำกัด
ผู้ใช้จะต้องไม่มีส่วนร่วมในกิจกรรมต่างๆ ดังต่อไปนี้เมื่อใช้บริการฯ
11.1 กิจกรรมที่ฝ่าฝืนกฎหมาย คำพิพากษา มติหรือคำสั่งศาล หรือมาตรการทางปกครองที่มีผลผูกพันทางกฎหมาย
11.2 กิจกรรมที่อาจขัดต่อความสงบเรียบร้อยหรือศีลธรรมอันดีของประชาชน
11.3 กิจกรรมที่ละเมิดสิทธิในทรัพย์สินทางปัญญา เช่น ลิขสิทธิ์ เครื่องหมายการค้าและสิทธิบัตร ชื่อเสียง ความเป็นส่วนตัว และสิทธิอื่นๆ ทั้งหมดของบริษัทฯ และ/หรือบุคคลภายนอกที่มีการมอบให้ตามกฎหมายหรือตามสัญญา
11.4 กิจกรรมที่แสดงหรือส่งต่อซึ่งการแสดงออกที่มีลักษณะรุนแรงหรือเกี่ยวกับเพศ การแสดงออกที่นำไปสู่การเลือกปฏิบัติโดยเชื้อชาติ สัญชาติ ความเชื่อ เพศ สถานะทางสังคม ถิ่นกำเนิดครอบครัว และอื่นๆ การแสดงออกที่ชักชวนหรือส่งเสริมการฆ่าตัวตาย พฤติกรรมการทำร้ายตัวเองหรือการใช้ยาในทางที่ผิด หรือการแสดงออกที่ต่อต้านสังคมซึ่งประกอบด้วยเนื้อหาที่ต่อต้านสังคมและทำให้บุคคลอื่นเกิดความไม่สบายใจ
11.5 กิจกรรมที่อาจทำให้ผู้อื่นเข้าใจผิดเกี่ยวกับบริษัทฯ และ/หรือบุคคลภายนอก หรือการจงใจเผยแพร่ข้อมูลเท็จ
11.6 กิจกรรมต่างๆ เช่น การส่งข้อความโดยการสุ่มไปให้แก่ผู้ใช้จำนวนมาก (ยกเว้นข้อความที่ได้รับความเห็นชอบจากบริษัทฯ) การเพิ่มผู้ใช้เป็นเพื่อน หรือเข้าไปในกลุ่มพูดคุยโดยการสุ่ม หรือกิจกรรมอื่นใดที่บริษัทฯ ถือว่าเป็นการส่งข้อความรบกวน (spamming)
11.7 กิจกรรมที่มีการแลกเปลี่ยนสิทธิในการใช้เนื้อหาฯ เป็นเงินสด ทรัพย์สินหรือผลประโยชน์ทางเศรษฐกิจอื่นๆ โดยไม่ได้รับอนุญาตจากบริษัทฯ
11.8 กิจกรรมที่มีการใช้บริการฯ เพื่อการขาย การตลาด โฆษณา การชักชวน หรือวัตถุประสงค์ทางการค้าอื่นๆ (ยกเว้นวัตถุประสงค์ที่ได้รับความเห็นชอบจากบริษัทฯ) กิจกรรมที่มีการใช้บริการฯ เพื่อการกระทำทางเพศหรือการกระทำที่อนาจาร กิจกรรมที่มีการใช้บริการฯ เพื่อวัตถุประสงค์ในการพบบุคคลเพื่อการมีเพศสัมพันธ์ กิจกรรมที่ใช้บริการฯ เพื่อวัตถุประสงค์ในการคุกคาม หรือการหมิ่นประมาทผู้ใช้รายอื่นๆ หรือกิจกรรมที่ใช้บริการฯ เพื่อวัตถุประสงค์อื่นๆ ที่มิใช่จุดประสงค์ที่แท้จริงของบริการฯ
11.9 กิจกรรมที่เป็นประโยชน์ต่อหรือเป็นการร่วมมือกับกลุ่มที่ต่อต้านสังคม
11.10 กิจกรรมที่เกี่ยวกับกิจกรรมทางศาสนาหรือการเชื้อเชิญให้เข้ากลุ่มทางศาสนา
11.11 กิจกรรมที่นำไปสู่การเก็บรวบรวม การเปิดเผย หรือการให้ข้อมูลส่วนบุคคลของบุคคลอื่น ข้อมูลที่จดทะเบียน ประวัติผู้ใช้ หรือข้อมูลอื่นๆ ในทำนองเดียวกันโดยไม่ชอบด้วยกฎหมายหรือไม่เหมาะสม
11.12 กิจกรรมที่แทรกแซงเครื่องแม่ข่าย และ/หรือระบบเครือข่ายของบริการฯ กิจกรรมซึ่งเป็นการใช้บริการฯ ในทางที่ผิดด้วยการใช้บ็อท (BOTs) เครื่องมือเพื่อการโกง หรือวิธีการทางเทคนิคอื่นๆ กิจกรรมที่ใช้ข้อบกพร่องของบริการฯ โดยไตร่ตรองไว้ก่อน กิจกรรมที่ทำการสอบถามอย่างไม่สมควร และ/หรือสิทธิเรียกร้องที่ไม่ควรได้ เช่น การถามคำถามเดียวกันซ้ำๆ เกินความจำเป็น และกิจกรรมที่แทรกแซงการให้บริการฯ ของบริษัท หรือการใช้บริการฯ ของผู้ใช้
11.13 กิจกรรมที่ให้ความช่วยเหลือหรือส่งเสริมกิจกรรมใดๆ ที่ระบุไว้ในข้อ 1 ถึงข้อ 12 ข้างต้น
11.14 กิจกรรมอื่นๆ ที่บริษัทฯ เห็นว่าไม่เหมาะสม

12. ความรับผิดชอบของผู้ใช้
12.1 ผู้ใช้จะต้องใช้บริการฯ นี้โดยเป็นความเสี่ยงของผู้ใช้เอง และจะต้องรับผิดชอบแต่เพียงผู้เดียวสำหรับการกระทำที่กระทำไปและผลของการกระทำที่มีต่อบริการฯ นี้
12.2 บริษัทฯ อาจใช้มาตรการที่บริษัทฯ เห็นว่าจำเป็นและเหมาะสมได้ หากบริษัทฯ รับทราบว่าผู้ใช้รายหนึ่งรายใดกำลังใช้บริการฯ ในทางที่ฝ่าฝืนข้อกำหนดและเงื่อนไขฯ อย่างไรก็ตาม บริษัทฯไม่ต้องรับผิดชอบในการแก้ไขหรือป้องกันการฝ่าฝืนดังกล่าวต่อผู้ใช้หรือบุคคลอื่นๆ
12.3 ในกรณีที่เกิดความสูญเสีย/ความเสียหายแก่บริษัทฯ หรือบริษัทฯ ถูกเรียกเก็บค่าใช้จ่ายใดๆ (ซึ่งรวมถึงโดยไม่จำกัดเพียงค่าทนายความ) ไม่ว่าโดยตรงหรือโดยอ้อม (ซึ่งรวมถึงโดยไม่จำกัดเพียงกรณีที่มีบุคคลภายนอกฟ้องร้องเรียกค่าเสียหายจากบริษัทฯ) อันเนื่องมาจากการที่ผู้ใช้ฝ่าฝืนกฎหมายที่เกี่ยวข้องหรือข้อกำหนดและเงื่อนไขฯ ในขณะที่ใช้บริการฯ ผู้ใช้จะต้องชดใช้ค่าเสียหายให้แก่บริษัทฯ ทันทีที่บริษัทฯ ร้องขอ

13. การยกเว้นความรับผิดของบริษัทฯ
13.1 บริษัทฯ ไม่รับประกันไม่ว่าโดยชัดแจ้งหรือโดยปริยายว่า บริการฯ (ซึ่งรวมถึงเนื้อหาฯ) จะปราศจากข้อบกพร่องตามจริงหรือตามกฎหมาย (ซึ่งรวมถึงแต่ไม่จำกัดเพียง เสถียรภาพ การไว้วางใจได้ ความถูกต้อง ความสมบูรณ์ การมีประสิทธิผล ความเหมาะสมในการใช้เพื่อวัตถุประสงค์เฉพาะ ข้อบกพร่อง ข้อผิดพลาด จุดบกพร่องที่เกี่ยวกับความปลอดภัย (bug)  หรือการละเมิดสิทธิต่างๆ) และบริษัทฯ ไม่มีความรับผิดชอบในการที่จะต้องจัดหาบริการฯ ที่ไม่มีข้อบกพร่องดังกล่าว
13.2 บริษัทฯ จะไม่ต้องรับผิดชอบต่อค่าเสียหายใดๆ ที่เกิดขึ้นกับผู้ใช้อันเกี่ยวกับการใช้บริการฯ อย่างไรก็ตาม หากมีการตีความว่าข้อตกลง (ซึ่งรวมถึงแต่ไม่จำกัดเพียงข้อกำหนดและเงื่อนไขฯ) ระหว่างบริษัทฯ และผู้ใช้เกี่ยวกับบริการฯ เป็นสัญญาผู้บริโภคตามกฎหมายว่าด้วยสัญญาผู้บริโภคในประเทศญี่ปุ่น ข้อยกเว้นความรับผิดนี้จะไม่ใช้บังคับ
13.3 ไม่ว่าเงื่อนไขที่ระบุไว้ในข้อ 14.2 ข้างต้นจะกำหนดไว้อย่างไร บริษัทฯ จะไม่ต้องรับผิดชอบต่อค่าเสียหายโดยอ้อม ค่าเสียหายพิเศษ ค่าเสียหายเนื่องจากการผิดสัญญา ค่าเสียหายต่อเนื่องหรือค่าเสียหายเชิงลงโทษใดๆ (ซึ่งรวมถึงแต่ไม่จำกัดเพียงค่าเสียหายที่บริษัทฯ หรือผู้ใช้สามารถคาดการณ์หรือน่าจะคาดการณ์ได้) ในส่วนที่เกี่ยวกับการผิดสัญญาหรือการกระทำละเมิดของบริษัทฯ เนื่องจากความประมาทเลินเล่อของบริษัทฯ (ยกเว้นความประมาทเลินเล่ออย่างร้ายแรง) ค่าชดเชยสำหรับค่าเสียหายตามปกติในส่วนที่เกี่ยวกับการผิดสัญญาหรือการกระทำละเมิดของบริษัทฯ เนื่องจากความประมาทเลินเล่อของบริษัทฯ (ยกเว้นความประมาทเลินเล่ออย่างร้ายแรง) จะจำกัดไว้ที่จำนวนเงินรวมของค่าบริการที่ได้รับจากผู้ใช้ในเดือนปฏิทินที่เกิดค่าเสียหายดังกล่าวขึ้น

14. การแจ้งเตือนและการติดต่อ
15.1 เมื่อบริษัทฯ แจ้งหรือติดต่อผู้ใช้เกี่ยวกับบริการฯ บริษัทอาจใช้วิธีการที่บริษัทฯ เห็นว่าเหมาะสม เช่น การประกาศไว้ในเว็บไซต์ซึ่งบริษัทฯ เป็นผู้ดำเนินงาน
15.2 เมื่อผู้ใช้แจ้งหรือติดต่อบริษัทฯ เกี่ยวกับบริการฯ ผู้ใช้จะต้องใช้แบบฟอร์มสอบถามสำหรับลูกค้าที่มีอยู่ในเว็บไซต์ซึ่งบริษัทฯ เป็นผู้ดำเนินงานหรือโดยวิธีการอื่นๆ ที่บริษัทฯ กำหนด

จบข้อความ
                                </textarea>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="agree" name="agree"
                                                onclick="AgreePDPA()">
                                            <label class="form-check-label" for="flexCheckDefault">ยินยอม</label>
                                            <label for="exampleFormControlTextarea1"
                                                style="color: #000;">ข้อตกลงการใช้งานและนโยบายข้อมูลส่วนบุคคล</label>
                                        </div>
                                    </div>
                                    <div class="col text-center mt-4 d-none" id="btn-submit">
                                        <button type="submit" class="btn btn-primary" id="submitButton" disabled>ลงทะเบียน</button>
                                        <a href="<?= site_url('auth') ?>" class="btn btn-danger">กลับสู่หน้าหลัก</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>

</html>

<script>
function toggleActive(element) {
    var activeElements = document.querySelectorAll('.role .active');
    activeElements.forEach(function(active) {
        active.classList.remove('active');
    });

    element.classList.add('active');

    var teacherForm = document.getElementById('teacher-form');
    var studentForm = document.getElementById('student-form');
    if (element.classList.contains('tec-role')) {
        teacherForm.classList.remove('d-none');
        document.getElementById('btn-submit').classList.remove('d-none');
        document.getElementById('pdpa').classList.remove('d-none');
        studentForm.classList.add('d-none');
        adjustRequiredFields(teacherForm, studentForm);
    } else if (element.classList.contains('std-role')) {
        studentForm.classList.remove('d-none');
        document.getElementById('btn-submit').classList.remove('d-none');
        document.getElementById('pdpa').classList.remove('d-none');
        teacherForm.classList.add('d-none');
        adjustRequiredFields(studentForm, teacherForm);
    }
}

function adjustRequiredFields(showForm, hideForm) {
    var inputsToDisable = hideForm.querySelectorAll('[required]');
    inputsToDisable.forEach(function(input) {
        input.removeAttribute('required');
    });

    var inputsToEnable = showForm.querySelectorAll('input');
    inputsToEnable.forEach(function(input) {
        input.setAttribute('required', '');
    });
}


$(document).ready(function() {
    $('#key').on('keyup', function() {
        var key = $(this).val().trim();
        if (key.length > 0) {
            $.ajax({
                url: '<?= site_url('Auth/checkKey') ?>',
                type: 'POST',
                data: {
                    key: key
                },
                dataType: 'json',
                success: function(response) {
                    $('#statusKey').html(response.message).css('color', response.valid ?
                        'green' : 'red');
                },
                error: function() {
                    $('#statusKey').html('Error').css('color', 'red');
                }
            });
        } else {
            $('#statusKey').html('');
        }
    });

    $('#idcard').on('keyup', function() {
        if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
            id = $(this).val().replace(/-/g, "");
            var result = Script_checkID(id);
            if (result === false) {
                $('span.error').html('✗').css('color', 'red');
            } else {
                $('span.error').html('✓').css('color', 'green');
            }
        } else {
            $('span.error').html('');

        }
    })

    $('#CitizenID').on('keyup', function() {
        if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
            id = $(this).val().replace(/-/g, "");
            var result = Script_checkID(id);
            if (result === false) {
                $('span.error2').removeClass('true').text('เลขบัตรผิด');
            } else {
                $('span.error2').addClass('true').text('เลขบัตรถูกต้อง');
            }
        } else {
            $('span.error2').removeClass('true').text('');

        }
    })

    $('#signupForm').on('submit', function(e) {
        e.preventDefault();

        var activeRole = $('.role .active').hasClass('tec-role') ? 'teacher' : 'student';
        var formData = new FormData(this);
        formData.append('role', activeRole);

        $.ajax({
            url: "<?= site_url('Auth/register') ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var alertData = JSON.parse(response);
                swal.fire({
                    icon: alertData.type,
                    title: alertData.title,
                    type: alertData.type
                }).then(function() {
                    if (alertData.type === 'success') {
                        window.location = "<?= site_url('Auth') ?>";
                    }
                });
            },
            error: function() {
                swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    type: 'error'
                });
            }
        });
    });
});

function Script_checkID(id) {
    if (!IsNumeric(id)) return false;
    if (id.substring(0, 1) == 0) return false;
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
    return true;
}

function IsNumeric(input) {
    var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
    return (RE.test(input));
}

function AgreePDPA() {
    let checkbox = document.getElementById('agree');
    let submitButton = document.getElementById('submitButton');

    if (checkbox.checked) {
        submitButton.disabled = false;
        submitButton.style.opacity = 1;
    } else {
        submitButton.disabled = true;
        submitButton.style.opacity = 0.5;
    }
}
</script>