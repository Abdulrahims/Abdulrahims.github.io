<?php


include('Requests.php');
Requests::register_autoloader();
$headers = array(
'Content-Type' => 'application/json'
);
$data = '{"text": "I hate you"}';
$options = array('auth' => array('604e4b67-8d17-4838-8011-ca147f3e2d85', 'E4oX5bHo0mZB'));
$response = Requests::post('https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2016-05-19', $headers, $data, $options);


echo json_encode($response);
?>
