<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Entries extends CI_Model {

    public $_entries_directory = 'directory';
    public $_entries_company = 'company';
    public $_entries_asset = 'asset';
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

    //the section for entry editing: get, add, delete, update-------------------------------
    //get a single entry 

    //get all entries that belong to the company
    public function getPagesEntries($company_id, $perpage){
        $rows = $this->db->select('id')
                               ->from($this->_entries_directory)
                               ->where(array('company_id' => $company_id))
                               ->count_all_results();
        $pages= ceil($rows/$perpage);
        return $pages;
    }
    public function getEntries($company_id, $perpage=30, $page = 1, $order_name = '', $order = '') {
        
        $this->db->select('first_name, last_name, telephone, id, company_id')
                 ->from($this->_entries_directory)
                 ->where(array('company_id' => $company_id));
        
        if ($page == 1) {
            $this->db->limit($perpage, 0);
        } else {
            $this->db->limit($perpage, ($page - 1) * $perpage);
        }
        
        if($order_name !== '' && $order !== ''){
            $this->db->order_by($order_name, $order);
        }

        
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

    public function addEntry($data, $duplicate_warning = true) {
        //if duplicate warning is true
        //will warn duplicate record
        //else will not report
        $this->db->select('id');
        $this->db->from($this->_entries_directory);
        $this->db->where(array('first_name' => $data['first_name'], 'last_name'=> $data['last_name'], 'telephone' => $data['telephone'], 'company_id' => $data['company_id']));

        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            //duplicate record
            if ($duplicate_warning) {
                $this->error(1);
                $this->message("Sorry, the entry already exists.");
                return false;
            } else {
                return true;
            }
        } else {
            $this->db->insert($this->_entries_directory, $data);

            if ($this->db->affected_rows() > 0) {
                $this->error(0);
                $this->message("A new entry is created successfully.");
                return true;
            } else {
                $this->error(1);
                $this->message("Sorry, the entry cannot be created.");
                return false;
            }
        }
    }

    public function deleteEntry($id, $c_id) {
        //first examine if the entry belongs to the company
        //
        $this->db->select('company_id');
        $this->db->from($this->_entries_directory);
        $this->db->where(array('id' => $id));
        //if entry does not exist
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            //if entry exists
            $r = $result->first_row('array');
            if ($c_id == $r['company_id']) {
                //company id match
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
            } else {
                //company id does not match
                $this->error(1);
                $this->message("This entry does not belong to your company. You cannot delete it");
                return false;
            }
        } else {
            //if entry does not exist 
            $this->error(1);
            $this->message("Sorry, the entry does not exists.");
            return false;
        }
    }

    public function updateEntry($first_name, $last_name, $telephone, $id) {
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'telephone' => $telephone
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

    // the section for company editing: get-----------------------------
    public function getCompany($company_id) {
        $result = $this->db->select('name, title, prompt, xml_key')
                            ->where(array('id' => $company_id))
                            ->limit(1)
                            ->get($this->_entries_company);
        if ($result->num_rows() > 0) {
            $r = $result->row_array();
            return $r;
        } else {
            $this->error(1);
            return false;
        }
    }
    public function getCompanyID($key){
        $id = $this->db->select('id')
                ->where('xml_key', $key)
                ->limit(1)
                ->get($this->_entries_company);
        if($id->num_rows() != 1){
            $this->error(1);
            return false;
        }else{
            $r = $id->row();
            return $r->id;
        }
    }

    public function updateCompany($id, $data) {
        $r = $this->db->select('id')
                  ->where('id !=', $id)
                  ->where('name', $data['name'])
                  ->limit(1)
                  ->get($this->_entries_company);
        if($r->num_rows() > 0){
            //duplicate entries
            $this->error(1);
            $this->message("Sorry, the company name already exists.");
            return false;
        }
        
        $this->db->where('id', $id);
        $this->db->update($this->_entries_company, $data);

        if ($this->db->affected_rows() > 0) {
            $this->error(0);
            $this->message("You have updated your company directory information.");
            return true;
        } else {
            $this->error(1);
            $this->message("Sorry, the company directory information counld not be updated.");
            return false;
        }
    }

    //the section for getting xml file
    public function getXml($id) {
            return $this->getEntries($id);
    }
    
    
    //error
    public function error($i = null) {
        if ($i != null) {
            $this->_entries_error = $i;
        }
        return $this->_entries_error;
    }

    public function message($m = null) {
        if ($m != null) {
            $this->_entries_message = $m;
        }
        return $this->_entries_message;
    }
    
    //check 
    public function paraName($name, $pattern){
        if($pattern === 'entry'){
            if($name ==='first_name' || $name === 'last_name' || $name === 'telephone'){
                return true;
            }else
                return FALSE;
        }elseif($pattern === 'admin'){
            if($name === 'first_name' || $name === 'last_name' || $name === 'company' || $name === 'phone' || $name === 'email'){
                return TRUE;
            }else
                return FALSE;
        }else{
            return FALSE;
        }
    }
    
    public function paraOrder($order){
        if($order === 'asc' || $order === 'desc'){
            return true;
        }else{
            return false;
        }
    } 

}

?>
