<?

switch ($app->url[1]) {
    case 'newExchange' : 
       	$exchange = new Exchange();
        $success = $exchange->add($_POST);

        if($success == true) {
            echo json_encode(array("response"=>success,"data"=>$_POST));
        }
    break;

    
}