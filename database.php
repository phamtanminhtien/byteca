<?php
$servername = "localhost";
$username = "root";
$database = "shortlink";
$password = "";
date_default_timezone_set('Asia/Ho_Chi_Minh');
//  Create a new connection to the MySQL database using PDO
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function have_($pa){
    if(isset($pa->num_rows)){
        if ($pa->num_rows > 0) {
            return true;
        }
    }
    return false;
}
function insert_link($link, $val){
  global $conn;
  $sql = "INSERT INTO link (link_root, value) VALUES ('".$link."', '".$val."')";
  $conn->query($sql);
}

function viewplusspluss($value){
  if(isset_value($value)){
    global $conn;
    $view_n = get_view($value)+1;
    $sql = "UPDATE link SET accs = '".$view_n."' WHERE value='".$value."'";
    $conn->query($sql);
  }
}

function get_view($value){
  if(isset_value($value)){
    return get_link_by_value($value)["accs"];
  }
  return 0;
}

function get_link_by_value($value){
  global $conn;
  $result = "";
  $sql = "SELECT * FROM link WHERE value = '".$value."'";
  $link = $conn->query($sql);

  if(have_($link)){
      while($row = $link->fetch_assoc()) {
          $result = $row;
      }
  }
  return $result;
}

function get_link_by_link($value){
  global $conn;
  $result = "";
  $sql = "SELECT * FROM link WHERE link_root = '".$value."'";
  $link = $conn->query($sql);

  if(have_($link)){
      while($row = $link->fetch_assoc()) {
          $result = $row;
      }
  }
  return $result;
}
function isset_value($value){
  global $conn;
  $sql = "SELECT * FROM link WHERE value = '".$value."'";
  $resutl = $conn->query($sql);
  if(have_($resutl)){
    return true;
  }
  return false;
}
function isset_link($value){
  global $conn;
  $sql = "SELECT * FROM link WHERE link_root = '".$value."'";
  $resutl = $conn->query($sql);
  if(have_($resutl)){
    return true;
  }
  return false;
}
function rand_string( $length ) {
  $str = "";
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $size = strlen( $chars );
  for( $i = 0; $i < $length; $i++ ) {
  $str .= $chars[ rand( 0, $size - 1 ) ];
   }
  return $str;
}
?>
