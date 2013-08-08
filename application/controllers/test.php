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
        echo '<br>';
         echo '<br>';
         $serial = 'CCQ16470SEC';
         $mac = 'A44C119F24E1';
         echo sha1($serial . $mac);
    }
}
?>
