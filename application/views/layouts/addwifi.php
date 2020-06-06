<!-- Begin Page Content -->
		<div class="col-sm-3 col-md-3 col-xs-3"></div>
		<div class="col-sm-6 col-md-6 col-xs-6">
			<h1 class="h4 black mb-4 wei text-center">ADD WIFI</h1>
				<div class="red wei text-center">
	                <?php if($this->session->flashdata('errors')): ?>
	                <?php echo $this->session->flashdata('errors'); ?>
	                <?php endif; ?>
	                <?php if($this->session->flashdata('wififailed')): ?>
	                <?php echo $this->session->flashdata('wififailed'); ?>
	                <?php endif; ?>
	            </div>
	            <div class="green wei text-center">
	                <?php if($this->session->flashdata('wifisuccess')): ?>
	                <?php echo $this->session->flashdata('wifisuccess'); ?>
	                <?php endif; ?>
	            </div>
				<?php $attributes = array("class"=>"user","id"=>"wifiform");?>
                <?php echo form_open("wifi/addwifi",$attributes)?>
				<div class="form-group">
					<label class="black wei">Wifi name</label>
					<?php $data = array("class"       => "form-control form-control-user black",
                                        "name"        => "name", 
                                        "id"          => "name",  
                                        "placeholder" => "Wifi name"); ?>
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

