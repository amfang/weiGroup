<?php 
include 'db.php'; 

$update_sql = "UPDATE vote_item SET vote_num=vote_num+1 WHERE id=" . intval(@$_POST['id']);
$result = $mysqli->query($update_sql); 

if($result){
	echo $result;
	//$arr = array('success'=>true);
	//echo json_encode($arr);
}else{
	echo "<script>alert(\"".$update_sql."|--------|".$result."\")</script>";
}
//{"success":1}<script>alert("UPDATE vote_item SET vote_num=vote_num+1 WHERE id=42|--------|1")</script> 
$mysqli->close(); 
?>  