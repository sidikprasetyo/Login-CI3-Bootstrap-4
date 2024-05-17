<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role(){
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', 'New role added.');
            redirect('admin/role');
        }
        
    }

    public function roleaccess($role_id){
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess(){
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() < 1){
            $this->db->insert('user_access_menu', $data);
        } else {
        $this->db->delete('user_access_menu', $data);
    }
    $this->session->set_flashdata('message', 'Access Changed');
    }

    public function deleterole($id){
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', 'Role deleted');
        redirect('admin/role');
    }

    public function getRoleById($id) {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function getEditRole() {
        $id = $this->input->post('id');
        $roleData = $this->getRoleById($id);
        echo json_encode($roleData);
    }

    public function editRole(){
        if ($this->input->method() == 'post') {

            $postData = $this->input->post();

            $this->db->where('id', $postData['id']);
            $result = $this->db->update('user_role', ['role' => $postData['role']]);
            
            if ($result) {
                $this->session->set_flashdata('message', 'Role edited.');
            } else {
                $this->session->set_flashdata('flash', 'Failed to edit role.');
            }

            redirect('admin/role');
        }
    }
}