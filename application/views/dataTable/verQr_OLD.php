
		<link rel="stylesheet" type="text/css" href="css/generator-base.css">
		<link rel="stylesheet" type="text/css" href="css/editor.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/moment-2.18.1/jszip-2.5.0/pdfmake-0.1.36/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/editor.bootstrap.min.js"></script>
		

		<script type="text/javascript" src="https://tucartadigital.app/public/qrcode/jquery.qrcode.min.js"></script>
			<?php
			$url= $_GET['u'];
			$titulo = $_GET['t'];
			 ?>		

			<h1>
				Carta: <?=$titulo?>
			</h1>
			</br>
			</br>
			</br>
			<div id="qrcodeTable"></div>
			
			<script>
				//jQuery('#qrcode').qrcode("this plugin is great");
				$('#qrcodeTable').qrcode({
					render	: "canvas",
					text	: "<?=$url?>",
					width: 512	,height: 512
				});	
				
			</script>

