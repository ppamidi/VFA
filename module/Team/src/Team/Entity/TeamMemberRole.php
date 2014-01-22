<?php
namespace Team\Entity;
use Doctrine\ORM\Mapping as ORM;
use Member\Entity\Member;
use Member\Entity\Role;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="TeamMemberRole",uniqueConstraints = {@ORM\UniqueConstraint(name="team_member_idx", columns={"team", "member"})})
 *
 */
class TeamMemberRole
{

/**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")
 * @var int
 */
    protected $id;

/**
 * @ORM\ManyToOne(targetEntity="Team\Entity\Team")
 * @ORM\JoinColumn(name="team", referencedColumnName="teamId")
 */
   protected $team;

/**
 * @ORM\ManyToOne(targetEntity="Member\Entity\Member")
 *  @ORM\JoinColumn(name="member", referencedColumnName="memberId")
 */ 
   protected $member;

/**
* @ORM\ManyToOne(targetEntity="Member\Entity\Role")
*  @ORM\JoinColumn(name="role", referencedColumnName="roleId")
*/
   protected $role;
   
   /**
    * @access public
    * @return int
    */
   public function getId() {
   	return $this->id;
   }
    
   /**
    * @access public
    * @return Application\Entity\Team
    */
	public function getTeam() {
		return $this->team;
	}
	
	/**
	 * @access public
	 * @param  $team
	 * @return Application/Entity/TeamMemberRole
	*/
	public function setTeam($team) {
		$this->team = $team;
		return $this;
	}
	
	/**
	 * @access public
	 * @return Application\Entity\Member
	 */
	public function getUser() {
		return $this->member;
	}
	
	/**
	* @access public
	* @param $member
	* @return Application/Entity/TeamMemberRole
	*/
	public function setMember($member) {
		$this->member = $member;
		return $this;
	}
	
	/**
	 * @access public
	 * @return Application\Entity\Role
	 */
	public function getRole() {
		return $this->role;
	}
	
	/**
	* @access public
	* @param $role
	* @return Application/Entity/TeamMemberRole
	*/
	public function setRole($role) {
		$this->role = $role;
		return $this;
	}

}

?>