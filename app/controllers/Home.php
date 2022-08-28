<?php 

class Home extends Controller{
    public function __construct($controller, $action){
        parent::__construct($controller, $action);
    }

    public function indexAction(){
        
        $this->view->render('home/index');
    }
    public function aboutAction(){
        
        $this->view->render('home/about');
    }
    
    public function privacyAction(){
        
        $this->view->render('home/privacy');
    }
    
    public function sitemapAction(){
        
        $this->view->render('home/sitemap');
    }
}