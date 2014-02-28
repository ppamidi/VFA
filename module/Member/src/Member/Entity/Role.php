<?php
namespace Member\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 *
 */
class Role
{

    function __construct()
    {
    	
    }
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $roleId;

    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $roleName;

	/**
	 * @return int
	 */
	public function getRoleId() {
		return $this->roleId;
	}
	
	/**
	 * @param $roleId
	 */
	public function setRoleId($roleId) {
		$this->roleId = $roleId;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getRoleName() {
		return $this->roleName;
	}
	
	/**
	 * @param string $roleName
	 */
	public function setRoleName($roleName) {
		$this->roleName = $roleName;
		return $this;
	}
	
    
}

?>