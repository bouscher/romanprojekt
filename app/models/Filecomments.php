<?php
namespace romanprojekt\Models;
use Phalcon\Mvc\Model;
/**
 * Description of Contentobjects
 *
 * @author Philipp-PC
 */
class Filecomments extends Model{
	
    public function initialize()
    {
        $this->belongsTo("pid", "romanprojekt\Models\fileobject", "uid",array('alias' => 'fileobject'));
	
    }
	    
}