<?php
	class Comunidades_model extends CI_Model{

		public function dameComunidades(){

			$comunidades = array();

			$this->db->select('id_comunidad, nombre');
			$query = $this->db->get('comunidades'); 
			

			return $result = $query->result_array();

	}
}

?>