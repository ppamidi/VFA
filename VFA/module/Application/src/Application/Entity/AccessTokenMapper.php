<?php
namespace Application\Entity;

class AccessTokenMapper
{
    public function __construct()
    {
    	//Instantiate the Table Data Gateway for the User table
    	$this->_db_table = new Application_Model_DbTable_AccessToken();
    }
    
    public function save(Application_Model_AccessToken $token_object)
    {
    	//Create an associative array
    	//of the data you want to update
    	$data = array(
    			'user_id' => $token_object->user_id,
    			'network_id' => $token_object->network_id,
    	        'network_name' => $token_object->network_name,
    	        'token' => $token_object->token,
    	        'created_at' => date("Y-m-d H:i:s",strtotime($token_object->created_at)),
    	        'full_name' => $token_object->full_name,
     	);
    	 
    	Zend_Registry::get('doctrine')->getDocumentManager()->persist($token_object);
    	Zend_Registry::get('doctrine')->getDocumentManager()->flush();
    	
      	//$this->_db_table->insert($data);
    	
    }
    
    public function getAccessToken()
    {
    	//use the Table Gateway to find the row that
    	//the id represents
    	$result = $this->_db_table->fetchAll();
    	 
    	//if not found, throw an exsception
    	if( count($result) == 0 ) {
    		throw new Exception('Token not found');
    	}
    	 
    	//if found, get the result, and map it to the
    	//corresponding Data Object
    	$row = $result->current();
    	$token_object = new Application_Model_AccessToken($row);
    	 
    	//return the access token
    	return $token_object->token;
    }
    
    public function findAccessToken(Application_Model_AccessToken $token_object)
    {
    	//use the Table Gateway to find the row that
    	//the id represents
    	$result = $this->_db_table->find($token_object->token);
    
    	//if found, return true
    	if( count($result) > 0 ) {
    		return true;
    	}
    
    	return false;
    }
    
}

