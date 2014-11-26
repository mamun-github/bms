<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        // Output
        if ($echo == TRUE) {
            echo $output;
        } else {
            return $output;
        }
    }
}
if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE)
    {
        dump($var, $label, $echo);
        exit;
    }
}

/**
 * do a md5 hash with salt
 */
if(!function_exists('hash_password')) {
    function hash_password($password) {
        $salt = '#*$e@U!rE*^';
        return md5($salt . $password. $salt);
    }
}

/**
 * parse object to boolean value
 */
if (!function_exists('parse_boolean')) {
    function parse_boolean($obj)
    {
        return filter_var($obj, FILTER_VALIDATE_BOOLEAN);
    }
}

/**
 * log error/exception message, send email
 */
if(!function_exists('log_error')) {
    function log_error($ex) {
        log_message(ERROR, $ex->getMessage());
        try{
            $to = TO_EMAIL_FOR_ERROR;
            $sub = "Exception report";
            $message = "This mail reports an error/exception in :". $ex->getFile(). STR_HTML_BR;
            $message .= $ex->getMessage();
            mail($to, $sub, $message);
        } catch(Exception $ex) {
            log_message(ERROR, 'Failed to send mail');
        }
    }
}