
		<link rel="stylesheet" type="text/css" href="css/generator-base.css">
		<link rel="stylesheet" type="text/css" href="css/editor.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/moment-2.18.1/jszip-2.5.0/pdfmake-0.1.36/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/editor.bootstrap.min.js"></script>
		
		<?php
		if(ucwords($this->session->userdata('admin_id')) == 3){
			?>
		<script type="text/javascript" charset="utf-8" src="js/table.cartasadmin.js"></script>
		
		<?php
		}else{?>
			<script type="text/javascript" charset="utf-8" src="js/table.cartas.js"></script>
		<?php
		}?>
		

			<h1>
				Cartas
			</h1>
			
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="cartas" width="100%">
				<thead>
					<tr>
						<?php
						if(ucwords($this->session->userdata('admin_id')) == 3){
							?>
						<th>Id Cliente</th>
						
						<?php
						}?>
						<th>Id Carta</th>
						<th>Nombre</th>
						<th>Ver carta</th>
						<th>Ver QR</th>
					</tr>
				</thead>
				
			</table>
