<?php

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
           $this->requestInitialize();
    }
    
    public function requestInitialize()
    {
        
	$this->view->setTemplateAfter('main');
    }
}
