<body class="bg-gradient-info">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b>PASSWORD <img class="w10" src="<?php echo base_url();?>lib/img/lock.png" alt="lock"> MANAGER</b> </h1>
                  </div>
                  <div class="text-center red">
                    <?php if($this->session->flashdata('errors')): ?>
                    <?php echo $this->session->flashdata('errors'); ?>
                    <?php endif; ?>
                  </div>
                  <?php $attributes = array("class"=>"user","id"=>"userform");?>
                  <?php echo form_open("home/login",$attributes)?>
                    <div class="form-group">
                    <?php $data = array("class"       => "form-control form-control-user",
                                        "name"        => "username", 
                                        "id"          => "username", 
                                        "placeholder" => "Enter Username"); ?>
                      <?php echo form_input($data);?>
                    </div>
                    <div class="form-group">
                      <?php $data = array("class"       => "form-control form-control-user",
                                          "name"        => "password", 
                                          "id"          => "password", 
                                          "placeholder" => "Enter Password"); ?>
                      <?php echo form_password($data);?>

                    </div>
                    <div class="col-lg-6 ma">
                      <?php $data = array("class" => "btn btn-primary btn-user btn-block",
                                          "name"  => "submit",
                                          "value" => "Login"); ?>
                      <?php echo form_submit($data);?>
                    </div> 
                  <?php echo form_close();?>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  