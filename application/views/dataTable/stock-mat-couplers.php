
		<link rel="stylesheet" type="text/css" href="css/generator-base.css">
		<link rel="stylesheet" type="text/css" href="css/editor.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/moment-2.18.1/jszip-2.5.0/pdfmake-0.1.36/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/editor.bootstrap.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.stock-mat-couplers-ro.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.stock-mat-couplers-pr.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?=base_url("/public/bootbox/bootbox.js")?>"></script> 

		<script type="text/javascript">
			$(document).ready(function()
			{
				 
				  <?php 
					if (isset($_GET["fecha"])) {
						$fecha = $_GET["fecha"];

						if ($fecha == date("Y-m-d")) {
							$editable =1;
						}else{
							$editable =0;

						}
					}else{
						$fecha = date("Y-m-d");
						$editable =1;
					}
					?>
			

				$( "#enviar-email" ).click(function() {
				  // Assign handlers immediately after making the request,
					// and remember the jqxhr object for this request
					var dialog = bootbox.dialog({
						    title: 'Envoi du rapport, veuillez patienter...',
						    message: '<p><i class="fa fa-spin fa-spinner"></i> Envoi en cours...</p>'
						});
					var jqxhr = $.get( "<?=base_url('/public/informes/enviar-informe-stock-couplers.php?fecha='.$fecha)?>", function() {
					 
					})
					  .done(function() {
					    dialog.init(function(){
					    	dialog.find('.bootbox-body').html('Le rapport a été envoyé avec succès. aaznar@sendin.com, jlafuente@sendin.com, dmolina@sendin.com, l.besnard@sendin.com, s.sendin@sendin.com, v.sendin@sendin.com, f.blanchot@sendin.com, f.margarido@sendin.com, agomez@sendin.com   , bproto@sendin.com, m.maravilha@sendin.com, amsendin@sendin.com, m.dafonseca@sendin.com, t.gilouppe@sendin.com, cariztegui@sendin.com, ibarrachina@sendin.com, efernandez@sendin.com ');
					    	//dialog.find('.bootbox-body').html('Estamos en local.');
						});
					  })
					  .fail(function() {
					    dialog.init(function(){
					    	dialog.find('.bootbox-body').html('Erreur, la soumission du rapport a échoué.');
						});
					  })
					 
				});



			});
		</script>

		<div style="background: #fff; padding: 2%; border-radius: 20px; z-index: 999; position: absolute; width: 85%;">
			
		
			<h1 style="max-width:50%; float: left;">

					Stock COUPLERS <?php echo $fecha?> <!-- (editable=<?php echo $editable?>) <a href="/Sendin/public/informes/informe-stock-chilly.php?fecha=<?=$fecha?>" target="_blank"> Ver PDF </a>--> 
			</h1>

			<a style="float: left; margin-left: 15px; color: #000000 !important;" href="/public/informes/informe-stock-couplers.php?fecha=<?=$fecha?>" target="_blank">  <button style="max-width: 220px;" type="button" class="btn btn-block btn-outline-primary btn-lg">Ver PDF </button>  </a>
			
			<button style="float: left; margin-left: 15px; max-width: 220px;" id="enviar-email"  type="button" class="btn btn-block btn-outline-primary btn-lg">Enviar PDF</button>
			<div style="clear: both;"></div>

			<input style="display:none"  id="fecha" value="<?php echo $fecha?>">
			<input style="display:none"  id="editable" value="<?php echo $editable?>">

			<div style="overflow-x:auto;">

			<br><br>
			<h2>MANGUITOS PARA ROSCADO</h2>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="UNITESCOUPLERS_ROSCADO" width="100%">
				<thead>
					<tr>
						<th>ORDEN</th>
						<th>COUPLERS</th>
						<th>C12</th>
						<th>C14</th>
						<th>C16</th>
						<th>C20</th>
						<th>C26</th>
						<th>C32</th>
						<th>C40</th>
					</tr>
				</thead>
				<tfoot>
			        <tr>
						<th>ORDEN</th>
						<th>COUPLERS</th>
						<th>C12</th>
						<th>C14</th>
						<th>C16</th>
						<th>C20</th>
						<th>C26</th>
						<th>C32</th>
						<th>C40</th>
					</tr>
			    </tfoot>
			</table>

			<br><br>

			<h2>MANGUITOS POR PRESIÓN</h2>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="UNITESCOUPLERS_PRESION" width="100%">
				<thead>
					<tr>
						<th>ORDEN</th>
						<th>COUPLERS</th>
						<th>C12</th>
						<th>C14</th>
						<th>C16</th>
						<th>C20</th>
						<th>C26</th>
						<th>C32</th>
						<th>C40</th>
					</tr>
				</thead>
				<tfoot>
			        <tr>
						<th>ORDEN</th>
						<th>COUPLERS</th>
						<th>C12</th>
						<th>C14</th>
						<th>C16</th>
						<th>C20</th>
						<th>C26</th>
						<th>C32</th>
						<th>C40</th>
					</tr>
			    </tfoot>
			</table>


			<br><br>

		</div>
		</div>

	

