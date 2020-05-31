<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="nav-link" href="<?php echo base_url();?>home/addpassword">
              <button class="btn btn-success right">Add<i class="fas fa-user-plus ml10"></i></button>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered fcb" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email Address</th>
                      <th>Password</th>
                      <th>Erp Username</th>
                      <th>Erp Password</th>
                      <th>App Username</th>
                      <th>App Password</th>
                      <th>Department</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($passwords as $passwords){ ?>
                    <tr>
                      <td><?php echo $this->encrypt->decode($passwords['username']); ?></td>
                      <td><?php echo $this->encrypt->decode($passwords['email']); ?></td>
                      <td><?php echo $this->encrypt->decode($passwords['password']); ?></td>
                      <td><?php echo $this->encrypt->decode($passwords['erpusername']); ?></td>
                      <td><?php echo $this->encrypt->decode($passwords['erppassword']); ?></td>
                      <td><?php echo $this->encrypt->decode($passwords['appusername']); ?></td>
                      <td><?php echo $this->encrypt->decode($passwords['apppassword']); ?></td>
                      <td><?php echo $passwords['departments']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <div class="col-md-6 custom">
                              <a href="<?php echo base_url();?>Password/Editpassword/<?php echo $passwords['id']; ?>">
                                <button type="button" class="btn btn-sm btn-primary">Edit</button>        
                              </a>
                          </div>
                          <div class="col-md-6 custom">
                            <a href="<?php echo base_url();?>Password/Deletepassword/<?php echo $passwords['id']; ?>">
                              <button type="button" class="btn btn-sm btn-danger">Delete</button>
                            </a>
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
        <!-- /.container-fluid -->
