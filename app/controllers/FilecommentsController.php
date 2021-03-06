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
            $playerUidArr=explode('_',$this->request->getPost('playerid'));
            $playerUid=$playerUidArr[1];
            $comments= Filecomments::find(array(
                'conditions' => 'deleted=0 AND hidden=0 AND pid= ?1 AND cruser_id=?2',
                'bind' =>array(
                    1 => $playerUid,
                    2=>$this->auth->getIdentity()['uid']
                )
            ));
            $playerHTML='';
            $environment= $this->config['application']['debug'] ? 'development' : 'production';
			$baseUri=$this->config['application'][$environment]['staticBaseUri'];
            foreach($comments as $comment){
                $feuser=$comment->getFeuser();
                $hashTagStrng='';
                $hashTags=$comment->getHashtags();
                foreach($hashTags as $hashTag){
                    $hashTagStrng.=$hashTag->title.', ';
                }
                $hashTagStrng=substr($hashTagStrng,0,-2);
                $playerHTML.='<span class="a-comment with-tooltip" style="left:'.$comment->title.'"><div class="aux-padder"></div><span class="dzstooltip arrow-bottom skin-black" style="width: 250px;"><span class="update" id="commentUpdate_'.$comment->uid.'">✎</span><span class="delete" id="comment_'.$comment->uid.'">X</span><span class="the-comment-author">'.$hashTagStrng.'</span><br><span class="the-comment-comment">'.$comment->comment.'</span><br> ...sagt '.$feuser->username.'</span><div class="the-avatar" style="background-image: url('.$baseUri.$feuser->company.')"></div></span>';
            }
            echo($playerHTML);
            die();
        }
    }
    public function switchAction(){
        if($this->request->isPost()){
            switch($this->request->getPost('action')){
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
            $environment= $this->config['application']['debug'] ? 'development' : 'production';
			$baseUri=$this->config['application'][$environment]['staticBaseUri'];
                $fileobject=explode('_',$this->request->getPost('playerid'));
                $user=$this->auth->getIdentity();
                $comment=new Filecomments();
                $comment->assign(array(
                    'pid'=> $fileobject[1],
                    'deleted'=>0,
                    'hidden'=>0,
                    'title'=> $this->request->getPost('positionpercent'),
                    'usergroup'=>0,
                    'tstamp' =>time(),
                    'crdate' => time(),
                    'cruser_id' => $user['uid'],
                    'timeindex' => $this->request->getPost('tstamp'),
                    'comment' => $this->request->getPost('comment')

                ));

                $comment->save();
                $feuser=$comment->getFeuser();
                $hashtagArr=explode(',',$this->request->getPost('hashtags'));
                foreach($hashtagArr as $postedhashtag){
                    $hashtag=  Hashtags::findFirst(array(
                       'conditions'=>'deleted=0 AND hidden=0 AND title LIKE ?1',
                        'bind' => array(1=>$postedhashtag)

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
                $playerHTML.='<span class="a-comment dzstooltip-con with-tooltip" style="left:'.$comment->title.'"><div class="aux-padder"></div><span class="dzstooltip arrow-bottom skin-black" style="width: 250px;"><span class="update" id="commentUpdate_'.$comment->uid.'">✎</span><span class="delete" id="comment_'.$comment->uid.'">X</span><span class="the-comment-author">'.$this->request->getPost('hashtags').'</span><br><span class="the-comment-comment">'.$comment->comment.'</span><br> ...sagt '.$feuser->username.'</span><div class="the-avatar" style="background-image: url('.$baseUri.$feuser->company.')"></div></span>';
                echo($playerHTML);
                die();
            
        }
    }
    
    public function deleteAction(){
        if($this->request->isPost()){
            $comment=Filecomments::findFirstByUid($this->request->getPost('uid'));
            if($comment){
                $comment->assign(array(
                   'deleted' =>1,
                    'hidden'=>1
                ));
                $comment->update();				
            }
            $lookups=Filecomments_hashtags_lookup::find(array(
                'conditions'=>'uid_local=?1',
                'bind' => array(
                    1=>$comment->uid
                )
            ));
            foreach($lookup as $lookup){
                $lookup->delete();
            }
            die();
        }
    }
	
	public function updateAction(){
        if($this->request->isPost()){
			$user=$this->auth->getIdentity();
            $comment=Filecomments::findFirstByUid($this->request->getPost('uid'));
            if($comment){
                $comment->assign(array(
                   'comment'=>$this->request->getPost('comment')
                ));
                $comment->update();
				$this->removeHashtagCons($this->request->getPost('uid'));
				 $hashtagArr=explode(',',$this->request->getPost('hashtags'));
                foreach($hashtagArr as $postedhashtag){
                    $hashtag=  Hashtags::findFirst(array(
                       'conditions'=>'deleted=0 AND hidden=0 AND title LIKE ?1',
                        'bind' => array(1=>$postedhashtag)

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
            }
			die();
        }
    }
	
	private function removeHashtagCons($uid){
		$hashtags=Filecomments_hashtags_lookup::find(array(
			'conditions'=>'uid_local=?1',
			'bind'=>array(
				1=>$uid
			)
		));
		foreach($hashtags as $hashtag ){
			$hashtag->delete();
		}
		return true;
	}
}