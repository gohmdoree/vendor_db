<?php

function addVendorForm(){
?>
<form method="post" action="index.php" name="form_vendor">
<table cellspacing="0" cellpadding="0" border="1" class="General">
<tr>
<td colspan="2"><strong>Vendors</strong></td>
</tr>
<tr>
<td>Vendor Name</td>
<td><input type="text" name="v_name" value=""/></td>
</tr>
<tr>
<td>Vendor Street</td>
<td><input type="text" name="v_street0" value=""/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="text" name="v_street1" value=""/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="text" name="v_street2" value=""/></td>
</tr>
<tr>
<td>Vendor City</td>
<td><input type="text" name="v_city" value=""/></td>
</tr>
<tr>
<td>Vendor State</td>
<td><input type="text" name="v_state" value=""/></td>
</tr>
<tr>
<td>Vendor Province</td>
<td><input type="text" name="v_province" value=""/></td>
</tr>
<tr>
<td>Vendor Zip</td>
<td><input type="text" name="v_postal" value=""/></td>
</tr>
<tr>
<td>Vendor Country</td>
<td>
<select name="vc_id">
<option value=""></option>
<?
		$result = mysql_query(querySelectCountryCountry()) or die ("There was an error retrieving the country code: " . mysql_error());

		while($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['vc_id']; ?>"<? if ($row['vc_name'] == "USA") echo " selected"; ?>><? echo $row['vc_name']; ?></option>
<?
		}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor"/></td>
</tr>
</table>
</form>
<?
}

function addProductProductForm(){
	$result = mysql_query(querySelectProductProduct()) or die ("There was an error listing the product products: " . mysql_error());
?>
<form method="post" action="index.php" name="form_add_vendor_product">
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>Product Types</td>
<td>
<select name=pr_id>
<option value=""></option>
<?
	while ($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['pr_id']; ?>"><? echo $row['pr_type']; ?></option>
<?
	}
?>
</select>
</td>
</tr>
</table>
</form>

<form method="post" action="index.php" name="form_add_product_product">
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>New Product Type</td>
<td><input type="text" name="pr_type" value=""/></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add New Product"/></td>
</tr>
</table>
</form>
<?
}

function addVendorProductForm($vendor_id){
	$v_id = $vendor_id;

	$result = mysql_query(querySelectProductProduct()) or die ("There was an error listing the vendor products: " . mysql_error());
?>
<form method="post" action="index.php" name="form_add_vendor_product">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>Product Type</td>
<td>
<select name=pr_id>
<option value=""></option>
<?
	while ($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['pr_id']; ?>"><? echo $row['pr_type']; ?></option>
<?
	}
?>
</select>
</td>
</tr>
<tr>
<td>Product Cost</td>
<td><input type="text" name="pr_cost" value=""/></td>
</tr>
<tr>
<td>Product Minimum</td>
<td><input type="text" name="pr_minimum" value=""/></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor Product"/></td>
</tr>
</table>
</form>
<?
}

function addVendorProductsForm($vendor_id){
	$v_id = $vendor_id;

	$result_width = mysql_query(querySelectProductsWidth()) or die ("There was an error listing the products width: " . mysql_error());
	$result_content = mysql_query(querySelectProductsContent()) or die ("There was an error listing the products content: " . mysql_error());
	$result_country = mysql_query(querySelectProductsCountry()) or die ("There was an error listing the products country: " . mysql_error());
?>
<form method="post" action="index.php" name="form_add_vendor_products">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td>Product Style Number</td>
<td>&nbsp;</td>
<td><input type="text" name="vendorproducts_no" size="9" maxlength="9" value=""/></td>
</tr>
<tr>
<td>Product Style Name</td>
<td>&nbsp;</td>
<td><input type="text" name="vendorproducts_name" size="35" maxlength="255" value=""/></td>
</tr>
<tr>
<td>Product Width</td>
<td>
<select name="products_width_no">
<option value=""></option>
<?
	while ($row = mysql_fetch_array($result_width)){
?>
<option value="<? echo $row['products_width_no']; ?>"><? echo $row['products_width_name']; ?></option>
<?
	}
?>
</select>
</td>
<td><input type="text" name="products_width_name" size="9" maxlength="9" value=""/></td>
</tr>
<tr>
<td>Product Content</td>
<td>
<select name="products_content_no">
<option value=""></option>
<?
	while ($row = mysql_fetch_array($result_content)){
?>
<option value="<? echo $row['products_content_no']; ?>"><? echo $row['products_content_name']; ?></option>
<?
	}
?>
</select>
</td>
<td><input type="text" name="products_content_name" size="55" maxlength="55" value=""/></td>
</tr>
<tr>
<td>Product Origin</td>
<td>
<select name="products_country_no">
<option value=""></option>
<?
	while ($row = mysql_fetch_array($result_origin)){
?>
<option value="<? echo $row['products_country_no']; ?>"><? echo $row['products_country_name']; ?></option>
<?
	}
?>
</select>
</td>
<td><input type="text" name="products_country_name" size="35" maxlength="35" value=""/></td>
</tr>
<tr>
<td colspan="3" align="right"><input type="submit" name="submit" value="Add Vendor Products"/></td>
</tr>
</table>
</form>
<?
}

function addVendorProductsColorsForm($vendorproducts_no, $v_id){
	$result = mysql_query(querySelectVendorProducts($vendorproducts_no)) or die ("There was an error listing the vendors_products: " . mysql_error());

	while ($row = mysql_fetch_array($result)){
		$vendorproducts_name = $row['vendorproducts_name'];
	}
?>
<form method="post" action="index.php" name="form_add_vendor_products">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<input type="hidden" name="vendorproducts_no" value="<? echo $vendorproducts_no; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><? echo $vendorproducts_name; ?></td>
</tr>
<tr>
<td>Color No</td>
<td><input type="text" name="color_no" size="9" maxlength="9" value=""/></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Color Name</td>
<td><input type="text" name="color_name" size="30" maxlength="30" value=""/></td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor Products Colors"/></td>
</tr>
</table>
</form>
<?
}

function addVendorCommentsForm($vendor_id){
	$v_id = $vendor_id;
?>
<form method="post" action="index.php" name="form_add_vendor_product">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>Vendor Comments</td>
<td><textarea name="v_comments"></textarea></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor Comments"/></td>
</tr>
</table>
</form>
<?
}

function addVendorAccountForm($vendor_id){
	$v_id = $vendor_id;
?>
<form method="post" action="index.php" name="form_vendor_account">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Account Number</strong></td>
</tr>
<tr>
<td>Vendor Account Number</td>
<td><input type="text" name="v_account" value=""/></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Add Vendor Account"/></td>
</tr>
</table>
</form>
<?
}

function addVendorAddressForm($vendor_id){
	$result = mysql_query(queryEditVendorNameForm($vendor_id)) or die ("There was an error: " . mysql_error() . " QUERY: " . queryEditVendorNameForm($vendor_id));
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php" name="form_vendor">
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellspacing="0" cellpadding="0" border="1" class="General">
<tr>
<td colspan="2"><strong>Vendors</strong></td>
</tr>
<tr>
<td>Vendor Name</td>
<td><? echo $row['v_name']; ?></td>
</tr>
<?
	if ($row['v_dba']){
?>
<tr>
<td>Vendor DBA</td>
<td><? echo $row['v_dba']; ?></td>
</tr>
<?
	}
?>
<tr>
<td>Vendor Street</td>
<td><input type="text" name="v_street0" value=""/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="text" name="v_street1" value=""/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="text" name="v_street2" value=""/></td>
</tr>
<tr>
<td>Vendor City</td>
<td><input type="text" name="v_city" value=""/></td>
</tr>
<tr>
<td>Vendor State</td>
<td><input type="text" name="v_state" value=""/></td>
</tr>
<tr>
<td>Vendor Province</td>
<td><input type="text" name="v_province" value=""/></td>
</tr>
<tr>
<td>Vendor Zip</td>
<td><input type="text" name="v_postal" value=""/></td>
</tr>
<tr>
<td>Vendor Country</td>
<td>
<select name="vc_id">
<option value=""></option>
<?
		$result = mysql_query(querySelectCountryCountry()) or die ("There was an error retrieving the country code: " . mysql_error());

		while($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['vc_id']; ?>"<? if ($row['vc_name'] == "USA") echo " selected"; ?>><? echo $row['vc_name']; ?></option>
<?
		}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor Address"/></td>
</tr>
</table>
</form>
<?
}

function addVendorPhoneForm($vendor_id){
	$v_id = $vendor_id;

	$result = mysql_query(querySelectVendorCountry($v_id)) or die ("There was an error retrieving the phone type: " . mysql_error());
	$row = mysql_fetch_array($result);
	$vc_id = $row['vc_id'];
?>
<!-- vendor phone form //-->
<form method="post" action="index.php" name="form_vendor_phone">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Phone</strong></td>
</tr>
<tr>
<td>Vendor Phone</td>
<td>
<input type="text" name="v_phone_num" size="14" maxlength="14" value=""/>&nbsp;
&nbsp;x<input type="text" name="v_phone_ext" size="5" maxlength="5" value=""/>&nbsp;
</tr>
<tr>
<td>Phone Type</td>
<td><select name="p_id">
<option value=""></option>
<?
	$result = mysql_query(querySelectPhoneType()) or die ("There was an error retrieving the phone type: " . mysql_error());
	
	while($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['p_id']; ?>"<? if ($row['p_type'] == "Business") echo " selected"; ?>><? echo $row['p_type']; ?></option>
<?
	}
?>
</select></td>
</tr>
<tr>
<td>Country Code</td>
<td><select name="vc_id">
<option value=""></option>
<?
	$result = mysql_query(querySelectCountryCountry()) or die ("There was an error retrieving the country code: " . mysql_error());

	while($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['vc_id']; ?>" <? if ($row['vc_id'] == $vc_id) echo " selected"; ?>><? echo $row['country_abbreviation']; ?></option>
<?
	}
?>
</select>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor Phone"/></td>
</tr>
</table>
</form>
<?
}

function addVendorEmailForm($vendor_id){
	$v_id = $vendor_id;
?>
<!-- vendor email form //-->
<form method="post" action="index.php" name="form_vendor_email">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Email</strong></td>
</tr>
<tr>
<td>Vendor Email</td>
<td><input type="text" name="v_email" value=""/></td>
</tr>
<tr>
<td>Email Type</td>
<td><select name="e_id">
<option value=""></option>
<?
        $result = mysql_query(querySelectEmailType()) or die ("There was an error retrieving the email type: " . mysql_error());
		        
        while($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['e_id']; ?>"<? if ($row['e_type'] == "Business") echo " selected"; ?>><? echo $row['e_type']; ?></option>
<?
        }
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor Email"/></td>
</tr>
</table>
</form>
<?
}

function addVendorURLForm($vendor_id){
	$v_id = $vendor_id;
?>
<!-- vendor email form //-->
<form method="post" action="index.php" name="form_vendor_url">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor URL</strong></td>
</tr>
<tr>
<td>Vendor URL</td>
<td><input type="text" name="v_url" value=""/></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor URL"/></td>
</tr>
</table>
</form>
<?
}

function changeVendorStatusForm($vendor_id){
	$v_id = $vendor_id;

	$result = mysql_query(queryGetVendorStatusID($v_id)) or die ("There was an error retrieving the vendor status id: " . mysql_error());
	$row = mysql_fetch_array($result);
	$vs_id = $row['vs_id'];
?>
<!-- vendor status form //-->
<form method="post" action="index.php" name="form_vendor_status">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Status</strong></td>
</tr>
<tr>
<td>Vendor Status</td>
<td>
<select name="vs_id">
<option value=""></option>
<?
	$result = mysql_query(querySelectVendorStatus()) or die ("There was an error in retrieving the vendor status: " . mysql_error());

	while ($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['vs_id']; ?>"<? if ($row['vs_id'] == $vs_id) echo " selected"; ?>><? echo $row['vs_type']; ?></option>
<?
	}
?>
</select>
</td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Change Vendor Status"/></td>
</tr>
</table>
</form>
<?
}

function addVendorContactForm($vendor_id){
	$v_id = $vendor_id;
?>
<!-- contact form //-->
<form method="post" action="index.php" name="form_contact">
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Contact</strong></td>
</tr>
<tr>
<td>Contact First</td>
<td><input type="text" name="c_first" value=""/></td>
</tr>
<tr>
<td>Contact Last</td>
<td><input type="text" name="c_last" value=""/></td>
</tr>
<tr>
<td>Contact Type</td>
<td><select name="ct_id">
<option value=""></option>
<?
        $result = mysql_query(querySelectContactType()) or die ("There was an error retrieving the contact type: " . mysql_error());

        while($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['ct_id']; ?>"<? if($row['ct_type'] == "Sales") echo " selected"; ?>><? echo $row['ct_type']; ?></option>
<?
	}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Vendor Contact"/></td>
</tr>
</table>
</form>
<?
}

function addContactPhoneForm($contact_id, $vendor_id){
        $c_id = $contact_id;
	$v_id = $vendor_id;
?>
<!-- vendor phone form //-->
<form method="post" action="index.php" name="form_contact_phone">
<input type="hidden" name="c_id" value="<? echo $c_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Contact Phone</strong></td>
</tr>
<tr>
<td>Contact Phone</td>
<td>
<input type="text" name="c_phone_num" size="14" maxlength="14" value=""/>&nbsp;
&nbsp;x<input type="text" name="c_phone_ext" size="7" maxlength="7" value=""/>&nbsp;
</tr>
<tr>
<td>Phone Type</td>
<td><select name="p_id">
<option value=""></option>
<?
        $result = mysql_query(querySelectPhoneType()) or die ("There was an error retrieving the phone type: " . mysql_error());

        while($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['p_id']; ?>"<? if ($row['p_type'] == "Business") echo " selected"; ?>><? echo $row['p_type']; ?></option>
<?
        }
?>
</select></td>
</tr>
<tr>
<td>Country Code</td>
<td><select name="vc_id">
<option value=""></option>
<?
	$result = mysql_query(querySelectCountryCountry()) or die ("There was an error retrieving the country code: " . mysql_error()); 

        while($row = mysql_fetch_array($result)){
	// change unique identifier to vc_id
?>
<option value="<? echo $row['vc_id']; ?>" <? if ($row['vc_id'] == 1) echo " selected"; ?>><? echo $row['country_abbreviation']; ?></option>
<?
        }
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Contact Phone"/></td>
</tr>
</table>
</form>
<?
}

function addContactEmailForm($contact_id, $vendor_id){
	$c_id = $contact_id;
	$v_id = $vendor_id;
?>
<!-- vendor email form //-->
<form method="post" action="index.php" name="form_contact_email">
<input type="hidden" name="c_id" value="<? echo $c_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $v_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Contact Email</strong></td>
</tr>
<tr>
<td>Contact Email</td>
<td><input type="text" name="c_email" value=""/></td>
</tr>
<tr>
<td>Email Type</td>
<td><select name="e_id">
<option value=""></option>
<?
        $result = mysql_query(querySelectEmailType()) or die ("There was an error retrieving the email type: " . mysql_error());
		     
        while($row = mysql_fetch_array($result)){
?>
<option value="<? echo $row['e_id']; ?>"<? if($row['e_id'] == 1){ echo " selected"; }?>><? echo $row['e_type']; ?></option>
<?
	}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Add Contact Email"/></td>
</tr>
</table>
</form>
<?
}

function editVendorAccountForm($vendor_id){
	$result = mysql_query(queryGetVendorAccountNumber($vendor_id)) or die ("Select from vendor_vendor failed: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>Vendor Account</td>
<td><input type="text" name="v_account" value="<? echo $row['v_account']; ?>"/></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Account"/></td>
</tr>
</table>
</form>
<?
}

function editVendorNameForm($vendor_id){
	$result = mysql_query(queryEditVendorNameForm($vendor_id)) or die ("Select from vendor_vendor failed: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>Vendor Name</td>
<td><input type="text" name="v_name" value="<? echo $row['v_name']; ?>"/></td>
</tr>
<tr>
<td>Vendor DBA</td>
<td><input type="text" name="v_dba" value="<? echo $row['v_dba']; ?>"/></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Name"/></td>
</tr>
</table>
</form>
<?
}

function editVendorAddressForm($vendor_id){
	$result = mysql_query(queryEditVendorAddressForm($vendor_id)) or die ("Select from vendor_vendor failed: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td>Vendor Address</td>
<td><input type="text" name="v_street0" value="<? echo $row['v_street0']; ?>"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="text" name="v_street1" value="<? echo $row['v_street1']; ?>"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="text" name="v_street2" value="<? echo $row['v_street2']; ?>"/></td>
</tr>
<tr>
<td>Vendor City</td>
<td><input type="text" name="v_city" value="<? echo $row['v_city']; ?>"/></td>
</tr>
<tr>
<td>Vendor State</td>
<td><input type="text" name="v_state" value="<? echo $row['v_state']; ?>"/></td>
</tr>
<tr>
<td>Vendor Province</td>
<td><input type="text" name="v_province" value="<? echo $row['v_province']; ?>"/></td>
</tr>
<tr>
<td>Vendor Postal</td>
<td><input type="text" name="v_postal" value="<? echo $row['v_postal']; ?>"/></td>
</tr>
<tr>
<td>Vendor Country</td>
<td>
<select name="vc_id">
<option value=""></option>
<?
        $result = mysql_query(querySelectCountryCountry()) or die ("There was an error retrieving the country code: " . mysql_error());

        while($row2 = mysql_fetch_array($result)){
?>
<option value="<? echo $row2['vc_id']; ?>"<? if ($row2['vc_id'] == $row['vc_id']) echo " selected"; ?>><? echo $row2['vc_name']; ?></option>
<?
	}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Address"/></td>
</tr>
</table>
</form>
<?
}

function editVendorPhoneForm($vendorphone_id, $vendor_id){
	$result = mysql_query(queryEditVendorPhoneForm($vendorphone_id)) or die ("There was an error retrieving the vendor_phone: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="vp_id" value="<? echo $vendorphone_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Phone</strong></td>
</tr>
<tr>
<td>Vendor Phone</td>
<td>
<input type="text" name="v_phone_num" size="14" maxlength="14" value="<? echo $row['v_phone_num']; ?>"/>&nbsp;
&nbsp;x<input type="text" name="v_phone_ext" size="5" maxlength="5" value="<? echo $row['v_phone_ext']; ?>"/>&nbsp;
</tr>
<tr>
<td>Phone Type</td>
<td><select name="p_id">
<option value=""></option>
<?
	$result2 = mysql_query(querySelectPhoneType()) or die ("There was an error retrieving the phone type: " . mysql_error());
	
	while($row2 = mysql_fetch_array($result2)){
?>
<option value="<? echo $row2['p_id']; ?>"<? if ($row2['p_id'] == $row['p_id']) echo " selected"; ?>><? echo $row2['p_type']; ?></option>
<?
	}
?>
</select></td>
</tr>
<tr>
<td>Country Code</td>
<td><select name="vc_id">
<option value=""></option>
<?
	$result3 = mysql_query(querySelectCountryCountry()) or die ("There was an error retrieving the country code: " . mysql_error());

	while($row3 = mysql_fetch_array($result3)){
?>
<option value="<? echo $row3['vc_id']; ?>" <? if ($row3['vc_id'] == $row['vc_id']) echo " selected"; ?>><? echo $row3['country_abbreviation']; ?></option>
<?
	}
?>
</select>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Phone"/></td>
</tr>
</table>
</form>
<?
}

function editVendorEmailForm($vendoremail_id, $vendor_id){
	$result = mysql_query(queryEditVendorEmailForm($vendoremail_id)) or die ("There was an error retrieving the email: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="ve_id" value="<? echo $vendoremail_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Email</strong></td>
</tr>
<tr>
<td>Vendor Email</td>
<td><input type="text" name="v_email" value="<? echo $row['v_email']; ?>"/></td>
</tr>
<tr>
<td>Email Type</td>
<td><select name="e_id">
<option value=""></option>
<?
        $result2 = mysql_query(querySelectEmailType()) or die ("There was an error retrieving the email type: " . mysql_error());
		        
        while($row2 = mysql_fetch_array($result2)){
?>
<option value="<? echo $row2['e_id']; ?>"<? if ($row2['e_id'] == $row['e_id']) echo " selected"; ?>><? echo $row2['e_type']; ?></option>
<?
        }
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Email"/></td>
</tr>
</table>
</form>
<?
}

function editVendorURLForm($vendorurl_id, $vendor_id){
	$result = mysql_query(queryEditVendorURLForm($vendorurl_id)) or die ("There was an error retrieving the url: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="vu_id" value="<? echo $vendorurl_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor URL</strong></td>
</tr>
<tr>
<td>Vendor URL</td>
<td><input type="text" name="v_url" value="<? echo $row['v_url']; ?>"/></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor URL"/></td>
</tr>
</table>
</form>
<?
}

function editVendorCommentsForm($vendorcomment_id, $vendor_id){
	$result = mysql_query(queryEditVendorCommentsForm($vendorcomment_id)) or die ("There was an error retrieving from vendor_comments: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="vendorcomment_id" value="<? echo $vendorcomment_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Comments</strong></td>
<td>Comment Date</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><textarea name="v_comments"><? echo $row['v_comments']; ?></textarea></td>
<td valign="top"><? echo $row['date']; ?></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Comments"/></td>
</tr>
</table>
</form>
<?
}

function editProductProductForm($product_id){
	$pr_id = $product_id;

	$result = mysql_query(queryEditProductProductForm($product_id)) or die ("There was an error retrieving from product_product: " . mysql_error());
?>
<form method="post" action="index.php">
<input type="hidden" name="pr_id" value="<? echo $pr_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td colspan="3"><strong>Product Product</strong></td>
</tr>
<tr>
<td>Product Name</td>
</tr>
<?
	while($row = mysql_fetch_array($result)){

?>
<tr>
<td><input type="text" name="pr_type" size="50" maxlen="50" value='<? echo $row['pr_type']; ?>'/></td>
</tr>
<?
	}
?>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Product Product"/></td>
</tr>
</table>
</form>
<?
}

####################################################
### Todo: 	Display when no values for cost per yard and minimum yardage as N/A
###		* if, submitted as N/A, then don't add back to database, because reads
###		  as 0.00
###		* if, want to change product name, enter into new form?
###		* alternative, is to set product names permanent, meaning only accessible
###		  via an admin form, will have to change existing add vendor product form
####################################################
function editVendorProductForm($vendorproduct_id, $vendor_id){
	$result = mysql_query(queryEditVendorProductForm($vendorproduct_id)) or die ("There was an error retrieving from vendor_product: " . mysql_error());
?>
<form method="post" action="index.php">
<input type="hidden" name="vpr_id" value="<? echo $vendorproduct_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="1" class="General">
<tr>
<td colspan="3"><strong>Vendor Product</strong></td>
</tr>
<tr>
<td>Product</td>
<td>Cost per Yard</td>
<td>Minimum Yardage</td>
</tr>
<?
	while($row = mysql_fetch_array($result)){

?>
<tr>
<td><input type="text" name="pr_type" value="<? echo $row['pr_type']; ?>"/></td>
<td><input type="text" name="pr_cost" value="<? echo $row['pr_cost']; ?>"/></td>
<td><input type="text" name="pr_minimum" value="<? echo $row['pr_minimum']; ?>"/></td>
</tr>
<?
	}
?>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Product"/></td>
</tr>
</table>
</form>
<?
}

function editVendorContactForm($contact_id, $vendor_id){
	$result = mysql_query(queryEditVendorContactForm($contact_id)) or die ("There was an error retrieving the contact_contact: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php" name="form_contact">
<input type="hidden" name="c_id" value="<? echo $contact_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Vendor Contact</strong></td>
</tr>
<tr>
<td>Contact First</td>
<td><input type="text" name="c_first" value="<? echo $row['c_first']; ?>"/></td>
</tr>
<tr>
<td>Contact Last</td>
<td><input type="text" name="c_last" value="<? echo $row['c_last']; ?>"/></td>
</tr>
<tr>
<td>Contact Type</td>
<td><select name="ct_id">
<option value=""></option>
<?
        $result1 = mysql_query(querySelectContactType()) or die ("There was an error retrieving the contact type: " . mysql_error());

        while($row1 = mysql_fetch_array($result1)){
?>
<option value="<? echo $row1['ct_id']; ?>"<? if($row1['ct_id'] == $row['ct_id']) echo " selected"; ?>><? echo $row1['ct_type']; ?></option>
<?
	}
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Contact"/></td>
</tr>
</table>
</form>
<?
}

function editVendorContactPhoneForm($contact_id, $contactphone_id, $vendor_id){
	$result = mysql_query(queryEditVendorContactPhoneForm($contactphone_id)) or die ("There was an error retrieving the contact_phone: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="c_id" value="<? echo $contact_id; ?>"/>
<input type="hidden" name="cp_id" value="<? echo $contactphone_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Contact Phone</strong></td>
</tr>
<tr>
<td>Contact Phone</td>
<td>
<input type="text" name="c_phone_num" size="14" maxlength="14" value="<? echo $row['c_phone_num']; ?>"/>&nbsp;
&nbsp;x<input type="text" name="c_phone_ext" size="5" maxlength="5" value="<? echo $row['c_phone_ext']; ?>"/>&nbsp;
</tr>
<tr>
<td>Phone Type</td>
<td><select name="p_id">
<option value=""></option>
<?
	$result2 = mysql_query(querySelectPhoneType()) or die ("There was an error retrieving the phone type: " . mysql_error());
	
	while($row2 = mysql_fetch_array($result2)){
?>
<option value="<? echo $row2['p_id']; ?>"<? if ($row2['p_id'] == $row['p_id']) echo " selected"; ?>><? echo $row2['p_type']; ?></option>
<?
	}
?>
</select></td>
</tr>
<tr>
<td>Country Code</td>
<td><select name="vc_id">
<option value=""></option>
<?
	$result3 = mysql_query(querySelectCountryCountry()) or die ("There was an error retrieving the country code: " . mysql_error());

	while($row3 = mysql_fetch_array($result3)){
?>
<option value="<? echo $row3['vc_id']; ?>" <? if ($row3['vc_id'] == $row['vc_id']) echo " selected"; ?>><? echo $row3['country_abbreviation']; ?></option>
<?
	}
?>
</select>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Contact Phone"/></td>
</tr>
</table>
</form>
<?

}

function editVendorContactEmailForm($contact_id, $contactemail_id, $vendor_id){
	$ce_id = $contactemail_id;
	$result = mysql_query(queryEditVendorContactEmailForm($ce_id)) or die ("There was an error retrieving the contact email: " . mysql_error());
	$row = mysql_fetch_array($result);
?>
<form method="post" action="index.php">
<input type="hidden" name="c_id" value="<? echo $contact_id; ?>"/>
<input type="hidden" name="ce_id" value="<? echo $contactemail_id; ?>"/>
<input type="hidden" name="v_id" value="<? echo $vendor_id; ?>"/>
<table cellpadding="0" cellspacing="0" border="0" class="General">
<tr>
<td colspan="2"><strong>Contact Email</strong></td>
</tr>
<tr>
<td>Contact Email</td>
<td><input type="text" name="c_email" value="<? echo $row['c_email']; ?>"/></td>
</tr>
<tr>
<td>Email Type</td>
<td><select name="e_id">
<option value=""></option>
<?
        $result2 = mysql_query(querySelectEmailType()) or die ("There was an error retrieving the email type: " . mysql_error());
		        
        while($row2 = mysql_fetch_array($result2)){
?>
<option value="<? echo $row2['e_id']; ?>"<? if ($row2['e_id'] == $row['e_id']) echo " selected"; ?>><? echo $row2['e_type']; ?></option>
<?
        }
?>
</select></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="Update Vendor Contact Email"/></td>
</tr>
</table>
</form>
<?
}

?>
