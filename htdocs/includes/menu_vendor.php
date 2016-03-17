<br/><br/>
<table cellpadding="0" cellspacing="0" border="1">
<tr>
<td>
<a href="index.php?action=add_vendor_account&vendor_id=<?php echo $v_id; ?>">Add Vendor Account</a><br/>
<?
	if ($address_flag == 1){
?>
<a href="index.php?action=add_vendor_address&vendor_id=<?php echo $v_id; ?>">Add Vendor Address</a><br/>
<?
	}
?>
<a href="index.php?action=add_vendor_phone&vendor_id=<?php echo $v_id; ?>">Add Vendor Phone</a><br/>
<a href="index.php?action=add_vendor_email&vendor_id=<?php echo $v_id; ?>">Add Vendor Email</a><br/>
<a href="index.php?action=add_vendor_url&vendor_id=<?php echo $v_id; ?>">Add Vendor URL</a><br/>
<a href="index.php?action=add_vendor_product&vendor_id=<?php echo $v_id; ?>">Add Vendor Product</a><br/>
<a href="index.php?action=add_vendor_products&vendor_id=<?php echo $v_id; ?>">Add Vendor Products</a><br/>
<a href="index.php?action=add_vendor_comments&vendor_id=<?php echo $v_id; ?>">Add Vendor Comments</a><br/>
<a href="index.php?action=change_vendor_status&vendor_id=<?php echo $v_id; ?>">Change Vendor Status</a><br/>
<a href="index.php?action=add_vendor_contact&vendor_id=<?php echo $v_id; ?>">Add Vendor Contact</a><br/>
<a href="index.php?action=list_vendor_contact&vendor_id=<?php echo $v_id; ?>">List Vendor Contacts</a><br/>
</td>
</tr>
</table>
