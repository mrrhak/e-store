<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta htttp-equiv="Cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= URLROOT ?>backend/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= URLROOT ?>backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= URLROOT ?>backend/css/adminlte.min.css">

  <title><?= SITENAME ? SITENAME . (isset($data['title']) != null ? ' | ' . $data['title'] : '') : '' ?></title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php require_once 'nav.php' ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php require_once 'menu.php' ?>
    
  