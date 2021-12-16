<?php
       $link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

  $ccid=$_POST["id_ccn"]; 
  $querid="SELECT `cardInfo` FROM `orders` WHERE id='$ccid'";
  $ccres=mysqli_query($link,$querid);
      $ccnrow=mysqli_fetch_assoc($ccres);
      $fin=explode(" ",$ccnrow['cardInfo']);
     echo" <tr>
      <th>Card Number</th>
      <th>CVV</th>
      </tr>
<tr>
<td>"." $fin[0] "."</td>
<td>"."$fin[1] "."</td>
</tr>"

?>