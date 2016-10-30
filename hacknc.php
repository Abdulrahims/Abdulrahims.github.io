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

  <div class="container">
    <div class="row">
      <div class="box">
        <div class="col-lg-12">
          <hr>
          <h2 class="intro-text text-center">HackNC</h2>
          <h2 class="intro-text text-center">
            <strong>Witty Name for Web App </strong>
          </h2>
          <hr>
        </div>
      </div>
    </div>
  </div>

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
      define('PARSE_SDK_DIR', '/src/Parse');
      require_once('parse-php-sdk-master/autoload.php');
      use Parse\ParseObject;
      use Parse\ParseQuery;
      use Parse\ParseACL;
      use Parse\ParsePush;
      use Parse\ParseUser;
      use Parse\ParseInstallation;
      use Parse\ParseException;
      use Parse\ParseAnalytics;
      use Parse\ParseFile;
      use Parse\ParseCloud;
      use Parse\ParseClient;
      $app_id = euRwXEmFdqDBKtbNmMirSspAyY8Oq06sciSjQAwM;
      $rest_key = pIhAES7l77sSvze1nUyI6esgWQPhnyeukWPOXCuN;
      $master_key = QLgIktKAS7jifq7WvmXabMGIiBCz6hxVDUvIDvWy;
      ParseClient::initialize($app_id, $rest_key, $master_key);
      ParseClient::setServerURL('https://parseapi.back4app.com', '/');
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
