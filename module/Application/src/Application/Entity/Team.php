<?php
/**
 * Created by PhpStorm.
 * User: Tittu
 * Date: 1/8/14
 * Time: 5:40 PM
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 *
 */
class Team {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $team_id;

    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $team_name;

    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $sow;

    /**
     * @param string $sow
     */
    public function setSow($sow)
    {
        $this->sow = $sow;
    }

    /**
     * @return string
     */
    public function getSow()
    {
        return $this->sow;
    }

    /**
     * @param int $team_id
     */
    public function setTeamId($team_id)
    {
        $this->team_id = $team_id;
    }

    /**
     * @return int
     */
    public function getTeamId()
    {
        return $this->team_id;
    }

    /**
     * @param string $team_name
     */
    public function setTeamName($team_name)
    {
        $this->team_name = $team_name;
    }

    /**
     * @return string
     */
    public function getTeamName()
    {
        return $this->team_name;
    }

    public  function populateTeam($response){

        $this->setUserId($response['team_id']);
        $this->setNetworkId($response['team_name']);
        $this->setNetworkName($response['sow']);
    }

    public static function findTeam($response, $objectManager){

        $user = $objectManager->find('Application\Entity\Team', $response['team_id']);
        if ($user === null) {
            return FALSE;
        };

        return TRUE;
    }

    public static function retrieveTeam($response, $objectManager){
        if (User::findUser($response, $objectManager)) {
            return $objectManager->find('Application\Entity\Team', $response['team_id']);
        }

        return null;
    }

    public function persistTeam($response, $objectManager){

        if (!User::findTeam($response, $objectManager)) {
            $this->populateTeam($response)	;
            $objectManager->persist($this);
            $objectManager->flush();
        }
    }
}
