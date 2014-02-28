<?php
namespace Post\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Boolean;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Date;
use Member\Entity\Member;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="Post")
 *
 */
class Post
{
    function __construct()
    {
    	 
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $postId;
    
    /**
     * @ORM\OneToOne(targetEntity="Member\Entity\Member")
     * @ORM\JoinColumn(name="member", referencedColumnName="memberId")
     */
    protected $member;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;
    
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $networkId;
    
    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $postType;
    
    /**
     * @ORM\Column(type="string", length=1024)
     * @var string
     */
    protected $contentExcerpt;
    
    /**
     * @ORM\Column(type="string", length=1024)
     * @var string
     */
    protected $url;

	
	/**
	 * @return int
	 */
	public function getPostId() {
		return $this->postId;
	}
	
	/**
	 * @param $postId
	 */
	public function setPostId($postId) {
		$this->postId = $postId;
		return $this;
	}
	
	/**
	 * @return Member\Entity\Member
	 */
	public function getMember() {
		return $this->member;
	}
	
	/**
	 * @param $member
	 */
	public function setMember($member) {
		$this->member = $member;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getCreatedAt() {
		return $this->createdAt;
	}
	
	/**
	 * @param $createdAt
	 */
	public function setCreatedAt($createdAt) {
		$this->createdAt = $createdAt;
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
	public function getPostType() {
		return $this->postType;
	}
	
	/**
	 * @param $postType
	 */
	public function setPostType($postType) {
		$this->postType = $postType;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getContentExcerpt() {
		return $this->contentExcerpt;
	}
	
	/**
	 * @param $contentExcerpt
	 */
	public function setContentExcerpt($contentExcerpt) {
		$this->contentExcerpt = $contentExcerpt;
		return $this;
	}
	
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
	
	public  function populatePost($response){
		$this->setPostId($response['id']);
		$this->setPostType($response['message_type']);
		$this->setNetworkId($response['network_id']);
		$this->setContentExcerpt($response['content_excerpt']);
		$this->setUrl($response['url']);
		$this->setCreatedAt(new \DateTime($response['created_at']));
		$this->setMember($objectManager->find('Member\Entity\Member', $response['sender_id']));   
	}
	
	public static function findPost($response, $objectManager){
		$user = $objectManager->find('Post\Entity\Post', $response['id']);
		if ($user === null) {
			return FALSE;
		};
	
		return TRUE;
	}
	
	public static function retrievePost($response, $objectManager){
		if (Post::findPost($response, $objectManager)) {
			return $objectManager->find('Post\Entity\Post', $response['id']);
		}
		return null;
	}
	
	public function persistPost($response, $objectManager){
		if (!Post::findPost($response, $objectManager)) {
			$this->populatePost($response)	;
			$objectManager->persist($this);
			$objectManager->flush();
		}
	}  
}

?>