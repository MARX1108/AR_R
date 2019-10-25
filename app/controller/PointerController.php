<?php
include_once '../global.php';

$nc = new NewsController();

$nc->list();
class NewsController 
{
  public function list() 
  {
    include_once SYSTEM_PATH.'/view/PointerHeader.php';
    include_once SYSTEM_PATH.'/view/Body.php';
  }

}

echo "test"; 