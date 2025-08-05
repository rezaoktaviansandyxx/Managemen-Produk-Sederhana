<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model {
    public function get_all($search = '', $sort = 'id', $order = 'asc') {
        if ($search) {
            $this->db->like('name', $search);
        }

        // Kolom yang diperbolehkan untuk sorting
        $allowed_sort_columns = ['id', 'name', 'price', 'stock', 'formula'];
        if (in_array($sort, $allowed_sort_columns)) {
            $this->db->order_by($sort, $order === 'desc' ? 'desc' : 'asc');
        }

        return $this->db->get('products')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('products', $data);
    }

    public function update($id, $data) {
        return $this->db->update('products', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('products', ['id' => $id]);
    }
}