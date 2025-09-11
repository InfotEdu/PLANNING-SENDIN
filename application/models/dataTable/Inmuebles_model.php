<?php
	class Inmuebles_model extends CI_Model{

		public function totalInmuebles()
		{
			
			$query = $this->db->get('inmuebles');
			return $query->num_rows();
		}
		
	}

?>