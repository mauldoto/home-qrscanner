<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Scan Data Perumahan</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="baseURL" content="<?= BASEURL; ?>" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
    <!-- <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" /> -->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .main-container {
            flex: 1 0 auto;
        }

        .footer {
            flex-shrink: 0;
        }

        html,
        body,
        .main-container,
        .page-content,
        .main-container,
        .container {
            background-color: lightgray !important;
        }

        .table-content {
            margin-top: 3rem;
            padding: 1rem;
            background-color: white;

        }

        .footer {
            margin-top: 3rem;
        }

        .footer .footer-inner {
            text-align: center;
        }

        .footer .footer-inner .footer-content {
            background-color: white !important;
            padding: 8px;
            line-height: 36px;
            border-top: 3px double #E5E5E5;
        }

        .d-none {
            display: none;
        }

        .mb-5 {
            margin-bottom: 5rem;
        }

        .mt-5 {
            margin-top: 5rem;
        }

        .mb-3 {
            margin-bottom: 3rem;
        }

        .footer-content {
            font-size: 12px;
            color: grey;
        }
    </style>
</head>

<body class="bodyss">

    <div class="container main-container" id="main-container">

        <div class="main-content">
            <div class="main-content-inner">

                <div class="page-content">

                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-md-offset-2 border-1">
                            <!-- PAGE CONTENT START -->