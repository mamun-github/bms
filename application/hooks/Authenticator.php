<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticator {

    public function authenticate() {
        $ci =& get_instance();

        $controller = $ci->router->class;
        $action = $ci->router->method;

        $hasAccess = $ci->auth->checkAccess($controller, $action);

        if(!$hasAccess) {
            header("HTTP/1.1 401 Unauthorized");
            exit;
        }
    }
}