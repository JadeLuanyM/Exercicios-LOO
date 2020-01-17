<?php
include_once APPPATH . 'libraries/util/CI_Object.php';

class Usuario extends CI_Object {

    private $data = array(
        array('nome' => 'Jade', 'snome' => 'Luany', 'idade' => '17', 'email' => 'jadeluany100@gmail.com'),
        array('nome' => 'Henrique', 'snome' => 'Bustillos', 'idade' => '19', 'email' => 'rick.bustillos@gmail.com.br'),
        array('nome' => 'Vitoria', 'snome' => 'Lima', 'idade' => '18', 'email' => 'vitorialima@gmail.com'),
        array('nome' => 'Nicole', 'snome' => 'Aguiar', 'idade' => '16', 'email' => 'nicoleagui23@gmail.com')

    );
    public function lista() {    
    
           $rs =$this->db->get('usuario');


        $result = $rs->result_array();

        return $result; 
    }

    public function cria_usuario($data) {
        $this->db->insert('usuario', $data);
    }

    public function user_data($id) {
        $cond = array('id' => $id);
        $rs = $this->db->get_where('usuario', $cond);
        return $rs->row_array(); 
    }

    public function edita_usuario($data, $id) {
        $this->db->update('usuario', $data, "id = $id");
    }

    public function delete($id) {
        $cond = array('id' => $id);
        $this->db->delete('usuario', $cond);
    }

   
}

