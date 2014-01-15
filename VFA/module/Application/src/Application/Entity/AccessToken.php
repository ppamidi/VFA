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
    protected $user_id;
    
    /** @ORM\Column(type="string") */
    protected $network_id;

    /** @ORM\Column(type="string") */
    protected $network_name;
    
    /** @ORM\Column(type="string") */
    protected $token;
    
    /** @ORM\Column(type="date") */
    protected $created_at;
    
    /** @ORM\Column(type="string") */
    protected $full_name;
    
    public function getUserID()
    {
    	return $this->user_id;
    }
    
    public function setUserID($value)
    {
    	$this->user_id = $value;
    }
    
    public function getNetworkID()
    {
    	return $this->network_id;
    }
    
    public function setNetworkID($value)
    {
    	$this->network_id = $value;
    }
    
    public function getNetworkName()
    {
    	return $this->network_name;
    }
    
    public function setNetworkName($value)
    {
    	$this->network_name = $value;
    }
    
    public function getToken()
    {
    	return $this->token;
    }
    
    public function setToken($value)
    {
    	$this->token = $value;
    }
    
    public function getCreatedAt()
    {
    	return $this->created_at;
    }
    
    public function setCreatedAt($value)
    {
    	$this->created_at = date("Y-m-d H:i:s",strtotime($value));
    }
    
    public function getFullName()
    {
    	return $this->full_name;
    }
        
    public function setFullName($value)
    {
    	$this->full_name = $value;
    }
    
    
    
    //upon construction, map the values
    //from the $accesstoken_row if available
//     public function __construct($token_row = null)
//     {
//     	if( !is_null($token_row) && $token_row instanceof Zend_Db_Table_Row ) {
//     		$this->user_id = $token_row->user_id;
//     		$this->network_id = $token_row->network_id;
//     		$this->network_name = $token_row->network_name;
//     		$this->token = $token_row->token;
//     		$this->created_at = $token_row->created_at;
//     	    $this->full_name = $token_row->full_name;
//     	}
//     }
    
//     public function exchangeArray($data)
//     {
        
//     }
    
    //magic function __set to set the
    //attributes of the User model
//     public function __set($name, $value)
//     {
//     	//set the attribute with the value
//     	$this->$name = $value;
//     }
    
//     public function __get($name)
//     {
//     	return $this->$name;
//     }
    
//     public function retrieveToken($response){
        
//             $this->user_id = $response['user']['id'];
//     		$this->network_id = $response['network']['id'];
//     		$this->network_name = $response['network']['name'];
//     		$this->token = $response['access_token']['token'];
//     		$this->created_at = $response['access_token']['created_at'];
//     	    $this->full_name = $response['user']['full_name'];
//     }

}

