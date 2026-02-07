<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $status = $this->input->get('status');

        $data = [
            'status' => $status,
            'produk' => $this->Produk_model->get_all($status)
        ];

        $this->load->view('produk/index', $data);
    }

    public function tambah()
    {
        $this->_rules();

        $data = [
            'kategori' => $this->Produk_model->get_kategori(),
            'status'   => $this->Produk_model->get_status()
        ];

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('produk/form', $data);
            return;
        }

        $this->Produk_model->insert($this->_collect_post());
        redirect('produk');
    }

    public function edit($id)
    {
        $produk = $this->Produk_model->get_by_id($id);

        $this->_rules();

        $data = [
            'produk'   => $produk,
            'kategori' => $this->Produk_model->get_kategori(),
            'status'   => $this->Produk_model->get_status()
        ];

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('produk/form', $data);
            return;
        }

        $this->Produk_model->update($id, $this->_collect_post());
        redirect('produk');
    }

    public function hapus($id)
    {
        $this->Produk_model->delete($id);
        redirect('produk');
    }

    private function _rules()
    {
        $this->form_validation->set_rules(
            'nama_produk',
            'Nama Produk',
            'required',
            ['required' => 'Nama produk wajib diisi']
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|numeric',
            [
                'required' => 'Harga wajib diisi',
                'numeric'  => 'Harga harus berupa angka'
            ]
        );

        $this->form_validation->set_rules(
            'kategori_id',
            'Kategori',
            'required',
            ['required' => 'Kategori wajib dipilih']
        );

        $this->form_validation->set_rules(
            'status_id',
            'Status',
            'required',
            ['required' => 'Status wajib dipilih']
        );
    }

    private function _collect_post()
    {
        return [
            'nama_produk' => $this->input->post('nama_produk', TRUE),
            'harga'       => $this->input->post('harga', TRUE),
            'kategori_id' => $this->input->post('kategori_id', TRUE),
            'status_id'   => $this->input->post('status_id', TRUE)
        ];
    }
}
?>