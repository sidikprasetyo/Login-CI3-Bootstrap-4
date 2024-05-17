<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
    }

    public function index(){
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'New menu added.');
            redirect('menu');
        }
    }

    public function submenu(){
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'New submenu added.');
            redirect('menu/submenu');
        }
    }

    public function deletemenu($id){
        $this->menu->deleteMenu($id);
        $this->session->set_flashdata('message', 'Menu deleted.');
        redirect('menu');
    }
    
    public function deletesubmenu($id){
        $this->menu->deleteSubMenu($id);
        $this->session->set_flashdata('message', 'Submenu deleted.');
        redirect('menu/submenu');
    }

    public function getMenuById($id) {
        return $this->menu->getMenuById($id);
    }

    public function getEditMenu() {
        $id = $this->input->post('id');
        $menuData = $this->getMenuById($id);
        echo json_encode($menuData);
    }

    public function getSubMenuById($id) {
        return $this->menu->getSubMenuById($id);
    }

    public function getEditSubMenu() {
        $id = $this->input->post('id');
        $subMenuData = $this->getSubMenuById($id);
        echo json_encode($subMenuData);
    }

    public function editMenu() {
        $postData = $this->input->post();

        if ($this->menu->changeMenu($postData) > 0) {
            $this->session->set_flashdata('message', 'Menu edited.');
            redirect('menu');
        } else {
            $this->session->set_flashdata('flash', 'Failed to edit menu.');
            redirect('menu');
        }
    }

    public function editSubMenu() {
        $postData = $this->input->post();

        if ($this->menu->changeSubMenu($postData) > 0) {
            $this->session->set_flashdata('message', 'Menu edited.');
            redirect('menu/submenu');
        } else {
            $this->session->set_flashdata('flash', 'Failed to edit menu.');
            redirect('menu/submenu');
        }
    }
}