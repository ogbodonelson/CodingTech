<?php

session_start();
$Author = $_SESSION['username'];
$userpicture = $_SESSION['userimage'] ?? '';
include('../../../../includes/conn.php');
// $conn = mysqli_connect('localhost', 'Wondamuda', '', 'Wondamuda');

if($conn){
    $successmessage;
    if(isset($_POST['updatetitle'])){
        // echo 'good title you have going on there boy you know';
        // print_r($_POST['Title']);

        if(!empty($_POST['Title'])){
            $id = $_GET['id'] ?? '';
            $Table_type = $_GET['table'] ?? '';
            $_SESSION['id'] = $id;

            // echo 'good title you have going on there boy you know good title you have going on there boy you know good title you have going on there boy you know good title you have going on there boy you know good title you have going on there boy you know good title you have going on there boy you know' . $_SESSION['id'];

            switch ($Table_type) {
                case 'drafts':
                $Title = $_POST['Title'];
                $sql = "UPDATE drafts SET Title = '$Title' WHERE ID = '$id' ";
                $query = mysqli_query($conn, $sql);
                if($query){
                    $successmessage = 'Title';
                }
                break;

                case "publish":
                $Title = $_POST['Title'];
                $sql = "UPDATE publish SET Title = '$Title' WHERE ID = '$id' ";
                $query = mysqli_query($conn, $sql);
                if($query){
                    $successmessage = 'Title';
                }
                break;

                default:
                //code block
                echo 'nothing for you';
            }
        }
      }

      // for the mainblogcontent in the editblog.php file
      // $exist = ["content"=>"", "category"=>"", "image"=>""];
      
}

?>

<!DOCTYPE html>
<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p{
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
        a{
            font-size:20px;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            color: white;
            text-decoration: none
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p><?php echo $successmessage ?? 'successfully' ?><span> Updated</span><br/>Now return to dashboard &#128071</p>
        <p><button class="btn btn-primary" type="submit"><a href="../../../../pages/dashboard.php">Dashboard</a></button></p>
      </div>
    </body>
</html>