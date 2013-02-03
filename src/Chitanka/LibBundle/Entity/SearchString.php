<?php

namespace Chitanka\LibBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="Chitanka\LibBundle\Entity\SearchStringRepository")
* @ORM\Table(name="search_string",
*	indexes={
*		@ORM\Index(name="date_idx", columns={"date"})})
*/
class SearchString extends Entity
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Chitanka\LibBundle\Doctrine\CustomIdGenerator")
	 */
	private $id;

	/**
	* @var string
	* @ORM\Column(type="string", length=100, unique=true)
	*/
	private $name;

	/**
	* @var integer
	* @ORM\Column(type="integer")
	*/
	private $count = 0;

	/**
	* @var \DateTime
	* @ORM\Column(type="datetime")
	*/
	private $date;

	public function __construct($name)
	{
		$this->name = $name;
		$this->date = new \DateTime;
	}

	public function getId() { return $this->id; }

	public function setName($name) { $this->name = $name; }
	public function getName() { return $this->name; }

	public function setCount($count) { $this->count = $count; }
	public function getCount() { return $this->count; }
	public function incCount() {
		$this->count++;
		$this->date = new \DateTime;
	}

	public function setDate($date) { $this->date = $date; }
	public function getDate() { return $this->date; }
}
