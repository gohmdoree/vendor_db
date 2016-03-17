<?php

#######################################
## listVendorContacts should be for just listing the vendor contacts, and linking to a viewContact
## showVendorContacts should be for during the vendorView
##
## swapped names
#######################################
function showVendorContacts($v_id, $flag){
	$result = mysql_query(queryShowVendorContacts($v_id)) or die ("There as an error retrieving the contact id's: " . mysql_error());

	if (mysql_num_rows($result) > 0){
		if($flag == 0){
			lineBreak();
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td colspan="3"><strong>Contacts</strong></td>
</tr>
<?
		}else{
			lineBreak();
?>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<?
		}

		while($row = mysql_fetch_array($result)){
        		$c_id = $row['c_id'];

		        $result0 = mysql_query(queryViewContactName($c_id)) or die ("There was an error retrieving the contact: " . mysql_error());

			while($row0 = mysql_fetch_array($result0)){
				if($flag == 0){
?>
<tr>
<td><strong><?php echo $row0['c_first'] . " " . $row0['c_last']; ?></strong> - <? echo $row0['ct_type']; ?></td>
<td><a href="index.php?action=delete_vendor_contact&vendor_id=<?php echo $v_id; ?>&contact_id=<?php echo $c_id; ?>">Delete</a></td>
<td><a href="index.php?action=edit_vendor_contact&contact_id=<? echo $c_id; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
				}else{
?>
<tr><td><em><?php echo $row0['c_first'] . " " . $row0['c_last']; ?></em></td></tr>
<?
				}
			}

		        $result1 = mysql_query(queryViewContactPhone($c_id)) or die ("There was an error retrieving the contact phone: " . mysql_error());

		        if (mysql_num_rows($result1) > 0){
		                while($row1 = mysql_fetch_array($result1)){
					$cp_id = $row1['cp_id'];
					if($flag == 0){
?>
<tr>
<td colspan="2">
<?
						formatPhone($row1['c_phone_num'], $row1['c_phone_ext'], $row1['vc_id'], $row1['p_type'], 0);
?>
</td>
<td><a href="index.php?action=edit_vendor_contact_phone&contact_phone_id=<? echo $cp_id; ?>&contact_id=<? echo $c_id; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
					}else{
?>
<tr><td>
&nbsp;&nbsp;
<?
                                                formatPhone($row1['c_phone_num'], $row1['c_phone_ext'], $row1['vc_id'], $row1['p_type'], 1);
?>
</td>
</tr>
<?
					}
		                }
		        }

			$result2 = mysql_query(queryViewContactEmail($c_id)) or die ("There was an error retrieving the contact email: " . mysql_error());

		    	if (mysql_num_rows($result2) > 0){
		                while($row2 = mysql_fetch_array($result2)){ 
					if($flag == 0){
?>
<tr>
<td colspan="2"><a href="mailto:<?php echo $row2['c_email']; ?>"><?php echo $row2['c_email']; ?></a></td>
<td><a href="index.php?action=edit_vendor_contact_email&contact_email_id=<? echo $ce_id; ?>&contact_id=<? echo $c_id; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
<tr/>
<?
					}else{
?>
<tr><td>&nbsp;&nbsp;<? echo $row_3['c_email']; ?></a></td></tr>
<?
					}
		                }
		        }
		}
?>
</table>
<?
	}
}

##############
## list Vendor Contact

function listVendorContacts($vendor_id, $flag){
	$v_id = $vendor_id;
        $result = mysql_query(queryListContacts($v_id)) or die ("There was an error listing the vendor contacts: " . mysql_error());

        if (mysql_num_rows($result) > 0){
?>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>Contact Name</td>
</tr>
<?
                while ($row = mysql_fetch_array($result)){
?>
<tr>
<td><a href="index.php?action=view_contact&contact_id=<?php echo $row['c_id']; ?>&vendor_id=<? echo $v_id; ?>">
<?
			// assume that we will always have the first name
			if ($row['c_last']){
				$name_string = $row['c_last'] . ", " . $row['c_first'];
                        }else{
                                $name_string = $row['c_first'];
                        }

                        echo $name_string . " - " . $row['ct_type'];
		}
?>
</a></td>
</tr>
</table>
<?
	}
}

function viewContact($contact_id, $vendor_id){
	$c_id = $contact_id;
	$v_id = $vendor_id;
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<?
	viewContactName($c_id, $v_id);
	viewContactPhone($c_id, $v_id);
        viewContactEmail($c_id, $v_id);
?>
</table>
<br/><br/>
<?
}

function viewContactName($contact_id, $vendor_id){
	$c_id = $contact_id;
	$v_id = $vendor_id;
        $result = mysql_query(queryViewContactName($c_id)) or die ("There was an error retrieving the contact: " . mysql_error());
        $row = mysql_fetch_array($result);
?>
<tr>
<td><?php echo $row['c_first'] . " " . $row['c_last'] . " - " . $row['ct_type']; ?></td>
<td><a href="index.php?action=edit_vendor_contact&contact_id=<? echo $c_id; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
}

function viewContactPhone($contact_id, $vendor_id){
	$c_id = $contact_id;
	$v_id = $vendor_id;
        $result = mysql_query(queryViewContactPhone($c_id)) or die ("There was an error retrieving the contact phone: " . mysql_error());

        if (mysql_num_rows($result) > 0){
                while($row = mysql_fetch_array($result)){
?>
<tr>
<td><? formatPhone($row['c_phone_num'],$row['c_phone_ext'],$row['vc_id'],$row['p_type'], 0); ?></td>
<td><a href="index.php?action=edit_vendor_contact_phone&contact_phone_id=<? echo $row['cp_id']; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
		}
	}
}

function viewContactEmail($contact_id, $vendor_id){
	$c_id = $contact_id;
	$v_id = $vendor_id;
        $result = mysql_query(queryViewContactEmail($c_id)) or die ("There was an error retrieving the contact email: " . mysql_error());

        if (mysql_num_rows($result) > 0){
                while($row = mysql_fetch_array($result)){
?>
<tr>
<td><a href="mailto:<?php echo $row['c_email']; ?>"><?php echo $row['c_email']; ?></a></td>
<td><a href="index.php?action=edit_vendor_contact_email&contact_email_id=<? echo $row['ce_id']; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
                }
	}
}

?>
