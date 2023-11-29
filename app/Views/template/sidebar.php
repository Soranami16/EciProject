 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <div class="sidebar">

         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         </div>

         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                 <li class="nav-item">
                     <a href="<?php echo base_url() . 'home'; ?>" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <li class="nav-item menu">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-file"></i>
                         <p>
                             Master Data
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Master User</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Master Store</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Master Store Location</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Master Tender</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Master Article</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Master Prefix</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Master Terminal</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Master EDC</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item menu">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-ticket-alt"></i>
                         <p>
                             Tiket
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'status'; ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Create Tiket
                                     <i class="right fas fa-angle-left"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                     <a href="<?php echo base_url() . 'formfasilitas'; ?>" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>
                                             Form fasilitas IT
                                         </p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="<?php echo base_url() . 'formtender'; ?>" class="nav-link ">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Form Tender</p>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                         <li class="nav-item">
                             <a href="<?php echo base_url() . 'listtiket'; ?>" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List Tiket</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-cog"></i>
                         <p>
                             Setting
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?php echo base_url() . 'logout'; ?>" class="nav-link">
                         <i class="nav-icon fas fa-sign-out-alt"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>

     </div>

 </aside>