<?php
 include_once '../models/ModeloIniciarSession.php'; 
 $user = new ModeloIniciarSession();
   session_start();
   if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status']!== 1) {
      header("location: login.php");
        exit;
   }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SEHS| Servicio Educacional Hogar y Salud </title>

     <?php include_once '../../include/styles.php'; ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        <!-- menu lateral -->
        <?php include_once '../../include/menuLateral.php'; ?>
        <!-- menu lateral -->

        <!-- top navigation -->
        <?php include_once '../../include/top-navigation.php'; ?>
        <!-- /top navigation -->