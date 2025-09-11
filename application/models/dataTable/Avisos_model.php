<?php
	class Avisos_model extends CI_Model{

		public function guardaAviso($titulo,$fecha,$cuerpohtml,$comunidad){

			$data = array(
			        'titulo' => $titulo,
			        'fecha' => $fecha,
			        'contenido' => $cuerpohtml,
			        'id_comunidad' => $comunidad
			);

			$resultado = $this->db->insert('avisos', $data);

			return $resultado;
		}

		public function guardaEdicionAviso($idaviso,$titulo,$fecha,$cuerpohtml,$comunidad){

			$data = array(
			        'titulo' => $titulo,
			        'fecha' => $fecha,
			        'contenido' => $cuerpohtml,
			        'id_comunidad' => $comunidad
			);

			$this->db->where('id_aviso', $idaviso);
			$resultado = $this->db->update('avisos', $data);
			return $resultado;
			
		}

		public function dameAviso($id){

			$id = str_replace('row_', '', $id);
			$this->db->where('id_aviso', $id);
			$query = $this->db->get('avisos'); 
			$result = $query->result_array();

			if (sizeof($result)<=0) {
				return 0;
			}else{
				return $result[0];
			}

		}

		public function marcaComoEnviado($id){

			$data = array(
			        'estado' => 4
			);
			$id = str_replace('row_', '', $id);
			$this->db->where('id_aviso', $id);
			$resultado = $this->db->update('avisos', $data);
			return $resultado;

		}
		
	}

?>