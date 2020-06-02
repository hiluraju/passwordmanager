
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="red wei text-center">
                <?php if($this->session->flashdata('errors')): ?>
                <?php echo $this->session->flashdata('errors'); ?>
                <?php endif; ?>
                <?php if($this->session->flashdata('departmentfailed')): ?>
                <?php echo $this->session->flashdata('departmentfailed'); ?>
                <?php endif; ?>
            </div>
            <div class="green wei text-center">
                <?php if($this->session->flashdata('departmentsuccess')): ?>
                <?php echo $this->session->flashdata('departmentsuccess'); ?>
                <?php endif; ?>
            </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="nav-link" href="<?php echo base_url();?>home/adddepartment">
              <button class="btn btn-success right">Add<i class="fas fa-user-plus ml10"></i></button>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php if($departments) { ?>
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
                      $counter = 1;
                      foreach ($departments as $department) 
                      {
                      ?>
                    <tr>                      
                      <td><?php echo $counter; ?></td>
                      <td><?php echo $department['name']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <div class="col-md-6 custom">
                            <a href="<?php echo base_url();?>Department/Editdepartment/<?php echo $department['id']; ?>">  
                              <button type="button" class="btn btn-sm btn-primary">Edit</button>        
                            </a>
                          </div>
                          <div class="col-md-6 custom">
                            <!-- <a data-toggle="modal" data-target="#deleteModal"> -->
                            <a data-toggle="modal">
                            <!-- <a href="<?php echo base_url();?>Department/Deletedepartment/<?php echo $department['id']; ?>">   -->
                              <button type="button" class="btn btn-sm btn-danger deletebutton" id="<?php echo $department['id']; ?>">Delete</button>
                            </a>
                          </div>
                      </div>
                      </td>
                    </tr>
                  <?php $counter++; } ?>
                  </tbody>
                </table>
                <?php } else{ ?>
                <div class="alert alert-danger text-center">
                  <strong class="black">No Data Found!</strong> 
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>


<!-- Delete Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content black">
        <div class="modal-header">
          <h5 class="modal-title wei" id="exampleModalLabel">Are you Sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Click "Delete" button to Delete the Department</div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
          <?php echo form_open("Department/Deletedepartment")?>
          <input type="hidden" name="deletedepartment" id="deletedepartment">
          <?php $data = array("class" => "btn btn-danger",
                                          "name"  => "submit",
                                          "value" => "Delete"); ?>
          <?php echo form_submit($data);?>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Delete Modal-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
$(".deletebutton").click(function()
{
  let departmentid = $(this).attr('id');
  $("#deletedepartment").val(departmentid);
  $('#deleteModal').modal('show');
});
</script>