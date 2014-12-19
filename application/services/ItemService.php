<?php

class Application_Service_ItemService {

    public function __construct(){
        $this->em = Zend_Registry::get('em');
        $this->stampItemRepository = $this->em->getRepository('BIG5\Entity\StampItem');               
    }   
    
    /*
     * We use __call($method, $args) to expose the methods of
     * Square\Entity\Repository\StampItemRepository, which contains our custom
     * DQL queries.
     */
    public function __call($method, $args){
        if(! method_exists("BIG5\Entity\Repository\StampItemRepository", $method)) {
            throw new Exception("unknown method [$method]");
        }
        
        return call_user_func_array(
                array(
                    $this->stampItemRepository, 
                    $method
                ), $args);
    }

}

?>
