<?php

##############################################
## $flag 
##	0 : all vendors
##	1 : domestic
##	2 : international
##	3 : open vendors
##	4 : closed vendors
##############################################
function listVendors($flag){
	$result = mysql_query(queryListVendors($flag)) or die ("There was an error listing the vendor records: " . mysql_error());
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td><strong>Vendor Name</strong></td>
</tr>
<?
	while ($row = mysql_fetch_array($result)){
?>
<tr>
<td><?php if ($row['vs_id'] == 2) echo "<strike><strong>"; ?><a href="index.php?action=view_vendor&vendor_id=<?php echo $row['v_id']; ?>"><?php echo $row['v_name']; ?></a><?php if ($row['vs_id'] == 2) echo "</strong></strike>"; ?></td>
</tr>
<?
	}
?>
</table>
<?
}

// view Vendor

function viewVendorDetails($vendor_id){
	$v_id = $vendor_id;
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<?
	// these functions don't include table tags because we want to include in the 
	// vendor name and address block
	showVendorAccountNumber($v_id, 0);
	showVendorNameAddress($v_id, 0);
	showVendorPhone($v_id, 0);
	showVendorEmail($v_id, 0);
	showVendorURL($v_id, 0);
	showVendorStatus($v_id, 0);
?>
</table>
<?
	showVendorComments($v_id, 0);
	showVendorProducts($v_id, 0);
	showVendorContacts($v_id, 0);
}

function viewVendor($vendor_id){
	$v_id = $vendor_id;
?>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td valign="top"><? viewVendorDetails($v_id); ?></td>
<td>&nbsp;</td>
<td valign="top"><? viewVendorProducts($v_id); ?></td>
</tr>
</table>
<?
}

###################################################
##
## $flag is for which version of function
##  	0 = for individual
##	1 = for print version
##
###################################################
function showVendorAccountNumber($v_id, $flag){
       	$result = mysql_query(queryGetVendorAccountNumber($v_id)) or die ("There was an error retrieving the vendor account number: " . mysql_error() . " QUERY: " . queryGetVendorAccountNumber($v_id));

	if (mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)){
			if ($flag == 0){
?>
<tr>
<td width="75"><strong>Account No.</strong></td>
<td><?php echo $row['v_account']; ?></td>
<td><a href="index.php?action=edit_vendor_account&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
       			}else{	
?>
<tr><td>Account Number #<?php echo $row['v_account']; ?></td></tr>
<?
			}
		}
	}
}

function showVendorNameAddress($v_id, $flag){
        $address_flag = 0;
	
	$result = mysql_query(queryGetVendorDetails($v_id)) or die ("There was an error retrieving the vendor: " . mysql_error());
        while($row = mysql_fetch_array($result)){
        	$vc_id = $row['vc_id'];

		if ($flag == 0){
?>              
<tr>
<td width="75"><strong>Name</strong></td>
<td><?php echo $row['v_name']; ?></td>
<?
			if (!$row['v_street0']){
?>
<td><a href="index.php?action=edit_vendor_name&vendor_id=<? echo $v_id; ?>">Edit</a>&nbsp;<a href="index.php?action=add_vendor_address&vendor_id=<? echo $v_id; ?>">Add Address</a></td>
<?
			}else{
?>
<td><a href="index.php?action=edit_vendor_name&vendor_id=<? echo $v_id; ?>">Edit</a></td>
<?
			}
?>
</tr>
<?
       		 	if ($row['v_dba']){
?>      
<tr>
<td width="75"><strong>DBA</strong></td>
<td><?php echo $row['v_dba']; ?></td>
<td>&nbsp;</td>
</tr>   
<?
       		 	}

        		if ($row['v_street0']){
?>
<tr>
<td width="75"><strong>Address</strong></td>
<td><?php echo $row['v_street0']; ?></td>
<td><a href="index.php?action=edit_vendor_address&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
        		}else{
			}

			if ($row['v_street1']){
?>
<tr>    
<td>&nbsp;</td>
<td><?php echo $row['v_street1']; ?></td>
<td>&nbsp;</td>
</tr>
<?
        		} 

			if ($row['v_street2']){
?>
<tr>
<td>&nbsp;</td>
<td><?php echo $row['v_street2']; ?></td>
<td>&nbsp;</td>
</tr>
<?
        		} 

			// assume the logic if we have the city, we'll have the state as well
        		if ($row['v_city']){
?>
<tr>    
<td>&nbsp;</td>
<td>
<?
	        		if ($row['v_state']){
	                		echo $row['v_city'] . ", " . $row['v_state'];
	        		}else if ($row['v_province']){
	                		echo $row['v_city'] . ", " . $row['v_province'];
	        		}else{
	                		echo $row['v_city'];
	        		}	
	        	
				if ($row['v_postal']){
	                		echo " " . formatPostal($row['v_postal'], $row['vc_id']);
	        		}
?>
</td>
<td>&nbsp;</td>
</tr>           
<tr>    
<td>&nbsp;</td> 
<td><?php echo $row['vc_name']; ?></td>
<td>&nbsp;</td> 
</tr>   
<?
        		}else{
				$address_flag = 1;
			}
		}else{
?>
<tr><td><strong><?php echo $row['v_name']; ?></strong></td></tr>
<?
                	if ($row['v_dba']){
?>
<tr><td><?php echo $row['v_dba']; ?></td></tr>
<?
			}
			// for usa addresses
                	if ($row['vc_name'] == "USA"){
                        	if ($row['v_street0']){
?>
<tr><td>
<?
					echo $row['v_street0'];

                                	if ($row['v_street1']){
                                        	echo ", " . $row['v_street1'];
                                	}
?>
</td></tr>
<?
                        	}
                        	if ($row['v_street2']){
?>
<tr><td><?php echo $row['v_street2']; ?></td></tr>
<?
                        	}
			// for non usa
                	}else{
                        	if ($row['v_street0']){
?>
<tr><td><?php echo $row['v_street0']; ?></td></tr>
<?
                        	}
                        	if ($row['v_street1']){
?>
<tr><td><?php echo $row['v_street1']; ?></td></tr>
<?
                        	}
                        	if ($row['v_street2']){
?>
<tr><td><?php echo $row['v_street2']; ?></td></tr>
<?
                        	}
                	}

                	// assume the logic if we have the city, we'll have the state as well
                	if ($row['v_city']){
?>
<tr><td>
<?
                        	if ($row['v_state']){
                               	 	echo $row['v_city'] . ", " . $row['v_state'];
                        	}else if ($row['v_province']){
                                	echo $row['v_city'] . ", " . $row['v_province'];
                        	}else{
                                	echo $row['v_city'];
                        	}

                        	if ($row['v_postal']){
                                	echo " " . formatPostal($row['v_postal'], $row['vc_id']);
                        	}
?>
</td></tr>
<?
                        	if ($row['vc_name'] != "USA"){
?>
<tr><td><?php echo $row['vc_name']; ?></td></tr>
<?
                        	}
                	}
		}
	}

	if ($address_flag == 1){
	}
}

function showVendorPhone($v_id, $flag){
	$result = mysql_query(queryGetVendorPhone($v_id)) or die ("There was an error retrieving the vendor phone: " . mysql_error());

	if (mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)){
			if($flag == 0){	
?>
<tr>
<td width="75"><strong>Phone</strong></td>
<td>
<?
				formatPhone($row['v_phone_num'], $row['v_phone_ext'], $row['vc_id'], $row['p_type'], 0);
?>
</td>
<td><a href="index.php?action=edit_vendor_phone&vendorphone_id=<? echo $row['vp_id']; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
			}else{
?>
<tr><td>
<?
                                formatPhone($row['v_phone_num'], $row['v_phone_ext'], $row['vc_id'], $row['p_type'], 1);
?>
</td></tr>
<?
			}	
		}
	}
}

function showVendorEmail($v_id, $flag){
        $result = mysql_query(queryGetVendorEmail($v_id)) or die ("There was an error retrieving the vendor email: " . mysql_error());

        if (mysql_num_rows($result) > 0){
                while($row = mysql_fetch_array($result)){
			if($flag == 0){
?>
<tr>
<td width="75"><strong>Email</strong></td>
<td><a href="mailto:<?php echo $row['v_email']; ?>"><?php echo $row['v_email']; ?></a></td>
<td><a href="index.php?action=edit_vendor_email&vendoremail_id=<? echo $row['ve_id']; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
			}else{
?>
<tr><td><a href="mailto:<?php echo $row['v_email']; ?>"><?php echo $row['v_email']; ?></a></td></tr>
<?
			}
		}
        }
}

function showVendorURL($v_id, $flag){
        $result = mysql_query(queryGetVendorURL($v_id)) or die ("There was an error retrieving the vendor url: " . mysql_error());                                           
	if (mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)){
			if($flag == 0){
?>
<tr> 
<td width="75"><strong>URL</strong></td>
<td><a href="http://<?php echo $row['v_url']; ?>">http://<?php echo $row['v_url']; ?>/</a></td>
<td><a href="index.php?action=edit_vendor_url&vendorurl_id=<? echo $row['vu_id']; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>   
<?
			}else{
?>
<tr><td><? echo $row['v_url']; ?></td></tr>
<?
			}
		}
        }       
}

function showVendorStatus($v_id){
        $result = mysql_query(queryGetVendorStatus($v_id)) or die ("There was an error retrieving the vendor status : " . mysql_error());                                           
	$row = mysql_fetch_array($result);
?>
<tr>
<td><strong>Status</strong></td>
<td colspan="2"><?php echo $row['vs_type']; ?></td>
</tr>
<?
}

function showVendorComments($v_id, $flag){
	$result = mysql_query(queryGetVendorComments($v_id)) or die ("There was an error retrieving the vendor comments: " . mysql_error());

	if (mysql_num_rows($result) > 0){
		if($flag == 0){
			lineBreak();
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<?
			while($row = mysql_fetch_array($result)){
?>
<tr>
<td valign="top"><strong>Comments</strong></td>
<td><pre><?php echo $row['v_comments']; ?></pre></td>
<td><a href="index.php?action=edit_vendor_comments&vendorcomment_id=<? echo $row['vendorcomment_id']; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
			}
?>
</table>
<?
		}else{
			lineBreak();
?>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<?
			while($row = mysql_fetch_array($result)){
?>
<tr>
<td><pre><?php echo $row['v_comments']; ?></pre></td>
</tr>
<?
                        }
?>
</table>
<?
                }
	}
}

function showAllVendorComments(){
	$result = mysql_query(queryGetAllVendorComments()) or die ("There was an error retrieving the vendor comments: " . mysql_error());

	if (mysql_num_rows($result) > 0){
		lineBreak();
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<?
		while($row = mysql_fetch_array($result)){
?>
<tr>
<td valign="top"><a href="index.php?action=view_vendor&vendor_id=<?php echo $row['v_id']; ?>"><? echo $row['v_id']; ?></a></td>
<td><pre><?php echo $row['v_comments']; ?></pre></td>
</tr>
<?
		}
?>
</table>
<?
	}
}

function showVendorProducts($v_id, $flag){
	$result = mysql_query(queryGetVendorProducts($v_id)) or die ("There was an error retrieving the vendor products: " . mysql_error());

	if (mysql_num_rows($result) > 0){
		if($flag == 0){
			lineBreak();
?>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td colspan="4"><strong>Products</strong></td>
</tr>
<tr>
<td>Product</td>
<td>Cost per Yard</td>
<td>Minimum Yardage</td>
<td>&nbsp;</td>
</tr>
<?
			while($row = mysql_fetch_array($result)){
?>
<tr>
<td><?php echo $row['pr_type']; ?></td>
<td>
<?
				if($row['pr_cost'] == 0.00){
					echo "N/A";
				}else{
					echo "$" . $row['pr_cost'];
				}
?>
</td>
<td>
<?
				if($row['pr_minimum'] == 0){
					echo "N/A";
				}else{
					echo $row['pr_minimum'];
				}
?>
</td>
<td><a href="index.php?action=edit_vendor_product&vendorproduct_id=<? echo $row['vpr_id']; ?>&vendor_id=<? echo $v_id; ?>">Edit</a></td>
</tr>
<?
			}
?>
</table>
<?
		}else{
			lineBreak();
?>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>Product</td>
<td>&nbsp;</td>
<td>Cost per Yard</td>
<td>&nbsp;</td>
<td>Minimum Yardage</td>
</tr>
<?
                        while($row = mysql_fetch_array($result)){
?>
<tr>
<td><?php echo $row['pr_type']; ?></td>
<td>&nbsp;</td>
<td>
<?
                                if($row['pr_cost'] == 0.00){
                                        echo "N/A";
                                }else{
                                        echo "$" . $row['pr_cost'];
                                }
?>
</td>
<td>&nbsp;</td>
<td>
<?
				if($row['pr_minimum'] == 0){
				        echo "N/A";
			        }else{
			                echo $row['pr_minimum'];
			        }
		
			}
?>
</td>
</tr>
</table>
<?
		}
	}
}

// view All vendors

function viewAllVendors(){
	$result = mysql_query(queryViewAllVendors()) or die ("There was an error retrieving the vendor: " . mysql_error());
	        
        if ($row = mysql_num_rows($result) > 0){                   
		while ($row = mysql_fetch_array($result)){
			$v_id = $row['v_id'];
			$vc_id = $row['vc_id'];

			lineBreak();
?>
<table width="1024" cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td valign="top" width="400">
<table cellpadding="0" cellspacing="0" border="0" class="General">
<?
			showVendorAccountNumber($v_id, 1);
			showVendorNameAddress($v_id, 1);
			showVendorPhone($v_id, 1);
			showVendorEmail($v_id, 1);
			showVendorURL($v_id, 1);
?>
</table>
<?
			lineBreak();
			listVendorContacts($v_id, 1);			
			lineBreak();
?>
</td>
<td valign="top" width="600">
<?
			lineBreak();
			showVendorProducts($v_id, 1);
			lineBreak();
			showVendorComments($v_id, 1);
?>
</td>
</tr>
</table>
<?
		}
	}
}

?>
