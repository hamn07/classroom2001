<?php
$s_user_id = isset($_GET['user'])?$_GET['user']:"hamn07";
?>




<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- load jQuery -->
    <!--<script src="js/jquery-2.1.4.min.js"></script>-->
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>
    <!-- load lightbox -->
    <link rel="stylesheet" type="text/css" href="./bower_components/lightbox/dist/css/lightbox.css">
    <!-- load galleria -->
    <!-- css of this page -->
    <link rel="stylesheet" type="text/css" href="./pturable.css">
    <!-- checkout manual @http://t4t5.github.io/sweetalert/ -->
    <script src="./bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./bower_components/sweetalert/dist/sweetalert.css">

</head>

<body>
    <div id="wrapper">
        <nav>
            <a href="#" id="fileSelect"><img src="images/Folder-Add-01-128.png" class="icon"></a>
            <input type="file" id="fileElem" multiple accept="image/*" style="display:none">
            <a href="#" id="urlSelect"><img src="images/Add-Earth-128.png"></a>
            <a href="#" id="play"><img src="images/Media-Play-02-128.png"></a>
            <a href="#" id="filterPopup" style=""><img src="images/Filtering-128.png"></a>
            <div id="filter" class="filter">
                <input type="search" id="searchText" placeholder="keyword">
            </div>
            <a href="#" id="audioSelect"><img src="images/Document-Music-01-128.png" class="icon"></a>
            <input type="file" id="audioElem" accept="audio/*" style="display:none">
        </nav>
        <div id="contentEnlarge" class="enlarge"></div>
        <div id="content"></div>
    </div>
    <!-- load lightbox -->
    <script src="./bower_components/lightbox/dist/js/lightbox.min.js"></script>
    <!-- *************** -->
    <!-- js of this page -->
    <!-- *************** -->
    <script type="text/javascript" src="./pturable.js"></script>
</body>

</html>
