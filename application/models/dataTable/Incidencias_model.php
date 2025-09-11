<?php
	class Incidencias_model extends CI_Model{

		public function dameIncidencia($id){

			$id = str_replace('row_', '', $id);
			$this->db->where('id_incidencia', $id);
			$query = $this->db->get('incidencias'); 
			$result = $query->result_array();

			if (sizeof($result)<=0) {
				return 0;
			}else{
				return $result[0];
			}

		}

		public function dameFotosIncidencia($id){

			$id = str_replace('row_', '', $id);
			$this->db->where('id_incidencia', $id);
			$query = $this->db->get('fotos_incidencias'); 
			$result = $query->result_array();

			if (sizeof($result)<=0) {
				return 0;
			}else{
				return $result;
			}

		}

		public function marcarSolucionada($id){

			$data = array(
			        'estado' => 3
			);
			$id = str_replace('row_', '', $id);
			$this->db->where('id_incidencia', $id);
			$resultado = $this->db->update('incidencias', $data);
			return $resultado;

		}

		public function marcarPendiente($id){

			$data = array(
			        'estado' => 1
			);
			$id = str_replace('row_', '', $id);
			$this->db->where('id_incidencia', $id);
			$resultado = $this->db->update('incidencias', $data);
			return $resultado;

		}

		public function marcarEnCurso($id){

			$data = array(
			        'estado' => 2
			);
			$id = str_replace('row_', '', $id);
			$this->db->where('id_incidencia', $id);
			$resultado = $this->db->update('incidencias', $data);
			return $resultado;

		}

		public function totalIncidenciasPendientes()
		{
			$this->db->where('estado', 1);
			$query = $this->db->get('incidencias');
			return $query->num_rows();
		}



		/*public function guardaAviso($titulo,$fecha,$cuerpohtml,$comunidad){

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

		public function dameIncidencia($id){

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

		}*/
		
	}

?>