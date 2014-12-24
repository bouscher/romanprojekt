<?php
namespace romanprojekt\Controllers;
class IndexController extends ControllerBase
{
    private $_loginForm;
    
    public function indexAction()
    {
        $auth = $this->session->get('auth');
	$this->_loginForm = new LoginForm();
	if(!$auth){			
            $this->view->form = $this->_loginForm;
			/*$this->dispatcher->forward(array(
            "controller" => "index",
            "action" => "index"
        ));*/
	}else{
		//$this->flashSession->success('Willkommen '.$auth['username']);
		$this->dispatcher->forward(array(
            "controller" => "fileobject",
            "action" => "index"
				));
			
		}
		
        
    }
    public function overviewAction(){
        
    }

}

