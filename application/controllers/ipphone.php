<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Ipphone extends CI_Controller {

    var $_home;

    function __construct() {
        parent::__construct();

        $this->_home = 'ipphone';

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');

        $this->load->database();

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
        $this->load->model('entries');
    }

    function index() {

        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect($this->_home . '/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            //redirect them to the home page because they must be an administrator to view this
            //set message content and style
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['success'] = (trim($this->session->flashdata('success')) == '') ? 'alert-info' : $this->session->flashdata('success');

            //request the data from the company
            $this->data['company_id'] = $this->session->userdata('company');
            $this->data['username'] = ucwords($this->session->userdata('username'));
            if (trim($this->input->get('page')) != '') {
                $page = trim($this->input->get('page'));
                if (ctype_digit($page)) {
                    $this->data['page'] = $page;
                } else {
                    show_404();
                }
            } else {
                $page = 1;
            }
            $this->data['entries'] = $this->entries->getEntries($this->data['company_id'], $page);
            
            $this->data['company'] = $this->entries->getCompany($this->data['company_id']);

            $this->_render_page($this->_home . '/edit_entry', $this->data);
        } else {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['success'] = $this->session->flashdata('success');
            //list the users
            $this->data['username'] = ucwords($this->session->userdata('username'));
            $this->data['company_id'] = $this->session->userdata('company');
            $this->data['company'] = $this->entries->getCompany($this->data['company_id']);
            $this->data['users'] = $this->ion_auth->users()->result();
            foreach ($this->data['users'] as $k => $user) {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }

            $this->_render_page($this->_home . '/index', $this->data);
        }
    }

    //entry editing section -----------------------
    //add entry function
    function add_entry() {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page if not login
            redirect($this->_home . '/login', 'refresh');
        } else {
            //set the validation rules for entry
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|xss_clean');
            $this->form_validation->set_rules('telephone', 'Telephone Number', 'trim|required|min_length[1]|xss_clean|callback_validate_phone');

            if ($this->form_validation->run() == true) {
                $data['first_name'] = ucwords(strtolower($this->input->post('first_name')));
                $data['last_name'] = ucwords(strtolower($this->input->post('last_name')));
                $data['telephone'] = $this->input->post('telephone');
                $data['company_id'] = $this->session->userdata('company');
                if ($this->entries->addEntry($data, true) === true) {
                    $this->session->set_flashdata('success', 'alert-success');
                } else {
                    $this->session->set_flashdata('success', 'alert-danger');
                }
                $this->session->set_flashdata('message', $this->entries->message());
            } else {
                $this->session->set_flashdata('success', 'alert-danger');
                $this->session->set_flashdata('message', validation_errors());
            }
            redirect($this->_home . '/index', 'refresh');
        }
    }

    function delete_entry($id) {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect($this->_home . '/login', 'refresh');
        } else {
            $result = $this->entries->deleteEntry($id, $this->session->userdata('company'));
            if ($result === false) {
                //something wrong
                $this->session->set_flashdata('success', 'alert-danger');
            } else {
                //all good
                $this->session->set_flashdata('success', 'alert-success');
            }
            $this->session->set_flashdata('message', $this->entries->message());
            redirect($this->_home . '/index', 'refresh');
        }
    }

    function update_entry() {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect($this->_home . '/login', 'refresh');
        } else {
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|xss_clean');
            $this->form_validation->set_rules('telephone', 'Telephone Number', 'trim|required|min_length[8]|xss_clean|callback_validate_phone');

            if ($this->form_validation->run() == true) {
                $first_name = ucwords(strtolower($this->input->post('first_name')));
                $last_name = ucwords(strtolower($this->input->post('last_name')));
                $telephone = $this->input->post('telephone');
                $id = $this->input->post('id');

                if ($this->entries->updateEntry($first_name, $last_name, $telephone, $id) === true) {
                    $this->session->set_flashdata('success', 'alert-success');
                } else {
                    $this->session->set_flashdata('success', 'alert-danger');
                }
                $this->session->set_flashdata('message', $this->entries->message());
            } else {
                $this->session->set_flashdata('success', 'alert-danger');
                $this->session->set_flashdata('message', validation_errors());
            }

            redirect($this->_home . '/index', 'refresh');
        }
    }

    function upload_entry() {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect($this->_home . '/login', 'refresh');
        } else {
            $config['upload_path'] = './upload/entry/';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '1000';
            $date = date('Y_m_j');
            $name = $date . '_' . $_FILES['entry_file']['name'];
            $path_to_file = './upload/entry/' . $name;

            if (!file_exists($path_to_file)) {
                $config['file_name'] = $name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('entry_file')) {
                    //upload unsuccessful
                    $error = array('error' => $this->upload->display_errors());
                    $messages = '';
                    foreach ($error as $key => $e) {
                        $message = ucwords($key) . ': ' . ucwords($e);
                        $messages = $messages . $message;
                    }
                    $this->session->set_flashdata('message', $messages);
                    $this->session->set_flashdata('success', 'alert-danger');
                    if (file_exists($path_to_file)) {
                        unlink($path_to_file);
                    }
                } else {
                    //upload successful

                    $r = $this->validateFile($path_to_file, 3, true, false);

                    if ($r['error'] === false) {
                        $c_id = $this->session->userdata('company');
                        $file = fopen($path_to_file, 'r');
                        while (!feof($file)) {
                            $line = fgetcsv($file);
                            $data = array(
                                'company_id' => $c_id,
                                'first_name' => trim($line[0]),
                                'last_name' => trim($line[1]),
                                'telephone' => trim($line[2])
                            );
                            $insert_correct = $this->entries->addEntry($data, false);
                            if (!$insert_correct) {
                                $error_line = $data;
                                break;
                            }
                        }
                        fclose($file);

                        if ($insert_correct) {
                            $this->session->set_flashdata('message', 'All entries have been added correctly.');
                            $this->session->set_flashdata('success', 'alert-success');
                        } else {
                            unlink($path_to_file);
                            $this->session->set_flashdata('message', 'The line at: first name->' . $error_line['first_name'] . ' last name->' . $error_line['last_name'] . 'telephone->' . $error_line['telephone'] . ' was not added successfully.');
                            $this->session->set_flashdata('success', 'alert-danger');
                        }
                    } else {
                        unlink($path_to_file);
                        $this->session->set_flashdata('message', $r['error']);
                        $this->session->set_flashdata('success', 'alert-danger');
                    }
                    //read file from upload directory
                }
            } else {
                $this->session->set_flashdata('message', 'The file already exists, please rename your file and upload again.');
                $this->session->set_flashdata('success', 'alert-danger');
            }
            redirect($this->_home . '/index', 'refresh');
        }
    }

    //xml section -------------------------------------------------
    function xml_directory($key) {
        $company_id = $this->entries->getCompanyID($key);
        $this->data['id'] = $company_id;
        if($company_id === false){
            //no such key in company table
            $this->data['company']['title'] = 'No Entry in This Directory'; 
            $this->data['company']['prompt'] = 'Please add entries in "Manage Entry" dashboard';
        }else{
            $this->data['entries'] = $this->entries->getXml($company_id);
            if(empty($this->data['entries'])){
                $this->data['company']['title'] = 'No Entry in This Directory'; 
                $this->data['company']['prompt'] = 'Please add entries in "Manage Entry" dashboard';
            }else{
                $this->data['company'] = $this->entries->getCompany($company_id);
            }
        }
        
        $this->load->view($this->_home . '/xmlentry', $this->data);
    }

    function change_company_info(){
        if (!$this->ion_auth->logged_in()) {
            redirect($this->_home . '/login', 'refresh');
        } else {
            $this->form_validation->set_rules('name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
            
            if ($this->form_validation->run() == false) {
                $message = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->session->set_flashdata('message', $message);
                $this->session->set_flashdata('success', 'alert-danger');
            }else{
                $data['name'] = trim($this->input->post('name'));
                $data['title'] = trim($this->input->post('title'));
                $data['prompt'] = trim($this->input->post('prompt'));
                $identity = $this->session->userdata('user_id');
                $company_id = $this->ion_auth->user($identity)->row()->company;
                
                $change = $this->entries->updateCompany($company_id ,$data);
                
                if ($change) {
                    
                    $this->session->set_flashdata('message', $this->entries->message());
                    $this->session->set_flashdata('success', 'alert-success');
                } else {
                    $this->session->set_flashdata('message', $this->entries->message());
                    $this->session->set_flashdata('success', 'alert-danger');
                }
            }
            redirect($this->_home . '/manage_account', 'refresh');
        }
    }
    
    //user section --------------------
    function manage_account() {
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect($this->_home . '/login', 'refresh');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['success'] = (trim($this->session->flashdata('success')) == '') ? 'alert-info' : $this->session->flashdata('success');

            //get company information
            $this->data['company_id'] = $this->session->userdata('company');
            $this->data['company'] = $this->entries->getCompany($this->data['company_id']);

            //set user information
            $this->data['user_id'] = ucwords($this->session->userdata('user_id'));
            $this->data['user'] = $this->ion_auth->user($this->data['user_id'])->row();

            $this->_render_page($this->_home . '/account_management', $this->data);
        }
    }

    function login() {
        $this->data['title'] = "Login";

        //validate form input
        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            //check to see if the user is logging in
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('success', 'alert-success');
                redirect($this->_home . '/index', 'refresh');
            } else {
                //if the login was un-successful
                //redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                $this->session->set_flashdata('success', 'alert-danger');
                redirect($this->_home . '/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            //the user is not logging in so display the login page
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['success'] = $this->session->flashdata('success');
            $this->_render_page($this->_home . '/login', $this->data);
        }
    }

    function logout() {
        $this->data['title'] = "Logout";

        //log the user out
        $logout = $this->ion_auth->logout();

        //redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        $this->session->set_flashdata('success', 'alert-success');
        redirect($this->_home . '/login', 'refresh');
    }

    //change user information
    function change_user_info(){
        if (!$this->ion_auth->logged_in()) {
            redirect($this->_home . '/login', 'refresh');
        } else {
            $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
            $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
            $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
            
            if ($this->form_validation->run() == false) {
                $message = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->session->set_flashdata('message', $message);
                $this->session->set_flashdata('success', 'alert-danger');
            }else{
                $data['first_name'] = trim($this->input->post('first_name'));
                $data['last_name'] = trim($this->input->post('last_name'));
                $data['phone'] = trim($this->input->post('phone'));
                $identity = $this->session->userdata('user_id');
                
                $change = $this->ion_auth->update($identity, $data);
                
                if ($change) {
                    
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    $this->session->set_flashdata('success', 'alert-success');
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    $this->session->set_flashdata('success', 'alert-danger');
                }
            }
            redirect($this->_home . '/manage_account', 'refresh');
        }
    }
    //change password
    function change_password() {
        if (!$this->ion_auth->logged_in()) {
            redirect($this->_home . '/login', 'refresh');
        } else {
            $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
            $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                //display the form
                //set the flash data error message if there is one
                $message = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->session->set_flashdata('message', $message);
                $this->session->set_flashdata('success', 'alert-danger');
            } else {
                $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

                $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

                if ($change) {
                    //if the password was successfully changed
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    $this->session->set_flashdata('success', 'alert-success');
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    $this->session->set_flashdata('success', 'alert-danger');
                }
            }
            redirect($this->_home . '/manage_account', 'refresh');
        }
    }

    //forgot password
    function forgot_password() {
        $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required');
        if ($this->form_validation->run() == false) {
            //setup the input
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
            );

            if ($this->config->item('identity', 'ion_auth') == 'username') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            //set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['success'] = 'alert-danger';
            $this->_render_page($this->_home . '/forgot_password', $this->data);
        } else {
            // get identity for that email
            $config_tables = $this->config->item('tables', 'ion_auth');
            $identity = $this->db->where('email', $this->input->post('email'))->limit('1')->get($config_tables['users'])->row();

            if (empty($identity)) {
                $this->ion_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("ipphone/forgot_password", 'refresh');
            }

            //run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                //if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('success', 'alert-success');
                redirect("ipphone/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("ipphone/forgot_password", 'refresh');
            }
        }
    }

    //reset password - final step for forgotten password
    public function reset_password($code = NULL) {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {
            //if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                //display the form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                //render
                $this->_render_page($this->_home . '/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                    //something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        $this->logout();
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect($this->_home . '/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("ipphone/forgot_password", 'refresh');
        }
    }

    //activate the user
    function activate($id, $code = false) {
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            //redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->session->set_flashdata('success', 'alert-success');
            redirect($this->_home, 'refresh');
        } else {
            //redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            $this->session->set_flashdata('success', 'alert-danger');
            if (!$this->ion_auth->is_admin()) {
                redirect("ipphone/forgot_password", 'refresh');
            } else {
                redirect($this->_home, 'refresh');
            }
        }
    }

    //deactivate the user
    function deactivate($id = NULL) {
        if (!$this->ion_auth->is_admin()) {
            redirect($this->_home, 'refresh');
        } else {
            if ($this->ion_auth->deactivate($id)) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('success', 'alert-success');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                $this->session->set_flashdata('success', 'alert-danger');
            }
            //redirect them back to the auth page
            redirect($this->_home, 'refresh');
        }
    }

    function upload_users() {
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
            $config['upload_path'] = './upload/users/';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '1000';
            $date = date('Y_m_j');
            $name = $date . '_' . $_FILES['users_file']['name'];
            $path_to_file = './upload/users/' . $name;

            if (!file_exists($path_to_file)) {
                $config['file_name'] = $name;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('users_file')) {
                    //upload unsuccessful
                    $error = array('error' => $this->upload->display_errors());
                    $messages = '';
                    foreach ($error as $key => $e) {
                        $message = ucwords($key) . ': ' . ucwords($e);
                        $messages = $messages . $message;
                    }
                    $this->session->set_flashdata('message', $messages);
                    $this->session->set_flashdata('success', 'alert-danger');
                    if (file_exists($path_to_file)) {
                        unlink($path_to_file);
                    }
                } else {
                    //upload successful

                    $r = $this->validateUserFile($path_to_file, 7, false, true);

                    if ($r['error'] === false) {
                        $file = fopen($path_to_file, 'r');
                        while (!feof($file)) {
                            $line = fgetcsv($file);
                            $additional_data = array(
                                'first_name' => trim($line[0]),
                                'last_name' => trim($line[1]),
                                'phone' => trim($line[3]),
                                'company' => trim($line[4]),
                            );
                            $username = strtolower(trim($line[0])) . ' ' . strtolower(trim($line[1]));
                            $password = trim($line[5]);
                            $email = trim($line[2]);
                            $insert_correct = $this->ion_auth->register($username, $password, $email, $additional_data);
                            if (!$insert_correct) {
                                $error_line = $additional_data;
                                break;
                            }
                        }
                        fclose($file);

                        if ($insert_correct) {
                            $this->session->set_flashdata('message', 'All entries have been added correctly.');
                            $this->session->set_flashdata('success', 'alert-success');
                        } else {
                            unlink($path_to_file);
                            $this->session->set_flashdata('message', 'The line at: first name->' . $error_line['first_name'] . ' last name->' . $error_line['last_name'] . 'company->' . $error_line['company'] . ' was not added successfully.');
                            $this->session->set_flashdata('success', 'alert-danger');
                        }
                    } else {
                        unlink($path_to_file);
                        $this->session->set_flashdata('message', $r['error']);
                        $this->session->set_flashdata('success', 'alert-danger');
                    }
                    //read file from upload directory
                }
            } else {
                $this->session->set_flashdata('message', 'The file already exists, please rename your file and upload again.');
                $this->session->set_flashdata('success', 'alert-danger');
            }
            redirect($this->_home . '/index', 'refresh');
        } else {
            //redirect them to the login page
            redirect($this->_home .'login', 'refresh');
        }
    }

    //create a new user
    function create_user() {
        $this->data['title'] = "Create User";

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect($this->_home, 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->session->set_flashdata('success', 'alert-success');
        } else {
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->session->set_flashdata('message', $this->data['message']);
            $this->session->set_flashdata('success', 'alert-danger');
        }
        redirect($this->_home, 'refresh');
    }

    //delete a user
    function delete_user($id) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect($this->_home . '/login', 'refresh');
        } else {
            if ($this->ion_auth->delete_user($id) === true) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('success', 'alert-success');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                $this->session->set_flashdata('success', 'alert-danger');
            }
            redirect($this->_home, 'refresh');
        }
    }

    //edit a user
    function edit_user() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect($this->_home, 'refresh');
        }

        /* $user = $this->ion_auth->user($id)->row();
          $groups = $this->ion_auth->groups()->result_array();
          $currentGroups = $this->ion_auth->get_users_groups($id)->result(); */

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            $data = array(
                'id' => $this->input->post('id'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );

            //Update the groups user belongs to
            $groupData = $this->input->post('groups');

            if (isset($groupData) && !empty($groupData)) {

                $this->ion_auth->remove_from_group('', $data['id']);

                foreach ($groupData as $grp) {
                    $this->ion_auth->add_to_group($grp, $data['id']);
                }
            }

            //update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

                $data['password'] = $this->input->post('password');
            }

            if ($this->form_validation->run() === TRUE) {
                if ($this->ion_auth->update($data['id'], $data)) {
                    //check to see if we are creating the user
                    //redirect them back to the admin page
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    $this->session->set_flashdata('success', "alert-success");
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    $this->session->set_flashdata('success', "alert-danger");
                }
            } else {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('success', "alert-danger");
            }
        }

        redirect($this->_home, 'refresh');
    }

    // create a new group
    function create_group() {
        $this->data['title'] = $this->lang->line('create_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect($this->_home, 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if ($new_group_id) {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect($this->_home, 'refresh');
            }
        } else {
            //display the create group form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->_render_page('ipphone/create_group', $this->data);
        }
    }

    //edit a group
    function edit_group($id) {
        // bail if no group id given
        if (!$id || empty($id)) {
            redirect($this->_home, 'refresh');
        }

        $this->data['title'] = $this->lang->line('edit_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect($this->_home, 'refresh');
        }

        $group = $this->ion_auth->group($id)->row();

        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

                if ($group_update) {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect($this->_home, 'refresh');
            }
        }

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['group'] = $group;

        $this->data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_name', $group->name),
        );
        $this->data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );

        $this->_render_page('ipphone/edit_group', $this->data);
    }

    function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce() {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
                $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function _render_page($view, $data = null, $render = false) {

        $this->viewdata = (empty($data)) ? $this->data : $data;
        $this->load->view('ipphone/header');
        $view_html = $this->load->view($view, $this->viewdata, $render);
        $this->load->view('ipphone/footer');
        if (!$render)
            return $view_html;
    }

    function validate_phone($phone) {
        $pattern1 = '/^[0-9]+$/';
        if (preg_match($pattern1, $phone)) {
            return true;
        } else {
            $this->form_validation->set_message('validate_phone', 'The %s you provided is not a valid telephone number.');
            return false;
        }
    }

    function createKey($sn, $mac, $cid) {
        return sha1($sn . $mac . $cid);
    }

    function validateFile($path, $count, $allow_empty_cell = false, $allow_special_character = false) {
        $result['error'] = false;

        $file = fopen($path, 'r');
        while (!feof($file)) {
            $line = fgets($file);
            if (trim($line) === '') {
                $result['error'] = 'There are empty lines in the file or at the end of the file, please remove them.';
                break;
            }
            if (!$allow_special_character) {
                if (!preg_match('/^[A-Za-z0-9, "\n]*$/', trim($line))) {
                    $result['error'] = 'Only Alphabeta characters,  numbers from 0-9, space and "," are allow in the file.';
                    break;
                }
            }
            $s = explode(',', $line);
            if (count($s) != $count) {
                $result['error'] = 'The file should has exact <strong>' . $count . '</strong> columns';
                break;
            }
            if (!$allow_empty_cell) {
                $cell_error = false;
                foreach ($s as $cell) {
                    if (trim($cell) === '') {
                        $cell_error = true;
                    }
                }
                if ($cell_error) {
                    $result['error'] = 'Some colums contain empty values that are not accepted.';
                    break;
                }
            }
        }
        fclose($file);

        return $result;
    }

    function validateUserFile($path, $count) {
        $result['error'] = false;

        $file = fopen($path, 'r');
        while (!feof($file)) {
            $line = fgetcsv($file);
            if (count($line) === 0) {
                $result['error'] = 'There are empty lines in the file or at the end of the file, please remove them.';
                break;
            }
            if (count($line) != $count) {
                $result['error'] = 'The file should has exact <strong>' . $count . '</strong> columns';
                break;
            }
            if($line[5] != $line[6]){
                $result['error'] = 'Each password should equal to its confirm password';
                break;
            }
            if(!filter_var($line[2], FILTER_VALIDATE_EMAIL)){
                $result['error'] = 'Some email formats are not valid';
                break;
            }
            $cell_error = false;
            foreach ($line as $cell) {
                if (trim($cell) === '') {
                    $cell_error = true;
                }
            }
            if ($cell_error) {
                $result['error'] = 'Some lines contain empty values that are not accepted.';
                break;
            }
        }
        fclose($file);

        return $result;
    }

}

?>
