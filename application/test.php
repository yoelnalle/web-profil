?php
  require_once 'core/init.php';
  global $link;

  $id = $_POST['ids'];

  $query1   = "SELECT * FROM penjualan WHERE id='$id'";
  $result1  = mysqli_query($link, $query1);

  if ($result1) {
    while ($row = mysqli_fetch_assoc($result1)) {
      $gambar = $row['gambar'];
    }
  }

  $query  = "DELETE FROM penjualan WHERE id='$id'";
  $result = mysqli_query($link, $query);

  if ($result) {
    unlink('asset/'.$gambar);
    echo "Berhasil";
  }else{
    echo "Gagal";
  }
?>