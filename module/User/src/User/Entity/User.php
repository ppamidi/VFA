<?php
namespace User\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 *  @ORM\Entity
 *
 */
class User {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @var int
	 */
	protected $userId;

	/**
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	protected $networkId;
	
	/**
	 * @ORM\Column(type="string", length=64)
	 * @var string
	 */
	protected $networkName;
	
	/**
	 * @ORM\Column(type="string", length=64)
	 * @var string
	 */
	protected $jobTitle;
	
	/**
	 * @ORM\Column(type="string", length=64, nullable = true)
	 * @var string
	 */
	protected $location;
	
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
	
// 	/**
// 	 * @ORM\Column(type="date", length=64)
// 	 * @var date
// 	 */
// 	protected $activated_at;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 * @var string
	 */
	protected $url;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 * @var string
	 */
	protected $imgURL;
	
// 	/**
// 	 * @ORM\Column(type="date", length=64)
// 	 * @var date
// 	 */
// 	protected $hire_date;
	
// 	/**
// 	 * @ORM\Column(type="date", length=64)
// 	 * @var date
// 	 */
// 	protected $birth_date;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 * @var string
	 */
	protected $department;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 * @var string
	 */
	protected $emailId;

	/**
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	protected $verified;
	
	/**
	 * @return the int
	 */
	public function getUserId() {
		return $this->user_id;
	}
	
	/**
	 * @param $userId
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getNetworkId() {
		return $this->networkId;
	}
	
	/**
	 * @param $networkId
	 */
	public function setNetworkId($networkId) {
		$this->networkId = $networkId;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNetworkName() {
		return $this->networkName;
	}
	
	/**
	 * @param $networkName
	 */
	public function setNetworkName($networkName) {
		$this->networkName = $networkName;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getJobTitle() {
		return $this->jobTitle;
	}
	
	/**
	 * @param $jobTitle
	 */
	public function setJobTitle($jobTitle) {
		$this->jobTitle = $jobTitle;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getLocation() {
		return $this->location;
	}
	
	/**
	 * @param $location
	 */
	public function setLocation($location) {
		$this->location = $location;
		return $this;
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
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}
	
	/**
	 * @param $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}
	
// 	/**
// 	 * @return the date
// 	 */
// 	public function getActivatedAt() {
// 		return $this->activated_at;
// 	}
	
// 	/**
// 	 * @param date $activated_at
// 	 */
// 	public function setActivatedAt($activated_at) {
// 		$this->activated_at = $activated_at;
// 		return $this;
// 	}
	
	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}
	
	/**
	 * @param $url
	 */
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getImgURL() {
		return $this->imgURL;
	}
	
	/**
	 * @param $imgURL
	 */
	public function setImgUrl($imgURL) {
		$this->imgURL = $imgURL;
		return $this;
	}
	
// 	/**
// 	 * @return the date
// 	 */
// 	public function getHireDate() {
// 		return $this->hire_date;
// 	}
	
// 	/**
// 	 * @param date $hire_date
// 	 */
// 	public function setHireDate($hire_date) {
// 		$this->hire_date = $hire_date;
// 		return $this;
// 	}
	
// 	/**
// 	 * @return the date
// 	 */
// 	public function getBirthDate() {
// 		return $this->birth_date;
// 	}
	
// 	/**
// 	 * @param date $birth_date
// 	 */
// 	public function setBirthDate($birth_date) {
// 		$this->birth_date = $birth_date;
// 		return $this;
// 	}
	
	/**
	 * @return string
	 */
	public function getDepartment() {
		return $this->department;
	}
	
	/**
	 * @param string $department
	 */
	public function setDepartment($department) {
		$this->department = $department;
		return $this;
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
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getVerified() {
		return $this->verified;
	}
	
	/**
	 * @param int $verified
	 */
	public function setVerified($verfied) {
		$this->verified = $verfied;
		return $this;
	}
	
	public  function populateUser($response){
	    
	    $this->setUserId($response['user']['id']);
	    $this->setNetworkId($response['network']['id']);
	    $this->setNetworkName($response['network']['name']);
	    $this->setJobTitle($response['user']['job_title']);
	    $this->setLocation($response['user']['location']);
	    $this->setFirstName($response['user']['first_name']);
	    $this->setLastName($response['user']['last_name']);
	    //     	$this->setActivatedAt(date("Y-m-d H:i:s",strtotime($response['user']['activated_at'])));
	    $this->setUrl($response['user']['url']);
	    $this->setImgURL($response['user']['mugshot_url']);
	    //      $this->setHireDate(date("Y-m-d H:i:s",strtotime($response['user']['hire_date'])));
	    //      $this->setBirthDate(date("Y-m-d H:i:s",strtotime($response['user']['birth_date'])));
	    $this->setDepartment($response['user']['department']);
	    $this->setEmailId($response['user']['contact']['email_addresses'][0]['address']);
	    $this->setVerified(0);
	    
	}
	
	public static function findUser($response, $objectManager){        
	    $user = $objectManager->find('User\Entity\User', $response['user']['id']);    
	    if ($user === null) {
	        return FALSE;
	    };
	   
	    return TRUE;
	}
	
	public static function retrieveUser($response, $objectManager){
	    if (User::findUser($response, $objectManager)) {
	        return $objectManager->find('User\Entity\User', $response['user']['id']); 
	    }
	    
	    return null;
	}
	
	public function persistUser($response, $objectManager){
	     
	    if (!User::findUser($response, $objectManager)) {
	         $this->populateUser($response)	;
	         $objectManager->persist($this);
	         $objectManager->flush();
	    }
	}

}