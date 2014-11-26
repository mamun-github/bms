<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//schema create hook

/*$hook['pre_controller'][] = array(
    'class'    => 'BootstrapHooks',
    'function' => 'create_schema',
    'filename' => 'BootstrapHooks.php',
    'filepath' => 'hooks'
);*/

//default data create hook

/*$hook['post_controller'][] = array(
    'class'    => 'BootstrapHooks',
    'function' => 'create_default_data',
    'filename' => 'BootstrapHooks.php',
    'filepath' => 'hooks'
);*/


$hook['post_controller'][] = array(
    'class'    => 'AuthenticationHooks',
    'function' => 'authenticate',
    'filename' => 'AuthenticationHooks.php',
    'filepath' => 'hooks'
);


/* End of file hooks.php */
/* Location: ./application/config/hooks.php */