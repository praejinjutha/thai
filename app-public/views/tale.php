<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes = base_url();
?>

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
    <link href="https://fonts.googleapis.com/css2?family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <style>
    body {
        background-color: #fffaf0;
    }

    .story {
        background-color: #fff;
        padding: 10px 15px;
        font-size: 22px;
        border: 1px solid #e9e9e9;
        cursor: pointer;
        font-weight: bold;
    }

    .story:hover {
        background-color: #f3f3f3;
    }

    .story.active {
        background-color: #3a8cdd;
        color: #fff;
    }

    .menu-story {
        max-height: 400px;
        max-width: 300px;
        overflow: auto;
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

                    <span style="margin-right: 30px; font-weight: bold; font-size: 22px">
                        <i class="fa-regular fa-user"></i> <?= $this->session->userdata('Name'); ?>
                    </span>
                    <li><a href="<?= site_url('auth/logout') ?>" class="active">ออกจากระบบ</a></li>
                </ul>
            </nav>
        </div>


    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <!-- Navbar ที่เปลี่ยนเป็นรูปภาพ -->
        <img src="../assets/img/navbar.png" alt="Navbar" style="width: 100%; height: auto; pointer-events: none;">
    </main>

    <div class="container">
        <h6 style="font-weight: bold;"> นิทาน <br> Tale </h6>
        <div class="text-end">
            <a href="<?= site_url('lesson'); ?>"
                style="padding: 5px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;font-size: 22px;">ย้อนกลับ
            </a>
        </div>
        <div class="row">
            <div class="col-3">
                <h4 class="fw-bold text-center mb-4">นิทานเรื่อง</h4>
                <div class="menu-story">
                    <div class="story active" onclick="loadVideo('หมากับเงา', this)">หมากับเงา</div>
                    <div class="story" onclick="loadVideo('กระต่ายตื่นตูม', this)">กระต่ายตื่นตูม</div>
                    <div class="story" onclick="loadVideo('เทพารักษ์กับคนตัดไม้', this)">เทพารักษ์กับคนตัดไม้</div>
                    <div class="story" onclick="loadVideo('ไก่ได้พลอย', this)">ไก่ได้พลอย</div>
                    <div class="story" onclick="loadVideo('ลิงกับเต่า', this)">ลิงกับเต่า</div>
                    <div class="story" onclick="loadVideo('ลูกหมูสามตัว', this)">ลูกหมูสามตัว</div>
                    <div class="story" onclick="loadVideo('หนูน้อยหมวกแดง', this)">หนูน้อยหมวกแดง</div>
                    <div class="story" onclick="loadVideo('นกกากับเหยือกน้ำ', this)">นกกากับเหยือกน้ำ</div>
                    <div class="story" onclick="loadVideo('ชาวนากับงูเห่า', this)">ชาวนากับงูเห่า</div>
                    <div class="story" onclick="loadVideo('กระต่ายกับเต่า', this)">กระต่ายกับเต่า</div>
                    <div class="story" onclick="loadVideo('นกน้อยกับจระเข้', this)">นกน้อยกับจระเข้</div>
                    <div class="story" onclick="loadVideo('หนูกับมด', this)">หนูกับมด</div>
                    <div class="story" onclick="loadVideo('แม่ช้างสอนลูก', this)">แม่ช้างสอนลูก</div>
                    <div class="story" onclick="loadVideo('นกกระสากับห่าน', this)">นกกระสากับห่าน</div>
                    <div class="story" onclick="loadVideo('หนูนากับหนูบ้าน', this)">หนูนากับหนูบ้าน</div>
                    <div class="story" onclick="loadVideo('หนูนิดกับกิจวัตรประจำวัน', this)">หนูนิดกับกิจวัตรประจำวัน</div>
                    <div class="story" onclick="loadVideo('สุนัขจิ้งจอกกับนกกระสา', this)">สุนัขจิ้งจอกกับนกกระสา</div>
                    <div class="story" onclick="loadVideo('นกอินทรีเจ้าเล่ห์', this)">นกอินทรีเจ้าเล่ห์</div>
                    <div class="story" onclick="loadVideo('ปลาใหญ่กับปลาเล็ก', this)">ปลาใหญ่กับปลาเล็ก</div>
                    <div class="story" onclick="loadVideo('หนูนิดกับสถานที่ใกล้ตัว', this)">หนูนิดกับสถานที่ใกล้ตัว</div>
                </div>
            </div>
            <div class="col-8">
            <iframe id="videoPlayer" width="113%" height="450" style="margin-top: 10px; border: 1px solid #989898;"
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</body>

</html>

<script>
function loadVideo(storyName, element) {
    document.querySelectorAll('.story').forEach(story => {
        story.classList.remove('active');
    });

    element.classList.add('active');

    var videoPlayer = document.getElementById('videoPlayer');
    var videoMap = {
        'หมากับเงา': 'oKd0ALsr0fQ?si=q57e8jVooh2NVk4f',
        'กระต่ายตื่นตูม': '2E_HJlyib_4?si=XMcRozPL0ZeLvQ7Y',
        'เทพารักษ์กับคนตัดไม้': 'cZswCuUPf5g?si=AzMctDGMuIwZ7_Z6',
        'ไก่ได้พลอย': 'PR8if7rmXRQ?si=p8FIjEkoYaycbR7h',
        'ลิงกับเต่า': 'tcCUIHp3D6s?si=ZADnMAKOj7EzCoGx',
        'ลูกหมูสามตัว': '4oIEUMa0A0s?si=dGAf6O98kLobaVXa',
        'หนูน้อยหมวกแดง': 'iMc_pQrXHJ0?si=ABfbz33d5DwQB36r',
        'นกกากับเหยือกน้ำ': 'Rv3ZvePLuxE?si=IBVUYlw5yWycHg-i',
        'ชาวนากับงูเห่า': 'GS3dx3iof28?si=wuVdh0vqOMVQia5o',
        'กระต่ายกับเต่า': 'l5pbB2J1cTA?si=WpC_8GFoAu4zLno-',
        'นกน้อยกับจระเข้': '1zh7Dem7e4k?si=JU54YxAUSy36j6oa',
        'หนูกับมด': '6GsRxQ6fKD4?si=v-ZM1TyFSHr-7uy1',
        'แม่ช้างสอนลูก': 'PiyCtOndt-c?si=YQSEzm55GgmFrk3q',
        'นกกระสากับห่าน': 'r7IDWGxNfm8?si=hMk-cmLlF-mXHaPl',
        'หนูนากับหนูบ้าน': 'odoyE00_Wys?si=9Ny2478xvO2Cz7KS',
        'หนูนิดกับกิจวัตรประจำวัน': 'ftvnXt8T2T8?si=SgJL3OimFBkFoOes',
        'สุนัขจิ้งจอกกับนกกระสา': 'eXU3CZeYALk?si=iP0-w1f30ZxW7xHV',
        'นกอินทรีเจ้าเล่ห์': 'Y06-nKklQHE?si=5Gg00c8JgN4CefPp',
        'ปลาใหญ่กับปลาเล็ก': '54gY765ASmY?si=g6OHNH_ByD-q0x-V',
        'หนูนิดกับสถานที่ใกล้ตัว': 'wlq4iN0-xlY?si=4bZuOUyPyEsEiybY',
    };

    var videoId = videoMap[storyName] || 'iqZbGQzQkMA?si=nJl-L2LiATd8GZ6v';
    videoPlayer.src = `https://www.youtube.com/embed/${videoId}`;
    videoPlayer.onload = function() {
        videoPlayer.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
    };
}

window.onload = function() {
    loadVideo('หมากับเงา', document.querySelector('.story.active'));
};
</script>