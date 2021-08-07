<?php 
require "functions.php";

if (isset($_POST['submit'])) {
    if (import($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya ditambah');
        document.location.href = 'import.php';
        </script>
        
        ";
    }else{
        echo "
        <script>
        alert('data tidak berjaya ditambah');
        document.location.href = 'import.php';
        </script>
        
        ";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Import data</title>
  </head>
  <body>
    <h3>Import Data</h3>
    <h3 style="background-color: aqua;">
      masukan data murid dan soalan kedalam file text kemudian import ke
      database
    </h3>
    <form action="" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Jadual</td>
          <td>
            <select name="namatable" id="namatable">
              <option value="pelajar">pelajar</option>
              <option value="soalan">Soalan</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label for="namafail">Fail</label></td>
          <td>
            <input type="file" name="namafail" id="namafail" accept=".txt" />
          </td>
        </tr>
        <tr>
          <td><button type="submit" name="submit">Import</button></td>
        </tr>
      </table>
    </form>
  </body>
</html>
