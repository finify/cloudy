<?php 

class Tools extends Controller{
    public function __construct($controller, $action){
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
    }

    public function indexAction(){
        $this->view->render('tools/index');
    }

}