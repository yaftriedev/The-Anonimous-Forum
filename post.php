<?php 
    $alertpostup255 = "Post must be 255 characters or less";
    
    // logic: parentid, text, err
    if (isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 0; }
    if (isset($_GET['text'])) { $text = $_GET['text']; } else { $text = "Write your post here..."; }
    if (isset($_GET['err'])) { echo "<script type='text/javascript'> alert('$alertpostup255'); </script>";}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'pheader.php'; ?>
    
    <form class="postform" action="func/posturl.php" method="post">
        <input type="hidden" name="p" value="<?php echo $p; ?>">
        <textarea name="post" rows="6" cols="30"><?php echo $text ?></textarea><br>
        <input type="submit" name="submit" value="Post">
    </form>

</body>
</html>
