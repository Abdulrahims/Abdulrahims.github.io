<html>
<head>
<title>HackNC Project!</title>
</head>

<body>

<form action="hacknc.php" method="POST">
<input type="text" name="input_value">
<input type="submit" name="submit">

<?php
if (isset($_POST['submit']))
  {
 	 // Execute this code if the submit button is pressed.
 	 $input = $_POST['input_value'];
 	 
	include('Requests.php');
	Requests::register_autoloader();
	$headers = array(
	'Content-Type' => 'application/json'
	);
	$data = '{"text": "I hate you"}';
	$json = array('text' => $input);
  	$json_data = json_encode($json);
  
	$options = array('auth' => array('604e4b67-8d17-4838-8011-ca147f3e2d85', 'E4oX5bHo0mZB'));
	$response = Requests::post('https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2016-05-19', $headers, $json_data, $options);


	echo json_encode($response);
  
  
  
  
  
  }
?>

<!-- 
<input type="text" id="inputtext" value="hey">

  <button onclick="myFunction()">Display</button>
  <div id="test"></div>

  <script>
  function myFunction() {
      var input = document.getElementById("input").value;
      document.getElementById('test').innerHTML = input;
  }
  </script>
 -->

</body>




</html>
