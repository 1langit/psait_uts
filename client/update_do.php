<?php
    include "config.php";

    if(!isset($_POST['submit'])) {
        echo "Error";
        return;
    }

    $nim = $_POST["nim"];
    $kode_mk = $_POST["kode_mk"];
    $nilai = $_POST['nilai'];

    $curl = curl_init($base_url.'?nim='.$nim.'&kode_mk='.$kode_mk.'');
    $jsonData = array(
        'nilai' => $nilai
    );

    $jsonDataEncoded = json_encode($jsonData);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
    $result = curl_exec($curl);
    $result = json_decode($result, true);
    curl_close($curl);

    print("<center><br>status :  {$result["status"]} "); 
    print("<br> message :  {$result["message"]} "); 
    echo '<br> <a href=index.php> OK </a>';
?>