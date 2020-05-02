<?php 
$user = $this->session->userdata('user');
if($user){
?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>home/admin">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-unlock-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PASSWORD MANAGER</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>home/admin">
          <i class="fas fa-key"></i>
          <span>Manage Passwords</span></a>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>home/department">
          <i class="fas fa-users-cog"></i>
          <span>Manage Departments</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucfirst($user['user']);?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url();?>lib/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="nav-link" href="<?php echo base_url();?>home/addPassword">
              <button class="btn btn-danger right">Add<i class="fas fa-user-plus ml10"></i></button>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered fcb" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                    </tr>
                    <tr>
                      <td>Brielle Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                    </tr>
                    <tr>
                      <td>Herrod Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>59</td>
                      <td>2012/08/06</td>
                      <td>$137,500</td>
                    </tr>
                    <tr>
                      <td>Rhona Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010/10/14</td>
                      <td>$327,900</td>
                    </tr>
                    <tr>
                      <td>Colleen Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009/09/15</td>
                      <td>$205,500</td>
                    </tr>
                    <tr>
                      <td>Sonya Frost</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>23</td>
                      <td>2008/12/13</td>
                      <td>$103,600</td>
                    </tr>
                    <tr>
                      <td>Jena Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>30</td>
                      <td>2008/12/19</td>
                      <td>$90,560</td>
                    </tr>
                    <tr>
                      <td>Quinn Flynn</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2013/03/03</td>
                      <td>$342,000</td>
                    </tr>
                    <tr>
                      <td>Charde Marshall</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>36</td>
                      <td>2008/10/16</td>
                      <td>$470,600</td>
                    </tr> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class="black wei">Copyright &copy; Password Manager <?php echo date('Y');?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
          <?php echo form_open("home/logout")?>
          <?php $data = array("class" => "btn btn-danger",
                                          "name"  => "submit",
                                          "value" => "Logout"); ?>
          <?php echo form_submit($data);?>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Logout Modal-->

<?php } else {  redirect('home/index'); } ?>