<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->order_by('created_at', 'DESC')->get('products')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    public function insert($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('products', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('products', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('products');
    }
}
