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
        if($this->request->isPost()){
            $playerUid=explode('_',$this->getPost('playerid'))[1];
            $comments= Filecomments::find(array(
                'conditions' => 'deleted=0 AND hidden=0 AND pid= ?1',
                'bind' =>array(
                    1 => $playerUid
                )
            ));
            
            $playerHTML='<span class="a-comment with-tooltip" style="left:59.66257668711656%"><div class="aux-padder"></div><span class="dzstooltip arrow-bottom skin-black" style="width: 250px;"><span class="the-comment-author">@test</span> says:<br>yestyes</span><div class="the-avatar" style="background-image: url(https://secure.gravatar.com/avatar/1aedb8d9dc4751e229a335e371db8058?s=20)"></div></span><span class="a-comment with-tooltip" style="left:23.846285767350462%"><div class="aux-padder"></div><span class="dzstooltip arrow-bottom skin-black" style="width: 250px;"><span class="the-comment-author">@test</span> says:<br>yesy</span><div class="the-avatar" style="background-image: url(https://secure.gravatar.com/avatar/1aedb8d9dc4751e229a335e371db8058?s=20)"></div></span><span class="a-comment with-tooltip" style="left:95.89473684210526%"><div class="aux-padder"></div><span class="dzstooltip arrow-bottom skin-black" style="width: 250px;"><span class="the-comment-author">@unpezvivo</span> says:<br>da end</span><div class="the-avatar" style="background-image: url(https://secure.gravatar.com/avatar/962e1ad39fbd9f9a68ca488d0249a88a?s=20)"></div></span><span class="a-comment with-tooltip" style="left:35.368421052631575%"><div class="aux-padder"></div><span class="dzstooltip arrow-bottom skin-black" style="width: 250px;"><span class="the-comment-author">@test</span> says:<br>wow</span><div class="the-avatar" style="background-image: url(https://secure.gravatar.com/avatar/1aedb8d9dc4751e229a335e371db8058?s=20)"></div></span><span class="dzstooltip-con" style="left:67.73684210526316%"><span class="dzstooltip arrow-from-start transition-slidein arrow-bottom skin-black" style="width: 250px;"><span class="the-comment-author">@razorflashmedia</span> says:<br>test</span><div class="the-avatar" style="background-image: url(https://secure.gravatar.com/avatar/1c92e61b4197e44f4a73472a7037536f?s=20)"></div></span><span class="dzstooltip-con" style="left:15.526315789473685%"><span class="dzstooltip arrow-from-start transition-slidein arrow-bottom skin-black" style="width: 250px;"><span class="the-comment-author">@razorflashmedia</span> says:<br>tatatata</span><div class="the-avatar" style="background-image: url(https://secure.gravatar.com/avatar/1c92e61b4197e44f4a73472a7037536f?s=20)"></div></span>';
            
        }
    }
    public function switchAction(){
        if($this->request->isPost()){
            switch($this->getPost('action')){
                case 'dzsap_front_submitcomment':
                    $this->createAction();
                    break;
                case 'dzsap_get_comments':
                    $this->indexAction();
                    break;
            }
        }
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