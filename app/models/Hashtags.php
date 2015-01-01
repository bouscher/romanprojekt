<?php
namespace romanprojekt\Models;
use Phalcon\Mvc\Model;
Model::setup(['notNullValidations' => false]);
/**
 * Description of Contentobjects
 *
 * @author Philipp-PC
 */
class Hashtags extends Model{
	
    public function initialize()
    {
        $this->belongsTo("pid", "romanprojekt\Models\fileobject", "uid",array('alias' => 'fileobject'));
	 $this->hasManyToMany("uid", "nltool\Models\Filecomments_Hashtags_lookup", "uid_foreign","uid_local","nltool\Models\Filecomments","uid",array('alias' => 'filecomments'));
    }
	    
}