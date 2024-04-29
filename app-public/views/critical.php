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
    background-color: white; /* สีเทาอ่อน */
  }

  #wordByWordTable {
  table-layout: fixed; /* ใช้การจัดการขนาดความกว้างของคอลัมน์แบบคงที่ */
  width: 100%; /* กำหนดให้ตารางเต็มขนาดของพื้นที่ที่สามารถใช้ได้ */
  margin: 0 auto; /* จัดให้ตารางอยู่ตรงกลาง */

  overflow-y: auto;
  max-height: calc(100vh - 200px);
}

#wordByWordTable td:nth-child(1) {
    width: 20%; /* ปรับความกว้างของคอลัมน์แรก */
}

#wordByWordTable td:nth-child(2) {
    width: 80%; /* ปรับความกว้างของคอลัมน์ที่สอง */
}




#wordByWordTable th {
  font-size: 22px; /* ปรับขนาดฟ้อนในส่วนของหัวตาราง */
}

#wordByWordTable td {
  font-size: 20px; /* ปรับขนาดฟ้อนในส่วนของเนื้อหาตาราง */
}

/* CSS สำหรับวงกลม (radio button) */
input[type="radio"] {
  appearance: none;
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 80%;
  border: 4px solid #ccc;
  outline: none;
  cursor: pointer;
}

/* CSS สำหรับวงกลม (radio button) เมื่อถูกเลือก */
input[type="radio"]:checked {
  background-color: green;
  background-size: auto 0.5%; /* ขนาดของวงกลมสีเขียวด้านในเมื่อถูกเลือก */
}

/* CSS สำหรับวงกลม (radio button) เมื่อไม่ถูกเลือก */
input[type="radio"]:not(:checked) {
  background-color: gray;
  background-size: 80%; /* ขนาดของวงกลมสีเทาด้านนอกเมื่อไม่ถูกเลือก */
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
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto; display: flex; justify-content: center; align-items: center;">
</main>


<div style="display: flex; justify-content: center; align-items: center;">
    <img src="../assets/img/critical.png" alt="Navbar" style="width: 400px; height: 150px; margin-top: 3%;">
  </div>



<main>
<div style="display: flex; justify-content: flex-end; margin-right: 100px;">
    <a href="<?= site_url('lesson'); ?>" style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">ย้อนกลับ</a>
</div>
<br>


<br>

<!--ไฟล์ ct.html-->
<div style="display: flex; justify-content: center; align-items: center;">
    <div style="width: 30%; height: 100px; display: flex; align-items: center; justify-content: center; position: relative;">
        <textarea id="searchInput" placeholder="กรอกข้อมูลที่นี่.." style="width: 100%; height: 90%; padding-right: 30px; resize: none; border-radius: 10px; text-indent: 1rem; font-size: 18px; margin-bottom: 30px;"></textarea>
        <i class="bi bi-volume-up-fill" style="position: absolute; right: 30px;"></i>
    </div>

</div>


  <div style="width: 32%; height: 400px; overflow-y: auto; margin: 0 auto;">
    <table id="wordByWordTable">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>คำ</th>
            </tr>
        </thead>
        <tbody>
            <!-- ข้อมูลจะถูกเติมที่นี่โดย JavaScript -->
        </tbody>
    </table>
</div>



<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput");
    const placeholderText = 'ป้อนคำที่ต้องการค้นหา...';
    const placeholderPosition = 'top'; // กำหนดตำแหน่งข้อความที่จะแสดง โดยใช้ 'top' หรือ 'bottom'

    // Set initial placeholder text
    searchInput.placeholder = placeholderText;

    // Add event listener to the search input for focus event
    searchInput.addEventListener('focus', function() {
        // Clear the placeholder text when input is focused
        searchInput.placeholder = '';
    });

    // Add event listener to the search input for blur event
    searchInput.addEventListener('blur', function() {
        // Restore the placeholder text if input is empty when blurred
        if (!searchInput.value) {
            if (placeholderPosition === 'top') {
                searchInput.placeholder = placeholderText;
            } else if (placeholderPosition === 'top') {
                searchInput.value = placeholderText;
            }
        }
    });
});

</script>



<script src="../assets/js/critical.js"></script>




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