<?php 
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

$ClassName=$_REQUEST['ClassName_V'];


        $Q="SELECT * FROM `classes_booking` WHERE class_name='$ClassName'";
        $resA=mysqli_query($link,$Q);
        while($rowQ=mysqli_fetch_assoc($resA)){
?>
<tr>
  <td><?php echo $rowQ['name']; ?></td>
  <td><?php echo $rowQ['lastname']; ?></td>
  <td><?php echo $rowQ['email']; ?></td>
  <td><?php echo $rowQ['phone']; ?></td>

</tr>

  <?php  }
        ?>