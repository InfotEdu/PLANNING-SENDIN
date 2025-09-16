<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= ucwords($this->session->userdata('name')); ?></p>
           <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
       /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
		
	<?php
		if ($this->session->userdata('is_admin')==1){
	?>
      
      <ul class="sidebar-menu">
        <li id="users" class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Utilisateurs</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="add_user"><a href="<?= base_url('admin/users/add'); ?>"><i class="fa fa-circle-o"></i> Ajouter un utilisateur</a></li>
              <li id="view_users" class=""><a href="<?= base_url('admin/users'); ?>"><i class="fa fa-circle-o"></i> Afficher les utilisateurs</a></li>
			  <li id="user_group" class=""><a href="<?= base_url('admin/group'); ?>"><i class="fa fa-circle-o"></i> Groupes</a></li>
            </ul>
          </li>

      </ul>
		<?php
		}?>

      <!--
      <ul class="sidebar-menu">
        <li id="dashboard1"><a href="<?= base_url('dataTable/cartas'); ?>"><i class="fa fa-group"></i> Cartas</a></li>    
      </ul>
      -->

      <ul class="sidebar-menu">
        <li id="spain-info" class="treeview">
            <a href="#">
              <i class="fa fa-industry"></i> <span>Spain - Usine teruel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('dataTable/lineasProduccion?id_tipo=1');?>">CF - Calendrier de production</a></li>
              <li><a href="<?php echo base_url('dataTable/lineasProduccion?id_tipo=2');?>">AS/PA - Calendrier de production</a></li>
              <li><a href="<?php echo base_url('dataTable/documentation?id_origen=1');?>">Documentation</a></li>
            </ul>
          </li>

      </ul>


      <ul class="sidebar-menu">
        <li id="express-info" class="treeview">
            <a href="#">
              <i class="fa fa-industry"></i> <span>Express - Usine Mazarin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('dataTable/lineasProduccion?id_tipo=4');?>">CF - Calendrier de production</a></li>
              <li><a href="<?php echo base_url('dataTable/lineasProduccion?id_tipo=5');?>">AS/PA - Calendrier de production</a></li>
              <li><a href="<?php echo base_url('dataTable/documentation?id_origen=2');?>">Documentation</a></li>
            </ul>
          </li>

      </ul>


      <ul class="sidebar-menu">
        <li id="manchons-info" class="treeview">
            <a href="#">
              <i class="fa fa-dot-circle-o"></i> <span>Manchons</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('dataTable/lineasProduccion?id_tipo=3');?>">Calendrier de production</a></li>
              <li><a href="<?php echo base_url('dataTable/documentation?id_origen=3');?>">Documentation</a></li>
            </ul>
          </li>
      </ul>

      <!--
      <ul class="sidebar-menu">
        <li id="fa fa-cog" class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Stocks actuels</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('dataTable/StockTS');?>">Treillis soudés standard</a></li>
              <li><a href="<?php echo base_url('dataTable/StockAV');?>">About Voile</a></li>
              <li><a href="<?php echo base_url('dataTable/StockAttentes');?>">Attentes</a></li>
              
            </ul>
          </li>

      </ul>
      -->

      <ul class="sidebar-menu">
        <li id="manchons-info" class="treeview">
            <a href="#">
              <i class="fa fa-dot-circle-o"></i> <span>STOCKS MATERIAS PRIMAS</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('dataTable/StockMATHistorico');?>">HISTORICO</a></li>
              <li><a href="<?php echo base_url('dataTable/StockMAT');?>">INVENTARIO SPAIN</a></li>
              <li><a href="<?php echo base_url('dataTable/StockMATChilly');?>">INVENTARIO CHILLY</a></li>
              <li><a href="<?php echo base_url('dataTable/StockMATCares');?>">INVENTARIO K500CT SPAIN</a></li>
              <li><a href="<?php echo base_url('dataTable/StockMATCaresChilly');?>">INVENTARIO K500CT CHILLY</a></li>
              <li><a href="<?php echo base_url('dataTable/StockMATCouplers');?>">COUPLERS</a></li>
              <li><a href="<?php echo base_url('dataTable/StockMATConfig');?>">PESOS Y CONSUMOS</a></li>
              <li><a href="<?php echo base_url('dataTable/documentation?id_origen=4');?>">Documentation</a></li>
            </ul>

          </li>
      </ul>
      


    </section>
    <!-- /.sidebar -->
  </aside>

  
<script>
  $("#<?= $cur_tab; ?>").addClass('active');
</script>
