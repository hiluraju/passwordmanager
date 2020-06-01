<!-- Begin Add department -->
<div class="col-sm-4 col-md-4 col-xs-4"></div>
	<div class="col-sm-6 col-md-6 col-xs-6">
			<h1 class="h4 black mb-4 wei">EDIT DEPARTMENT</h1>
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
                  <?php $attributes = array("class"=>"user col-sm-6 col-md-6 col-xs-6","id"=>"departmentform");?>
                  <?php echo form_open("department/Updatedepartment/$department->id",$attributes)?>
				<div class="form-group">
					<label class="black wei" for="email">Department</label>
					<?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "department", 
                                        "id"          => "department", 
                                        "value"       => $department->name, 
                                        "placeholder" => "Department"); ?>
                      <?php echo form_input($data);?>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 col-xs-4"></div>
					<div class="col-sm-5 col-md-5 col-xs-5"> 
						<?php $data = array("class" => "btn btn-success btn-user btn-block text-center",
                                          "name"  => "update",
                                          "value" => "Update"); ?>
            <?php echo form_submit($data);?>
					</div>
				</div>
				<hr>
                <?php echo form_close();?>
	</div>
</div>
<!-- End of Add department -->
