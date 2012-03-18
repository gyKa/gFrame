<?php

class Controller
{
    private $layouts_path;
    private $layout_name;
    private $modules_path;
    private $module_name;
    private $action_name;
    private $debugging_mode;
    private $start_time;
    
    protected $variables = array();
    
    public function set_layouts_path($path)
    {
        $this->layouts_path = $path;
    }
    
    public function set_debugging_mode($mode)
    {
        $this->debugging_mode = $mode;
    }
    
    public function set_start_time($time)
    {
        $this->start_time = $time;
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
        
        $time = microtime();
        $time = explode(" ", $time);
        $finish = $time[1] + $time[0];
        $total_time = ($finish - $this->start_time);
        
        echo "\n\n";
        echo '<!-- ' . 'Debugging mode: ' . $this->debugging_mode . " -->\n";
        echo '<!-- ' . 'Page loaded in: ' . $total_time . " -->\n";
    }
}