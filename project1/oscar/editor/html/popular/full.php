<?php
session_start();
$Author = $_SESSION['username'];
$userpicture = $_SESSION['userimage'] ?? '';
include('../../../includes/conn.php');
// $conn = mysqli_connect('localhost', 'Wondamuda', '', 'Wondamuda');


$sql = "SELECT * FROM drafts WHERE Author = '$Author' ";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

// $message = '';

$message = 'submit' ?? '';


if($conn){
  if(isset($_POST['Title']) && isset($_POST['Category'])){
    echo 'i have been submitted';
    // $author = 'neo';
    $Authors = ['author'=>$Author, 'Title'=>$_POST['Title'], 'Content'=>$_POST['Content'], 'Category'=>$_POST['Category']]; 
    $_SESSION['Title'] = $Authors['Title'];
    $sql = "SELECT * FROM drafts Where Author = '$Author' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if($query){
      // print_r($result);
      if(!array_filter($result)){
        $sql = "INSERT INTO drafts(Author, Title, Content, Category) VALUES('$Author', '$Authors[Title]', '$Authors[Content]', '$Authors[Category]')";
        $query = mysqli_query($conn, $sql);
        if($query){
          $message = 'inserted';
          print_r($_POST['Category']);
        }
      }else{
        // echo 'Error While Uploading';
        $sql = "UPDATE drafts SET Title = '$Authors[Title]', Content = '$Authors[Content]', Category = '$Authors[Category]' WHERE Author = '$Author'";
        $query = mysqli_query($conn, $sql);
        if($query){
          $message = 'updated';
        }else{
          echo "Error updating record: " . mysqli_error($conn);
        }
        // $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
      }
    }else{
    }
  }else{
  }

  // for setting the metadescription
  if(isset($_POST['metadescription'])){
    $Metadescription = $_POST['metadescription'];
    $sql = "SELECT * FROM drafts Where Author = '$Author' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if($query){
      if(!array_filter($result)){
        $sql = "INSERT INTO drafts(Metadescription) VALUES('$Metadescription') Where Author = '$Author'";
        $query = mysqli_query($conn, $sql);
        if($query){
          // print_r($_POST['Metadescription']);
        }
      }else{
        // echo 'Error While Uploading';
        $sql = "UPDATE drafts SET Metadescription = '$Metadescription' Where Author = '$Author' ";
        $query = mysqli_query($conn, $sql);
        if($query){
          // print_r($_POST['Metadescription']);
        }else{
          echo "Error updating record: " . mysqli_error($conn);
        }
      }
    }else{
    }
  }

  // for setting the metaimage
  if(isset($_POST['Setimage'])){
    echo 'this is the submit button for image click';
    $Newimage = $_FILES["setimage"]["name"];
    $tempname = $_FILES["setimage"]["tmp_name"];
    // $id = mysqli_real_escape_string($conn,   $_GET['id']  ?? '');
    // $Table_type = $_GET['table'] ?? '';

    // $sql = "SELECT * FROM  $Table_type WHERE Author = '$Author' ";
    // $query = mysqli_query($conn, $sql);
    // $result = mysqli_fetch_assoc($query);
    // $userimage = $result['Metaimage'];
    
    // // echo  $_SESSION['userimage'];
    // $_SESSION['userimage'] = $userimage;

    if($Newimage !=''){
        if(!file_exists("./metaimages/images".$Newimage)){
            $validimageestension = ['jpg', 'jpeg', 'png', 'webp'];
            $imageextension = explode('.', $Newimage);
            $imageextension = strtolower(end($validimageestension));
            if(!in_array($imageextension, $validimageestension)){
                echo "<script>alert('Invalid')</script>";
            }else{
                // $id = mysqli_real_escape_string($conn,   $_GET['id']  ?? '');
                // $Table_type = mysqli_real_escape_string($conn,    $_GET['table'] ?? '');
                // $Oldimage = $userimage;
                $newimagename = uniqid();
                $newimagename = sha1(microtime()) . '.' .  $imageextension;
                move_uploaded_file($tempname, getcwd() . "./metaimages/images/" . $newimagename);
                $sql = "UPDATE  drafts SET Metaimage = '$newimagename' WHERE Author = '$Author' ";
                $Author = $_SESSION['username'];
                // $sql = "INSERT INTO drafts(Metaimage) VALUES('$newimagename') WHERE Author = '$Author' ";
                $query = mysqli_query($conn, $sql);
                if($query){
                  $location = './metaimages/meta.php';
                  header("location: $location"); 
                  $successmessage = 'Successfully';
                    // $successmessage = 'Metaimage';
                    echo 'Successfully updated';
                  // unlink("./images/".$Oldimage);
                }

                if($Author =''){
                  echo 'i am empty';
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
  <meta charset="utf-8">
  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/froala_editor.css">
  <link rel="stylesheet" href="../../css/froala_style.css">
  <link rel="stylesheet" href="../../css/plugins/code_view.css">
  <link rel="stylesheet" href="../../css/plugins/draggable.css">
  <link rel="stylesheet" href="../../css/plugins/colors.css">
  <link rel="stylesheet" href="../../css/plugins/emoticons.css">
  <link rel="stylesheet" href="../../css/plugins/image_manager.css">
  <link rel="stylesheet" href="../../css/plugins/image.css">
  <link rel="stylesheet" href="../../css/plugins/line_breaker.css">
  <link rel="stylesheet" href="../../css/plugins/table.css">
  <link rel="stylesheet" href="../../css/plugins/char_counter.css">
  <link rel="stylesheet" href="../../css/plugins/video.css">
  <link rel="stylesheet" href="../../css/plugins/fullscreen.css">
  <link rel="stylesheet" href="../../css/plugins/file.css">
  <link rel="stylesheet" href="../../css/plugins/quick_insert.css">
  <link rel="stylesheet" href="../../css/plugins/help.css">
  <link rel="stylesheet" href="../../css/third_party/spell_checker.css">
  <link rel="stylesheet" href="../../css/plugins/special_characters.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">

  <style>
    body {
      text-align: center;
    }

    div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }

    .ss {
      background-color: red;
    }

    .nav{
        background-color: #d1c4e9;
    }

    .container-fluid{
        background-color: #9fa8da;
    }

    .navbar-brand:hover{
        background-color: #5c6bc0;
    }

    .userpicture{
      border-radius: 20px;
      border: 3px solid blue;
    }

    .upload, .submit{
      background-color: #936ef0;
      font-size: 20px;
    }
  </style>
</head>

<body>
  <!-- Mother container -->
  <div class="all">
    <!-- Navigation bar -->
    <div class="header">
            <nav class="nav navbar navbar-expand-sm py-4">
                <div class="container-fluid">
                  <a class="navbar-brand" href="./Home/index.php" style="fontweight: bolder; font-size: 200%;">Home</a>
                     <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse mx-5" id="navbarNav">
                    <button>
                        <a href="../../.././pages./dashboard.php" style="text-decoration: none; margin: 20px">Dashboard</a>
                    </button>
                    </div>
                </div>
            </nav>
        </div>



    <!-- create $ seo -->
    <div class="row">
        <div class="create col-sm-8 mt-4" id="" style="margin-left: 10px">
            <!-- editor -->
            <!-- submit1 -->
            <form action="full.php" method="POST" id="submit1">
              <!-- Author -->
              <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="button" id="button-addon1">Button</button>
                <input type="text" class="form-control" placeholder="" aria-describedby="button-addon1" value="<?php echo htmlspecialchars($Author); ?>" disabled>
              </div>
              <!-- Title -->
              <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="button" id="button-addon1">Title</button>
                <input type="text" class="form-control" placeholder=""  aria-describedby="button-addon1" name="Title" value="<?php echo htmlspecialchars($_POST['Title'] ?? "")  ?>">
              </div>
              <!-- Textarea and submit -->
              <div class="input-group mb-3">
                <textarea name="Content" id="edit" style="margin-top: 30px;">
                  <?php echo htmlspecialchars($_POST['Content']) ?? "";  ?>
                </textarea>
                <!-- category -->
                <div class="mt-3" style="width: 100vw;">
                  <div class="category" style="float: left;">
                    <label for="Category" style="margin: 1px 2px;">Category</label>
                    <select id="Category" name="Category">
                      <option value="Programming">Programming</option>
                      <option value="AI">AI/Robotics</option>
                      <option value="Computers">Computers</option>
                      <option value="Engineering">Engineering</option>
                    </select>
                  </div>
                  <button class="Submit btn btn-info" name="Submit" id="Submit" style="display: block; margin-left: auto; margin-right: 0;"><?php echo htmlspecialchars($message) ?></button>
                </div>
              </div>
            </form>
        </div>

        <!-- metadescription and seo -->
        <div class="seo col-sm-3 mt-4" style="margin-left: 60px">
          <div class="userimage">
            <!-- <?php foreach($results as $result): ?>
            <img src="../../.././pages/adminimages/<?php echo htmlspecialchars($result['userimage']) ?>"  class="userpicture" alt="" width="200" height="200">
          <?php endforeach; ?> -->
          </div><br>

          <!-- form for metaimage -->
        <form action="full.php" method="POST" enctype="multipart/form-data">
          <div class="btn-group my-4">
            <button type="button" class="btn btn-dark"><input type="file" src="" name="setimage" id="image"></button>
            <button type="submit" name="Setimage" class="btn btn-info">Set Metaimage</button>
          </div>
        </form>

        <!-- form for metadescription -->
        <form action="full.php" method="POST" id="Setmetadescription">
          <textarea cols="30" rows="8" name="metadescription"></textarea>
          <div class="btn-group mt-2">
            <button type="button" class="btn btn-dark">Metadescription</button>
            <button type="submit" class="btn btn-info">Set</button>
          </div>
        </form>


        </div>
    </div>



    <!-- <div class="row">
        <div class="col">
        <div id="editor">
    <div id='edit' style="margin-top: 30px;">

    </div>
        </div>

        <div class="col"></div>
    </div> -->
  </div>

    <!-- <p><strong>This is some dummy text so you can see the sticky toolbar in action.</strong></p> -->

    <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="./ajaxformsubmit.js"></script>
  <!-- bootstrap cdn -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.2.7/purify.min.js"></script>


  <script type="text/javascript" src="../../js/froala_editor.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/align.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/file.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/image.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/link.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/table.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/save.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/url.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/video.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/help.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/print.min.js"></script>
  <script type="text/javascript" src="../../js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/word_paste.min.js"></script>

  <script>
    (function () {
      new FroalaEditor("#edit", {
        imageUploadURL: './froalaimghandle.php',

        imageUploadParam: 'imagine',

        imageUploadMethod: 'POST',

        fileUploadParams: {
          id: 'my_editor',
          froala: 'true'
        }
      })
    })()
  </script>

</body>

</html>