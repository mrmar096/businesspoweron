<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="<?=base_url('resources/css/style.css')?>" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <!--Material Design Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-indigo.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<?php
    if ($this->session->userdata("user")){
        $this->load->view('commons/nav');
    }
?>
