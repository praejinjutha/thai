<?php
defined('BASEPATH') or exit('No direct script access allowed');
$themes =  base_url();
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset=TIS-620>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= APP_NAME ?></title>
  <meta content="<?= DESCRIPTION_NAME ?>" name="description">
  <meta content="<?= KEYWORDS_NAME ?>" name="keywords">
  <link rel="icon" type="image/x-icon" href="<?= $themes ?>assets/images/icon/01.png">
  <link rel="stylesheet" href="<?= $themes ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $themes ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= $themes ?>assets/css/Font-Prompt/stylesheet.css">
  <link rel="stylesheet" href="<?= $themes ?>assets/css/thsarabunnew/stylesheet.css">
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css'>

  <script src="//code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js'></script>

  <!-- Header css -->
  <link href="<?= $themes ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@500&family=Thasadith:wght@700&display=swap" rel="stylesheet">
  <link href="<?= $themes ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $themes ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= $themes ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= $themes ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= $themes ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= $themes ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">

</head>

<body>
  <!-- include -->
  <?php $this->load->view($view_file); ?>
  <!-- include -->
</body>

</html>