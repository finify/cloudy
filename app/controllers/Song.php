<?php 

class Song extends Controller{
  
    public function __construct($controller, $action){
        parent::__construct($controller, $action);
    }

    public function indexAction($hello=NULL){
        
        $this->view->render('song/index',['song_id'=> $hello]);
    }

    public function testAction(){
        die("hello world");
    }
}