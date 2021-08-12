<?php
header('Access-Control-Allow-Origin: ' .$_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header("Content-Type:application/json, Access-Control-Allow-Origin:*");
header("Content-Type:multipart/form-data, Access-Control-Allow-Origin:*");

include_once "../database.php";
include_once "controllers/controller.php";
$controllerQuery = new controller();

  // QUERY REQUEST STARTS ===================
  $result = array('error'=>false);
  $action = '';

  if(isset($_GET['action'])){
      $action = $_GET['action'];
  }

  if($action=='register'){
      $query = json_decode(file_get_contents('php://input'),true);
      // echo json_encode ($query);
      return json_encode($controllerQuery->registration($query));

  }