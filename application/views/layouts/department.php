
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="nav-link" href="<?php echo base_url();?>home/adddepartment">
              <button class="btn btn-success right">Add<i class="fas fa-user-plus ml10"></i></button>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered fcb" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SI NO</th>
                      <th>DEPARTMENT</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($departments as $department) 
                      {
                      ?>
                    <tr>                      
                      <td><?php echo $department['id']; ?></td>
                      <td><?php echo $department['name']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <div class="col-md-6 custom">
                              <button type="button" class="btn btn-sm btn-primary">Edit</button>        
                          </div>
                          <div class="col-md-6 custom">
                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
                          </div>
                      </div>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
