<?php
session_start();
$Author = $_SESSION['username'];
// $userpicture = $_SESSION['userimage'];
include('../../../includes/conn.php');
// $conn = mysqli_connect('localhost', 'Wondamuda', '', 'Wondamuda');
$Table_type = $_GET['table'] ?? '';
$_SESSION['table'] = $Table_type;


// $message = '';
$exist = ["content"=>"", "category"=>"", "image"=>""];
$message = 'save';

$id = '';
if($conn){
  // echo $_SESSION['table'] = $Table_type;
  $Table_type = $_GET['table'] ?? '';
  $id = $_GET['id'] ?? '';
  // $id = $_POST['Blogid'];
  echo $id;
  echo $Table_type;

  

  switch ($Table_type) {
    case 'drafts':
      $_SESSION['id'] = $_GET['id'];
      $sql = "SELECT * FROM drafts WHERE id = $id";
      $query = mysqli_query($conn, $sql);
      $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
      // $_SESSION['category'] = $results[0]['Category'] ;
      // $_SESSION['Content'] = $results[0]['Content'] ;
      print_r($results[0]['ID']);
      break;
    case "publish":
      $_SESSION['id'] = $_GET['id'];
      $sql = "SELECT * FROM publish WHERE id = $id";
      $query = mysqli_query($conn, $sql);
      $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
      $_SESSION['category'] = $results[0]['Category'] ;
      break;
    default:
      //code block
      echo 'nothing for you';
  }

 
    //  for editing main blog content
    $Categoryalert = 'none';
    if(isset($_POST['Mainblogcontent'])){
      if(isset($_POST['Category'])){
        // echo $_POST['Category'];
        $Content = $_POST['Content'];
        $Category = $_POST['Category'];
        $sql = "UPDATE $Table_type SET Content = '$Content', Category = '$Category' WHERE id = $id ";
        $query = mysqli_query($conn, $sql);
        if($query){
          // echo 'good job';
          $location = './metaimages/meta.php?table='.$_SESSION['table'].'&id='.$_SESSION['id'];
          header("location: $location"); 
          $successmessage = 'Successfully';
        }
      }else{
        $Categoryalert = 'display';
      }
    }

    // for deleting the blog
    if(isset($_POST['deleteblogpost'])){
      // echo 'this is my own personal id of yes';
      $sql = "DELETE FROM publish WHERE id = '$id' ";
      $query = mysqli_query($conn, $sql);
      if($query){
        // header("location : ");
        header('location: ./metaimages/meta.php');
      }else{

      }
      // $style = 'none';
    }else{
      // echo 'this is my own personal id of no';
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
    <!-- Modal -->
    <div class="modal" id="Modaldeleteblog" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <p>Are You Sure To Delete...?</p>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="deleteblogpost" class="btn btn-danger" >Delete</button>
          </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation bar -->
    <div class="header">
            <nav class="nav navbar navbar-expand-sm py-4">
                <div class="container-fluid d-flex justify-content-around">
                    <a class="navbar-brand" href="./Home/index.php" style="fontweight: bolder; font-size: 200%;">
                    <button type="button" class="btn btn-primary">
                    Home Page
                    </button></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>

                    <a href="../../.././pages/dashboard.php" style="text-decoration: none; margin: 20px">
                    <button type="button" class="btn btn-primary">
                    Dashboard
                    </button></a>

                    <!-- editblog.php?table=publish&id=<?php echo htmlspecialchars($_GET['id']) ?> -->
                    <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#Modaldeleteblog" class="btn btn-danger" value="=<?php echo htmlspecialchars($_GET['id']) ?>">Delete Blog</button>
                </div>
            </nav>
        </div>


        <!-- create $ seo -->
        <div class="row">
          <div class="create col-sm-8 mt-4" id="" style="margin-left: 10px">
              <!-- editor -->

              <!-- form for updating the title -->
              <form action="./metaimages/title.php?table=<?php echo htmlspecialchars($_SESSION['table']) ?>&id=<?php echo htmlspecialchars($_SESSION['id'])?>" method="POST">
                <!-- Title -->
                <div class="input-group mb-3">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon1">Title</button>
                  <input type="text" class="form-control" placeholder=""  aria-describedby="button-addon1" name="Title" value="<?php echo htmlspecialchars($results[0]['Title'])  ?>">
                  <button class="btn btn-outline-primary" name='updatetitle' id='updatetitle' type="submit" id="button-addon1">Update Title</button>
                </div>
              </form>

              <!-- form for the main blog content -->
              <form action="editblog.php?table=<?php echo htmlspecialchars($_SESSION['table'])?>&id=<?php echo htmlspecialchars($_SESSION['id'])?>" method="POST">
                <!-- Author -->
                <div class="input-group mb-3">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon1">Author</button>
                  <input type="text" class="form-control" name="Author" placeholder="" aria-describedby="button-addon1" value="<?php echo htmlspecialchars($Author); ?>" disabled>
                </div>
                <!-- Textarea and submit -->
                <div class="input-group mb-3">
                  <textarea name="Content" id="edit" style="margin-top: 30px;">
                    <?php echo htmlspecialchars($results[0]['Content']);?>
                  </textarea>
                  
                  <div class="my-2 btn-group">
                  <!-- category -->
                  <div>
                      <label for="Category" style="margin: 1px 2px;">Category</label>
                      <select id="Category" name="Category">
                        <option value="<?php echo htmlspecialchars($results[0]['Category'])  ?>" selected disabled hidden  selected="selected"></option>
                        <option value="Programming">Programming</option>
                        <option value="Computers">Computers</option>
                        <option value="AI">AI/Robotics</option>
                        <option value="Engineering">Engineering</option>
                      </select>
                    </div>
                    <!-- <input type="checkbox" class="mx-1" name="Check" id="Check"> -->
                  </div>
                  <!-- submit button -->
                  <div class="mt-2" style="display: block; margin-left: auto; margin-right: 0;">
                    <button type="submit" name="Mainblogcontent" id="Mainblogcontent" class="Submit btn btn-info" >Update</button>
                  </div>
                </div>
                <div class="alert alert-danger" role="alert" style="display:<?php echo $Categoryalert?>">
                    You forgot to choose a category to enable proper update of changes made
                </div>
                
                <!-- dont attempt to touch this div of notouch -->
                <div class="row notouch">
                  
              </form>
              </div>    
    </div>

     <!-- metadescription and seo -->
      <div class="seo col-sm-3 mt-4" style="margin-left: 60px">
        <div class="userimage">
          <!-- <?php foreach($results as $result): ?>
            <img src="../../.././pages/adminimages/<?php echo htmlspecialchars($result['userimage']) ?>"  class="userpicture" alt="" width="200" height="200">
          <?php endforeach; ?> -->
        </div><br>

        <!-- form for metaimage update -->
        <form action="./metaimages/meta.php?table=<?php echo htmlspecialchars($_SESSION['table'])?>&id=<?php echo htmlspecialchars($_SESSION['id'])?>" method="POST" id="updatemetaimage" enctype="multipart/form-data">
          <div class="btn-group my-4">
            <button type="button" class="btn btn-dark"><input type="file" src="" name="metaimage"></button>
            <button type="submit" name="updatemetaimage" class="btn btn-info">Update</button>
          </div>
        </form>

        <!-- form for metadescription update -->
        <form action="./metaimages/meta.php?table=<?php echo htmlspecialchars($_SESSION['table']) ?>&id=<?php echo htmlspecialchars($_SESSION['id'])?>" method="POST">
          <textarea cols="30" rows="8" name="metadescription"><?php echo htmlspecialchars($results[0] ['Metadescription'] ?? 'Save Complete Return To Dashboard')  ?></textarea>
          <div class="btn-group mt-2">
            <button type="button" class="btn btn-dark">Metadescription</button>
            <button type="submit" name="updatemetadescription" class="btn btn-info">Update</button>
          </div>
        </form>
      </div>


  </div>


  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="./ajaxformsubmit.js"></script>
  <script src="../../.././deletenotice.js"></script>
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