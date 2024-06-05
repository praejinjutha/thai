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
<link href="https://fonts.googleapis.com/css2?family=Niramit:wght@500&family=Thasadith:wght@700&display=swap" rel="stylesheet">

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
  background-image: url('../assets/lit/bg-lit2.png');
  background-size: 100% 100%; /* ให้ภาพพื้นหลังขยายเต็มขนาดของพื้นที่ */
  background-repeat: no-repeat;
  margin-bottom: 40vh; /* สร้างพื้นที่เพิ่มด้านล่างของหน้าเว็บเท่ากับความสูงของหน้าเว็บ */
}

.recent-posts {
  display: flex;
  justify-content: center; /* จัดให้เป็นกึ่งกลางในแนวนอน */
  align-items: center; /* จัดให้เป็นกึ่งกลางในแนวตั้ง */
}

.container {
  margin-top: -3%; 
  width: 85%; /* กำหนดความกว้างของ container */
  max-width: 1600px; /* กำหนดความกว้างสูงสุดของ container */
  margin-bottom: 10%;
}


.post-box.active {
  background-color: #8c6239;
  padding: 2px 10px;
  border-radius: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}


.post-box:hover {
    background-color: #8c6239;
    color: white ; /* กำหนดสีข้อความเป็นสีขาวเมื่อโฮเวอร์ */
  padding: 2px 10px; /* ลดขนาด padding เพื่อลดขอบ */
  border-radius: 50px; /* เพิ่มขอบมนเรียว */
  display: flex; /* จัดให้ข้อความแสดงเป็น flex */
  align-items: center; /* จัดให้ข้อความอยู่กึ่งกลางในแนวตั้ง */
  justify-content: center; /* จัดให้ข้อความอยู่กึ่งกลางในแนวนอน */
  transition: all 0.3s ease; /* เพิ่ม transition เพื่อทำให้การเปลี่ยนแปลงเกิดอย่างนุ่มนวล */
  }

.post-box:hover .title a,
.post-box .title a:hover {
  color: white !important;
}

.post-box.active .title a {
  color: white !important;
}

.post-box {
  margin-left: 13%;
  text-align: left;
  float: left;
  min-height: 60px;
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


<h6 style="font-weight: bold;"> วรรณคดีและวรรณกรรม <br> Literature </h6>

<div style="display: flex; justify-content: space-between; align-items: center;">
<p class="custom-paragraph" style="text-align: left; margin-left: 60px; font-size:20px;">เลือกหัวข้อที่สนใจ</p>

<button onclick="window.location.href='lesson'" style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; margin-right: 60px; margin-bottom: 20px;">ย้อนกลับ</button>

</div>


<section id="recent-posts" class="recent-posts">
  <div class="container" data-aos="fade-up">


    
  <div class="row gy-5">
      <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="post-box">
          <h4 class="title"><a href="prose" class="stretched-link" style="font-size: 28px; color: #8c6239;"> ✤ บทร้อยแก้ว</a></h4>
          <a href="prose" class="stretched-link"></a>
        </div>
      </div>


      <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="post-box">
          <h4 class="title"><a href="3" class="stretched-link" style="font-size: 28px; color: #8c6239;"> ✤ กาพย์ยานี</a></h4>
          <a href="kapyani" class="stretched-link"></a>
        </div>
      </div>

<!--บทดอกสร้อยสุภาษิต-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="3" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ บทดอกสร้อยสุภาษิต</a></h4>
    <a href="botdoksoi" class="stretched-link"></a>
  </div>
</div>

<!--โคลง-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239; " > ✤ โคลง</a></h4>
    <a href="sonnets" class="stretched-link"></a>
  </div>
</div>


<!--บทร้อยกรอง-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
  <h4 class="title"><a href="poetry" class="stretched-link" style="font-size: 28px; color: #8c6239;"> ✤ บทร้อยกรอง</a></h4>
  <a href="poetry" class="stretched-link"></a>
</div>
</div>

<!--กลอน-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ กลอน</a></h4>
    <a href="glon" class="stretched-link"></a>
  </div>
</div>

<!--บทร้องเล่นของเด็ก-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" > ✤ บทร้องเล่นของเด็ก</a></h4>
    <a href="botlenkongdek" class="stretched-link"></a>
  </div>
</div>

<!--ภาษาพาที-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" > ✤ ภาษาพาที</a></h4>
    <a href="patee" class="stretched-link"></a>
  </div>
</div>

<!--บทเพลงกล่อมเด็ก-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" > ✤ บทเพลงกล่อมเด็ก
</a></h4>
<a href="botklomdek" class="stretched-link"></a>
  </div>
</div>

<!--บทอาขยาน-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" > ✤ บทอาขยาน</a></h4>
  </div>
  <a href="botarkayan" class="stretched-link"></a>
</div>


<!--บทสักวา-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ บทสักวา</a></h4>
    <a href="sakkawa" class="stretched-link"></a>
  </div>
</div>

<!--สำนวนไทย-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ สำนวนไทย</a></h4>
    <a href="sumnuanthai" class="stretched-link"></a>
  </div>
</div>

<!--สุภาษิตไทย-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ สุภาษิตไทย</a></h4>
    <a href="supasit" class="stretched-link"></a>
  </div>
</div>

<!--คำพังเพย-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ คำพังเพย</a></h4>
    <a href="kumpungpoei" class="stretched-link"></a>
  </div>
</div>

<!--ทำนองสรภัญญะ-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ ทำนองสรภัญญะ</a></h4>
    <a href="tumnongsonpanya" class="stretched-link"></a>
  </div>
</div>

<!--ทำนองเสนาะ-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ ทำนองเสนาะ</a></h4>
    <a href="tumnongsanor" class="stretched-link"></a>
  </div>
</div>


<!--วรรณกรรมพื้นบ้าน-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ วรรณกรรมพื้นบ้าน</a></h4>
    <a href="wannagum" class="stretched-link"></a>
  </div>
</div>

<!--บทอาเศียรวาท-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ บทอาเศียรวาท</a></h4>
    <a href="botrsian" class="stretched-link"></a>
  </div>
</div>

<!--บทร้อยกรองร่วมสมัย-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ บทร้อยกรองร่วมสมัย</a></h4>
    <a href="botroyklong" class="stretched-link"></a>
  </div>
</div>

<!--คำขวัญ-->
<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="post-box">
    <h4 class="title"><a href="#" class="stretched-link" style="font-size: 28px; color: #8c6239;" >✤ คำขวัญ</a></h4>
    <a href="kumkwan" class="stretched-link"></a>
  </div>
</div>



        </div>

      </div>
    </section><!-- End Recent Blog Posts Section -->

  </main><!-- End #main -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>

$(document).ready(function() {
  // เมื่อคลิกที่ลิงก์
  $('.post-box .title a').click(function(e) {
    e.preventDefault(); // ป้องกันการโหลดหน้าเว็บใหม่
    $('.post-box').removeClass('active'); // ลบคลาส "active" ออกจากทุกๆ .post-box
    $(this).closest('.post-box').addClass('active'); // เพิ่มคลาส "active" ให้กับ .post-box ที่มีลิงก์ที่คลิก
  });

  // ตั้งค่าการ Active ที่คำว่า "บทร้อยแก้ว" เมื่อโหลดหน้าเว็บ
  $('.post-box .title a:contains("บทร้อยแก้ว")').closest('.post-box').addClass('active');

  // เมื่อโฮเวอร์ที่ .post-box
  $('.post-box').hover(function() {
    // ถ้าไม่ได้เป็นบทร้อยแก้ว ก็ให้ลบคลาส active
    if (!$(this).find('.title a').text().includes("บทร้อยแก้ว")) {
      $('.post-box.active').removeClass('active'); // ลบคลาส "active" ในกรณีที่โฮเวอร์ไม่ได้เป็นบทร้อยแก้ว
    }
  });
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
