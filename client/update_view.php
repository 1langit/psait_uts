<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <title>Update Nilai</title>
</head>
<body>
    <?php
        include "config.php";
        $nim = $_GET['nim'];
        $kode_mk = $_GET['kode_mk'];
        $curl= curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $base_url.'?nim='.$nim.'&kode_mk='.$kode_mk.'');
        $res = curl_exec($curl);
        $json = json_decode($res, true);
    ?>
    <div class="container py-5" style="max-width: 600px;">
        <h3>Update nilai</h3>
        <hr>
        <form action="update_do.php" method="post">
            <input type="text" name="nim" id="nim" class="form-control" value="<?php echo $nim; ?>" hidden>
            <input type="tex" name="kode_mk" id="kode_mk" class="form-control" value="<?php echo $kode_mk; ?>" hidden>
            <div class="form-group mb-2">
                <label for="nilai">Masukkan nilai baru</label>
                <input type="number" min=0 max=100 name="nilai" id="nilai" class="form-control" required>
            </div>
            <input type="submit" class="btn btn-dark rounded-1" name="submit" value="Submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>