<!-- Begin Page Content -->
		<div class="col-sm-3 col-md-3 col-xs-3"></div>
		<div class="col-sm-6 col-md-6 col-xs-6">
			<h1 class="h4 black mb-4 wei text-center">EDIT DETAILS</h1>
				<div class="red wei text-center">
	                <?php if($this->session->flashdata('errors')): ?>
	                <?php echo $this->session->flashdata('errors'); ?>
	                <?php endif; ?>
	                <?php if($this->session->flashdata('extensionfailed')): ?>
	                <?php echo $this->session->flashdata('extensionfailed'); ?>
	                <?php endif; ?>
	            </div>
	            <div class="green wei text-center">
	                <?php if($this->session->flashdata('extensionsuccess')): ?>
	                <?php echo $this->session->flashdata('extensionsuccess'); ?>
	                <?php endif; ?>
	            </div>
				<?php $attributes = array("class"=>"user","id"=>"extensionform");?>
                <?php echo form_open("extension/Updateextension/$extension->id",$attributes)?>
				<div class="form-group">
					<label class="black wei">Name</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "name", 
                                        "id"          => "name", 
                                        "value"       => $extension->name, 
                                        "placeholder" => "Name"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="number">Number</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "number", 
                                        "id"          => "number", 
                                        "type"        => "number", 
                                        "value"       => $extension->number,  
                                        "placeholder" => "Number"); ?>
                    <?php echo form_input($data);?>
				</div>
				 <div class="form-group">
					<label class="black wei">Department</label>
					<?php 
						echo form_dropdown('departments', $departments,$currentdepartment,'class="form-control" id="departments"');
					?>
				</div> 

				<div class="row">
					<div class="col-sm-4 col-md-4 col-xs-4"></div>
					<div class="col-sm-3 col-md-3 col-xs-3"> 
						<button class="btn btn-success btn-user btn-block">Update</button>
					</div>
				</div>	
				</div>
				<hr>
			<?php echo form_close();?>
	</div>
<!-- /.container-fluid -->

