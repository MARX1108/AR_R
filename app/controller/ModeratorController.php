<?php
include_once '../global.php';

$nc = new NewsController();
$nc->list();
class NewsController {
  public function list() {

    include_once SYSTEM_PATH.'/view/ModeratorHeader.php';
    include_once SYSTEM_PATH.'/view/ModeratorBody.php';
    include_once SYSTEM_PATH.'/view/ModeratorFooter.php';
  }

}