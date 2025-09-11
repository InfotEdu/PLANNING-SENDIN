
		<link rel="stylesheet" type="text/css" href="css/generator-base.css">
		<link rel="stylesheet" type="text/css" href="css/editor.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/moment-2.18.1/jszip-2.5.0/pdfmake-0.1.36/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/editor.bootstrap.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.lineasProduccion.js"></script>
	<div style="background: #fff; padding: 2%; border-radius: 20px; z-index: 999; position: absolute; width: 85%;">
			<h1>
				<?php
					if(isset($_GET['id_tipo'])){
				        $id_tipo = $_GET['id_tipo'];
				    

					    if ($id_tipo == 1) {
					    	echo ("Lignes de production: CF SPAIN");
					    } else if ($id_tipo == 2){
							echo ("Lignes de production: AS/PA SPAIN");
					    } else if ($id_tipo == 3){
							echo ("Lignes de production: MANCHONS");
					    } else if ($id_tipo == 4){
							echo ("Lignes de production: CF CHILLY");
					    } else if ($id_tipo == 5){
							echo ("Lignes de production: AS/PA CHILLY");
					    }
					}
				?>

			</h1>
			<div style="overflow-x:auto;">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="lineasProduccion" width="100%">
				<thead>
					<tr>
						<th>Date de production</th>
						<th>Travail</th>
						<th>Client</th>
						<th>SEQ</th>
						<th>Poids (Tn)</th>
						<th>Estados</th>
						<th>Commentaires</th>
					</tr>
				</thead>
				<tfoot>
			        <tr>
						<th>Date de production</th>
						<th>Travail</th>
						<th>Client</th>
						<th>SEQ</th>
						<th>Poids (Tn)</th>
						<th>Estados</th>
						<th>Commentaires</th>    
					</tr>
			    </tfoot>
			</table>
			</div>
	</div>
