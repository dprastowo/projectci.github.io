<?php
Class Blog extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Blog_model');
      $this->load->library('session');
    }

    public function index($offset = 0)
    {
        $this->load->library('pagination');
        $config['base_url'] = site_url('blog/index');
        $config['total_rows'] = $this->Blog_model->getTotalBlogs();
        $config['per_page'] = 3;
        $this->pagination->initialize($config);

        $query=$this->Blog_model->getBlogs($config['per_page'], $offset);
        $data['blogs']=$query->result_array();
        $this->load->view('blog',$data);
    }

    public function detail($url)
    {
      $query = $this->Blog_model->getSingleBlog('url',$url);
      $data['blog'] = $query->row_array();
      $this->load->view('detail', $data);
    }

    public function add()
    {
      $this->form_validation->set_rules('title', 'Judul','required');
      $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
      $this->form_validation->set_rules('content', 'Konten', 'required');

      if($this->form_validation->run() === TRUE){
        $data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('content');
        $data['url'] = $this->input->post('url');
        // konfigurasi upload
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1600;
        $this->load->library('upload', $config);
        $this->upload->do_upload('cover');

        if (!empty($this->upload->data()['file_name']))
        {
           $post['cover'] = $this->upload->data()['file_name'];
        }

        $id = $this->Blog_model->insertBlog($data);
        if ($id)
        {
          $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
          redirect("/blog");
        }
        else
        {
          $this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal disimpan</div>');
          redirect("/blog");
        }

      }
      $this->load->view('form_add');
    }

    public function edit($id)
    {
      $this->form_validation->set_rules('title', 'Judul', 'required');
      $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
      $this->form_validation->set_rules('content', 'Konten', 'required');

      //$data['blog']=$this->Blog_model->getSingleBlog('id', $id);
      $query = $this->Blog_model->getSingleBlog('id', $id);
      $data['blog'] = $query->row_array();

      if($this->form_validation->run() === TRUE)
      {
        $post['title']=$this->input->post('title');
        $post['content']=$this->input->post('content');
        $post['url']=$this->input->post('url');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 1600;
        $this->load->library('upload', $config);
        $this->upload->do_upload('cover');

        if (!empty($this->upload->data()['file_name']))
        {
           $post['cover'] = $this->upload->data()['file_name'];
        }

        $id=$this->Blog_model->updateBlog($id,$post);
        if($id)
        {
          $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
          redirect("/blog");
        }
        else
        {
          $this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal disimpan</div>');
          redirect('/blog');
        }
      }
      $this->load->view('form_edit', $data);
    }

    public function delete($id)
    {
      $result = $this->Blog_model->deleteBlog($id);
      if($result){
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus</div>');
      }
      else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal dihapus</div>');
      }
      redirect("/blog");
    }

    public function login()
    {
      if($this->input->post())
      {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if($username == 'admin' && $password == 'admin'){
          $_SESSION['username']='admin';
          redirect('/blog');
        }
        else {
          $this->session->set_flashdata('message','<div class="alert alert-warning">Username atau Password Anda tidak valid!</div>');
          redirect('blog/login');
        }
      }
      $this->load->view('login');
    }

    public function logout()
    {
      $this->session->sess_destroy();
      redirect('blog/');
    }
}
?>
