
    <?php
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");
$id=$_POST['id_d'];

$sql="DELETE FROM `contact-us` WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
mysqli_close($link);

?>