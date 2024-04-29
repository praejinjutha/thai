<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ภาษาไทย</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

  <style>
  body {
    background-color: #fffaf0; /* สีเทาอ่อน */
  }

  select option {
    width: 300px; /* กำหนดความกว้างของ option */
    height: 40px; /* กำหนดความสูงของ option */
  }

  #studentTable {
    display: none;
  }

  /* ซ่อน Lightbox Popup เริ่มต้น */
.lightbox {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.lightbox-content {
  background-color: #fefefe;
  margin: 20% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>
</head>

<body class="page-portfolio">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="<?= site_url('dashboard') ?>" class="logo d-flex align-items-center">
    <img src="../assets/img/logo.png" alt="">
</a>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a href="<?= site_url('dashboard') ?>">หน้าหลัก</a></li>
          <li><a href="<?= site_url('Lesson') ?>" class="active">บทเรียน</a></li>
      </nav>
    </div>

    
  </header>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
        <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto;">
</main>


<h6 style="font-weight: bold;"> ข้อมูลนักเรียน <br> Student Information </h6>

<!--<div style="display: flex; justify-content: space-between; align-items: center;">-->
<div style="display: flex; justify-content: center; align-items: center; margin-top: 40px; margin-bottom: 20px;">
<button class="excel-button" style="padding: 10px 30px; background-color: #8c6239; color: white; border: none; border-radius: 5px; cursor: pointer; margin: 0 10px; font-size: 20px" onclick="importFromExcel()">นำเข้าข้อมูลจาก Excel</button>

  
<button class="add-button" style="padding: 10px 30px; background-color: #2aa5df; color: white; border: none; border-radius: 5px; cursor: pointer; margin: 0 10px; font-size: 20px" onclick="openLightbox()">เพิ่มชื่อนักเรียน</button>


  <button onclick="window.history.back()" style="padding: 10px 30px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; margin: 0 10px; font-size: 20px">ย้อนกลับ</button>
</div>

<!-- Lightbox Popup -->
<div id="lightbox" class="lightbox">
  <div class="lightbox-content">
    <span class="close" onclick="closeLightbox()">&times;</span>
    <h2>เพิ่มชื่อนักเรียน</h2>
    <form id="studentForm">
      <!-- แบบฟอร์มกรอกข้อมูล -->
      <!-- เช่น ชื่อ, นามสกุล, เลขประจำตัว, etc. -->
      <input type="text" placeholder="ชื่อ" required>
      <input type="text" placeholder="นามสกุล" required>
      <input type="text" placeholder="เลขประจำตัว" required>
      <!-- เพิ่มฟิลด์เพิ่มเติมตามต้องการ -->
      <button type="submit">บันทึก</button>
    </form>
  </div>
</div>




<div style="display: flex; flex-direction: column; align-items: center; margin-top: 40px; margin-bottom: 20px;">
  <h6 style="margin-bottom: 10px; font-size: 30px;">รายชื่อนักเรียนรายห้อง</h6>
  <p style="margin-bottom: 0; font-size: 24px;">**ดับเบิ้ลคลิกแต่ละแถวเพื่อดูข้อมูลอย่างละเอียด</p>
</div>

<p style="margin-bottom: 0; font-size: 20px; margin-left: 60px; margin-right: 10px;">เลือกระดับชั้นและห้องเรียน</p>

<div style="display: flex; justify-content: space-between; align-items: center; width: 100%; ">
  <div style="display: flex; justify-content: flex-start; align-items: center;">
    <select id="select1" style="font-size: 24px; margin-left: 60px; margin-right: 10px; width: 100px;">
      <option selected>ป.1</option>
      <option>ป.2</option>
      <option>ป.3</option>
    </select>

    <select id="select2" style="font-size: 24px; width: 100px;">
      <option selected>ห้อง 1</option>
      <option>ห้อง 2</option>
      <option>ห้อง 3</option>
    </select>
  </div>

  <button id="searchButton" style="padding: 10px 30px; background-color: #CD5C5C; color: white; font-size: 20px; border: none; border-radius: 5px; cursor: pointer; margin-right: 60px;">สืบค้นข้อมูลนักเรียน</button>
</div>

<!-- Lightbox Popup สำหรับการค้นหารายชื่อนักเรียน -->
<div id="searchStudentLightbox" class="lightbox">
  <div class="lightbox-content">
    <span class="close" onclick="closeSearchLightbox()">&times;</span>
    <h2>ค้นหารายชื่อนักเรียน</h2>
    <form id="searchStudentForm">
      <!-- แบบฟอร์มสำหรับค้นหารายชื่อนักเรียน -->
      <input type="text" placeholder="เลขที่ประจำตัว" required>
      <input type="text" placeholder="ชื่อนามสกุล" required>
      <!-- เพิ่มฟิลด์เพิ่มเติมตามต้องการ -->
      <button type="submit">ค้นหา</button>
    </form>
  </div>
</div>

<table id="studentTable" style="margin-top: 20px;">
  <thead>
    <tr>
      <th>ระดับชั้น</th>
      <th>ห้อง</th>
      <th>เลขประจำตัว</th>
      <th>คำนำหน้า</th>
      <th>ชื่อจริง</th>
      <th>นามสกุล</th>
      <tr onclick="rowClickHandler(this)">
  <!-- Cells content -->
</tr>
    </tr>
  </thead>
  <tbody>
    <!-- ใส่ข้อมูลที่ได้จากไฟล์ JSON -->
  </tbody>
</table>

<main>


</main>

<script>
  function importFromExcel() {
    var input = document.createElement('input');
    input.type = 'file';
    input.accept = '.xlsx, .xls';
    input.onchange = function(event) {
      var file = event.target.files[0];
      if (file) {
        // เรียกใช้ฟังก์ชันสำหรับการประมวลผลไฟล์ Excel ที่เลือก
        processExcel(file);
      }
    };
    input.click();
  }
  function processExcel(file) {
    // ตรวจสอบว่าไฟล์เป็น .xlsx หรือ .xls
    var extension = file.name.split('.').pop().toLowerCase();
    if (extension === 'xlsx' || extension === 'xls') {
      // ทำสิ่งที่ต้องการกับไฟล์ Excel ที่เลือก เช่น อ่านข้อมูล หรือประมวลผล
      console.log('File selected:', file.name);
    } else {
      alert('กรุณาเลือกไฟล์นามสกุล .xlsx หรือ .xls เท่านั้น');
    }
  }

  function onSelectChange() {
    var gradeLevel = document.getElementById("select1").value;
    var classroom = document.getElementById("select2").value;

    // กรณีที่มีการเลือกทั้ง select1 และ select2 จึงแสดงข้อมูล
    if (gradeLevel !== "" && classroom !== "") {
      displayStudentData(gradeLevel, classroom);
    }
  }

  function displayStudentData(gradeLevel, classroom) {
    var studentsData = [
      { grade: "ป.2", room: "ห้อง 3", id: "001", prefix: "เด็กชาย", firstName: "สมชาย", lastName: "ใจดี" },
      { grade: "ป.1", room: "ห้อง 2", id: "002", prefix: "เด็กหญิง", firstName: "สมหญิง", lastName: "รักสันต์" },
      // ข้อมูลนักเรียนเพิ่มเติม...
    ];

    var filteredStudents = studentsData.filter(function(student) {
      return student.grade === gradeLevel && student.room === classroom;
    });

    var tableBody = document.getElementById("studentTable").getElementsByTagName('tbody')[0];
    tableBody.innerHTML = "";

    filteredStudents.forEach(function(student) {
      var row = tableBody.insertRow();
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);

      cell1.innerHTML = student.grade;
      cell2.innerHTML = student.room;
      cell3.innerHTML = student.id;
      cell4.innerHTML = student.prefix;
      cell5.innerHTML = student.firstName;
      cell6.innerHTML = student.lastName;
    });

    // เมื่อแสดงข้อมูลเสร็จแล้ว ให้แสดงตาราง
    document.getElementById("studentTable").style.display = "table";
  }

  document.getElementById("select1").addEventListener("change", onSelectChange);
  document.getElementById("select2").addEventListener("change", onSelectChange);


  // ปิด lightbox
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("addButton").addEventListener("click", openLightbox);
  });

// เปิด Lightbox Popup
function openLightbox() {
  document.getElementById('lightbox').style.display = 'block';
}

// ปิด Lightbox Popup
function closeLightbox() {
  document.getElementById('lightbox').style.display = 'none';
}

// เปิด Lightbox Popup สำหรับการค้นหารายชื่อนักเรียน
function openSearchLightbox() {
  document.getElementById('searchStudentLightbox').style.display = 'block';
}

// ปิด Lightbox Popup สำหรับการค้นหารายชื่อนักเรียน
function closeSearchLightbox() {
  document.getElementById('searchStudentLightbox').style.display = 'none';
}

// เมื่อคลิกที่ปุ่ม "สืบค้นข้อมูลนักเรียน" เปิด Lightbox Popup สำหรับการค้นหารายชื่อนักเรียน
document.getElementById('searchButton').addEventListener('click', function() {
  openSearchLightbox();
});

// ปิด Lightbox Popup สำหรับการค้นหารายชื่อนักเรียน เมื่อกดปุ่มปิดหรือคลิกข้างนอกพื้นที่ของ Lightbox
document.getElementById('searchStudentLightbox').addEventListener('click', function(event) {
  if (event.target === document.getElementById('searchStudentLightbox')) {
    closeSearchLightbox();
  }
});

// ปิด Lightbox Popup สำหรับการค้นหารายชื่อนักเรียน เมื่อกดปุ่มปิด
document.getElementById('searchStudentLightbox').querySelector('.close').addEventListener('click', function() {
  closeSearchLightbox();
});

// ยกเลิกการส่งฟอร์มเมื่อคลิกที่ปุ่ม "ค้นหา" เพื่อป้องกันการรีโหลดหน้า
document.getElementById('searchStudentForm').addEventListener('submit', function(event) {
  event.preventDefault();
  // ทำการค้นหาข้อมูลนักเรียนตามเลขที่ประจำตัวและชื่อนามสกุล และดำเนินการต่อตามที่คุณต้องการ
  // ในที่นี้คุณสามารถเพิ่มโค้ดเพื่อดำเนินการค้นหาข้อมูลนักเรียนต่อไป
});

</script>





  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>



  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  

</body>

</html>