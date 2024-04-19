<?php 

session_start();
$Author = $_SESSION['username'];
$userpicture = $_SESSION['userimage'] ?? '';
include('../../../../includes/conn.php');
// $conn = mysqli_connect('localhost', 'Wondamuda', '', 'Wondamuda');
 
if($conn){
    $successmessage = "";
    // for updating the metadescription
    if(isset($_POST['updatemetadescription'])){
        if(!empty($_POST['metadescription'])){ 
            $id = $_GET['id'] ?? '';
            $Table_type = $_GET['table'] ?? '';

            // echo 'good title you have going on there boy you know good title you have going on there boy you know good title you have going on there boy you know good title you have going on there boy you know good title you have going on there boy you know good title you have going on there boy you know' . $_SESSION['id'];

            switch ($Table_type) {
                case 'drafts':
                $Metadescription = mysqli_real_escape_string($conn,  $_POST['metadescription']);
                $sql = "UPDATE drafts SET Metadescription = '$Metadescription' WHERE ID = '$id' ";
                $query = mysqli_query($conn, $sql);
                if($query){
                    $successmessage = 'Metadescription';
                }
                break;

                case "publish":
                $Metadescription = mysqli_real_escape_string($conn,  $_POST['metadescription']);
                $sql = "UPDATE publish SET Metadescription = '$Metadescription' WHERE ID = '$id' ";
                $query = mysqli_query($conn, $sql);
                // $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                if($query){
                    $successmessage = 'Metadescription';
                }
                break;

                default:
                //code block
                echo 'nothing for you';
            }
        }
    }

    // for updating the metaimage
    if(isset($_POST['updatemetaimage'])){
        // echo 'this is the submit button for image click';
        $Newimage = $_FILES["metaimage"]["name"];
        $tempname = $_FILES["metaimage"]["tmp_name"];
        $id = mysqli_real_escape_string($conn,   $_GET['id']  ?? '');
        $Table_type = $_GET['table'] ?? '';

        $sql = "SELECT * FROM  $Table_type WHERE ID = '$id' ";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $userimage = $result['Metaimage'];
        
        // echo  $_SESSION['userimage'];
        $_SESSION['userimage'] = $userimage;

        if($Newimage !=''){
            if(!file_exists("./metaimages/images".$Newimage)){
                $validimageestension = ['jpg', 'jpeg', 'png', 'webp'];
                $imageextension = explode('.', $Newimage);
                $imageextension = strtolower(end($validimageestension));
                if(!in_array($imageextension, $validimageestension)){
                    echo "<script>alert('Invalid')</script>";
                }else{
                    $id = mysqli_real_escape_string($conn,   $_GET['id']  ?? '');
                    $Table_type = mysqli_real_escape_string($conn,    $_GET['table'] ?? '');
                    $Oldimage = $userimage;
                    $newimagename = uniqid();
                    $newimagename = sha1(microtime()) . '.' .  $imageextension;
                    move_uploaded_file($tempname, getcwd() . "./images/" . $newimagename);
                    $sql = "UPDATE  $Table_type SET Metaimage = '$newimagename' WHERE ID = '$id' ";
                    $query = mysqli_query($conn, $sql);
                    if($query){
                        $successmessage = 'Metadescriptionimage';
                        // echo 'Successfully updated';
                      // unlink("./images/".$Oldimage);
                    }
                }
            }else{
                echo 'this image already exist';
            }
        }
    }
    

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
        p {
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
        <p><?php echo htmlspecialchars($successmessage) ?><span> Updated</span><br/>Now return to dashboard &#128071</p>
        <p><button class="btn btn-primary" type="submit"><a href="../../../../pages/dashboard.php">Dashboard</a></button></p>
      </div>
    </body>
</html>