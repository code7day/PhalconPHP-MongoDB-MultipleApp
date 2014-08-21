<?php

namespace Backend\Controllers;

class BaseController extends \Phalcon\Mvc\Controller
{
	public function onConstruct()
	{
		$this->assets
			->collection('remoteStyles')
			->addCss('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700', false)
			->addCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', false)
			->addCss('https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false);
		
        $this->assets
			->collection('localStyles')
			->addCss('css/backend/style.css')
            ->addCss('css/backend/marpad.css')
			->setTargetPath('css/compiled/backend.css')
			->setTargetUri('css/compiled/backend.css')
			->join(true)
			->addFilter(new \Phalcon\Assets\Filters\Cssmin());

        $this->assets
        	->collection('remoteJs')
        	->addJs('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false)
        	->addJs('https://code.jquery.com/jquery-migrate-1.2.1.min.js', false)
            ->addJs('https://code.jquery.com/ui/1.11.0/jquery-ui.min.js', false)
        	->addJs('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', false)
            ->addJs('js/thirdParty/jquery.validationEngine.js', true, true)
            ->addJs('js/thirdParty/jquery.validationEngine-en.js', true, true);
            
        $this->assets
        	->collection('localJs')
        	->addJs('js/backend/appBase.js')
         	->setTargetPath('js/compiled/backend.js')
			->setTargetUri('js/compiled/backend.js')
			->join(true)
			->addFilter(new \Phalcon\Assets\Filters\Jsmin());
	}
}