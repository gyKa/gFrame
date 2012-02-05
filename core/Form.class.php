<?php

class Form
{
    /**
     * Form action
     * 
     * @var string
     */
    private $action;
    
    /**
     * Form method
     * 
     * @var string 
     */
    private $method;
    
    /**
     * Enables uploading support
     * 
     * @var bool
     */
    private $enabled_uploading = FALSE;
    
    /**
     * Form attributes
     * 
     * @var array
     */
    private $attributes = array();
    
    /**
     * Form output
     * 
     * @var string 
     */
    private $form_output;
    
    /**
     * Form elements output
     * 
     * @var string
     */
    private $elements_output;

    public function set_action($action)
    {
        $this->action = $action;
        
        return $this;
    }
    
    public function set_method($method)
    {
        $this->method = $method;
        
        return $this;
    }
    
    public function enable_uploading()
    {
        $this->enabled_uploading = TRUE;
        
        return $this;
    }
    
    public function set_attribute($key, $value)
    {
        $this->attributes[] = array($key => $value);
        
        return $this;
    }
    
    public function add_element($type, $attributes = array())
    {
        $output = '';
        
        switch ($type)
        {
            case 'text':
                if (!empty($attributes['label']))
                    $this->add_label($attributes['label']['title'], 
                            $attributes['id'],
                            $attributes['label']['attributes']);
                        
                $output .= '<input type="text"';
                $output .= $this->add_attributes($attributes);
                $output .= " />\n";
                
                break;
            
            case 'password':
                if (!empty($attributes['label']))
                    $this->add_label($attributes['label']['title'], 
                            $attributes['id'],
                            $attributes['label']['attributes']);
                
                $output .= '<input type="password"';
                $output .= $this->add_attributes($attributes);
                $output .= " />\n";
                
                break;
            
            case 'submit':
                $output .= '<input type="submit"';
                $output .= $this->add_attributes($attributes);
                $output .= " />\n";
                
                break;
        }
        
        $this->elements_output .= $output;
        
        return $this;
    }
    
    /**
     * Adds label for element of the form
     * 
     * @param string $title
     * @param string $for
     * @param array $attributes 
     */
    private function add_label($title, $for = NULL, $attributes = array())
    {
        $output = '<label';
        
        if (!is_null($for))
            $output .= " for='$for'";
        
        $output .= $this->add_attributes($attributes);
        $output .= ">$title</label>\n";
        
        $this->elements_output .= $output;
    }


    /**
     * Adds attributes for element of the form
     * 
     * @param array $attributes
     * @return string 
     */
    private function add_attributes($attributes)
    {
        $output = '';
        
        if (!empty($attributes))
            foreach($attributes as $key => $value)
                if ($key === 'label')
                    continue;
                else
                    $output .= ' ' . $key . '="' . $value .'"';
        
        return $output;
    }
    
    /**
     * Generates form attributes and merges with elements' output  
     */
    private function generate()
    {
        $output = '<form';
        
        if ($this->enabled_uploading)
            $output .= " enctype='multipart/form-data'";
        
        if (!is_null($this->method))
            $output .= " method='$this->method'";
        
        if (!is_null($this->action))
            $output .= " action='$this->action'";
        
        if (!empty($this->attributes))
            foreach($this->attributes as $attribute)
                foreach($attribute as $key => $value)
                    $output .= " $key='$value'";
        
        $output .= ">\n";
        $output .= $this->elements_output;
        $output .= '</form>';
        
        $this->form_output = $output;
    }
    
    /**
     * Prints form output 
     */
    public function print_output()
    {
        $this->generate();
        
        echo $this->form_output;
    }
}

?>
