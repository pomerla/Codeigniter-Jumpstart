<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
    function __construct() {
        parent::__construct();
        if (!$this->tank_auth->is_logged_in()) redirect('/auth/login/');
        $this->load->model('profiles');
        $this->data['user'] = $this->profiles->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
    }
    
    function index() {
        $this->render('user/profile');
    }
}
