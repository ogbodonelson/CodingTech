
<?php
include('../includes/conn.php');

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM drafts WHERE id = $id ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    // print_r($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewBlog</title>
</head>
<body>
    <div class="all" style="margin: 0 200px">
        <?php print_r($result['Content']); ?>
    </div>
</body>
</html>