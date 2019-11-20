<?php
include_once '../global.php';

$nc = new NewsController();
$nc->list();
class NewsController {
  public function list() 
  {
    include_once SYSTEM_PATH.'/view/ObserverHeader.php';
    echo'<button id = "confidence" hidden> confidence</button>';
    include_once SYSTEM_PATH.'/view/Body.php';
  }

}