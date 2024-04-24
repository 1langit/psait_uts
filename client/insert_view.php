<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <title>Tambah Nilai</title>
</head>
<body>
    <div class="container py-5" style="max-width: 600px;">
        <h3>Tambah nilai</h3>
        <hr>
        <form action="insert_do.php" method="post">
            <div class="form-group mb-2">
                <label for="nim">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="matakuliah">Kode MK</label>
                <input type="tex" name="kode_mk" id="kode_mk" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="nilai">Nilai</label>
                <input type="number" min=0 max=100 name="nilai" id="nilai" class="form-control">
            </div>
            <input type="submit" class="btn btn-dark rounded-1" name="submit" value="Submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>