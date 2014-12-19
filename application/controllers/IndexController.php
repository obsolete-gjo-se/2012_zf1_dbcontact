<?php

class IndexController extends Zend_Controller_Action {
    
    public function init(){
        $this->view->doctype('XHTML1_STRICT');
        
        $this->service = new Application_Service_ItemService();
    }

    public function indexAction(){
        $stampItems = $this->service->findAll();
        
        $this->view->stampItems = $stampItems;
    }
}