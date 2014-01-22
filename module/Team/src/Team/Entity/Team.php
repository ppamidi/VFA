<?php
/**
 * Created by PhpStorm.
 * User: Tittu
 * Date: 1/8/14
 * Time: 5:40 PM
 */

namespace Team\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 *  @ORM\Entity
 *  @ORM\Table(name="Team",uniqueConstraints = {@ORM\UniqueConstraint(name="team_idx1", columns={"teamName"})})
 */
class Team implements InputFilterAwareInterface {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $teamId;

    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $teamName;
    
    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $teamSOW;

    /**
     * @ORM\Column(type="string", length=6445)
     * @var string
     */
    protected $teamDesc;
    
    protected $inputFilter;
    
    /**
     * @access public
     * @return int
     */
    public function getTeamId() {
    	return $this->teamId;
    }
    
    
    /**
     * @access public
     * @return string
     */
    public function getTeamName() {
    	return $this->teamName;
    }
    
    /**
     * @access public
     * @param string $team_name
     * @return Team/Entity/Team
     */
    public function setTeamName($team_name) {
    	$this->teamName = $team_name;
    	return $this;
    }
    
    
    /**
     * @access public
     * @return string
     */
    public function getTeamSOW() {
    	return $this->teamSOW;
    }
    
    /**
     * @access public
     * @param string $team_sow
     * @return Team/Entity/Team
     */
    public function setTeamSOW($team_sow) {
    	$this->teamSOW = $team_sow;
    	return $this;
    }
    
    /**
     * @access public
     * @return string
     */
    public function getTeamDesc() {
    	return $this->teamDesc;
    }
    
    /**
     * @access public
     * @param string $team_desc
     * @return Team/Entity/Team
     */
    public function setTeamDesc($team_desc) {
    	$this->teamDesc = $team_desc;
    	return $this;
    }
    

    
    /**
     *
     * @param array $data An array of data
     */
    public function exchangeArray($data)
    {
    	$this->teamName = (isset($data['teamName']))? $data['teamName'] : null;
     	$this->teamSOW = (isset($data['teamSOW']))? $data['teamSOW'] : null;
    	$this->teamDesc = (isset($data['teamDesc']))? $data['teamDesc'] : null;
    }
    
    /**
     * Get an array copy of object
     *
     * @return array
     */
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
    
    /**
     * Set input method
     *
     * @param InputFilterInterface $inputFilter
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
    	throw new \Exception("Not used");
    }
    
    /**
     * Get input filter
     *
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
    	if (!$this->inputFilter) {
            
    	    $inputFilter = new InputFilter();
            $factory     = new InputFactory();
            
            $inputFilter->add($factory->createInput(array(
            		'name' => 'teamName',
    				'required' => true,
    			    'filters'  => array(
    			    		array('name' => 'StripTags'),
    			    		array('name' => 'StringTrim'),
    			    ),
    			    'validators' => array(
    			    		array(
    			    				'name'    => 'StringLength',
    			    				'options' => array(
    			    						'encoding' => 'UTF-8',
    			    						'min'      => 1,
    			    						'max'      => 64,
    			    				), ),
    			    ),
            )));
            
            $inputFilter->add($factory->createInput(array(
            		'name' => 'teamSOW',
    	    		'required' => true,
    	    		'filters'  => array(
    	    				array('name' => 'StripTags'),
    	    				array('name' => 'StringTrim'),
    	    		),
    	    		'validators' => array(
    	    				array(
    	    						'name'    => 'StringLength',
    	    						'options' => array(
    	    								'encoding' => 'UTF-8',
    	    								'min'      => 1,
    	    								'max'      => 64,
    	    						), ),
    	    		),
            )));
            
            $inputFilter->add($factory->createInput(array(
            		'name' => 'teamDesc',
    	    		'required' => false,
    	    		'filters'  => array(
    	    				array('name' => 'StripTags'),
    	    				array('name' => 'StringTrim'),
    	    		),
    	    		'validators' => array(
    	    				array(
    	    						'name'    => 'StringLength',
    	    						'options' => array(
    	    								'encoding' => 'UTF-8',
    	    								'min'      => 1,
    	    								'max'      => 6445,
    	    						), ),
    	    		),
            )));
            
            $this->inputFilter = $inputFilter;
    	}
    	
    	return $this->inputFilter;
    }
	
}
