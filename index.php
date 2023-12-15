<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="bg-light" style="font-family: Arial, sans-serif;">
  <div class="container mt-5 text-center ">
    <h1 class="m-3">Data Siswa</h1>
    <a href="form_simpan.php" class="btn btn-primary m-3   ">Tambah Data</a><br><br>

    <table border=" 1" width="80%" class="table table-light table-striped table-hover text-center">
      <tr>
        <th>Foto</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      // Load file koneksi.php
      include "koneksi.php";
      // Buat query untuk menampilkan semua data siswa
      $sql = $pdo->prepare("SELECT * FROM siswa");
      $sql->execute(); // Eksekusi querynya
      while ($data = $sql->fetch()) { // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td><img src='images/" . $data['foto'] . "' alt='Foto' width='100' height='100'></td>";
        echo "<td>" . $data['nis'] . "</td>";
        echo "<td>" . $data['nama'] . "</td>";
        echo "<td>" . $data['jenis_kelamin'] . "</td>";
        echo "<td>" . $data['telp'] . "</td>";
        echo "<td>" . $data['alamat'] . "</td>";
        echo "<td><a href='form_ubah.php?id=" . $data['id'] . "' class='btn btn-warning'>Ubah</a></td>";
        echo "<td><a href='proses_hapus.php?id=" . $data['id'] . "' class='btn btn-danger'>Hapus</a></td>";
        echo "</tr>";
      }
      ?>
    </table>
    <a href="download_pdf.php" class="btn btn-success">Download table as PDF</a>
  </div>
</body>

</html>