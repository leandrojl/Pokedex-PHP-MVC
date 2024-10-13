<?php

class Router
{

    private $configuration;
    private $defaultController;

    private $defaultMethod;



    public function __construct($configuration, $defaultController, $defaultMethod)
    {
        $this->configuration = $configuration;
        $this->defaultController = $defaultController;
        $this->defaultMethod = $defaultMethod;
    }

    public function route($controllerName, $methodName){
        $controller = $this->getControllerFrom($controllerName);
        $this->executeMethodFromController($controller, $methodName);
    }

    private function getControllerFrom($module){
        $controllerName = 'get' . ucfirst($module) . 'Controller';
        $validController = method_exists($this->configuration, $controllerName) ? $controllerName : $this->defaultController;
        return call_user_func(array($this->configuration, $validController));
    }

    private function executeMethodFromController($controller, $method){

        $validMethod = method_exists($controller, $method) ? $method : $this->defaultMethod;
        call_user_func(array($controller, $validMethod));
    }
}