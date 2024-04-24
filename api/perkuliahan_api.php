<?php
require_once "config.php";
$request_method = $_SERVER["REQUEST_METHOD"];

$base_query = "
   SELECT m.nim, m.nama, m.alamat, m.tanggal_lahir, mk.kode_mk, mk.nama_mk, mk.sks, p.nilai
   FROM mahasiswa m
   INNER JOIN perkuliahan p ON m.nim = p.nim
   INNER JOIN matakuliah mk ON p.kode_mk = mk.kode_mk
";

switch ($request_method) {
   case 'GET':
      if (!empty($_GET["nim"])) {
         get_nilai($_GET["nim"]);
      } else {
         get_all_nilai();
      }
      break;
   case 'POST':
      if (!empty($_GET["nim"]) && !empty($_GET["kode_mk"])) {
         update_nilai($_GET["nim"], $_GET["kode_mk"]);
      } else {
         insert_nilai();
      }
      break;
   case 'DELETE':
      delete_nilai($_GET["nim"], $_GET["kode_mk"]);
      break;
   default:
      header("HTTP/1.0 405 Method Not Allowed");
      break;
}



function get_all_nilai() {
   global $mysqli, $base_query;
   $data = array();
   $result = $mysqli->query($base_query);
   while ($row = mysqli_fetch_object($result)) {
      $data[] = $row;
   }
   $response = array(
      'status' => 1,
      'message' => 'Get nilai mahasiswa sukses.',
      'data' => $data
   );
   header('Content-Type: application/json');
   echo json_encode($response);
}

function get_nilai($nim) {
   global $mysqli, $base_query;
   $data = array();
   $result = $mysqli->query($base_query."WHERE m.nim='$nim'");
   while ($row = mysqli_fetch_object($result)) {
      $data[] = $row;
   }
   $response = array(
      'status' => 1,
      'message' => 'Get nilai mahasiswa sukses.',
      'data' => $data
   );
   header('Content-Type: application/json');
   echo json_encode($response);
}

function insert_nilai() {
   global $mysqli;
   if (!empty($_POST["nim"])) {
      $data = $_POST;
   } else {
      $data = json_decode(file_get_contents('php://input'), true);
   }

   $arrcheckpost = array('nim' => '', 'kode_mk' => '', 'nilai' => '');
   $count = count(array_intersect_key($data, $arrcheckpost));
   if ($count == count($arrcheckpost)) {
      $result = mysqli_query($mysqli, "INSERT INTO perkuliahan SET
         nim = '$data[nim]',
         kode_mk = '$data[kode_mk]',
         nilai = $data[nilai]");
      if ($result) {
         $response = array(
            'status' => 1,
            'message' => 'Nilai mahasiswa berhasil ditambahkan.'
         );
      } else {
         $response = array(
            'status' => 0,
            'message' => 'Nilai mahasiswa gagal ditambahkan.'
         );
      }
   } else {
      $response = array(
         'status' => 0,
         'message' => 'Parameter Do Not Match'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}

function update_nilai($nim, $kode_mk) {
   global $mysqli;
   if (!empty($_POST["nilai"])) {
      $data = $_POST;
   } else {
      $data = json_decode(file_get_contents('php://input'), true);
   }
   
   if (!empty($data['nilai'])) {
      $nilai = intval($data['nilai']);
      $result = mysqli_query($mysqli, "UPDATE perkuliahan SET
         nilai = '$nilai'
         WHERE nim='$nim' AND kode_mk='$kode_mk'");
      if ($result) {
         $response = array(
            'status' => 1,
            'message' => 'Nilai mahasiswa berhasil diupdate.'
         );
      } else {
         $response = array(
            'status' => 0,
            'message' => 'Nilai mahasiswa gagal diupdate.'
         );
      }
   } else {
      $response = array(
         'status' => 0,
         'message' => 'Parameter Do Not Match'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}

function delete_nilai($nim, $kode_mk)
{
   global $mysqli;
   $query = "DELETE FROM perkuliahan WHERE nim='$nim' AND kode_mk='$kode_mk'";
   if (mysqli_query($mysqli, $query)) {
      $response = array(
         'status' => 1,
         'message' => 'Nilai mahasiswa berhasil dihapus.'
      );
   } else {
      $response = array(
         'status' => 0,
         'message' => 'Nilai mahasiswa gagal dihapus.'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}
