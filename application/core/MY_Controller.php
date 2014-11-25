<?php

class MY_Controller extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->driver('cache');
        $this->load->library('auth');
    }

    /**
     * load model, execute model
     * @param $model_name - model name to load. e.g: login_check_login
     * @param $model_package - package/folder of the model. e.g: action_model/login
     * @return mixed - execute result from model
     */
    public function execute_result($model_name, $model_package) {
        $this->load->model($model_package. STR_SLASH_FORWARD. $model_name);
        $result = $this->$model_name->execute();
        return $result;
    }

    /**
     * simply load a view
     * @param $view - view name with folder path. e.g: login, user/view_all
     */
    public function load_view($view) {
        $this->load->view($view);
    }
}