<?php

class SitemapController extends Zend_Controller_Action {
    protected $em = null;
    
    public function init(){
        $this->em = Zend_Registry::get('em');
    }
    // Funktionsfähiges Original
//     public function indexAction(){
//         $this->view->sites = $this->em->getRepository('BIG5\Entity\Sitemap')->findAll();
//     }
    
    // diverse Versuche
    public function indexAction(){
        // so gehts auch:
//         $query = $this->em->createQuery('SELECT s FROM BIG5\Entity\Sitemap s WHERE (s.id = 15 OR s.id = 16) ORDER BY s.id DESC');
//         $this->view->sites = $query->getResult(); // array of objects
        
        // gibt 16 Datensätze aus, zeigt aber nix an
//         $query = $this->em->createQuery('SELECT u.titel FROM BIG5\Entity\Sitemap u');
//         $this->view->sites = $query->getResult(); // array of ids
        
        // LIKE 
        $query = $this->em->createQuery("SELECT s FROM BIG5\Entity\Sitemap s WHERE s.desc LIKE '%test%' ORDER BY s.id DESC");
        $this->view->sites = $query->getResult();

    }
    
}