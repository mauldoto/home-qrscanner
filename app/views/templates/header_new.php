<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title><?= $data['title']; ?></title>

  <meta name="description" content="overview &amp; stats" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <meta name="baseURL" content="<?= BASEURL; ?>" />

  <!-- bootstrap & fontawesome -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/ui.jqgrid.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/jquery-ui.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/fonts.googleapis.com.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/ace-skins.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/ace-rtl.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/select2.min.css" />
  <style>
    .main-container,
    .page-content {
      background-color: lightgray;
    }

    .form-content {
      background-color: white;
      padding: 1rem;
    }

    hr {
      margin-top: 0px;
      margin-bottom: 10px;
    }

    .mb-10 {
      margin-bottom: 20px;
    }

    .mb-5 {
      margin-bottom: 10px;
    }

    .col-xs-1.angket {
      width: 0%;
    }

    .pertanyaan {
      font-size: 14px;
    }

    .offset-3 {
      margin-left: 6%;
    }

    .offset-12 {
      margin-left: 12%;
    }

    textarea {
      width: 80% !important;
    }
  </style>
</head>

<body class="skin-1">
  <div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">

      <div class="navbar-header pull-left">
        <a href="<?= BASEURL; ?>" class="navbar-brand">
          <small>
            <!-- <i class="fa fa-leaf"></i> -->
            HR Angket <?= NAMA_PT ?>
          </small>
        </a>
      </div>
    </div><!-- /.navbar-container -->
  </div>

  <div class="main-container ace-save-state" id="main-container">

    <div class="main-content">
      <div class="main-content-inner">

        <div class="page-content">

          <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
              <!-- PAGE CONTENT START -->