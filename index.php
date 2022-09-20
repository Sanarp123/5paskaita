<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files, session, server</title>
</head>
<body>
<!-- visi sitie yra privalomi formojoe uploadinant failus -->
<!-- multipart/form-data - pasiema kaip binarinius blokus -->
<form action="index.php" method="post" enctype="multipart/form-data" >
    <input type="file" names="file">
    <button type="submit" name="upload">Įkelti</button>


</form>
    
</body>
</html>

<?php
//Keliam faila i Uploads.
if(isset($_POST["upload"])){
    $file = $_FILES["file"];
    // var_dump($file);
    $file_dir = "uploads/";
    //nurodtyi kur bus failas ir kaip vadinsis
    $file_path = $file_dir . $file["name"];
    // leisti tik tam tikra tipa, dydi ir tt
    // move_uploaded_file - jei ikelimas sekmingas - true ir ikelia  (perkelia is temp folderio) faila.
    if(move_uploaded_file($file["tmp_name"],$file_path)) {
        echo "Failas sekmingai ikeltas";
    }
    else {
        echo "error";
    }
}