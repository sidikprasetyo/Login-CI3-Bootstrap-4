<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
    public function getSubMenu() {
        $query = "SELECT user_sub_menu.*, user_menu.menu
                    FROM user_sub_menu
                    JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
        return $this->db->query($query)->result_array();
    }

    public function deleteMenu($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function deleteSubMenu($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    public function getMenuById($id) {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function getSubMenuById($id) {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function changeMenu($data) {
        $this->db->where('id', $data['id']);
        return $this->db->update('user_menu', ['menu' => $data['menu']]);
    }

    public function changeSubMenu($data) {
        $this->db->where('id', $data['id']);
        return $this->db->update('user_sub_menu', ['title' => $data['title'], 'menu_id' => $data['menu_id'], 'url' => $data['url'], 'icon' => $data['icon'], 'is_active' => $data['is_active']]);
    }
}
