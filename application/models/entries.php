<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Entries extends CI_Model {

    public $_entries_directory = 'directory';
    public $_entries_company = 'company';
    public $_entries_where = array();

    /**
     * Limit
     *
     * @var string
     * */
    public $_entries_limit = NULL;

    /**
     * Offset
     *
     * @var string
     * */
    public $_entries_offset = NULL;

    /**
     * Order By
     *
     * @var string
     * */
    public $_entries_order_by = NULL;

    /**
     * Order
     *
     * @var string
     * */
    public $_entries_order = NULL;

    
    public $_entries_error = 0;
    public $_entries_message = '';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getEntries($company_id) {
        $this->db->select('name, telephone, id');
        $this->db->from($this->_entries_directory);
        $this->db->where(array('company_id' => $company_id));

        $result = $this->db->get();
        $i = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $r[$i] = $row;
                $i++;
            }
        } else {
            $this->error(1);
            return false;
        }
        return $r;
    }

    

    public function addEntry($name, $telephone, $company_id) {
        $data = array(
            'name'          => $name,
            'telephone'     => $telephone,
            'company_id'    => $company_id
        );

        $this->db->insert($this->_entries_directory, $data);

        if ($this->db->affected_rows() > 0) {
            $this->error(0);
            $this->message("A new entry is added successfully.");
            return true;
        } else {
            $this->error(1);
            $this->message("Sorry, the entry cannot be added.");
            return false;
        }
    }

    public function deleteEntry($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->_entries_directory);

        if ($this->db->affected_rows() > 0) {
            $this->error(0);
            $this->message("You have deleted one entry sucessfully.");
            return true;
        } else {
            $this->error(1);
            $this->message("Sorry, the entry counld not be deleted.");
            return false;
        }
    }
    
    public function updateEntry($name, $telephone, $id){
        $data = array(
          'name'        => $name,
          'telephone'   => $telephone
        );
        
        $this->db->where('id', $id);
        $this->db->update($this->_entries_directory, $data);
        
        if ($this->db->affected_rows() > 0) {
            $this->error(0);
            $this->message("You have updated one entry sucessfully.");
            return true;
        } else {
            $this->error(1);
            $this->message("Sorry, the entry counld not be updated.");
            return false;
        }
    }
    
    public function getCompany($company_id) {
        $this->db->select('name, title, prompt');
        $this->db->from($this->_entries_company);
        $this->db->where(array('id'=>$company_id));

        $result = $this->db->get();
        $i = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                $r[$i] = $row;
                $i++;
            }
        } else {
            $this->error(1);
            return false;
        }
        return $r;
    }
    
    public function getXml($ip){
        $this->db->select('company_id');
        $this->db->from('ip_xmlrequest');
        $this->db->where(array('ip_address'=>$ip));
        
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $row = $result->first_row('array');
            $company_id = $row['company_id'];
            return $this->getEntries($company_id);
        } else {
            $this->error(1);
            return false;
        }
    }
    
    public function error($i = null) {
        if($i != null){
            $this->_entries_error = $i;
        }
        return $this->_entries_error;
    }

    public function message($m = null) {
        if($m != null){
            $this->_entries_message = $m;
        }
        return $this->_entries_message;
    }

}

?>
