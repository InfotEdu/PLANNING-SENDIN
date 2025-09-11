<?php
	class Historico_model extends CI_Model{

		public function dameHistoricoFecha($fecha){

			$this->db->where('fecha', $fecha);
			$query = $this->db->get('sen_stock_mat');

			$result = $query->result_array();

			if (sizeof($result)<=0) {
				return 0;
			}else{
				return $result[0];
			}

		}

		public function dameBobinasIdea($fecha){

			
			$query = $this->db->query("select `nom_articulo` AS `nom_articulo`, `d6_spain` AS `d6_spain`,`d6_chilly` AS `d6_chilly` FROM sen_stock_mat where `fecha` = '$fecha' and `familia` = 7");
			$result = $query->result_array();

			if (sizeof($result)<=0) {
				return 0;
			}else{
				return $result[0];
			}

		}


		public function guardaBobinasIdea($datos){

			
			$query = $this->db->query('UPDATE sen_stock_mat SET '.$datos["lugar"].' = "'.$datos["unidades"].'" WHERE id_articulo = 1 and familia =  7 and fecha = "'.$datos["fecha"].'"');

		}


		public function generarCopiaHistorico(){
			$fecha = date("Y-m-d");
			$this->db->query('	CREATE TABLE tmp SELECT * FROM sen_stock_mat WHERE fecha =(select MAX(fecha) from sen_stock_mat)');
			$this->db->query('	UPDATE tmp SET fecha = CURDATE()  WHERE fecha =(select MAX(fecha) from sen_stock_mat)');
			$this->db->query('	UPDATE tmp SET id = 0');
			$this->db->query('	INSERT INTO sen_stock_mat SELECT * FROM tmp WHERE fecha = CURDATE()');
			$this->db->query('	DROP TABLE tmp ');

			/*$this->db->query('INSERT INTO `sen_stock_mat`( `fecha`, `familia`, `orden`, `id_articulo`, `nom_articulo`, `d6_spain`, `d8_spain`, `d9_spain`, `d10_spain`, `d12_spain`, `d14_spain`, `d16_spain`, `d20_spain`, `d25_spain`, `d32_spain`, `d40_spain`, `paf10_spain`, `st20_spain`, `st25_spain`, `st25c_spain`, `st35_spain`, `st40c_spain`, `st50_spain`, `st50c_spain`, `st60_spain`, `st65c_spain`, `st15c_spain`, `c12_spain`, `c14_spain`, `c16_spain`, `c20_spain`, `c26_spain`, `c32_spain`, `c40_spain`) VALUES
				("2021-08-11", 1, 1, 1, "BOBINAS B500B", 66, 121, 43, 150, 71, 12, 61, 156, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 1, 2, 2, "BARRAS 6 M", 0, 0, 0, 0, 33, 0, 0, 0, 0, 38, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 1, 3, 3, "BARRAS 12 M", 30, 55, 66, 0, 32, 63, 229, 8, 212, 562, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 1, 4, 4, "BARRAS 14 M", 0, 0, 0, 0, 0, 0, 316, 73, 185, 143, 222, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 1, 5, 5, "BARRAS 15 M", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 2, 1, 6, "BOBINAS ADX", 0, 0, 0, 10, 11, 11, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 2, 2, 7, "BARRA 12 M LISA", 0, 0, 0, 0, 0, 0, 0, 6, 4, 8, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 2, 3, 8, "BARRA 6 M LISA", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 3, 1, 9, "B500B", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 66, 16, 2, 0, 0, 0, 0, 0, 1, 0, 29, 0, 0, 0, 0, 0, 0, 0),
				("2021-08-11", 4, 1, 10, "STOCK M-1", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15000, 6250, 4800, 10200, 14000, 5400, 1900),
				("2021-08-11", 4, 2, 11, "LIVARSONS", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15000, 15000, 12000, 13600, 10500, 7200, 7600)');	*/

			

		}
	}

?>