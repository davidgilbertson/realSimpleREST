<?php
//Uncomment out the below to create a connection. It's only commented so the test page won't fail
// $dbcon = new PDO('mysql:host=localhost;dbname=<dbname>;charset=utf8', '<username>', '<password>');

$requestMeth = $_SERVER['REQUEST_METHOD'];
$requestObj = $_GET['type'];

/*  -------------------  */
/*  ----  ROUTING  ----  */
/*  -------------------  */

if ($requestMeth === 'GET') {
  $requestObj = $_GET['type'];
  $objectValue = $_GET[$requestObj];
  switch ($requestObj) {
    case 'task':
      echo json_encode(getTask($objectValue));
      break;
    //And so on. One case for each type of model
  }
}

if ($requestMeth === 'POST') {
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
if ($requestMeth === 'PUT') {
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
if ($requestMeth === 'DELETE') {
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
    $response['data'] = $id;
  } catch (Exception $e) {
    $response['error'] = $e -> getMessage();
  }
  return $response;
}

function addTask($model) {
  global $dbcon;
  try {

    //Add the task

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

    //Save the task

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