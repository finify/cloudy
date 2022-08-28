<?php 

class Artist extends Controller{
    public function __construct($controller, $action){
        parent::__construct($controller, $action);
    }

    public function indexAction($hello=NULL){
       
        $this->view->render('artist/index',['artist_id'=> $hello]);
    }
}