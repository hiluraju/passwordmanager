<!-- Begin Page Content -->
		<div class="col-sm-3 col-md-3 col-xs-3"></div>
		<div class="col-sm-6 col-md-6 col-xs-6">
			<h1 class="h4 black mb-4 wei text-center">ADD ANYDESK</h1>
				<div class="red wei text-center">
	                <?php if($this->session->flashdata('errors')): ?>
	                <?php echo $this->session->flashdata('errors'); ?>
	                <?php endif; ?>
	                <?php if($this->session->flashdata('anydeskfailed')): ?>
	                <?php echo $this->session->flashdata('anydeskfailed'); ?>
	                <?php endif; ?>
	            </div>
	            <div class="green wei text-center">
	                <?php if($this->session->flashdata('anydesksuccess')): ?>
	                <?php echo $this->session->flashdata('anydesksuccess'); ?>
	                <?php endif; ?>
	            </div>
				<?php $attributes = array("class"=>"user","id"=>"wifiform");?>
                <?php echo form_open("Anydesk/addanydesk",$attributes)?>
				<div class="form-group">
					<label class="black wei">Name</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "username", 
                                        "id"          => "username",  
                                        "placeholder" => "Name"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei">Anydesk Number</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "desk",
                                        "type"        => "number", 
                                        "id"          => "desk",  
                                        "placeholder" => "Anydesk Number"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei">Department</label>
					<?php 
						echo form_dropdown('departments', $departments,'','class="form-control black" id="departments"');
					?>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4 col-xs-4"></div>
					<div class="col-sm-3 col-md-3 col-xs-3"> 
						<button class="btn btn-success btn-user btn-block">Save</button>
					</div>
				</div>	
				</div>
				<hr>
			<?php echo form_close();?>
	</div>
<!-- /.container-fluid -->

