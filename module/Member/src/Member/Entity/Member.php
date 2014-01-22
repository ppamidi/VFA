<?php
namespace Member\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Boolean;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Date;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="Member",uniqueConstraints = {@ORM\UniqueConstraint(name="member_idx", columns={"emailId"})})
 *
 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $memberId;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    protected $emailId;
    
    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $firstName;
    
    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $lastName;
    
    /**
     * @ORM\Column(type="integer")
     * @var Boolean
     */
    protected $active;
    
    /**
     * @ORM\Column(type="integer")
     * @var Boolean
     */
    protected $verified;

	/**
	 * @return int
	 */
	public function getMemberId() {
		return $this->memberId;
	}
	
	/**
	 * @param $memberId
	 */
	public function setMemberId($memberId) {
		$this->memberId = $memberId;
	}
	
	/**
	 * @return string
	 */
	public function getEmailId() {
		return $this->emailId;
	}
	
	/**
	 * @param $emailId
	 */
	public function setEmailId($emailId) {
		$this->emailId = $emailId;
	}
	
	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	
	/**
	 * @param $firstName
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	
	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}
	
	/**
	 * @param string $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	
	/**
	 * @return Boolean
	 */
	public function getActive() {
		return $this->active;
	}
	
	/**
	 * @param $active
	 */
	public function setActive($active) {
		$this->active = $active;
	}
	
	/**
	 * @return Boolean
	 */
	public function getVerified() {
		return $this->verified;
	}
	
	/**
	 * @param $verified
	 */
	public function setVerified($verified) {
		$this->verified = $verified;
	}
	
    
//     /**
//   	 * @ORM\Column(type="date", length=64)
//    	 * @var Date
//    	 */
//     protected $createdAt;
    
//     /**
//      * @ORM\Column(type="date", length=64)
//      * @var Date
//      */
//     protected $updatedAt;
    
    
}

?>