<?php
	class Votaciones_model extends CI_Model{

		public function dameVotacion($id){

			$id = str_replace('row_', '', $id);
			$this->db->where('id_votacion', $id);
			$query = $this->db->get('votaciones'); 
			$result = $query->result_array();

			if (sizeof($result)<=0) {
				return 0;
			}else{
				return $result[0];
			}

		}

		public function dameVotos($id){

			$id = str_replace('row_', '', $id);

			$this->db->select('voto.id_voto, voto.id_votacion, voto.tipo_voto, inmueble.piso');
		    $this->db->from('votos as voto');
		    $this->db->where('voto.id_votacion', $id);
		    $this->db->join('inmuebles as inmueble', 'voto.id_inmueble = inmueble.id_inmueble', 'LEFT');
		    $query = $this->db->get();


			$result = $query->result_array();

			if (sizeof($result)<=0) {
				return 0;
			}else{
				return $result;
			}

		}

		public function marcarAprovada($id){

			$data = array(
			        'estado' => 2
			);
			$id = str_replace('row_', '', $id);
			$this->db->where('id_votacion', $id);
			$resultado = $this->db->update('votaciones', $data);
			return $resultado;

		}

		public function marcarPendiente($id){

			$data = array(
			        'estado' => 1
			);
			$id = str_replace('row_', '', $id);
			$this->db->where('id_votacion', $id);
			$resultado = $this->db->update('votaciones', $data);
			return $resultado;

		}

		public function marcarDenegada($id){

			$data = array(
			        'estado' => 3
			);
			$id = str_replace('row_', '', $id);
			$this->db->where('id_votacion', $id);
			$resultado = $this->db->update('votaciones', $data);
			return $resultado;

		}

		public function totalVotacionesAbiertas()
		{
			$this->db->where('estado', 1);
			$query = $this->db->get('votaciones');
			return $query->num_rows();
		}
		
	}

?>