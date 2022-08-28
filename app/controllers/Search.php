<?php 

class Search extends Controller{
    public function __construct($controller, $action){
        parent::__construct($controller, $action);
    }

    public function indexAction($hello=NULL){
        
        $this->view->render('search/index',['search'=> $hello]);
    }
}