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
        $this->belongsTo("pid", "romanprojekt\Models\Fileobject", "uid",array('alias' => 'fileobject'));
	 $this->hasManyToMany("uid", "romanprojekt\Models\Filecomments_hashtags_lookup", "uid_foreign","uid_local","romanprojekt\Models\Filecomments","uid",array('alias' => 'filecomments'));
    }
	    
}