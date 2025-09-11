
		<link rel="stylesheet" type="text/css" href="css/generator-base.css">
		<link rel="stylesheet" type="text/css" href="css/editor.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/moment-2.18.1/jszip-2.5.0/pdfmake-0.1.36/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/editor.bootstrap.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.stock-mat-ha-chilly.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.stock-mat-adx-chilly.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.stock-mat-trellis-chilly.js"></script>
<!-- 		<script type="text/javascript" charset="utf-8" src="js/table.stock-mat-couplers-chilly.js"></script> -->
		<script type="text/javascript" charset="utf-8" src="js/table.stock-mat-attentes-chilly.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.stock-mat-aboutvoile-chilly.js"></script> 
		<script type="text/javascript" charset="utf-8" src="<?=base_url("/public/bootbox/bootbox.js")?>"></script> 

		<script type="text/javascript">
			$(document).ready(function()
			{
				$( "#bobinasIdea" ).change(function() {
				 
				  var valorRecogido = $( "#bobinasIdea" ).val();

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
			

				  $.ajax({
				    type:'POST',
				    data:{ unidades: valorRecogido, lugar: 'd6_chilly', fecha: '<?=$fecha?>'},
				    url:'<?php echo base_url('dataTable/StockMATChilly/GuardaBIdea');?>',
				    success:function(data) {
				      //alert(data);
				    }
				  });

				  
				});



				$( "#enviar-email" ).click(function() {
				  // Assign handlers immediately after making the request,
					// and remember the jqxhr object for this request
					var dialog = bootbox.dialog({
						    title: 'Envoi du rapport, veuillez patienter...',
						    message: '<p><i class="fa fa-spin fa-spinner"></i> Envoi en cours...</p>'
						});
					var jqxhr = $.get( "<?=base_url('/public/informes/enviar-informe-stock-chilly.php?fecha='.$fecha)?>", function() {
					 
					})
					  .done(function() {
					    dialog.init(function(){
					    	dialog.find('.bootbox-body').html('Le rapport a été envoyé avec succès. aaznar@sendin.com, jlafuente@sendin.com, dmolina@sendin.com, l.besnard@sendin.com, s.sendin@sendin.com, v.sendin@sendin.com, f.blanchot@sendin.com, f.margarido@sendin.com, agomez@sendin.com   , bproto@sendin.com, m.maravilha@sendin.com, amsendin@sendin.com, m.dafonseca@sendin.com, t.gilouppe@sendin.com, cariztegui@sendin.com, ibarrachina@sendin.com, efernandez@sendin.com ');
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

					Stock Material Chilly <?php echo $fecha?> <!-- (editable=<?php echo $editable?>) <a href="/public/informes/informe-stock-chilly.php?fecha=<?=$fecha?>" target="_blank"> Ver PDF </a>--> 
			</h1>

			<a style="float: left; margin-left: 15px; color: #000000 !important;" href="/public/informes/informe-stock-chilly.php?fecha=<?=$fecha?>" target="_blank">  <button style="max-width: 220px;" type="button" class="btn btn-block btn-outline-primary btn-lg">Ver PDF </button>  </a>
			
			<button style="float: left; margin-left: 15px; max-width: 220px;" id="enviar-email"  type="button" class="btn btn-block btn-outline-primary btn-lg">Enviar PDF</button>
			<div style="clear: both;"></div>

			<input style="display:none"  id="fecha" value="<?php echo $fecha?>">
			<input style="display:none"  id="editable" value="<?php echo $editable?>">

			<label class="labelIdea">BOBINAS IDEA:</label>
			<input class="labelIdea" id="bobinasIdea" type="number" name="bobinasIdea" value="<?=$bobinasIdea["d6_chilly"]?>">

			<div style="overflow-x:auto;">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="UNITESHA" width="100%">
				<thead>
					<tr>
						<th>ORDEN</th>
						<th>UNITES HA</th>
						<th>Ø6</th>
						<th>Ø8</th>
						<th>Ø9</th>
						<th>Ø10</th>
						<th>Ø12</th>
						<th>Ø14</th>
						<th>Ø16</th>
						<th>Ø20</th>
						<th>Ø25</th>
						<th>Ø32</th>
						<th>Ø40</th>
						

						<!--<th>Foto</th>-->
					</tr>
				</thead>
				<tfoot>
			        <tr>
						<th>ORDEN</th>
						<th>UNITES HA</th>
						<th>Ø6</th>
						<th>Ø8</th>
						<th>Ø9</th>
						<th>Ø10</th>
						<th>Ø12</th>
						<th>Ø14</th>
						<th>Ø16</th>
						<th>Ø20</th>
						<th>Ø25</th>
						<th>Ø32</th>
						<th>Ø40</th>
						

						<!--<th>Foto</th>-->
					</tr>
			    </tfoot>
			</table>

<br><br>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="UNITESADX" width="100%">
				<thead>
					<tr>
						<th>ORDEN</th>
						<th>UNITES ADX</th>
						<th>Ø6</th>
						<th>Ø8</th>
						<th>Ø9</th>
						<th>Ø10</th>
						<th>Ø12</th>
						<th>Ø14</th>
						<th>Ø16</th>
						<th>Ø20</th>
						<th>Ø25</th>
						<th>Ø32</th>
						<th>Ø40</th>
						

						<!--<th>Foto</th>-->
					</tr>
				</thead>
				<tfoot>
			        <tr>
						<th>ORDEN</th>
						<th>UNITES ADX</th>
						<th>Ø6</th>
						<th>Ø8</th>
						<th>Ø9</th>
						<th>Ø10</th>
						<th>Ø12</th>
						<th>Ø14</th>
						<th>Ø16</th>
						<th>Ø20</th>
						<th>Ø25</th>
						<th>Ø32</th>
						<th>Ø40</th>
						

						<!--<th>Foto</th>-->
					</tr>
			    </tfoot>
			</table>

			<br><br>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="UNITESTREILLIS" width="100%">
				<thead>
					<tr>
						<th>ORDEN</th>
						<th>UNITES TREILLIS SOUDE EN PANNEAUX</th>
						<th>PAF10</th>
						<th>ST20</th>
						<th>ST25</th>
						<th>ST25C</th>
						<th>ST35</th>
						<th>ST40C</th>
						<th>ST50</th>
						<th>ST50C</th>
						<th>ST60</th>
						<th>ST65</th>
						<th>ST15C</th>
						

						<!--<th>Foto</th>-->
					</tr>
				</thead>
				<tfoot>
			        <tr>
						<th>ORDEN</th>
						<th>UNITES TREILLIS SOUDE EN PANNEAUX</th>
						<th>PAF10</th>
						<th>ST20</th>
						<th>ST25</th>
						<th>ST25C</th>
						<th>ST35</th>
						<th>ST40C</th>
						<th>ST50</th>
						<th>ST50C</th>
						<th>ST60</th>
						<th>ST65</th>
						<th>ST15C</th>
						

						<!--<th>Foto</th>-->
					</tr>
			    </tfoot>
			</table>

			<br><br>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="ATTENTES" width="100%">
				<thead>
					<tr>
						<th>ORDEN</th>
						<th>UNITES ATTENTES</th>
						<th>SEC HA8</th>
						<th>SEC HA10</th>
						<th>SEC 8MM</th>
						<th>SEC 10MM</th>
					</tr>
				</thead>
				<tfoot>
			        <tr>
						<th>ORDEN</th>
						<th>UNITES ATTENTES</th>
						<th>SEC HA8</th>
						<th>SEC HA10</th>
						<th>SEC 8MM</th>
						<th>SEC 10MM</th>
					</tr>
			    </tfoot>
			</table>

			<br><br>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="ABOUTVOILE" width="100%">
				<thead>
					<tr>
						<th>ORDEN</th>
						<th>UNITES ABOUT VOILE</th>
						<th>SEC A4</th>
						<th>POUTRE VOILE HA8</th>
						<th>POUTRE VOILE HA10</th>
					</tr>
				</thead>
				<tfoot>
			        <tr>
						<th>ORDEN</th>
						<th>UNITES ABOUT VOILE</th>
						<th>SEC A4</th>
						<th>POUTRE VOILE HA8</th>
						<th>POUTRE VOILE HA10</th>
					</tr>
			    </tfoot>
			</table>
		</div>
		</div>

	

