<?php
namespace BIG5\Entity;
use Doctrine\ORM\Mapping as ORM;

/* 
 * Important Notes:
 
1.)
The repositoryClass attribute is borrowed directly from Ralph Schinlder's NOLASnowball\Entity\Stand class. 

2.) Benjamin Eberlei describes using a derived repository class as a service layer:

http://groups.google.com/group/doctrine-user/browse_thread/thread/3fdc4b4b83d9fb9

3.)
Another reference to repositories:
http://stackoverflow.com/questions/5048670/doctrine-2-ormgenerate-repositories-not-working
*/


/**
 * 
 * @ORM\Entity(repositoryClass="BIG5\Entity\Repository\StampItemRepository")
 * @ORM\Table(name="stamp")
 */
class StampItem extends EntityBase {

 // grades (condition) of stamps
 const VERY_FINE_GRADE = "Very Fine";
 const FINE_GRADE = "Fine";
 const GOOD_GRADE = "Good";
 const AVERAGE_GRADE = "Average";
 const POOR_GRADE = "Poor";

 // types of stamps
 const COMMEMORATIVE_TYPE = 'Commemorative';
 const DECORATIVE_TYPE = 'Decorative';
 const DEFINITIVE_TYPE = 'Definitive';
 const SPECIAL_TYPE = 'Special';
 const OTHER_TYPE = 'Other'; 

  /**
   *  @ORM\Id
   *  @ORM\Column(type="integer")
   *  @ORM\GeneratedValue
   */
    protected $id;  
 
   /**
    * @ORM\Column(type="string", length=25)
    */
    protected $grade;
    
    /**
    * @ORM\Column(type="smallint")
    */
    protected $year;

   // We have a ManyToOne relationship with Country.
   // A stamp is "issued in" one country. A country "issues" many stamps. 
   // We do an eagar fetch, so that $country is fully-populated after a findXX() operations.
   /**
    *  @ORM\ManyToOne(targetEntity="Country", fetch="EAGER")
    */
    protected $country;

	/**
     * @ORM\Column(type="float")
	 */ 
    protected $denomination;

	/**
     * @ORM\Column(type="string", name="title", length=255)
	 */ 
    protected $title;
}
?> 
