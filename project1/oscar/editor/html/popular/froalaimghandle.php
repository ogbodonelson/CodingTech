<?php   // Allowed extentions.
    session_start();
    // $_SESSION['temp'] = explode(".", $_FILES["imagine"]["name"]);
    // $_SESSION['mime'] = finfo_file($finfo, $_FILES["imagine"]["tmp_name"]);

    $allowedExts = array("gif", "jpeg", "jpg", "png");

    // Get filename.
    $temp = explode(".", $_FILES["imagine"]["name"]);

    // Get extension.
    $extension = end($temp);

    // An image check is being done in the editor but it is best to
    // check that again on the server side.
    // Do not use $_FILES["file"]["type"] as it can be easily forged.
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES["imagine"]["tmp_name"]);

    if ((($mime == "image/gif")
    || ($mime == "image/jpeg")
    || ($mime == "image/pjpeg")
    || ($mime == "image/x-png")
    || ($mime == "image/png"))
    && in_array($extension, $allowedExts)) {
        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;

        // Save file in the uploads folder.
        move_uploaded_file($_FILES["imagine"]["tmp_name"], getcwd() . "./metaimages/froalaimages/" . $name);

        // Generate response.
        $response = new StdClass;
        $response->link = "./metaimages/froalaimages/" . $name;
        // $response->link = "./Home/metaimages/froalaimages/" . $name;
        echo stripslashes(json_encode($response));
    }
?>