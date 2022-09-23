<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobalus kintamieji FILES, SESSION, COOKIES</title>
</head>
<body>
    <!-- 1. methodas turi buti butinai POST. GET neveiks !!!! -->
    <!-- 2. enctype atributas formoje. Enctype - encoding type/uzkodavima tipas -->
    
    <!-- duomenys yra koduojami kaip paprastas tekstas!!!  -->
    <!-- Jeigu failus, mes turime pakeisti duomenu kodavimo tipa -->
    
    <!-- forma pasiima kaip binarinius blokus(tai padaro serveris) -->
    <!-- kiekvienas failas yra binariniai blokai -->
    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="text" name="file_name">
        <button type="submit" name="upload">Įkelti</button>
    </form>    
</body>
</html>

<?php 
    //tikriname ar mygtukas paspaustas
    if(isset($_POST["upload"])) {
        $file_name = $_POST["file_name"];
        $file = $_FILES["file"];

         var_dump($file);

        // failo aplankas
        $file_dir = "uploads/";
        //turime sudaryti pilnaji kelia iki failo
        //kaip tame aplanke failas vadinsis

        // random string
        // base64 + ikelimo data kodavimas
        // kad tikriname kokie failai yra ikelti(duomenu bazes)
        // sha256 - 256 bitu kodas(duomenu), kuris yra unikalus, dvi skirtingos reiksmes gali buti uzkoduotos vienodai

        // $file_name_generated = "failas.txt";

        //1. mums reikia atpazinti koks yra failas x
        //2. mums reikia tureti atsitiktiniu zodziu masyva
        //3. sugeneruoti pavadinima

        // parduotuve.sql 
        //parduotuve
        //sql

        //explode - padalina stringa i masyva pagal nurodyta simboli
        //parduotuve.sql per taskiuka -> ["parduotuve", "sql"]
        //kiausinis, obuolys, kriause, limonadas -> ["kiausinis", "obuolys", "kriause", "limonadas"]
        $file_name_array = explode(".", $file["name"]);
        //failo pletini
        $file_extension =  $file_name_array[1];

        if($file_extension=="pdf"){
        
        // $random_words = ["a","b","c","d","e","f","g"];

        // //rand() - sugeneruoja atsitiktini skaiciu

        // $random_string = "";
        // for($i = 0; $i <=22; $i++) {
        //     $random_number = rand(0,count($random_words)-1); // 0, 1, 2, 3, 4
        //     // $random_string = $random_string . $random_words[$random_number];
        //     $random_string .= $random_words[$random_number];

        // }
        $time = time();
            //time dabartinis laikas sekundemis nuo 1970
        $random_string = $file_name_array[0].$time;


        $file_name_generated = $random_string .".".$file_extension;


        var_dump($file_name_generated); 




         $file_path = $file_dir . $file_name_generated;

         //leisti ikelti tik jpg
         //apriboti ikelimo failo didi
         //ir t.t.

         //move_uploaded_file - perkeliame faila i kita vieta
         //jeigu ikelimas sekmingas - true, ir ikelia faila
         //jeigu ne - false, ir neikelia failo
        // vieta is kur keliame, vieta i kuria keliame
         if(move_uploaded_file($file["tmp_name"],$file_path)) {
            echo "Failas sekmingai ikeltas";
         } else {
            echo "Failo ikelti nepavyko";
         }

        //  var_dump( $file_path);
    }
    else {
        echo ("Keliame tik pdf failus");
        }
}



?>


<?php 
//$_FILES - superglobalus kintamasis, kurio pagalba mes per forma galime įkelti failus
//$_COOKIES
//$_SESSION



//Įkelti vieną failą į serveri, į katalogą "uploads"
