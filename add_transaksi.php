<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id_pesanan = $_POST['id_pesanan'];
  $nama_pembeli = $_POST['nama_pembeli'];
  $stok = $_POST['stok'];
  $tgl_kadarluasa = $_POST['tgl_kadarluasa'];
  $jenis = $_POST['jenis'];
  $nama_obat = $_POST['nama_obat'];
  $harga = $_POST['harga'];

$query = "INSERT INTO TRANSAKSI (ID_PESANAN,NAMA_PEMBELI,STOK,TGL_KADARLUASA,JENIS,NAMA_OBAT,HARGA) VALUES ('".$id_pesanan."','".$nama_pembeli."','".$stok."','".$tgl_kadarluasa."','".$jenis."','".$nama_obat."','".$harga."')";
  $statement = oci_parse($con,$query);
  $r = oci_execute($statement,OCI_DEFAULT);
   $res = oci_commit($con);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Berhasil ditambahkan'); 
  window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Gagal ditambahkan');
  window.location.href='transaksi.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}