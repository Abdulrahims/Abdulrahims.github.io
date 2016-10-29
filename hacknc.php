<html>
<head>
<title>Title of the document</title>
</head>

<body>

Name: <input type="text" id="input" value="I hate you.">

<button onclick="myFunction()">Display</button>
<div id="test"></div>

<script>
function myFunction() {
    var input = document.getElementById("input").value;
    document.getElementById('test').innerHTML = input;
}
</script>


</body>

<?php
  $strhtml = '<!doctype html>';
  $dochtml = new DOMDocument();
  $dochtml -> loadHTML($strhtml);
  $input = $dochtml->getElementById('input');
  $input = "I hate you";

  include('Requests.php');
  Requests::register_autoloader();
  $headers = array(
  'Content-Type' => 'application/json'
  );
  $data = '{"text": "'.json_encode($input).'"}';

  $json = array('text' => $input);
  $json_data = json_encode($json);


  $options = array('auth' => array('604e4b67-8d17-4838-8011-ca147f3e2d85', 'E4oX5bHo0mZB'));
  $response = Requests::post('https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2016-05-19', $headers, $json_data, $options);


  echo json_encode($response);
?>





</html>
