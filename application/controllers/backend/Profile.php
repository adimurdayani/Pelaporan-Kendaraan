<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Data Profile';
        $data['users_ses'] = $this->db
            ->get_where('users', [
                'username' => $this->session->userdata('username'),
            ])
            ->row_array();
        $this->load->view('backend/layouts/header', $data, false);
        $this->load->view('backend/layouts/topbar', $data, false);
        $this->load->view('backend/layouts/sidebar', $data, false);
        $this->load->view('backend/profile/index', $data, false);
        $this->load->view('backend/layouts/footer', $data, false);
    }

    public function edit()
    {
        $data['judul'] = 'Data Profile';
        $data['users_ses'] = $this->db
            ->get_where('users', [
                'username' => $this->session->userdata('username'),
            ])
            ->row_array();
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules(
            'username',
            'username',
            'trim|required'
        );
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules(
            'password',
            'password',
            'trim|required|min_length[6]'
        );
        $this->form_validation->set_rules(
            'conf_pass',
            'konfirmasi password',
            'trim|required|min_length[6]|matches[password]'
        );

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('backend/layouts/header', $data, false);
            $this->load->view('backend/layouts/topbar', $data, false);
            $this->load->view('backend/layouts/sidebar', $data, false);
            $this->load->view('backend/profile/index', $data, false);
            $this->load->view('backend/layouts/footer', $data, false);
        } else {
            $id = $this->input->post('id');

            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => sha1($this->input->post('password')),
                'phone' => $this->input->post('phone'),
            ];
            $this->db->where('id', $id);
            $this->db->update('users', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                Data berhasil tersimpan!
              </div>'
            );

            redirect('login', 'refresh');
        }
    }
}

/* End of file Profile.php */
