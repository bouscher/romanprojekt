<?php
namespace romanprojekt\Controllers;
use romanprojekt\Models\Fileobject;
use romanprojekt\Models\Feusers;
use romanprojekt\Models\Hashtags;
    
	
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
        $userData=Feusers::findFirst(array(
           'conditions' => 'uid=?1',
            'bind'=>array(
                1=>$user['uid']
            )
        ));
        $this->view->setVar('files',$filerecords);
        $this->view->setVar('feuserName',$user['username']);
        $this->view->setVar('feuserIcon',$userData->company);
        
    }
    public function updateAction(){
        $uid=$this->dispatcher->getParam("uid")?$this->dispatcher->getParam("uid"):0;
        $filerecord=Fileobject::findFirst(array(
            'conditions' => 'deleted=0 AND hidden=0 AND uid =?1',
            'bind' => array(
              1=>$uid
            ),
            'order' => 'tstamp ASC'
        ));
      $hashtags=Hashtags::find(array(
            'conditions' => 'deleted=0 AND hidden=0',
            'order' => 'tstamp ASC'
        ));
        $user=$this->auth->getIdentity();
        $userData=Feusers::findFirst(array(
           'conditions' => 'uid=?1',
            'bind'=>array(
                1=>$user['uid']
            ),
            'order'=>'title ASC'
        ));
        $this->view->setVar('file',$filerecord);
        $this->view->setVar('hashtags',$hashtags);
        $this->view->setVar('feuserName',$user['username']);
        $this->view->setVar('feuserIcon',$userData->company);
    }
    
    public function createAction(){
        
    }
}