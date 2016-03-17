<?php

error_reporting (E_ALL ^ E_NOTICE);

function dbConnect(){
	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die('could not connect to mysql database. ' . mysql_error());

	mysql_select_db(SQL_DB, $conn);

	return $conn;
}

function addVendor($v_name, $v_dba, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id){
	$result = mysql_query(queryAddVendor($v_name, $v_dba, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id)) or die ("There was an error with addVendor(): " . mysql_error() . " QUERY: " . queryAddVendor($v_name, $v_dba, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id));
        $v_id = mysql_insert_id();

        return mysql_insert_id();
}

function addVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id){
	$result = mysql_query(queryAddVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id)) or die ("There was an error with addVendorAddress(): " . mysql_error() . " QUERY: " . queryAddVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id));
}

function addVendorAccount($v_id, $v_account){
	$result = mysql_query(queryAddVendorAccount($v_id, $v_account)) or die ("There was an error with addVendorAccount(): " . mysql_error() . " QUERY: " . queryAddVendorAccount($v_id, $v_account));
}

function addVendorPhone($v_id, $vc_id, $v_phone_num, $v_phone_ext, $p_id){
	$result = mysql_query(queryAddVendorPhone($v_id, $vc_id, $v_phone_num, $v_phone_ext, $p_id)) or die ("There was an error with addVendorPhone(): " . mysql_error() . " QUERY: " . queryAddVendorPhone($v_id, $vc_id, $v_phone_num, $v_phone_ext, $p_id));
}

function addVendorEmail($v_id, $v_email, $e_id){
	$result = mysql_query(queryAddVendorEmail($v_id, $v_email, $e_id)) or die ("There was an error with addVendorEmail(): " . mysql_error() . " QUERY: " . queryAddVendorEmail($v_id, $v_email, $e_id));
}

function addVendorURL($v_id, $v_url){
	$result = mysql_query(queryAddVendorURL($v_id, $v_url)) or die ("There was an error with addVendorURL(): " . mysql_error() . " QUERY: " . queryAddVendorURL($v_id, $v_url));
}

function changeVendorStatus($v_id, $vs_id){
	$result = mysql_query(queryChangeVendorStatus($v_id, $vs_id)) or die ("There was an error with changeVendorStatus(): " . mysql_error() . " QUERY: " . queryChangeVendorStatus($v_id, $vs_id));
}

function addProductProduct($pr_type){
	$result = mysql_query(queryAddProductProduct($pr_type)) or die ("There was an error with addProductProduct(): " . mysql_error() . " QUERY: " . queryAddProductProduct($pr_type));
}

function addVendorProduct($v_id, $pr_id, $pr_type, $pr_cost, $pr_minimum){
        if ($pr_cost){
        }else{
		$pr_cost = "0.00";
        }

        if ($pr_minimum){
        }else{
                $pr_minimum = 0;
        }

        if ($pr_id){
                $result = mysql_query(queryAddVendorProduct($v_id, $pr_id, $pr_type, $pr_cost, $pr_minimum)) or die ("There was an error with addVendorProduct(): " . mysql_error() . " QUERY: " . queryAddVendorProduct($v_id, $pr_id, $pr_type, $pr_cost, $pr_minimum));
#######################
# old code
#######################
#        }else if ($pr_type){
#                $result = mysql_query(queryAddProductProduct($pr_type)) or die ("There was an error creating the new vendor product: " . mysql_error());
#                $pr_id = mysql_insert_id();
#
#                $result1 = mysql_query(queryAddVendorProduct($v_id, $pr_id, $pr_type, $pr_cost, $pr_minimum)) or die ("There was an error inserting the vendor product: " . mysql_error());
        }
}

function addVendorProducts($vendorproducts_no, $vendorproducts_name, $v_id, $products_width_no, $products_content_no, $products_country_no){
	$result = mysql_query(queryInsertVendorProducts($vendorproducts_no, $vendorproducts_name, $v_id, $products_width_no, $products_content_no, $products_country_no)) or die ("There was an error inserting into vendor_products: " . mysql_error() . " QUERY: " . queryInsertVendorProducts($vendorproducts_no, $vendorproducts_name, $v_id, $products_width_no, $products_content_no, $products_country_no));
}

function addVendorProductsColors($vendorproducts_no, $color_no, $color_name){
	$result = mysql_query(queryInsertVendorProductsColors($vendorproducts_no, $color_no, $color_name)) or die ("There was an error inserting into products_colors: " . mysql_error() . " QUERY: " . queryInsertVendorProductsColors($vendorproducts_no, $color_no, $color_name));
}

function addProductsWidth($products_width_name){
	$result = mysql_query(queryInsertProductsWidth($products_width_name)) or die ("There was an error inserting into products_width: " . mysql_error() . " QUERY: " . queryInsertProductsWidth($products_width_name));

	$products_width_no = mysql_insert_id();

	return $products_width_no;
}

function addProductsContent($products_content_name){
	$result = mysql_query(queryInsertProductsContent($products_content_name)) or die ("There was an error inserting into products_content: " . mysql_error() . " QUERY: " . queryInsertProductsContent($products_content_name));

	$products_content_no = mysql_insert_id();

	return $products_content_no;
}

function addProductsCountry($products_country_name){
	$result = mysql_query(queryInsertProductsCountry($products_country_name)) or die ("There was an error inserting into products_country: " . mysql_error() . " QUERY: " . queryInsertProductsCountry($products_country_name));

	$products_country_no = mysql_insert_id();

	return $products_country_no;
}

function addVendorComments($v_id, $v_comments){
	$result = mysql_query(queryAddVendorComments($v_id, $v_comments)) or die ("There was an error with addVendorComments(): " . mysql_error() . " QUERY: " . queryAddVendorComments($v_id, $v_comments));
}

function addVendorContact($v_id, $c_first, $c_last, $ct_id){
        $result = mysql_query(queryAddContactContact($c_first, $c_last, $ct_id)) or die ("There was an error with addVendorContact_1(): " . mysql_error() . " QUERY: " . queryAddContactContact($c_first, $c_last, $ct_id));
        $c_id = mysql_insert_id();

        $result2 = mysql_query(queryAddVendorContact($v_id, $c_id)) or die ("There was an error with addVendorContact_2(): " . mysql_error() . " QUERY: " . queryAddVendorContact($v_id, $c_id));
					                
        return $c_id;
}

function addContactPhone($c_id, $vc_id, $c_phone_num, $c_phone_ext, $p_id){
        $result = mysql_query(queryAddContactPhone($c_id, $vc_id, $c_phone_num, $c_phone_ext, $p_id)) or die ("There was an error with addContactPhone(): " . mysql_error() . " QUERY: " . queryAddContactPhone($c_id, $vc_id, $c_phone_num, $c_phone_ext, $p_id));
}

function addContactEmail($c_id, $c_email, $e_id){
        $result = mysql_query(queryAddContactEmail($c_id, $c_email, $e_id)) or die ("There was an error with addContactEmail(): " . mysql_error() . " QUERY: " . queryAddContactEmail($c_id, $c_email, $e_id));
}

function deleteVendorProduct($v_id, $pr_id){
	$result = mysql_query(queryDeleteVendorProduct($v_id, $pr_id)) or die ("There was an error with deleteVendorProduct(): " . mysql_error() . " QUERY: " . queryDeleteVendorProduct($v_id, $pr_id));
}

function deleteVendorContact($v_id, $c_id){
	$result = mysql_query(queryDeleteVendorContact($v_id, $c_id)) or die ("There was an error with deleteVendorContact(): " . mysql_error() . " QUERY: " . queryDeleteVendorContact($v_id, $c_id));
}

function editVendorAccount($v_id, $v_account){
	$result = mysql_query(queryEditVendorAccount($v_id, $v_account)) or die ("There was an error with editVendorAccount(): " . mysql_error() . " QUERY: " . queryEditVendorAccount($v_id, $v_account));
}

function editVendorName($v_id, $v_name, $v_dba){
	$result = mysql_query(queryEditVendorName($v_id, $v_name, $v_dba)) or die ("There was an error editVendorName(): " . mysql_error() . " QUERY: " . queryEditVendorName($v_id, $v_name, $v_dba));
}

function editVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id){
	$result = mysql_query(queryEditVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id)) or die ("There was an error with editVendorAddress(): " . mysql_error() . " QUERY: " . queryEditVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id));
}

function editVendorPhone($vp_id, $v_phone_num, $v_phone_ext, $p_id, $vc_id){
	$result = mysql_query(queryEditVendorPhone($vp_id, $v_phone_num, $v_phone_ext, $p_id, $vc_id)) or die ("There was an error with editVendorPhone(): " . mysql_error() . " QUERY: " . queryEditVendorPhone($vp_id, $v_phone_num, $v_phone_ext, $p_id, $vc_id));
}

function editVendorEmail($ve_id, $v_email, $e_id){
	$result = mysql_query(queryEditVendorEmail($ve_id, $v_email, $e_id)) or die ("There was an error with editVendorEmail(): " . mysql_error() . " QUERY: " . queryEditVendorEmail($ve_id, $v_email, $e_id));
}

function editVendorURL($vu_id, $v_url){
	$result = mysql_query(queryEditVendorURL($vu_id, $v_url)) or die ("There was an error with editVendorURL(): " . mysql_error() . " QUERY: " . queryEditVendorURL($vu_id, $v_url));
}

function editVendorComments($vendorcomment_id, $v_comments){
	$result = mysql_query(queryEditVendorcomments($vendorcomment_id, $v_comments)) or die ("There was an error with editVendorComments(): " . mysql_error() . " QUERY: " . queryEditVendorcomments($vendorcomment_id, $v_comments));
}

function editVendorContact($c_id, $c_first, $c_last, $ct_id){
	$result = mysql_query(queryEditVendorContact($c_id, $c_first, $c_last, $ct_id)) or die ("There was an error with editVendorContact(): " . mysql_error() . " QUERY: " . queryEditVendorContact($c_id, $c_first, $c_last, $ct_id));
}

function editVendorContactPhone($cp_id, $c_id, $c_phone_num, $c_phone_ext, $p_id, $vc_id){
	$result = mysql_query(queryEditVendorContactPhone($cp_id, $c_id, $c_phone_num, $c_phone_ext, $p_id, $vc_id)) or die ("There was an error with editVendorContactPhone(): " . mysql_error() . " QUERY: " . queryEditVendorContactPhone($cp_id, $c_id, $c_phone_num, $c_phone_ext, $p_id, $vc_id));
}

function editVendorContactEmail($ce_id, $c_id, $c_email, $e_id){
	$result = mysql_query(queryEditVendorContactEmail($ce_id, $c_id, $c_email, $e_id)) or die ("There was an error with editVendorContactEmail(): " . mysql_error() . " QUERY: " . queryEditVendorContactEmail($ce_id, $c_id, $c_email, $e_id));
}

function editProductProduct($pr_id, $pr_type){
	$result = mysql_query(queryEditProductProduct($pr_id, $pr_type)) or die ("There was an error with editProductProduct(): " . mysql_error() . " QUERY: " . queryEditProductProduct($pr_id, $pr_type));
}

function vendorProductsNoExists($vendorproducts_no){
	$result = mysql_query(querySelectVendorProductsNo($vendorproducts_no)) or die ("There was an error selecting from vendor_products: " . mysql_error() . " QUERY: " . querySelectVendorProductsNo($vendorproducts_no));
	
	if (mysql_num_rows($result) == 0){
		return 0;
	}else{
		return 1;
	}
}

function productsWidthExists($products_width_name){
	$result = mysql_query(querySelectProductsWidth($products_width_name)) or die ("There was an error selecting from products_width: " . mysql_error() . " QUERY: " . querySelectProductsWidth($products_width_name));

	if (mysql_num_rows($result) == 0){
		return 0;
	}else{
		return 1;
	}
}

function productsContentExists($products_content_name){
	$result = mysql_query(querySelectProductsContent($products_content_name)) or die ("There was an error selecting from products_content: " . mysql_error() . " QUERY: " . querySelectProductsContent($products_content_name));

	if (mysql_num_rows($result) == 0){
		return 0;
	}else{
		return 1;
	}
}

function productsCountryExists($products_country_name){
	$result = mysql_query(querySelectProductsCountry($products_country_name)) or die ("There was an error selecting from products_country: " . mysql_error() . " QUERY: " . querySelectProductsCountry($products_country_name));

	if (mysql_num_rows($result) == 0){
		return 0;
	}else{
		return 1;
	}
}

function getVendorProductsName($vendorproducts_no){
	$result = mysql_query(queryGetVendorProductsName($vendorproducts_no)) or die ("There was an error selecting from vendor_products: " . mysql_error() . " QUERY: " . queryGetVendorProductsName($vendorproducts_no));

	while ($row = mysql_fetch_array($result)){
		$vendorproducts_name = $row['vendorproducts_name'];
	}

	return $vendorproducts_name;
}

function getProductsWidthNo($products_width_name){
	$result = mysql_query(querySelectProductsWidth($products_width_name)) or die ("There was an error selecting from products_width: " . mysql_error() . " QUERY: " . querySelectProductsWidth($products_width_name));

	while ($row = mysql_fetch_array($result)){
		$products_width_no = $row['products_width_no'];
	}

	return $products_width_no;
}

function getProductsContentNo($products_content_name){
	$result = mysql_query(querySelectProductsContent($products_content_name)) or die ("There was an error selecting from products_content: " . mysql_error() . " QUERY: " . querySelectProductsContent($products_content_name));

	while ($row = mysql_fetch_array($result)){
		$products_content_no = $row['products_content_no'];
	}

	return $products_content_no;
}

function getProductsCountryNo($products_country_name){
	$result = mysql_query(querySelectProductsCountry($products_country_name)) or die ("There was an error selecting from products_country: " . mysql_error() . " QUERY: " . querySelectProductsCountry($products_country_name));

	while ($row = mysql_fetch_array($result)){
		$products_country_no = $row['products_country_no'];
	}

	return $products_country_no;
}

?>
