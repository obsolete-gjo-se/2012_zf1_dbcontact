<?php
namespace BIG5\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/* 
    The official list of country names and their associated codes is maintained here:
   	  http://www.iso.org/iso/country_codes/iso_3166_code_lists.htm
    A XML file with the list is available at http://www.iso.org/iso/country_codes/iso_3166_code_lists.htm
    Run ./scripts/insert-countries.php from the command line, after downloading the XML file.
*/

/**
 * @ORM\Entity(repositoryClass="BIG5\Entity\Repository\CountryRepository", readOnly=true)
 * @ORM\Table(name="country")
 * 
 */
class Country extends EntityBase {

  /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    protected $id;  
 
  /** @ORM\Column(type="string", length=255, unique=true) */
    protected $name;

}
?> 
