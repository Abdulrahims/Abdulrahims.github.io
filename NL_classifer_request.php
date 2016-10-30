<?php
  $input = $_POST['input_value'];
  include('Requests.php');
  Requests::register_autoloader();
  $headers = array(
  'Content-Type' => 'application/json'
  );
  $json = array('text' => $input);
  $json_data = json_encode($json);
  $options = array('auth' => array('3922c26a-1b04-43cc-8a4b-9ebbc259de94', 'KVKYro4QMaVQ'));
  $response = Requests::post('https://gateway.watsonplatform.net/natural-language-classifier/api/v1/classifiers/10D41B-nlc-1/classify', $headers, $json_data, $options);
  $response = json_encode($response);
  echo $response;
?>
