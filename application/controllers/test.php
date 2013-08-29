<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
    }

    function index() {
        $path = 'http://10.245.1.148/xml/Green_itc/e0c8ce9da3633bc3acd3a6bfe8e6778d2ee31958_1.xml';
        $words = explode('_', $path);
        $c = count($words);
            $p = explode('.', $words[$c-1]);
            $page = $p[0];
        $nextURL = preg_replace('/_[0-9]/', '_'.($page+1), $path);
        
        echo $nextURL;
    }

    function createFile() {
        $m = 'John';
        $s = 'Peter';
        $mac = '2313';

        $i = 0;
        $data = '';
        for ($i = 0; $i < 60; $i++) {
            $data = $data . $m . ',' . $s . ',' . $mac . $i ."\n";
        }

        /*$a = read_file('./upload/test.csv');

        if (preg_match('/^[A-Za-z0-9,\n]+$/', $a)) {
            $file = fopen('./upload/test.csv', 'r');
            $i = 1;
            while (!feof($file)) {
                echo $i . '--' . fgets($file) . "<br />";
                $i++;
            }
            fclose($file);
        }*/
        /*if (!write_file('./upload/test.csv', $data)) {
          echo 'Unable to write the file';
          } else {
          echo 'File written!';
          }*/
        /*if (!write_file('./upload/test11.csv', $data)) {
          echo 'Unable to write the file';
          } else {
          echo 'File written!';
          }*/
        echo sha1('password123'.'9462e8eee0');
    }

}

?>
