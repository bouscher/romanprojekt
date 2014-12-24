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
        
        $this->view->setVar('files',$filerecords);
        
    }
    public function createAction(){
        
    }
}