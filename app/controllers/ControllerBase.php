<?php
namespace romanprojekt\Controllers;
use Phalcon\Mvc\Controller as Controller,
	Phalcon\Mvc\Dispatcher,
	Phalcon\DI\FactoryDefault as PhDi,
	nltool\Models\Languages as Languages;

class ControllerBase extends Controller
{
    /**
    * @param Dispatcher $dispatcher
    *
    * @return bool
    */
   public function beforeExecuteRoute(Dispatcher $dispatcher)
   {
          $returnVal=true;
		
		
		if ('1' != $this->config->application->debug) {
		
			$this->view->cache(array('key' => $key));
			if ($this->view->getCache()->exists($key)) {
				$returnVal= false;
			}
		}
			
		$auth = $this->session->get('auth');
		$identity=$this->auth->getIdentity();
		
		
		
		
		  
            $controllerName = $dispatcher->getControllerName();
		 
            $actionName = $dispatcher->getActionName();
		
			
            if (!$auth && $controllerName != 'index' && $actionName != 'index' && $controllerName!='session') {
                $this->flash->notice('You don\'t have access to this module: ' . $controllerName . ':' . $actionName);
                
		}else{
		$this->requestInitialize();
            }
		
		
	return $returnVal;
    }
    
    public function requestInitialize()
    {
        if($this->config->application->debug){
			$baseUrl = $this->config->application->development->baseUri;
		}else{
			$baseUrl = $this->config->application->production->baseUri;
		}
	$this->view->setTemplateAfter('main');
        $this->view->setVar('baseurl', $baseUrl);
    }
    
    protected function forward($uri){
    	$uriParts = explode('/', $uri);
    	return $this->dispatcher->forward(
    		array(
    			'controller' => $uriParts[0], 
    			'action' => $uriParts[1]
    		)
    	);
    }
}
