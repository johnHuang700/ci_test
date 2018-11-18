<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $data['pass'] = password_hash('test',PASSWORD_DEFAULT);
            if(password_verify('test','$2y$10$C4VRl2nBrGBTIxBFaFtDnu3qDZOePedDQD3qRRQT8Ujj1PZ91KB9G')){
                $data['valid'] = 'valid';
            }else{
                $data['valid']= 'Invalid';
            }
	    $this->load->view('welcome_message',$data);
	}
}
