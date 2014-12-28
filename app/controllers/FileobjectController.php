<?php
namespace romanprojekt\Controllers;
use romanprojekt\Models\Fileobject;
    
	
/**
 * Class AddressfoldersController
 *
 * @package baywa-nltool\Controllers
 */
class FileobjectController extends ControllerBase
{
    public function indexAction(){
        $filerecords=Fileobject::find(array(
            'conditions' => 'deleted=0 AND hidden=0',
            'order' => 'tstamp ASC'
        ));
      
        $user=$this->auth->getIdentity();
        $this->view->setVar('files',$filerecords);
        $this->view->setVar('feuserName',$user['username']);
    }
    public function createAction(){
        
    }
}