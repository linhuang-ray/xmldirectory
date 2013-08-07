<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Test extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    function index(){
        echo '<img src="'.base_url().'img/green.png" style="background-color:red" />' ;
    }
}
?>
