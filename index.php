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
  <link rel="stylesheet" href="https:/maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
</head>

<body role="document">

  <div class="container">
    <div class="row">
      <div class="box">
        <div class="col-lg-12">
          <hr>
          <h2 class="intro-text text-center">
            <strong>Hate Rate<span class="fa fa-comments fa-fw" style="color: #4286f4"></span></strong>
          </h2>
          <h4 class="intro-text text-center">Created at <a href="https://hacknc.com/">HackNC</a> by Nadeen Saleh, Abdul Sheikhnureldin and Sydney Paul</h2>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="container theme-showcase" role="main">
    <div class="jumbotron">
      <form action="index.php" method="POST">
      <!--<input type="text" name="input_value">
      <input class="btn btn-danger" type="submit" name="submit">-->

      <div class="row">
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" class="form-control" name ="input_value" id='chatinput' placeholder="I hate you.">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="submit">Detect</button>
            </span>
          </div>
        </div>
        <div class="col-md-6">
          <div class='printchatbox' id='printchatbox' style="font-family: 'Source Code Pro', monospace;"><?php echo $_POST['input_value']?></div>
        </div>
      </div>
      <br>

    </div>
  </div>


  <div id="viz"></div>

  <!-- load D3js -->
  <script src="//d3plus.org/js/d3.js"></script>

  <!-- load D3plus after D3js -->
  <script src="//d3plus.org/js/d3plus.js"></script>

  <?php
  if (isset($_POST['submit']))
    {
      $input = $_POST['input_value'];
      include('Requests.php');
      Requests::register_autoloader();
      $headers = array(
      'Content-Type' => 'application/json'
      );
      $json = array('text' => $input);
      $json_data = json_encode($json);
      $options = array('auth' => array('604e4b67-8d17-4838-8011-ca147f3e2d85', 'E4oX5bHo0mZB'));
      $response = Requests::post('https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2016-05-19', $headers, $json_data, $options);
      $response = json_encode($response);
      $temp = json_decode($response, true);
      function GetBetween($content,$start,$end)
      {
          $r = explode($start, $content);
          if (isset($r[1])){
              $r = explode($end, $r[1]);
              return $r[0];
          }
          return '';
      }
     $body = (string) $temp["body"];
     $first = '"tones":';
     $second = ',"category_id"';
     $json_body = GetBetween($body, $first, $second);
     //echo $json_body;

     $json_body_array  = json_decode($json_body, true);
     $anger = json_encode($json_body_array[0]['score']);
     $disgust = json_encode($json_body_array[1]['score']);
     $fear = json_encode($json_body_array[2]['score']);
     $joy = json_encode($json_body_array[3]['score']);
     $sadness = json_encode($json_body_array[4]['score']);

     //echo $json_body[0];
     
    
	require 'autoload.php';

	$ml = new MonkeyLearn\Client('90371eb556920fd7e5cf6c5e29e6c800f7ae3ce2');
	$text_list = array($json_data);
	$module_id = 'cl_PowZgnKy';
	$res = $ml->classifiers->classify($module_id, $text_list, true);
	var_dump($res->result);

     
     
     
  }
  ?>

  <script>
    var inputBox = document.getElementById('chatinput');
    inputBox.onkeyup = function(){
        document.getElementById('printchatbox').innerHTML = inputBox.value;
    }
    // sample data array
    var anger = <?php echo json_encode($anger);?>;
    var disgust = <?php echo json_encode($disgust);?>;
    var fear = <?php echo json_encode($fear);?>;
    var joy = <?php echo json_encode($joy);?>;
    var sadness = <?php echo json_encode($sadness);?>;
    var sample_data = [
      {"value": anger * 100, "name": "Anger", "group": "Tones Detected"},
      {"value": disgust * 100, "name": "Disgust", "group": "Tones Detected"},
      {"value": fear * 100, "name": "Fear", "group": "Tones Detected"},
      {"value": joy * 100, "name": "Joy", "group": "Tones Detected"},
      {"value": sadness * 100, "name": "Sadness", "group": "Tones Detected"}
    ]
    // instantiate d3plus
    var visualization = d3plus.viz()
      .container("#viz")     // container DIV to hold the visualization
      .data(sample_data)     // data to use with the visualization
      .type("bubbles")       // visualization type
      .id(["group", "name"]) // nesting keys
      .depth(1)              // 0-based depth
      .size("value")         // key name to size bubbles
      .color("name")        // color by each group
      .draw()                // finally, draw the visualization!
      
      
      
      
      
      
  </script>
  
 
  
  
  

</body>
