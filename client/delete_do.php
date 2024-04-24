<?php
    include "config.php";

    $nim = $_GET["nim"];
    $kode_mk = $_GET["kode_mk"];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $base_url.'?nim='.$nim.'&kode_mk='.$kode_mk.'');
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    $result = json_decode($result, true);
    curl_close($curl);

    print("<center><br>status :  {$result["status"]} "); 
    print("<br> message :  {$result["message"]} "); 
    echo '<br> <a href=index.php> OK </a>';
?>