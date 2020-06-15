<!-- Begin Page Content -->
		<div class="col-sm-3 col-md-3 col-xs-3"></div>
		<div class="col-sm-6 col-md-6 col-xs-6">
			<h1 class="h4 black mb-4 wei text-center">ADD DETAILS</h1>
				<div class="red wei text-center">
	                <?php if($this->session->flashdata('errors')): ?>
	                <?php echo $this->session->flashdata('errors'); ?>
	                <?php endif; ?>
	                <?php if($this->session->flashdata('passwordfailed')): ?>
	                <?php echo $this->session->flashdata('passwordfailed'); ?>
	                <?php endif; ?>
	            </div>
	            <div class="green wei text-center">
	                <?php if($this->session->flashdata('passwordsuccess')): ?>
	                <?php echo $this->session->flashdata('passwordsuccess'); ?>
	                <?php endif; ?>
	            </div>
				<?php $attributes = array("class"=>"user","id"=>"passwordform");?>
                <?php echo form_open("password/addpassword",$attributes)?>
				<div class="form-group">
					<label class="black wei">Username</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "username", 
                                        "id"          => "username", 
                                        "value"       => set_value('username'), 
                                        "placeholder" => "Username"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">Email Address</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "email", 
                                        "id"          => "email", 
                                        "type"        => "email", 
                                        "value"       => set_value('email'), 
                                        "placeholder" => "Email Address"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">Password</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "password", 
                                        "id"          => "password", 
                                        // "type"        => "password",
                                        "value"       => set_value('password'), 
                                        "placeholder" => "Password"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">Erp Username</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "erpusername", 
                                        "id"          => "erpusername",
                                        "value"       => set_value('erpusername'), 
                                        "placeholder" => "Erp Username"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">Erp Password</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "erppassword", 
                                        "id"          => "erppassword", 
                                        // "type"        => "password", 
                                        "value"       => set_value('erppassword'),
                                        "placeholder" => "Erp Password"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">App Username</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "appusername", 
                                        "id"          => "appusername", 
                                        "value"       => set_value('appusername'),
                                        "placeholder" => "App Username"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">App Password</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "apppassword", 
                                        "id"          => "apppassword", 
                                        // "type"        => "password", 
                                        "value"       => set_value('apppassword'),
                                        "placeholder" => "App Password"); ?>
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

