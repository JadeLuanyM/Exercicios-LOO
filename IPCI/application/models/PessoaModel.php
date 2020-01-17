<?php
include_once APPPATH . 'libraries/Usuario.php';
include_once APPPATH . 'libraries/Costumer.php';

class PessoaModel extends CI_Model {

    public function gera_tabela() {
        $html = '';

        $usuario = new Usuario(); 
        $data = $usuario->lista();

        foreach ($data as $pessoa) {  

            $html .= '<tr>';
            $html .= '<td>' .$pessoa['id']. '</td>';
            $html .= '<td>' . $pessoa['nome'] . '</td>';
            $html .= '<td>' . $pessoa['snome'] . '</td>';
            $html .= '<td>' . $pessoa['idade'] . '</td>';
            $html .= '<td>' . $pessoa['email'] . '</td>';
            $html .= '<td>'.$this->action_buttons($pessoa['id']).'</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    private function action_buttons($id){
        $html = '<a href="'.base_url('pessoa/editar/'.$id).'">';
        $html .='<i title="Editar" class="far fa-edit blue-text mr-2"></i></a>';
        $html .= '<a href="'.base_url('pessoa/deletar/'.$id).'">';
        $html .='<i title="Deletar" class="far fa-trash-alt red-text mr-2"></i></a>';

        return $html;
    }

    public function salva_usuario() {
        if( sizeof($_POST) == 0) return;                        
        $this->form_validation->set_rules('nome', 'Nome do Usuario', 'trim|required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('snome', 'Sobrenome do Usuario', 'trim|required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('idade', 'Idade do Usuario', 'trim|required|is_natural|greater_than_equal_to[18]|less_than_equal_to[105]');
        $this->form_validation->set_rules('email', 'Email do Usuario', 'trim|required|min_length[3]|max_length[80]');

        if ( $this->form_validation->run()){
             $data = $this->input->post();
             $usuario = new Usuario();
             $usuario->cria_usuario($data);
             redirect('Pessoa/lista');
        }
    }

    public function edita_usuario($id) {
        if( sizeof($_POST) == 0) return;

        $data = $this->input->post();
        $usuario = new Usuario();
        $usuario->edita_usuario($data, $id);
        redirect('Pessoa/lista');
  
    }

    public function read($id) {
        $usuario = new Usuario();
        return $usuario->user_data($id);

    }

    public function deletar($id) {
        $usuario = new Usuario();
        $usuario->delete($id);
    }
}
