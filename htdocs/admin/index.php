<?php
// v. 0.0001
// a. charles yoo
//
// todo: 1. add product, select product list
//       2. search functionality
// 	 3. add data checking
//
//
//

include ("../../../includes/vendors/lib.php");
include ("../../../includes/vendors/lib_queries.php");
include ("../../../includes/vendors/lib_forms.php");
include ("../../../includes/vendors/lib_results_products.php");
include ("../../../includes/vendors/lib_format.php");
include ("../../../includes/vendors/config_vendors.php");

dbConnect();

include ("includes/header.php");
include ("includes/menu_default.php");

if (isset($_GET['action'])){
	// #####################################
	// ### ADD PRODUCT PRODUCT
	// ###
	if ($_GET['action'] == "add_product_product"){

		addProductProductForm();

	// #####################################
	// ### VIEW PRODUCT PRODUCT
	// ###
	}else if ($_GET['action'] == "view_product_product"){

		viewProductProduct();

	// #####################################
	// ### EDIT PRODUCT PRODUCT
	// ###
	}else if ($_GET['action'] == "edit_product_product"){
		$pr_id = $_GET['product_id'];

		editProductProductForm($pr_id);
	}
}else if (isset($_POST['submit'])){
	// #####################################
	// ### ADD VENDOR PRODUCT ###
	// ###
	if ($_POST['submit'] == "Add New Product"){
		$pr_type = $_POST['pr_type'];

		addProductProduct($pr_type);

		viewProductProduct();
	// #####################################
	// ### EDIT VENDOR PRODUCT ###
	// ###
	}else if ($_POST['submit'] == "Update Product Product"){
		$pr_id = $_POST['pr_id'];
		$pr_type = $_POST['pr_type'];

		editProductProduct($pr_id, $pr_type);

		viewProductProduct();
	}
// #####################################
// ### DEFAULT ###
// ###
}else{
}
include ("includes/footer.php");
?>
