<?php
require_once('AbstractBase.php');

class AjaxController extends AbstractBase {


    public function getAllM() {
        $this->addContext("msgs", Message::getLast20());
        header('Content-type: text/xml');
    }

    public function send(){
        $m = new Message();
        $m->setMsgtext($_POST["text"]);
        $m->setBenutzerid(intval($_POST["benutzerid"]));
        $m->setTime(date("Y-m-d H:i:s"));
        $m->speichere();
        exit();

    }

}
?>