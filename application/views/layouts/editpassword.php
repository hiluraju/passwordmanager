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
					<?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "username", 
                                        "id"          => "username", 
                                        "value"       => $this->encrypt->decode($password->username), 
                                        "placeholder" => "Username"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">Email Address</label>
					<?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "email", 
                                        "id"          => "email", 
                                        "type"        => "email", 
                                        "value"       => $this->encrypt->decode($password->email),  
                                        "placeholder" => "Email Address"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">Password</label>
					<?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "password", 
                                        "id"          => "password", 
                                        "value"       => $this->encrypt->decode($password->password),
                                        "placeholder" => "Password"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">Erp Username</label>
					<?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "erpusername", 
                                        "id"          => "erpusername",
                                        "value"       => $this->encrypt->decode($password->erpusername),
                                        "placeholder" => "Erp Username"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">Erp Password</label>
					<?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "erppassword", 
                                        "id"          => "erppassword", 
                                        "value"       => $this->encrypt->decode($password->erppassword),
                                        "placeholder" => "Erp Password"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">App Username</label>
					<?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "appusername", 
                                        "id"          => "appusername", 
                                        "value"       => $this->encrypt->decode($password->appusername),
                                        "placeholder" => "App Username"); ?>
                    <?php echo form_input($data);?>
				</div>
				<div class="form-group">
					<label class="black wei" for="email">App Password</label>
					<?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "apppassword", 
                                        "id"          => "apppassword", 
                                        "value"       => $this->encrypt->decode($password->apppassword),
                                        "placeholder" => "App Password"); ?>
                    <?php echo form_input($data);?>
				</div>
				<!-- <div class="form-group">
					<label class="black wei">Department</label>
					<?php 
						echo form_dropdown('departments', $departments,'','class="form-control" id="departments"');
					?>
				</div> -->

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

