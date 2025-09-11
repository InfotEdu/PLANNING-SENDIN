<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="https://planning.sendin.com/auth/login/">
            <img src="<?php echo base_url('assets/images/icon/logo.png')?>" class="img-fluid" alt="logo">
            <span>Planning</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li>
                        <a href="#user-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-user-tie"></i><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="user-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo base_url('user-add');?>">User Add</a></li>
                           <li><a href="<?php echo base_url('user-list');?>">User List</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#spain-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-chart-bar"></i><span>Spain - Usine teruel</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="spain-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo base_url('DataTable/stock');?>">CF - Calendrier de production</a></li>
                           <li><a href="<?php echo base_url('DataTable/stock');?>">AF/AS - Calendrier de production</a></li>
                           <li><a href="<?php echo base_url('DataTable/stock');?>">Documentation</a></li>
                        </ul>
                     </li>

                     <li>
                        <a href="#express-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-chart-bar"></i><span>Express - Usine Mazarin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="express-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo base_url('DataTable/stock');?>">CF - Calendrier de production</a></li>
                           <li><a href="<?php echo base_url('DataTable/stock');?>">AF/AS - Calendrier de production</a></li>
                           <li><a href="<?php echo base_url('DataTable/stock');?>">Documentation</a></li>
                        </ul>
                     </li>

                     <li>
                        <a href="#manchons-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-database"></i><span>Manchons</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="manchons-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo base_url('DataTable/stock');?>">Calendrier de production</a></li>
                           <li><a href="<?php echo base_url('DataTable/stock');?>">Documentation</a></li>
                        </ul>
                     </li>

                     <li>
                        <a href="#stock-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-check-square"></i><span>Stock Actuells</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="stock-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="<?php echo base_url('DataTable/stock');?>">Treillis soudés standars</a></li>
                           <li><a href="<?php echo base_url('DataTable/stock');?>">About Voile</a></li>
                           <li><a href="<?php echo base_url('DataTable/stock');?>">Attentes</a></li>
                        </ul>
                     </li>

                     
                     
                     <li><a href="https://iqonic.design/themes/metorik/codeigniter/index.php" class="iq-waves-effect"><i class="las la-sms"></i><span>*** BASE</span></a></li>

                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
</div>
