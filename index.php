<style>
img{
  width:200px;

}
</style>
<form enctype="multipart/form-data" method="POST">
  <input name="nom_dada" type="file">
  <input type="submit" value="Carrega el fitxero...">
</form>

<?php
if(isset($_FILES['nom_dada'])){
  move_uploaded_file($_FILES['nom_dada']['tmp_name'], "/var/www/html/ficheros/{$_FILES['nom_dada']['name']}");
}

if(isset($_GET['borrar'])){
    unlink("/var/www/html/ficheros/{$_GET['borrar']}");
}

if ($handle = opendir('/var/www/html/ficheros/')) {
    while (($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
          echo "<img src='ficheros/$file'>";
          echo "<a href=?borrar=$file>🚯</a>";
        }
    }
    closedir($handle);
}
?>
