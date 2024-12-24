<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Anonimous Forum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'pheader.php'; ?>

<div class="mainposts">
<?php

    if (isset($_GET['posterr'])) {
        echo "<script type='text/javascript'> alert('Error posting your post'); </script>";
    }

    // posts requires
    require_once 'func/functions.php';

    // Variables
    $text404headerpost = "<div class='header404'><h2>Error 404, Post not found.</h2></div>";
    $textnoposts = "<div class='noposts'><h3>No posts found.</h3></div>";

    // get parentid, q and posts
    if (isset($_GET['q'])) { $q = $_GET['q']; } else { $q = ''; }
    if (isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 0; } 
    $result = getposts(conn(), $p, $q);

    // if -> pi null or pi == 0
    if ($p == 0) {
        echo '<h2 class="headerpost">Main Posts</h2>';
    } else {
        if (!existid(conn(), $p)) {
            echo $text404headerpost;
            die();
        }

        // header post
        $haederpost = getpost(conn(), $p);
        echo '<h3> <a href="index.php?p=' . $haederpost['parentid'] . '"> Return </a> </h3>';
        echo '<h2 class="headerpost">' . htmlspecialchars($haederpost['post']) . '</h2>';
    }

    // if -> results null
    if (count($result) == 0) {
        echo $textnoposts;
        die();
    }

    // print posts

    echo '<div class="posts"> <ul>';

    foreach ($result as $row) {
        $textpost = htmlspecialchars($row['post']);
        $urlpost = "index.php?p=" . $row['id'];
        echo '<a href="' . $urlpost .' "> <li class="post">' . $textpost . '</li> </a>';
    }

    echo '</ul> </div>';

?>
</div>

</body>
</html>