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
        case 'jabatanread':
            file_exists('pages/admin/jabatanread.php') ? include 'pages/admin/jabatanread.php' : include "pages/404.php";
            break;
        case 'jabatancreate': //index.php?page=jabatancreate
            file_exists('pages/admin/jabatancreate.php') ? include 'pages/admin/jabatancreate.php' : include 'pages/404.php';
            break;
        case 'jabatanupdate': //index.php?page=jabatanupdate
            file_exists('pages/admin/jabatanupdate.php') ? include 'pages/admin/jabatanupdate.php' : include 'pages/404.php';
            break;
        case 'jabatandelete': //index.php?page=lokasidelete
            file_exists('pages/admin/jabatandelete.php') ? include 'pages/admin/jabatandelete.php' : include 'pages/404.php';
            break;
        case 'bagianread':
            file_exists('pages/admin/bagianread.php') ? include 'pages/admin/bagianread.php' : include "pages/404.php";
            break;
        case 'bagiancreate': //index.php?page=bagiancreate
            file_exists('pages/admin/bagiancreate.php') ? include 'pages/admin/bagiancreate.php' : include 'pages/404.php';
            break;
        case 'bagianupdate': //index.php?page=bagianupdate
            file_exists('pages/admin/bagianupdate.php') ? include 'pages/admin/bagianupdate.php' : include 'pages/404.php';
            break;
        case 'bagiandelete':
            file_exists('pages/admin/bagiandelete.php') ? include 'pages/admin/bagiandelete.php' : include 'pages/404.php';
            break;
        default:
            include "pages/404.php";
    }
} else {
    include "pages/home.php";
}
