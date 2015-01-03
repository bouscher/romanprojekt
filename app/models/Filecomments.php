<?php
namespace romanprojekt\Models;
use Phalcon\Mvc\Model;
Model::setup(['notNullValidations' => false]);
/**
 * Description of Contentobjects
 *
 * @author Philipp-PC
 */
class Filecomments extends Model{
	
    public function initialize()
    {
        $this->belongsTo("pid", "romanprojekt\Models\Fileobject", "uid",array('alias' => 'fileobject'));
        $this->belongsTo("pid", "romanprojekt\Models\Feusers", "uid",array('alias' => 'feuser'));
	$this->hasManyToMany("uid", "romanprojekt\Models\Filecomments_hashtags_lookup", "uid_local", "uid_foreign", "romanprojekt\Models\Hashtags", "uid",array('alias' => 'hashtags'));
    }
	    
}