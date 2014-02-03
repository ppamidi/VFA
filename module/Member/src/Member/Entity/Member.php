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
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    protected $imgURL;
    
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
	 * @return Boolean
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
	 * @return string
	 */
	public function getImgURL() {
		return $this->imgURL;
	}
	
	/**
	 * @param string $imgURL
	 */
	public function setImgUrl($imgURL) {
		$this->imgURL = $imgURL;
		return $this;
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
    
	public  function populateMember($response){		 
		$this->setMemberId($response[0]['id']);
		$this->setFirstName($response[0]['first_name']);
		$this->setLastName($response[0]['last_name']);
		//$this->setActivatedAt(date("Y-m-d H:i:s",strtotime($response['user']['activated_at'])));
		$this->setEmailId($response[0]['contact']['email_addresses'][0]['address']);
		$this->setImgURL($response[0]['mugshot_url']);
		$this->setActive(true);
		$this->setVerified(false);		 
	}
	
	public static function findMember($response, $objectManager){
		$user = $objectManager->find('Member\Entity\Member', $response[0]['id']);
		if ($user === null) {
			return FALSE;
		};
	
		return TRUE;
	}
	
	public static function retrieveMember($response, $objectManager){
		if (Member::findMember($response, $objectManager)) {
			return $objectManager->find('Member\Entity\Member', $response[0]['id']);
		}
		return null;
	}
	
	public function persistMember($response, $objectManager){	
		if (!Member::findMember($response, $objectManager)) {
			$this->populateMember($response)	;
			$objectManager->persist($this);
			$objectManager->flush();
		}
	}
}

?>