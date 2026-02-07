<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function get_all($status = null)
    {
        $this->db->select('
            produk.id_produk,
            produk.nama_produk,
            produk.harga,
            produk.kategori_id,
            produk.status_id,
            kategori.nama_kategori,
            status.nama_status');

        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id');
        $this->db->join('status', 'status.id_status = produk.status_id');

        if (!empty($status)) {
            $this->db->where('produk.status_id', $status);
        }

        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('
            produk.id_produk,
            produk.nama_produk,
            produk.harga,
            produk.kategori_id,
            produk.status_id');
            
        $this->db->from('produk');
        $this->db->where('produk.id_produk', $id);

        return $this->db->get()->row();
    }

    public function get_kategori()
    {
        return $this->db->get('kategori')->result();
    }

    public function get_status()
    {
        return $this->db->get('status')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('produk', $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id_produk', $id)
            ->update('produk', $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_produk', $id)
            ->delete('produk');
    }
}
?>