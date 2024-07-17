 <header class="main-header">
   <nav class="navbar navbar-static-top">
     <div class="container">
       <div class="navbar-header">
         <a href="<?= base_url('home') ?>" class="navbar-brand"><b>SiJadwal</b>Ta</a>
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
           <i class="fa fa-bars"></i>
         </button>
       </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
         <ul class="nav navbar-nav">
           <li class="<?= $this->uri->segment(1) == 'home' ? 'active' : '' ?>"><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
           <li class="<?= $this->uri->segment(1) == 'jadwal-kelas' ? 'active' : '' ?>"><a href="<?= base_url('jadwal-kelas') ?>"><i class="fa fa-calendar"></i> Jadwal <span class="sr-only">(current)</span></a></li>
         </ul>
       </div>
       <!-- /.navbar-collapse -->
       <!-- Navbar Right Menu -->
       <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">


           <!-- User Account Menu -->
           <li class="dropdown user user-menu">
             <!-- Menu Toggle Button -->
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <!-- The user image in the navbar-->
               <i class="fa fa-user"></i>
               <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
               <!-- hidden-xs hides the username on small devices so only the image appears. -->
               <span class="hidden-xs"> Login</span>
             </a>
             <ul class="dropdown-menu">
               <li class="user-footer">
                 <div class="text-black">
                   <a href="<?= base_url('login') ?>" class="btn btn-default btn-flat btn-block"><i class="fa fa-sign-in"></i> Login</a>
                 </div>

               </li>
             </ul>
           </li>
         </ul>
       </div>
       <!-- /.navbar-custom-menu -->
     </div>
     <!-- /.container-fluid -->
   </nav>
 </header>
 <!-- Full Width Column -->