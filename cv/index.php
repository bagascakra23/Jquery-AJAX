<!DOCTYPE html>
<html>
<head>
 <title>AJAX</title>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function() { 
      $("#formMhs").submit(function(e) {
          e.preventDefault();
          $.ajax({
              url: 'simpan-data.php',
              type: 'post',
              data: $(this).serialize(),             
              success: function(data) {               
              document.getElementById("formMhs").reset();
              $('#status').html(data);              
              }
          });
      });
  })
 </script>
</head>
<body>
<h1>Curriculum Vitae</h1>
<h4>Nama lengkap  : Bagas cakra wiradana</h4>
<h4>Tanggal lahir : 5 februari 1999</h4>
<h4>Asal kota     : Surabaya</h4>
<h4>Agama         : Islam</h4>
<h4>Hobby         : Sepak bola</h4>
<h1>Education</h1>
<form id="formMhs" method="POST">
 <table>
  <tr>
   <td>Institution</td>
   <td><input type="text" name="institusi" id="institusi"></td>
  </tr>
  <tr>
   <td>Tahun</td>
   <td><input type="text" name="tahun" id="tahun"></td>
  </tr>
  <tr>
   <td></td>
   <td>
    <input type="submit" name="simpan" id="simpan" value="Simpan">
   </td>
  </tr>
 </table>
</form>
<div id="status"></div>
<?php  
  $dbServer = 'localhost';
  $dbUser = 'root';
  $dbPass = '';
  $dbName = "db_curriculumvitae";
  
  $conn = mysqli_connect($dbServer, $dbUser, $dbPass);
  mysqli_select_db($conn,$dbName);
        if (isset($_POST['simpan'])) {  
          $query = "SELECT * FROM tb_education"; 
          $result =mysqli_query($conn,$query);  
        } 
        else { 
          $result = mysqli_query($conn,"SELECT * FROM tb_education"); 
        } 
?> 
<div class="tabel"> 
        <table border="1" width="100%"> 
            <tr> 
                <th>Institusi</th> 
                <th>Tahun</th> 
            </tr> 
 
            <?php while($data = mysqli_fetch_array($result)): ?> 
                <tr> 
                    <td><?php echo $data['institusi'];  ?></td> 
                    <td><?php echo $data['tahun'];  ?></td> 
                </tr> 
            <?php endwhile ?> 
        </table> 
</div> 
</body>

</html>