<?php
require_once("database.php");

if(isset($_POST["link"])){
  $url = $_POST["link"];
  if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
      echo -1;
  }else{
      if(isset_link($url)){
          $link_sudo = get_link_by_link($url);
      }else{
        $val = rand_string(10);
        while(isset_value($val)){
          $val = rand_string(10);
        }
        insert_link($url, $val);
          $link_sudo = get_link_by_value($val);
      }
      echo json_encode($link_sudo);
  }
}

?>
