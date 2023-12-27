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

  <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
  <script src="//code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="<?= $themes ?>assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js'></script>
  

</head>

<body>
  <!-- include -->
  <?php $this->load->view($view_file); ?>
  <!-- include -->
</body>

</html>