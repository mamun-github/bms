<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AuthenticationHooks {

    /**
     * authenticate all request to application
     */
    public function authenticate() {
        $ci =& get_instance();

        $controller = $ci->router->class;
        $action = $ci->router->method;

        $hasAccess = $ci->auth->check_access($controller, $action);

        if(!$hasAccess) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                header("HTTP/1.1 401 Unauthorized");
                exit;
            }
            header("HTTP/1.1 401 Unauthorized");
            header("location: ". base_url());
            exit;
        }
    }
}