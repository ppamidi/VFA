<?php
namespace Application\Entity;
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
	protected $user_id;

	/**
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	protected $network_id;
	
	/**
	 * @ORM\Column(type="string", length=64)
	 * @var string
	 */
	protected $network_name;
	
	/**
	 * @ORM\Column(type="string", length=64)
	 * @var string
	 */
	protected $job_title;
	
	/**
	 * @ORM\Column(type="string", length=64)
	 * @var string
	 */
	protected $location;
	
	/**
	 * @ORM\Column(type="string", length=64)
	 * @var string
	 */
	protected $first_name;
	
	/**
	 * @ORM\Column(type="string", length=64)
	 * @var string
	 */
	protected $last_name;
	
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
	protected $img_url;
	
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
	protected $email_address;

	/**
	 * @ORM\Column(type="boolean")
	 * @var string
	 */
	protected $verified;
	
	/**
	 * @return the int
	 */
	public function getUserId() {
		return $this->user_id;
	}
	
	/**
	 * @param int $user_id
	 */
	public function setUserId($user_id) {
		$this->user_id = $user_id;
		return $this;
	}
	
	/**
	 * @return the int
	 */
	public function getNetworkId() {
		return $this->network_id;
	}
	
	/**
	 * @param int $network_id
	 */
	public function setNetworkId($network_id) {
		$this->network_id = $network_id;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getNetworkName() {
		return $this->network_name;
	}
	
	/**
	 * @param string $network_name
	 */
	public function setNetworkName($network_name) {
		$this->network_name = $network_name;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getJobTitle() {
		return $this->job_title;
	}
	
	/**
	 * @param string $job_title
	 */
	public function setJobTitle($job_title) {
		$this->job_title = $job_title;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getLocation() {
		return $this->location;
	}
	
	/**
	 * @param string $location
	 */
	public function setLocation($location) {
		$this->location = $location;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getFirstName() {
		return $this->first_name;
	}
	
	/**
	 * @param string $first_name
	 */
	public function setFirstName($first_name) {
		$this->first_name = $first_name;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getLastName() {
		return $this->last_name;
	}
	
	/**
	 * @param string $last_name
	 */
	public function setLastName($last_name) {
		$this->last_name = $last_name;
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
	 * @return the string
	 */
	public function getUrl() {
		return $this->url;
	}
	
	/**
	 * @param string $url
	 */
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getImgUrl() {
		return $this->img_url;
	}
	
	/**
	 * @param string $img_url
	 */
	public function setImgUrl($img_url) {
		$this->img_url = $img_url;
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
	 * @return the string
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
	 * @return the string
	 */
	public function getEmailAddress() {
		return $this->email_address;
	}
	
	/**
	 * @param string $email_address
	 */
	public function setEmailAddress($email_address) {
		$this->email_address = $email_address;
		return $this;
	}
	
	/**
	 * @return the boolean
	 */
	public function getVerified() {
		return $this->verified;
	}
	
	/**
	 * @param boolean $verified
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
	    $this->setImgUrl($response['user']['mugshot_url_template']);
	    //      $this->setHireDate(date("Y-m-d H:i:s",strtotime($response['user']['hire_date'])));
	    //      $this->setBirthDate(date("Y-m-d H:i:s",strtotime($response['user']['birth_date'])));
	    $this->setDepartment($response['user']['department']);
	    $this->setEmailAddress($response['user']['contact']['email_addresses'][0]['address']);
	    $this->setVerified(FALSE);
	    
	}
	
	public static function findUser($response, $objectManager){    
	    
	    $user = $objectManager->find('Application\Entity\User', $response['user']['id']);    
	    if ($user === null) {
	        return FALSE;
	    };
	   
	    return TRUE;
	}
	
	public static function retrieveUser($response, $objectManager){
	    if (User::findUser($response, $objectManager)) {
	        return $objectManager->find('Application\Entity\User', $response['user']['id']); 
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