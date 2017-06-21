<?

if($_POST) {
	$company = new Company();
	$success = $company->add($_POST);

} else {
	
}


