<?php if (isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 0; } ?>

<div class="header">
    <div class="logo">
        <a href="index.php"><h1>The Anonimous Forum</h1></a>
    </div>
    <div class="search">
        <form action="index.php" method="get">
            <input type="hidden" name="p" value="<?php echo $p; ?>">
            <input type="text" name="q" placeholder="Search...">
            <input type="submit" value="Search">
        </form>
        <a href="post.php?p=<?php echo $p; ?>" class="post">Post</a>
    </div>
</div>
    