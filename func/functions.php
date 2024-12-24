<?php

function conn() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "anforum";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        return false;
    }

    return $conn;
    
}

function post($conn, $parentid, $text) {
    $sql = "INSERT INTO posts (parentid, post) VALUES ('$parentid', '$text')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function getposts($conn, $parentid, $q) {
    if ($q == '') {
        $sql = "SELECT * FROM posts WHERE parentid = $parentid";
    } else {
        $sql = "SELECT * FROM posts WHERE parentid = $parentid AND post LIKE '%$q%'";
    }

    $result = $conn->query($sql);
    $posts = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    return $posts;
}

function getpost($conn, $id) {
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return false;
}

function existid($conn, $id) {
    $sql = "SELECT id FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}
