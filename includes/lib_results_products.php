<?php

function viewProductProduct(){
	$result = mysql_query(queryViewProductProduct()) or die ("There was an error retrieving the product product: " . mysql_error());

	if (mysql_num_rows($result) > 0){
		lineBreak();
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td colspan="4"><strong>Products</strong></td>
</tr>
<tr>
<td>Product Name</td>
<td>&nbsp;</td>
</tr>
<?
		while($row = mysql_fetch_array($result)){
?>
<tr>
<td><?php echo $row['pr_type']; ?></td>
<td><a href="index.php?action=edit_product_product&product_id=<? echo $row['pr_id']; ?>">Edit</a></td>
</tr>
<?
		}
?>
</table>
<?
	}
}

function viewVendorProducts($vendor_id){
	$v_id = $vendor_id;

	$result = mysql_query(queryViewVendorProducts($v_id)) or die ("There was an error retrieving the vendor products: " . mysql_error());

	if (mysql_num_rows($result) > 0){
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td>Product Name</td>
<td>Style No</td>
<td>Width</td>
<td>Content</td>
</tr>
<?
		while($row = mysql_fetch_array($result)){
?>
<tr>
<td><a href="index.php?action=view_vendor_products_colors&vendorproducts_no=<? echo $row['vendorproducts_no']; ?>&v_id=<? echo $v_id; ?>"><? echo $row['vendorproducts_name']; ?></a></td>
<td><? echo $row['vendorproducts_no']; ?></td>
<td><? echo $row['products_width_name']; ?></td>
<td><? echo $row['products_content_name']; ?></td>
</tr>
<?
		}
?>
</table>
<?
	}
}

function viewVendorProductsColors($vendorproducts_no, $v_id){
	$result = mysql_query(queryViewVendorProductsColors($vendorproducts_no)) or die ("There was an error retrieving the products_colors: " . mysql_error() . " QUERY: " . queryViewVendorProductsColors($vendorproducts_no));

	if (mysql_num_rows($result) > 0){
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td colspan="2"><? echo getVendorProductsName($vendorproducts_no); ?></td>
</tr>
<tr>
<td>Color No</td>
<td>Color Name</td>
</tr>
<?
		while($row = mysql_fetch_array($result)){
?>
<tr>
<td><? echo $row['color_no']; ?></td>
<td><? echo $row['color_name']; ?></td>
</tr>
<?
		}
?>
</table>
<?
	}else{
		echo "No colors were added as of yet.";
	}
}


?>
