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
    public function getEntry($id) {
        $this->db->select('company_id');
        $this->db->from($this->_entries_directory);
        $this->db->where(array('id' => $id));

        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $row = $result->first_row('array');
            $company_id = $row['company_id'];
            return $company_id;
        } else {
            $this->error(1);
            $this->message("Sorry, there is not such entry.");
            return false;
        }
    }

    //get all entries that belong to the company
    public function getEntries($company_id, $page = 1) {
        $this->db->select('name, telephone, id');
        $this->db->from($this->_entries_directory);
        $this->db->where(array('company_id' => $company_id));
        if ($page == 1) {
            $this->db->limit(30, 0);
        } else {
            $this->db->limit(30, ($page - 1) * 30);
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

    public function addEntry($name, $telephone, $company_id) {
        $data = array(
            'name' => $name,
            'telephone' => $telephone,
            'company_id' => $company_id
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

    public function updateEntry($name, $telephone, $id) {
        $data = array(
            'name' => $name,
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
        $this->db->select('name, title, prompt');
        $this->db->from($this->_entries_company);
        $this->db->where(array('id' => $company_id));

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

    public function updateCompany($data) {
        $this->db->where('id', $data['id']);
        $this->db->update($this->_entries_directory, $data);

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
    public function getXml($key) {
        $this->db->select('company_id');
        $this->db->from($this->_entries_asset);
        $this->db->where(array('xml_key' => $key));

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

    // the section for asset editing: add, delete, edit, get
    public function addAsset($data, $duplicate_warning = true) {
        //if duplicate warning is true
        //will warn duplicate record
        //else will not report
        $this->db->select('id');
        $this->db->from($this->_entries_asset);
        $this->db->where(array('serial_number' => $data['serial_number'], 'mac' => $data['mac']));

        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            //duplicate record
            if ($duplicate_warning) {
                $this->error(1);
                $this->message("Sorry, Duplicate record.");
                return false;
            } else {
                return true;
            }
        } else {
            $this->db->insert($this->_entries_asset, $data);

            if ($this->db->affected_rows() > 0) {
                $this->error(0);
                $this->message("A new asset is added successfully.");
                return true;
            } else {
                $this->error(1);
                $this->message("Sorry, the asset cannot be added.");
                return false;
            }
        }
    }

    public function getAssets($company_id, $page = 1) {
        $this->db->select('id, model, serial_number, mac, xml_key');
        $this->db->from($this->_entries_asset);
        $this->db->where(array('company_id' => $company_id));

        if ($page == 1) {
            $this->db->limit(30, 0);
        } else {
            $this->db->limit(30, ($page - 1) * 30);
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

}

?>
