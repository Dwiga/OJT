<?php
require_once dirname(__FILE__) . "/ojtadmin/koneksi.php";
$sql = "SELECT * FROM cmb";
$tampil = mysql_query($sql);
while ($tampilkan = mysql_fetch_array($tampil)) { ?>
<a href="editpendaftaran.php?id=<?php echo $tampilkan['idcmb'];?>" class="btn btn-success">Edit</a>
<?php
}
?>