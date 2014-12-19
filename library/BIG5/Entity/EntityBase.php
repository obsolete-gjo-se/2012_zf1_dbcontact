<?php
namespace BIG5\Entity;

class EntityBase {
    
    

   public function __get($property)
   {
        $method = 'get' . ucfirst($property);

	if (method_exists($this, $method)) {

                return $this->$method();

        } else if (property_exists($this, $property)) {

           	return $this->$property;
        }
   }
   
}
?>
