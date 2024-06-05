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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai+Looped:wght@400;700&display=swap" rel="stylesheet">

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
  background-color: #FFEEC0;
  }

.header.sticked {
  position: static !important; /* ยกเลิกการติดตามการเลื่อนหน้าจอ */
}

.image-container {
  position: relative;
  display: flex; /* เพิ่มบรรทัดนี้ */
  height: 100%; /* เพิ่มบรรทัดนี้ */
}

.image-container img {
  width: 100%;
  height: auto;
}

.column-left{
  position: absolute;
  top: 320px;
  height: 100%;
}

.column-right {
  position: absolute;
  top: 92px;
  height: 120%;
}

.column-left {
  width: 21%; /* ปรับความกว้างตามที่ต้องการ */
  padding-left: 41px; /* ปรับระยะห่างข้างขวา */
  overflow-y: scroll;
  max-height: 600px;
}

.column-right {
  width: 72%; /* ปรับความกว้างตามที่ต้องการ */
  margin-left: 25%; /* ปรับระยะห่างข้างขวา */
}



/* เพิ่มสไตล์ต่าง ๆ ตามต้องการ */
.column-left ul {
  list-style: none;
  padding: 0;
}

.column-left li {
  margin-bottom: 10px;
}

.column-right div {
  padding: 20px;
  border-radius: 5px;
}

.list-group li {
  list-style-type: none;
  margin-bottom: 0px; /* ปรับพื้นที่ห่างระหว่างรายการ */
  padding: 5px;
  background-color: #FFF0EE; /* สีพื้นหลังของรายการ */
  height: 50px; 
  font-size: 22px; 
  text-indent: 20px; /* เพิ่มย่อหน้าของตัวอักษร */
  line-height: 40px; /* ปรับห่างระหว่างบรรทัดให้ตรงกลาง */
  cursor: pointer;
}

.list-group li:last-child {
  margin-bottom: 0; /* ไม่มีระยะห่างสุดท้าย */
}

#selectedImage1 {
    width: 100%; /* กำหนดความกว้างของรูปเป็น 300px */
    height: 75%; /* กำหนดความสูงของรูปเป็น 200px */
  }

  .list-group-item.active {
    background-color: #FCBEB9 !important; /* สีเมื่อเลือก Active */
    color: black; /* สีข้อความ */
    font-weight: bold; /* ตัวหนา */
    border: 2px solid #FFECEB; /* เพิ่มสีกรอบ */
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

<div class="image-container">
  <!-- รูปภาพ -->
  <img id="selectedImage" src="../assets/img/kara/bg-kara.png" alt="Your Image">

  <!-- ไฟล์ html -->
  <div class="column-left" style="overflow-y: scroll; max-height: 530px; margin-top: 40px;">
    <ul class="list-group">
        <?php
        $names = [
            "๑. สระในภาษาไทย",
            "๒. สยามานุสติ",
            "๓. การอ่าน ร หัน",
            "๔. มารยาทการดู",
            "๕. ชาติไทย",
            "๖. คำซ้อน",
            "๗. ไม่ออกเสียง อะ",
            "๘. พูดอะไรก็ได้",
            "๙. บาลี สันสกฤต",
            "๑๐. วรรณยุกต์",
            "๑๑. แนะนำตัวเอง",
            "๑๒. พยัญชนะไทย",
            "๑๓. การอ่านการันต์",
            "๑๔. ไม่ติด",
            "๑๕. อยู่ดีกินดี",
            "๑๖. การอ่านคำควบกล้ำ",
            "๑๗. ขอบคุณจากใจ",
            "๑๘. คำจากภาษาต่างประเทศ",
            "๑๙. แม่เกอว - เกย - กง",
            "๒๐. สระไอ",
            "๒๑. รักเมืองไทย",
            "๒๒. ห - อ - นำ",
            "๒๓. สิ่งแวดล้อม",
            "๒๔. คำที่มาจากภาษาจีน",
            "๒๕. สงกรานต์",
            "๒๖. ตัวสะกดแม่กน",
            "๒๗. หนูอยากได้",
            "๒๘. สุภาษิตไทย",
            "๒๙. อักษรนำ",
            "๓๐. ความหมายราชาศัพท์"
        ];

        // กำหนดลิงก์ไปยังภาพของแต่ละรายการ
        $image_links = [
            "../assets/img/kara/sara.png",
            "../assets/img/kara/siamanasut.png",
            "../assets/img/kara/reading.png",
            "../assets/img/kara/marayat.png",
            "../assets/img/kara/chartthai.png",
            "../assets/img/kara/kumsorn.png",
            "../assets/img/kara/maiaok.png",
            "../assets/img/kara/putarai.png",
            "../assets/img/kara/balee.png",
            "../assets/img/kara/10.png",
            "../assets/img/kara/11.png",
            "../assets/img/kara/12.png",
            "../assets/img/kara/13.png",
            "../assets/img/kara/14.png",
            "../assets/img/kara/15.png",
            "../assets/img/kara/16.png",
            "../assets/img/kara/17.png",
            "../assets/img/kara/18.png",
            "../assets/img/kara/19.png",
            "../assets/img/kara/20.png",
            "../assets/img/kara/21.png",
            "../assets/img/kara/22.png",
            "../assets/img/kara/23.png",
            "../assets/img/kara/24.png",
            "../assets/img/kara/25.png",
            "../assets/img/kara/26.png",
            "../assets/img/kara/27.png",
            "../assets/img/kara/28.png",
            "../assets/img/kara/29.png",
            "../assets/img/kara/30.png"
        ];

        // กำหนดลิงก์ไปยังไฟล์เสียงของแต่ละรายการ
        $audio_links_1 = [
            "../assets/audio/kara/music1.mp3",
            "../assets/audio/kara/music2.mp3",
            "../assets/audio/kara/music3.mp3",
            "../assets/audio/kara/music4.mp3",
            "../assets/audio/kara/music5.mp3",
            "../assets/audio/kara/music6.mp3",
            "../assets/audio/kara/music7.mp3",
            "../assets/audio/kara/music8.mp3",
            "../assets/audio/kara/music9.mp3",
            "../assets/audio/kara/music10.mp3",
            "../assets/audio/kara/music11.mp3",
            "../assets/audio/kara/music12.mp3",
            "../assets/audio/kara/music13.mp3",
            "../assets/audio/kara/music14.mp3",
            "../assets/audio/kara/music15.mp3",
            "../assets/audio/kara/music16.mp3",
            "../assets/audio/kara/music17.mp3",
            "../assets/audio/kara/music18.mp3",
            "../assets/audio/kara/music19.mp3",
            "../assets/audio/kara/music20.mp3",
            "../assets/audio/kara/music21.mp3",
            "../assets/audio/kara/music22.mp3",
            "../assets/audio/kara/music23.mp3",
            "../assets/audio/kara/music24.mp3",
            "../assets/audio/kara/music25.mp3",
            "../assets/audio/kara/music26.mp3",
            "../assets/audio/kara/music27.mp3",
            "../assets/audio/kara/music28.mp3",
            "../assets/audio/kara/music29.mp3",
            "../assets/audio/kara/music30.mp3",
            // เพิ่มลิงก์ไปยังไฟล์เสียงของรายการที่ต้องการที่นี่
        ];

        $audio_links_2 = [
            "../assets/audio/kara/vocal1.mp3",
            "../assets/audio/kara/vocal2.mp3",
            "../assets/audio/kara/vocal3.mp3",
            "../assets/audio/kara/vocal4.mp3",
            "../assets/audio/kara/vocal5.mp3",
            "../assets/audio/kara/vocal6.mp3",
            "../assets/audio/kara/vocal7.mp3",
            "../assets/audio/kara/vocal8.mp3",
            "../assets/audio/kara/vocal9.mp3",
            "../assets/audio/kara/vocal10.mp3",
            "../assets/audio/kara/vocal11.mp3",
            "../assets/audio/kara/vocal12.mp3",
            "../assets/audio/kara/vocal13.mp3",
            "../assets/audio/kara/vocal14.mp3",
            "../assets/audio/kara/vocal15.mp3",
            "../assets/audio/kara/vocal16.mp3",
            "../assets/audio/kara/vocal17.mp3",
            "../assets/audio/kara/vocal18.mp3",
            "../assets/audio/kara/vocal19.mp3",
            "../assets/audio/kara/vocal20.mp3",
            "../assets/audio/kara/vocal21.mp3",
            "../assets/audio/kara/vocal22.mp3",
            "../assets/audio/kara/vocal23.mp3",
            "../assets/audio/kara/vocal24.mp3",
            "../assets/audio/kara/vocal25.mp3",
            "../assets/audio/kara/vocal26.mp3",
            "../assets/audio/kara/vocal27.mp3",
            "../assets/audio/kara/vocal28.mp3",
            "../assets/audio/kara/vocal29.mp3",
            "../assets/audio/kara/vocal30.mp3"
            // เพิ่มลิงก์ไปยังไฟล์เสียงของรายการที่ต้องการที่นี่
        ];

        $video_links = [
            "../assets/video/video1.mp4",
            "../assets/video/video2.mp4",
            "../assets/video/video3.mp4",
            "../assets/video/video4.mp4",
            "../assets/video/video5.mp4",
            "../assets/video/video6.mp4",
            "../assets/video/video7.mp4",
            "../assets/video/video8.mp4",
            "../assets/video/video9.mp4",
            "../assets/video/video10.mp4",
            "../assets/video/video11.mp4",
            "../assets/video/video12.mp4",
            "../assets/video/video13.mp4",
            "../assets/video/video14.mp4",
            "../assets/video/video15.mp4",
            "../assets/video/video16.mp4",
            "../assets/video/video17.mp4",
            "../assets/video/video18.mp4",
            "../assets/video/video19.mp4",
            "../assets/video/video20.mp4",
            "../assets/video/video21.mp4",
            "../assets/video/video22.mp4",
            "../assets/video/video23.mp4",
            "../assets/video/video24.mp4",
            "../assets/video/video25.mp4",
            "../assets/video/video26.mp4",
            "../assets/video/video27.mp4",
            "../assets/video/video28.mp4",
            "../assets/video/video29.mp4",
            "../assets/video/video30.mp4",
            
            // เพิ่มลิงก์วิดีโอของรายการที่ต้องการที่นี่
        ];

        for ($i = 0; $i < count($names); $i++): ?>
            <?php
            $fontSize = '22px'; // ขนาดฟ้อนเริ่มต้น
            if ($names[$i] == "๑๘. คำจากภาษาต่างประเทศ") {
                $fontSize = '20px'; // ขนาดฟ้อนเมื่อเจอรายการที่ต้องการ
            }
            ?>
            <li class="list-group-item <?php if ($names[$i] == "๑. สระในภาษาไทย") echo 'active'; ?>" style="font-size: <?= $fontSize ?>;" data-image="<?= $image_links[$i] ?>" data-audio1="<?= $audio_links_1[$i] ?>" data-audio2="<?= $audio_links_2[$i] ?>" data-video="<?= $video_links[$i] ?>"><?= $names[$i]; ?></li>
        <?php endfor; ?>

    </ul>
</div>






<div class="column-right">
    <!-- Image to be displayed -->
    <!-- Image to be displayed -->
    <div style="position: relative; display: inline-block;">
        <img id="selectedImage1" src="<?= $image_links[0] ?>" alt="Selected Image">
        <!-- Position and size of icons -->

        <i class="bi bi-play-circle play-icon active" style="position: absolute; top: 77%; left: 48%; transform: translate(-50%, -50%); font-size: 48px; color: red; cursor: pointer;"></i>

        <i class="bi bi-pause-circle active" style="position: absolute; top: 77%; left: 57%; transform: translate(-50%, -50%); font-size: 48px; color: red; cursor: pointer;"></i>



<!-- แสดงวีดีโอ -->
<div class="video-container" style="display: none; pointer-events: none; position: absolute; top: 46%; left: 35%; transform: translate(-50%, -50%); font-family: 'Noto Sans Thai Looped', sans-serif; font-weight: 700; font-style: normal;  font-size: 70px;">
    <video id="selectedVideo" style="width: 150%; height: auto;"></video>
</div>


<!-- แสดงวีดีโอ 
<div class="video-container" style="display: none; position: absolute; top: 46%; left: 51%; transform: translate(-50%, -50%); font-family: 'Noto Sans Thai Looped', sans-serif; font-weight: 700; font-style: normal;  font-size: 70px;">
    <video id="selectedVideo" style="width: 100%; height: auto;"></video>
</div>-->



        <input type="range" min="0" max="100" value="100" class="slider1" id="volumeSlider" style="display: none;">
        <input type="range" min="0" max="100" value="50" class="slider2" id="musicSlider" style="display: none;">

        <div class="timesong" style="display: none;">
    <div id="currentTimeDisplay" style="display:inline;">0:00 </div><p style="display:inline;">|</p><div id="totalTimeDisplay" style="display:inline;">0:00</div>
</div>
    </div>
</div>

<script>
window.addEventListener('DOMContentLoaded', (event) => {
    var firstListItem = document.querySelector('.list-group-item');
    firstListItem.classList.add('active');

    // ตั้งค่ารูปภาพและเล่นเสียงที่เกี่ยวข้องกับรายการที่ 1
    var firstImageURL = firstListItem.getAttribute('data-image');
    document.getElementById('selectedImage1').src = firstImageURL;
    playAudio(firstListItem.getAttribute('data-audio1'), firstListItem.getAttribute('data-audio2'));
});
    var listItems = document.querySelectorAll('.list-group-item');

    listItems.forEach(function(item, index) {
        item.addEventListener('click', function() {
            listItems.forEach(function(li) {
                li.classList.remove('active');
            });
            this.classList.add('active');
            var imageURL = this.getAttribute('data-image');
            document.getElementById('selectedImage1').src = imageURL;

            // เล่นเสียงที่เกี่ยวข้องกับรายการที่เลือก
            playAudio(audio_links_1[index], audio_links_2[index]);
        });
    });


    var audio1, audio2;
    

    function playAudio(audioLink1, audioLink2) {
    // สร้างและกำหนดค่าตัวแปร audio1 และ audio2 ใหม่ทุกครั้งที่มีการคลิกบนรายการใหม่
    audio1 = new Audio(audioLink1);
    audio2 = new Audio(audioLink2);
    resetVideo();  // เรียกใช้ฟังก์ชัน resetVideo

    // Play when play-icon is clicked
    document.querySelector('.bi-play-circle').addEventListener('click', function() {
    if (audio1.paused && audio2.paused) { // If audio is paused
        audio1.play();
        audio2.play();
        document.getElementById('selectedImage1').src = '../assets/img/kara/karao.png';


        // Initialize time display
        initializeTimeDisplay(audio1);

        // Show volume sliders when play is clicked
        document.getElementById('volumeSlider').style.display = 'inline';
        document.getElementById('musicSlider').style.display = 'inline';

        // Update video source based on selected item
        var selectedVideoURL = document.querySelector('.list-group-item.active').getAttribute('data-video');
        document.getElementById('selectedVideo').src = selectedVideoURL;
        document.getElementById('selectedVideo').load(); // Reload the video to apply the new source

        // Show the video container
        document.querySelector('.video-container').style.display = 'block';

        // Update video source based on selected item
    var selectedVideoURL = document.querySelector('.list-group-item.active').getAttribute('data-video');
    document.getElementById('selectedVideo').src = selectedVideoURL;
    document.getElementById('selectedVideo').load(); // Reload the video to apply the new source

    // Show the video container
    document.querySelector('.video-container').style.display = 'block';

    // Start playing the video
    document.getElementById('selectedVideo').play();

    // Retrieve the stored playback position from the data attribute
    var storedTime = parseFloat(document.getElementById('selectedVideo').getAttribute('data-current-time'));
        document.getElementById('selectedVideo').currentTime = storedTime;

        document.getElementById('selectedVideo').play();

        
      
           
        // Change color of play button to gray
        this.style.color = 'gray';

        // Reset color of pause button to red
        document.querySelector('.bi-pause-circle').style.color = 'red';
    } else { // If audio is playing
        // Do nothing or handle continuation from pause
    }
});

// Function to initialize time display
function initializeTimeDisplay(audio) {
    // Update the displayed total time of the audio
    var totalTime = audio.duration;
    var minutes = Math.floor(totalTime / 60);
    var seconds = Math.floor(totalTime % 60);
    var totalTimeDisplay = document.getElementById('totalTimeDisplay');
    totalTimeDisplay.textContent = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

    // Update the displayed current time of the audio
    audio.addEventListener('timeupdate', function() {
        var currentTime = audio.currentTime;
        var minutes = Math.floor(currentTime / 60);
        var seconds = Math.floor(currentTime % 60);
        var currentTimeDisplay = document.getElementById('currentTimeDisplay');
        currentTimeDisplay.textContent = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
    });
}



    // Pause when pause-icon is clicked
    document.querySelector('.bi-pause-circle').addEventListener('click', function() {
        if (!audio1.paused && !audio2.paused) { // If audio is playing
            audio1.pause(); // Pause audio
            audio2.pause();
            
           // Pause video and store the current playback position
        var currentVideoTime = document.getElementById('selectedVideo').currentTime;
        document.getElementById('selectedVideo').pause();

        // Store the current playback position in a data attribute
        document.getElementById('selectedVideo').setAttribute('data-current-time', currentVideoTime);

        // Change color of pause button to gray
            this.style.color = 'gray';

            // Reset color of play button to red
            document.querySelector('.bi-play-circle').style.color = 'red';
        }
    });
}


    // Function to reset audio playback
    function resetAudio() {
        if (audio1 && audio2) {
            audio1.pause();
            audio1.currentTime = 0; // Reset audio playback position to the beginning
            audio2.pause();
            audio2.currentTime = 0;
        }
    }

    function resetVideo() {
    var video = document.getElementById('selectedVideo');
    video.pause();  // หยุดการเล่น
    video.currentTime = 0;  // กลับไปยังจุดเริ่มต้น
}


    var listItems = document.querySelectorAll('.list-group-item');

    listItems.forEach(function(item) {
    item.addEventListener('click', function() {
        listItems.forEach(function(li) {
            li.classList.remove('active');
        });
        this.classList.add('active');
        var imageURL = this.getAttribute('data-image');
        document.getElementById('selectedImage1').src = imageURL;

   // Reset video playback

   // Remove stored playback position data attribute
   document.getElementById('selectedVideo').removeAttribute('data-current-time');
   resetVideo();

   // Update video source based on selected item
   var selectedVideoURL = this.getAttribute('data-video');
        document.getElementById('selectedVideo').src = selectedVideoURL;
        document.getElementById('selectedVideo').load(); // Reload the video to apply the new source
        document.getElementById('selectedVideo').play(); // Start playing the video

// ลบวีดีโอของรายการเก่าที่แสดงในคอลัมน์ขวา
document.getElementById('selectedVideo').src = '';

// Reset audio playback before playing the selected audio
resetAudio();

         // Reset sliders to default values
         document.getElementById('volumeSlider').value = 100;  // Default volume
        document.getElementById('musicSlider').value = 50;    // Default music balance


        // Play the selected audio
        playAudio(this.getAttribute('data-audio1'), this.getAttribute('data-audio2'));

        // Reset color of both buttons to red
        document.querySelector('.bi-play-circle').style.color = 'red';
        document.querySelector('.bi-pause-circle').style.color = 'red';

        // Hide sliders
        document.getElementById('volumeSlider').style.display = 'none';
        document.getElementById('musicSlider').style.display = 'none';

        // Hide time display
        document.querySelector('.timesong').style.display = 'none';
    });
});

// Event listener for icon play
document.querySelector('.bi-play-circle').addEventListener('click', function() {
    // Show volume sliders when play is clicked
    document.getElementById('volumeSlider').style.display = 'inline';
    document.getElementById('musicSlider').style.display = 'inline';

    // Show video when play is clicked
    document.querySelector('.video-container').style.display = 'inline';

    // Initialize time display
    document.querySelector('.timesong').style.display = 'inline';
});



    // Function to adjust volume
    function adjustVolume(type) {
        var volumeValue = document.getElementById(type === 'volume' ? 'volumeSlider' : 'musicSlider').value;
        if (type === 'volume') {
            audio1.volume = volumeValue / 100;
            audio2.volume = volumeValue / 100;
        } else if (type === 'music') {
            // Adjust music volume accordingly
        }
    }

</script>







  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



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
  <script src="../assets/js/karaoke.js"></script>
  <script src="../assets/js/lyrics.js"></script>
  <script src="../assets/js/color.js"></script>
</body>

</html>


