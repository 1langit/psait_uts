<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <title>Nilai Mahasiswa</title>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Nilai Mahasiswa</h3>
            <a href="insert_view.php" class="btn btn-dark rounded-1">+ Tambah nilai</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal lahir</th>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>SKS</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "config.php";
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_URL, $base_url);
                    $json = json_decode(curl_exec($curl), true);

                    for ($i = 0; $i < count($json["data"]); $i++) {
                        echo "<tr>";
                            echo "<td> {$json['data'][$i]['nim']} </td>";	
                            echo "<td> {$json['data'][$i]['nama']} </td>";	
                            echo "<td> {$json['data'][$i]['alamat']} </td>";	
                            echo "<td> {$json['data'][$i]['tanggal_lahir']} </td>";	
                            echo "<td> {$json['data'][$i]['kode_mk']} </td>";	
                            echo "<td> {$json['data'][$i]['nama_mk']} </td>";	
                            echo "<td> {$json['data'][$i]['sks']} </td>";	
                            echo "<td> {$json['data'][$i]['nilai']} </td>";	
                            echo "<td>";
                                echo '<a href="update_view.php?nim='.$json['data'][$i]['nim'].'&kode_mk='.$json['data'][$i]['kode_mk'].'"><i class="bi bi-pencil-square"></i></a> ';
                                echo '<a href="delete_do.php?nim='.$json['data'][$i]['nim'].'&kode_mk='.$json['data'][$i]['kode_mk'].'" onclick="return confirm(`Anda yakin ingin menghapus?`);"><i class="bi bi-trash3-fill"></i></i></a>';
                            echo "</td>";
                        echo "</tr>";
                    }
                    curl_close($curl);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>