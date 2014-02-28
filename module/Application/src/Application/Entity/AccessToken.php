<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;


/** @ORM\Entity 
 * @ORM\Table(name="AccessToken",uniqueConstraints = {@ORM\UniqueConstraint(name="user_token_idx", columns={"user", "network"})})
 * */
class AccessToken
{   
    /**
     *  @ORM\Id 
     *  @ORM\Column(type="integer")
     *  @ORM\ManyToOne(targetEntity="User\Entity\User")
     *  @ORM\JoinColumn(name="user", referencedColumnName="userId")
     *  */
    protected $user;
    
    /** 
     *  @ORM\Column(type="integer")
     *  @ORM\ManyToOne(targetEntity="User\Entity\User")
     *  @ORM\JoinColumn(name="user", referencedColumnName="networkId")
     * */
    protected $network;
 
    /** @ORM\Column(type="string") */
    protected $tokenId;
    
//     /** @ORM\Column(type="date") */
//     protected $createdAt;
    
//     /** @ORM\Column(type="date") */
//     protected $updatedAt;
        
//     /** @ORM\Column(type="string") */
//     protected $fullName;
    
    public function getUser()
    {
    	return $this->user;
    }
    
    public function setUser($value)
    {
    	$this->user = $value;
    }
    
    public function getNetwork()
    {
    	return $this->network;
    }
    
    public function setNetwork($value)
    {
    	$this->network = $value;
    }
    
    public function getTokenId()
    {
    	return $this->tokenId;
    }
    
    public function setTokenId($value)
    {
    	$this->tokenId = $value;
    }
    
//     public function getCreatedAt()
//     {
//     	return $this->createdAt;
//     }
    
//     public function setCreatedAt($value)
//     {
//     	$this->createdAt = date("Y-m-d H:i:s",strtotime($value));
//     }
//     public function getUpdatedAt()
//     {
//     	return $this->updatedAt;
//     }
    
//     public function setUpdatedAt($value)
//     {
//     	$this->updatedAt = date("Y-m-d H:i:s",strtotime($value));
//     }
    
//     public function getFullName()
//     {
//     	return $this->fullName;
//     }
        
//     public function setFullName($value)
//     {
//     	$this->fullName = $value;
//     }

    public static function populateAccessToken($response){
        $token = new AccessToken();    
        $token->setUser($response['user']['id']);
        $token->setNetwork($response['network']['id']);
        $token->setTokenId($response['access_token']['token']);
        
        return $token;
     }
    
//     public static function findAccessToken($objectManager){
//         $token = $objectManager->findAll('Application\Entity\AccessToken');
//         if ($token === null) {
//             return FALSE;
//         };
    
//         return TRUE;
//     }
    
  
    public static function persistAccessToken($response, $objectManager){
        $tokens = self::retrieveAccessToken($objectManager);
        $token = $tokens[0];
        if (!$token) {
            $token = self::populateAccessToken($response);
            $objectManager->persist($token);
        }else {
            $token->setUser($response['user']['id']);
            $token->setNetwork($response['network']['id']);
            $token->setTokenId($response['access_token']['token']);
            $objectManager->persist($token);
            
        }
        $objectManager->flush();
    }
    
    public static function retrieveAccessToken($objectManager){
        return $objectManager->getRepository('Application\Entity\AccessToken')->findAll();
    }
    
}

