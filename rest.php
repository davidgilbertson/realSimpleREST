<?php
$dbcon = new PDO('mysql:host=localhost;dbname=<dbname>;charset=utf8', '<username>', '<password>');

//A REST-style setup working with the .htaccess file
$reqMeth = $_SERVER['REQUEST_METHOD'];
$requestObj = $_GET['type'];


//Routes
if ($reqMeth === 'GET') {
  $requestObj = $_GET['type'];
  $objectValue = $_GET[$requestObj];
  switch ($requestObj) {
    case 'task':
      echo json_encode(getTask($objectValue));
      break;
    //And so on. One case for each type of model
  }
}

if ($reqMeth === 'POST') {
  $requestObj = $_GET['type'];
  $post_body = file_get_contents('php://input');
  $model = json_decode($post_body, true);
  switch ($requestObj) {
    case 'task':
      echo json_encode(addTask($model));
      break;
    //And so on. One case for each type of model
  }
}
if ($reqMeth === 'PUT') {
  $requestObj = $_GET['type'];
  $post_body = file_get_contents('php://input');
  $model = json_decode($post_body, true);
  switch ($requestObj) {
    case 'task':
      echo json_encode(saveTask($model));
      break;
    //And so on. One case for each type of model
  }
}
if ($reqMeth === 'DELETE') {
  $requestObj = $_GET['type'];
  $post_body = file_get_contents('php://input');
  $model = json_decode($post_body, true);
  switch ($requestObj) {
    case 'task':
      echo json_encode(deleteTask($model));
      break;
    //And so on. One case for each type of model
  }
}



/*  --------------------------  */
/*  ----  DATA FUNCTIONS  ----  */
/*  --------------------------  */

function getTask($id) {
  global $dbcon;
  try {

    //Get the task

    $response['success'] = 'Got the task';
    $response['data'] = $model;
  } catch (Exception $e) {
    $response['error'] = $e -> getMessage();
  }
  return $response;
}

function addTask($model) {
  global $dbcon;
  try {

    //Do what you need to do with the data
    //Including getting the newly created ID and adding it to the model to return to the client

    $response['success'] = 'Task created';
    $response['data'] = $model;
  } catch (Exception $e) {
    $response['error'] = $e -> getMessage();
  }
  return $response;
}

function saveTask($model) {
  global $dbcon;
  try {

    //Do what you need to do with the data
    //Including getting the newly created ID and adding it to the model to return to the client

    $response['success'] = 'Task saved';
    $response['data'] = $model;
  } catch (Exception $e) {
    $response['error'] = $e -> getMessage();
  }
  return $response;
}

function deleteTask($model) {
  global $dbcon;
  try {

    //Delete the task

    $response['success'] = 'Task deleted';
    $response['data'] = $model;
  } catch (Exception $e) {
    $response['error'] = $e -> getMessage();
  }
  return $response;
}


/*  -----------------------------  */
/*  ----  UTILITY FUNCTIONS  ----  */
/*  -----------------------------  */

function getStripped($string) {
  $result = $string;
  if (get_magic_quotes_gpc()) {
    $result = stripslashes($result);
  }
  return $result;
}
function getStrippedOrBlank($model, $string) {
  if (array_key_exists($string, $model)) {
    $result = $model[$string];
  } else {
    $result = '';
  }
  if (get_magic_quotes_gpc()) {
    $result = stripslashes($result);
  }
  return $result;
}
?>