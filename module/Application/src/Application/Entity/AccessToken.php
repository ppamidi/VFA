<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class AccessToken
{   
    /**
     *  @ORM\Id 
     *  @ORM\Column(type="integer")
     *  */
    protected $userId;
    
    /** @ORM\Column(type="string") */
    protected $networkId;

    /** @ORM\Column(type="string") */
    protected $networkName;
    
    /** @ORM\Column(type="string") */
    protected $tokenId;
    
    /** @ORM\Column(type="date") */
    protected $createdAt;
    
    /** @ORM\Column(type="date") */
    protected $updatedAt;
        
    /** @ORM\Column(type="string") */
    protected $fullName;
    
    public function getUserId()
    {
    	return $this->userId;
    }
    
    public function setUserId($value)
    {
    	$this->userId = $value;
    }
    
    public function getNetworkId()
    {
    	return $this->networkId;
    }
    
    public function setNetworkId($value)
    {
    	$this->networkId = $value;
    }
    
    public function getNetworkName()
    {
    	return $this->networkName;
    }
    
    public function setNetworkName($value)
    {
    	$this->networkName = $value;
    }
    
    public function getTokenId()
    {
    	return $this->tokenId;
    }
    
    public function setTokenId($value)
    {
    	$this->tokenId = $value;
    }
    
    public function getCreatedAt()
    {
    	return $this->createdAt;
    }
    
    public function setCreatedAt($value)
    {
    	$this->createdAt = date("Y-m-d H:i:s",strtotime($value));
    }
    public function getUpdatedAt()
    {
    	return $this->updatedAt;
    }
    
    public function setUpdatedAt($value)
    {
    	$this->updatedAt = date("Y-m-d H:i:s",strtotime($value));
    }
    
    public function getFullName()
    {
    	return $this->fullName;
    }
        
    public function setFullName($value)
    {
    	$this->fullName = $value;
    }
}

