<?php
namespace BIG5\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity(repositoryClass="BIG5\Entity\Repository\SitemapRepository")
 * @ORM\Table(name="sitemap")
 */
class Sitemap extends EntityBase {

  /**
   *  @ORM\Id
   *  @ORM\Column(type="integer")
   *  @ORM\GeneratedValue
   */
    protected $id;  
 
   /**
    * @ORM\Column(type="string", length=255)
    */
    protected $titel;
    
    /**
    * @ORM\Column(type="string", length=2)
    */
    protected $language;

   /**
    *  @ORM\Column(type="string", length=255)
    */
    protected $keyword;

	/**
     * @ORM\Column(type="string", length=255)
	 */ 
    protected $desc;

	/**
     * @ORM\Column(type="string", length=100)
	 */ 
    protected $directory;
}
?> 
