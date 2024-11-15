<?php

// connect database
require_once('../config.php');
//require_once ('../report/stimulsoft/helper.php');

// get info acount share to all view
$email = $_SESSION['username'];
$acc = "SELECT * FROM tai_khoan WHERE email = '$email'";
$result_acc = mysqli_query($conn, $acc);
$row_acc = mysqli_fetch_array($result_acc);

?>
<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản lý nhân sự</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>
    .invisible {
      visibility: hidden;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">