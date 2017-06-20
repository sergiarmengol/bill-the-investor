<?

if($_POST) {
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	$company = new Company();
	$success = $company->add($_POST);

} else {
	
}


