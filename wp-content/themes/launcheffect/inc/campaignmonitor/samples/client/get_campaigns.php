<?php

require_once '../../csrest_clients.php';

$wrap = new CS_REST_Clients(
	'ClientID to get Campaigns for', 
    'Your API Key');

$result = $wrap->get_campaigns();

echo "Result of /api/v3/clients/{id}/campaigns\n<br />";
if($result->was_successful()) {
    echo "Got campaigns\n<br /><pre>";
    var_dump($result->response);
} else {
    echo 'Failed with code '.$result->http_status_code."\n<br /><pre>";
    var_dump($result->response);
}
echo '</pre>';