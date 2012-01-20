<?php

class Controller
{
    private $layouts_path;
    private $layout_name;
    private $modules_path;
    private $module_name;
    private $action_name;
    
    public function set_layouts_path($path)
    {
        $this->layouts_path = $path;
    }
    
    protected function set_layout($name)
    {
        $this->layout_name = $name;
    }
    
    public function set_module_name($name)
    {
        $this->module_name = $name;
    }
    
    public function set_action($name)
    {
        $this->action_name = $name;
    }
    
    public function set_modules_path($path)
    {
        $this->modules_path = $path;
    }
    
    private function get_view()
    {
        @include($this->modules_path . '/' . 
                        $this->module_name . '/' . $this->module_name . 
                        '.view.' . $this->action_name . '.php');
    }
    
    public function __destruct() {
        $action = $this->action_name;
        $this->$action();
        
        require($this->layouts_path . '/' . $this->layout_name . '.layout.php');
    }
}