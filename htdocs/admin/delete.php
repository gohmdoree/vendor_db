<?php
// v. 0.0001
// a. charles yoo
//

include ("../../includes/lib.php");
include ("../../includes/config.php");

dbConnect();

if (isset($_GET['v'])){

$v_id = $_GET['v'];

$query = "delete from vendor_vendor where v_id = " . $v_id . ";";
$result = mysql_query($query) or die ("There was an error deleting: " . mysql_error());

$query = "delete from vendor_url where v_id = " . $v_id . ";";
$result = mysql_query($query) or die ("There was an error deleting: " . mysql_error());

$query = "delete from vendor_product where v_id = " . $v_id . ";";
$result = mysql_query($query) or die ("There was an error deleting: " . mysql_error());

$query = "delete from vendor_phone where v_id = " . $v_id . ";";
$result = mysql_query($query) or die ("There was an error deleting: " . mysql_error());

$query = "delete from vendor_email where v_id = " . $v_id . ";";
$result = mysql_query($query) or die ("There was an error deleting: " . mysql_error());

$query = "delete from vendor_comments where v_id = " . $v_id . ";";
$result = mysql_query($query) or die ("There was an error deleting: " . mysql_error());

$query = "delete from vendor_account where v_id = " . $v_id . ";";
$result = mysql_query($query) or die ("There was an error deleting: " . mysql_error());

$query = "select c_id from vendor_contact where v_id = " . $v_id . ";";
$result = mysql_query($query) or die ("There was an error deleting: " . mysql_error());

while ($row = mysql_fetch_array($result)){
	$query_0 = "delete from contact_contact where c_id = " . $row['c_id'] . ";";
	$result_0 = mysql_query($query_0) or die ("There was an error deleting the contact: " . mysql_error());

	$query_0 = "delete from contact_email where c_id = " . $row['c_id'] . ";";
	$result_0 = mysql_query($query_0) or die ("There was an error deleting the contact: " . mysql_error());

	$query_0 = "delete from contact_phone where c_id = " . $row['c_id'] . ";";
	$result_0 = mysql_query($query_0) or die ("There was an error deleting the contact: " . mysql_error());
}
}else{
	print ("oops");
}
?>
