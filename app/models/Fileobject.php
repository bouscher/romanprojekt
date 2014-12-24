<?php
namespace romanprojekt\Models;
use Phalcon\Mvc\Model;
/**
 * Description of Contentobjects
 *
 * @author Philipp-PC
 */
class Fileobject extends Model{
	
    public function initialize()
    {
        $this->hasMany("uid", "romanprojekt\Models\filecomments", "pid",array('alias' => 'comments'));
	$this->hasMany("uid", "romanprojekt\Models\hashtags", "pid",array('alias' => 'hashtags'));
    }
	    
}