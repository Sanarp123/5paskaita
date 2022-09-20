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

    // 1.random string failu vardui
    // 2.Kokie ikelti
    // 3.sha256 kodavimas sugeneravimas. Unikalus, taciau yra minimali tikimybe, kad uzkoduos vienodai
    // 4.base64 kodavimas

    $file_name_generated = "failas.jpg";

    // 1. koks yra failas (extension).
    $file_name_array = explode(".",$file["name"]);
    $file_extension = $file_name_array[1];
    // 2. Atsitiktinio stringo.
    $random_words = ["a","b","c","d","e"];
    // 3. sugeneruoti pavadinima
    
    $random_string = "";
    for($i = 0; $i <=22; $i++) {
        $random_number = rand(0,count($random_words)-1); // 0, 1, 2, 3, 4
        // $random_string = $random_string . $random_words[$random_number];
        $random_string .= $random_words[$random_number];
    }


    $file_name_generated = $random_string .".".$file_extension;


    var_dump($file_name_generated); 

     $file_path = $file_dir . $file_name_generated;
    // leisti tik tam tikra tipa, dydi ir tt
    // move_uploaded_file - jei ikelimas sekmingas - true ir ikelia  (perkelia is temp folderio) faila.
    if(move_uploaded_file($file["tmp_name"],$file_path)) {
        echo "Failas sekmingai ikeltas";
    }
    else {
        echo "error";
    }
}