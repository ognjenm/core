<?php namespace Telenok\Core\Interfaces\Module\Group;

abstract class Controller extends \Telenok\Core\Interfaces\Controller\Controller { 
     
    protected $icon = 'fa fa-desktop'; 
    protected $btn = 'btn-info'; 
    protected $modelGroupModule;  
    protected $languageDirectory = 'module-group';
 
    public function getButton()
    {
        return $this->btn;
    }

    public function getIcon()
    {
        return $this->icon;
    } 
    
    public function setModelModuleGroup($model)
    {
        $this->modelGroupModule = $model;
        
        return $this;
    }
    
    public function getModelModuleGroup()
    {
        return $this->modelGroupModule;
    }
}