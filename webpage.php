<html>
<head>
  <title>HackNC Project!</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Basic Bootstrap Template</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Optional Bootstrap theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>

<body role="document">

  <div class="container theme-showcase" role="main">
    <div class="jumbotron">
      <form action="hacknc.php" method="POST">
      <!--<input type="text" name="input_value">
      <input class="btn btn-danger" type="submit" name="submit">-->

      <div class="row">
        <div class="col-lg-6">
          <div class="input-group">
            <input type="text" class="form-control" name ="input_value" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="submit">Go!</button>
            </span>
          </div>
        </div>
      </div>

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

    </div>
  </div>

</body>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
