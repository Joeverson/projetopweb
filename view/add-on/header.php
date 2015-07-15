<?php
session_start();
if(empty($_SESSION['user']))
    header('location: ../login/index.php');
?>
<!doctype html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <title>Gravadora web</title>

    <link rel="stylesheet" href="../includes/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../includes/css/roboto.min.css"/>
    <link rel="stylesheet" href="../includes/css/material-fullpalette.min.css"/>
    <link rel="stylesheet" href="../includes/css/material.min.css"/>
    <link rel="stylesheet" href="../includes/css/ripples.min.css"/>
    <link rel="stylesheet" href="../includes/css/style.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script src="../includes/js/jquery-1.11.3.min.js"></script>
</head>
<body>
<!-- div de notificações -->
<div class="alert alert-success alert-dismissable notification">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <strong></strong>
</div>
<!-- /div de notificações -->