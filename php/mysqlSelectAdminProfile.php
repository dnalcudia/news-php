<?php
//establecemos la conexión con la base de datos
//revisamos que se haya realizado la conexión
$link = mysqli_connect("localhost","root","","News");
if($link == false){
	$data = array();
	$data[1] = "cannot connect";
echo $_GET['jsoncallback'].' ( '.json_encode($data) . ' );';
// Close connection
mysqli_close($link);

}else{
$id = $_POST['id'];
$sql = "SELECT name, email FROM User  WHERE id='$id'";
$result = mysqli_query($link, $sql);
$data = array();
if (mysqli_num_rows($result) > 0){
	 while ($row = $result->fetch_assoc())
    {
       $data[] = $row;
    } 
	$data[1] = "Success";
	echo $_GET['jsoncallback'].' ( '.json_encode($data) . ' );';
}else{
		$data[1] = "Error: Could not find user";
		echo $_GET['jsoncallback'].' ( '.json_encode($data) . ' );';
}
	}
?>