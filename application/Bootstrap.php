<?php
use Doctrine\DBAL\Types\Type; 

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap { 
 
 
  protected function _initCaching()
  {
   /*
    * We inform the cache frontend that we want automatic serialization with a lifetime (in seconds) of 3600. This is the
    * default if omitted. This will apply to all items. We can also specify per-item expiration times. We want the
    * backend to be a file.
    * 
    * Note: If navigation support is added to this application, consult wikiw/application/modules/wiki/Bootstrap.php
    * as an example of using an input file with navigation stored in a .xml file. I may need another cache frontend, and
    * therefore the cache manager.
    * 
    * Comment: If you want your cache to be invalid whenever application/Bootstrap.php has been changd, which will happen if
    * new routes are added to the Bootstrap's _iniRoutes() method, you must use the 'master_files' frontend option. You 
    * must also specify 'File' as the first parameter rather than 'Core' to Zend_Cache::factory().
    */
    
    $frontendOptions = array('lifetime' => 3600, 'automatic_serialization' => true);
    $backendOptions = array('cache_dir' => APPLICATION_PATH . '/../data/cache');
    
    $cache = Zend_Cache::factory('Core', 'File', $frontendOptions, $backendOptions);
                                                 
    Zend_Registry::set('Zend_Cache', $cache);   

  }
  
  // Do not rename this method _initDoctrine() this will result in a circular dependency error.
  protected function _initDoctrineExtra()
  {
        
      $doctrine = $this->bootstrap('doctrine')->getResource('doctrine');
          
      $em = $doctrine->getEntityManager();
      
      Zend_Registry::set('em', $em);
  }

      
  protected function _initRoutes()
  {
        // Ensure the frontController has been bootstrapped.
        $this->bootstrap('frontController');

        $router = $this->frontController->getRouter();
        
        // Make sure that _initCaching() has been done.
        $this->bootstrap('caching');
        
        // We will programmatically build the routes in the array $myroutes, which we then cache.
        $cache = Zend_Registry::get('Zend_Cache');
                
        $myroutes = $cache->load('myroutes');
        
        if ($myroutes === false) {

            $myroutes = array();

            $route = new Zend_Controller_Router_Route(
                'home',
                array(
                    'action'        => 'index',
                    'controller'    => 'index',
                    'module'        => 'default'
                )
            );
            $myroutes['home'] = $route;
    
            $route = new Zend_Controller_Router_Route(
                   '/sitemap',
                   array(
                       'action' => 'index',
                       'controller' => 'sitemap',
                       'module' => 'default'
                      )
                   );
            $myroutes['sitemap'] = $route;
            
            $cache->save($myroutes);
 
         }

         $router->addRoutes($myroutes); 
      }                
      
}

