<?php 

class Pessoa extends CI_Controller {

    public function lista() {
        $this->load->view('common/header.php');
        $this->load->view('common/navbar');

        $this->load->model('PessoaModel', 'model'); 
        $data['tabela'] = $this->model->gera_tabela();
        $this->load->view('common/table.php',$data);
        $this->load->view('common/footer.php');
    }

    public function cadastro() {
        $this->load->view('common/header.php');
        $this->load->view('common/navbar');

        $this->load->model('PessoaModel','model');
        $this->model->salva_usuario();
        $this->load->view('pessoa/form_pessoa');

        $this->load->view('common/footer.php');
    }

    public function editar($id) {

        $this->load->view('common/header.php');
        $this->load->view('common/navbar');

        $this->load->model('PessoaModel','model');
        $data['user'] = $this->model->read($id);

        $this->load->view('pessoa/form_pessoa', $data);

        $this->model->edita_usuario($id);

        $this->load->view('common/footer.php');
    }

    public function deletar($id) {
        $this->load->model('PessoaModel','model');
        $this->model->deletar($id);
        redirect('Pessoa/lista');
    }
}