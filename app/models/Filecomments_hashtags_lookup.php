<?php
namespace romanprojekt\Models;
use Phalcon\Mvc\Model;
/**
 * Description of Distributors_addressfolders_lookup
 *
 * @author Philipp-PC
 */
class Filecomments_hashtags_lookup extends Model{
	
	public function initialize(){
		$this->belongsTo('uid_local', 'nltool\Models\Filecomments', 'uid', 
            array('alias' => 'filecomments')
        );
        $this->belongsTo('uid_foreign', 'nltool\Models\Hashtags', 'uid', 
            array('alias' => 'hashtags')
        );
	}
	
}