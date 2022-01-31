<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case '':
        case 'home':
            file_exists('pages/home.php') ? include 'pages/home.php' : include "pages/404.php";
            break;
        case 'lokasiread':
            file_exists('pages/admin/lokasiread.php') ? include 'pages/admin/lokasiread.php' : include "pages/404.php";
            break;
        case 'lokasicreate': //index.php?page=lokasicreate
            file_exists('pages/admin/lokasicreate.php') ? include 'pages/admin/lokasicreate.php' : include 'pages/404.php';
            break;
        case 'lokasiupdate': //index.php?page=lokasiupdate
            file_exists('pages/admin/lokasiupdate.php') ? include 'pages/admin/lokasiupdate.php' : include 'pages/404.php';
            break;
        case 'lokasidelete': //index.php?page=lokasidelete
            file_exists('pages/admin/lokasidelete.php') ? include 'pages/admin/lokasidelete.php' : include 'pages/404.php';
            break;
        default:
            include "pages/404.php";
    }
} else {
    include "pages/home.php";
}
