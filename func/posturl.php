<?php

if (isset($_POST['submit'])) {

    $parentid = $_POST['p'];
    $post = $_POST['post'];

    if (strlen($post) > 250) {
        header("Location: ../post.php?text=$post&err");
        exit();
    }

    require_once 'functions.php';

    if(post(conn(), $parentid, $post)) {
        header("Location: ../index.php?p=$parentid");
    } else {
        header("Location: ../index.php?p=$parentid&posterr");
    }
    exit();

} 
else {
    header("Location: ../index.php");
    exit();
}