<div class="grid_4 suffix_4 prefix_4">
    <div id="login_form">
        <div id="login_form_title" class="text_center">gFrame</div>
    
        <div id="login_form_body">
            <?php
                $form = new Form();
                
                $form->set_method('post')
                        ->set_action('index.php?lang=en&method=admin&action=check_login')
                        ->add_element('text',
                                array('label' => array('title' => 'Username'),
                                    'id' => 'username'))
                        ->add_element('password', 
                                array('id' => 'password',
                                    'label' => array('title' => 'Password')))
                        ->add_element('submit', 
                                array('value' => 'Login'))
                        ->print_output();
            ?>
        </div>
    </div>
</div>