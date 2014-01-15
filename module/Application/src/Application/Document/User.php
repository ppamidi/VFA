<?php
namespace Application\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document*/
class User
{
	/** @ODM\Id */
	private $id;

	/** @ODM\Field(type="string") */
	private $firstName;

	/** @ODM\Field(type="string") */
	private $lastName;

	/**
	 * @return the $id
	 */

	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return the $firstName
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @return the $lastName
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @param field_type $firstName
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	/**
	 * @param field_type $lastName
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

}