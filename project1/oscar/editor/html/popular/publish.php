<?php 

// include('../includes/conn.php');
include('../../../includes/conn.php');

session_start();
$Author = $_SESSION['username'];


if($conn){
    
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // echo $id;
    if($_GET['id']){
        $sql = "SELECT * FROM drafts WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        print_r($results[0]['ID']);
    }

    $resultt = ['Author'=>'', 'Content'=>'', 'Title'=>'', 'Category'=>'', 'Metaimage'=>'', 'Metadescription'=>'',];

    // on clicking the submit button
    if(isset($_POST['publish'])){
        // $id = mysqli_real_escape_string($conn, $_POST['publish']);
        // echo 'vibranium';
        $sql = "SELECT * FROM drafts WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        // print_r($results[0]['Title']);
        
        $resultt['Author'] = $Author;
        $resultt['Content'] = $results[0]['Content'];
        $resultt['Title'] = $results[0]['Title'];
        $resultt['Category'] = $results[0]['Category'];
        $resultt['Metaimage'] = $results[0]['Metaimage'];
        $resultt['Metadescription'] = $results[0]['Metadescription'];
        $Author = mysqli_real_escape_string($conn, $resultt['Author']);
        $Content = mysqli_real_escape_string($conn, $resultt['Content']);
        $Title = mysqli_real_escape_string($conn, $resultt['Title']);
        $Category = mysqli_real_escape_string($conn, $resultt['Category']);
        $Metaimage = $resultt['Metaimage'];
        $Metadescription = mysqli_real_escape_string($conn, $resultt['Metadescription']);

        // print_r($resultt['Title'] );

        $sql = "INSERT INTO publish (Author, Content, Title, Category, Metaimage, Metadescription)
        VALUES ('$Author', '$Content', '$Title', '$Category', '$Metaimage', '$Metadescription')";
    
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // if(isset($_POST['publish'])){
    //     $id = mysqli_real_escape_string($conn, $_POST['id']);
    //     echo 'summer';
    // }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Publish</title>
</head>

<style>
    .all{
        margin: 20px 50px;
    }

    .title{
        Text-align: center;
        Font-weight: bolder;
        font-size: 130%
    }

    img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }

    .content{
        margin-top: 5vh;
    }

    p{
        font-size: 20px
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
</style>

<body>
    <!-- Navigation bar -->
    <div class="row header">
            <nav class="nav navbar navbar-expand-sm navbar-light py-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../../.././editor/html/popular/Home/index.php" style="fontweight: bolder; font-size: 200%;">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mx-5" id="navbarNav">
                        <button>
                            <a href="../../.././pages/dashboard.php" style="text-decoration: none; margin: 20px">Dashboard</a>
                        </button>
                    </div>
                </div>
            </nav>
    </div>

    <!-- <a href="../editor/html/popular/metaimages/meta.php/">click me</a> -->

    
    <form action="publish.php?id=<?php echo htmlspecialchars($_GET['id']) ?>" method="post">
        <div class="row all">

            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Author</span>
                <input type="text" class="form-control disabled" placeholder="<?php echo htmlspecialchars($results[0]['Author']); ?>" aria-label="Username" aria-describedby="addon-wrapping" disabled>
            </div>

            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Category</span>
                <input type="text" class="form-control disabled" placeholder="<?php echo htmlspecialchars($results[0]['Category']); ?>" aria-label="Username" aria-describedby="addon-wrapping" disabled>
            </div><br>
            
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Metadescription</span>
                <textarea class="form-control" aria-label="With textarea"><?php echo htmlspecialchars($results[0]['Metadescription']); ?></textarea>
            </div>
            
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Metaimage</span>
                <input type="text" class="form-control disabled" placeholder="<?php echo htmlspecialchars($results[0]['Metaimage']); ?>" aria-label="Username" aria-describedby="addon-wrapping" disabled>
            </div>

            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Title</span>
                <input type="text" class="form-control disabled" placeholder="<?php echo htmlspecialchars($results[0]['Title']); ?>" aria-label="Username" aria-describedby="addon-wrapping" disabled>
            </div>

            <div class="Title">
                Content
            </div>
            
            <div class="content">
                <?php echo htmlspecialchars($results[0]['Content']); ?>
            </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
        <button type="button" class="btn btn-primary py-3 text-uppercase fs-5 fw-bolder publish" value="<?php echo $results[0]['ID']; ?>">Publish</button>
        </div>
        <!-- <button type="submit" name="publish">SUBMIT</button> -->
    </form>
    


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../.././deletenotice.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>