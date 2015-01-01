<?php
namespace romanprojekt\Controllers;
use romanprojekt\Models\Filecomments,
    romanprojekt\Models\Hashtags,
    romanprojekt\Models\Filecomments_hashtags_lookup;
    
	
/**
 * Class AddressfoldersController
 *
 * @package baywa-nltool\Controllers
 */
class FilecommentsController extends ControllerBase
{
    public function indexAction(){
        
    }
    public function createAction(){
        if($this->request->isPost()){
            $fileobject=explode('_',$this->request->getPost('playerid'));
            $user=$this->auth->getIdentity();
            $comment=new Filecomments();
            $comment->assign(array(
                'pid'=> $fileobject[1],
                'deleted'=>0,
                'hidden'=>0,
                'title'=> '',
                'usergroup'=>0,
                'tstamp' =>time(),
                'crdate' => time(),
                'cruser_id' => $user['uid'],
                'timeindex' => $this->request->getPost('tstamp'),
                'comment' => $this->request->getPost('comment')
                
            ));
            
            $comment->save();
            $hashtagArr=explode(',',$this->request->getPost('hashtags'));
            foreach($hashtagArr as $postedhashtag){
                $hashtag=  Hashtags::findFirst(array(
                   'conditions'=>'deleted=0 AND hidden=0 AND title LIKE ?1',
                    'bind' => $postedhashtag
                    
                ));
                if(!$hashtag){
                    $newHashtag=new Hashtags();
                    $newHashtag->assign(array(
                        'pid'=>0,
                        'deleted'=>0,
                        'hidden'=>0,
                        'timeindex'=>0,
                        'usergroup'=>0,
                       'tstamp' =>time(),
                        'crdate' => time(),
                        'cruser_id' => $user['uid'],
                        'title' => $postedhashtag
                    ));
                    $newHashtag->save();
                    
                    $mm=new Filecomments_hashtags_lookup();
                    $mm->assign(array(
                       'uid_local'=>$comment->uid,
                        'uid_foreign'=>$newHashtag->uid
                    ));
                    $mm->save();
                }else{
                    $mm=new Filecomments_hashtags_lookup();
                    $mm->assign(array(
                       'uid_local'=>$comment->uid,
                        'uid_foreign'=>$hashtag->uid
                    ));
                    $mm->save();
                }
            }
            die();
            
        }
    }
}