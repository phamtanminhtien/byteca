<?php
require_once("database.php");
if(isset($_GET["link"])){
  $link = $_GET["link"];
  $link = get_link_by_value($link);
  viewplusspluss($link["value"]);
  header('Location: '.$link["link_root"]);
}
?>
