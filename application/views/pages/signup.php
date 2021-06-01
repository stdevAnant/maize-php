<div class="container d-flex h-100 justify-content-center align-items-center mt-3">

  <div class="p-3 mt-3 shadow mb-5 mr-1 bg-white rounded animationLabel " style="width: 150px;">
    <h4>Signup...</h4>
  </div>
  <div class="p-1 mt-3 shadow mb-5 bg-white rounded row">
    <div class="col-md-12 p-3 text-center alert alert-dark">
      <h4>Disease detection system</h4>
    </div>
    <div class="col-md-6 p-3">
      <div class="d-flex justify-content-center align-items-center">
      <?php $this->load->library('form_validation'); ?>

        <img style="width: 350px ; height: auto;" src="<?php echo base_url('assets/images/logo.jpg'); ?>" /></br>
      </div>
    </div>
    <div class="col-md-6 p-3">
      <form method="POST" action="registerUser">
        <div class="form-group">
          <label for="InputEmail">Email address</label>
          <input class="form-control" name="InputEmail" type="text" value="<?php echo set_value('InputEmail'); ?>" placeholder="Default input">
        </div>
        <div class="form-group">
          <label for="InputFirstName">First Name</label>
          <input class="form-control" name="InputFirstName" type="text" value="<?php echo set_value('InputFirstName'); ?>" placeholder="Default input">
        </div>
        <div class="form-group">
          <label for="InputLastName">Last Name</label>
          <input class="form-control" name="InputLastName" type="text" value="<?php echo set_value('InputLastName'); ?>" placeholder="Default input">
        </div>
        <div class="form-group">
          <label for="InputPassword">Password</label>
          <input class="form-control" type="password" name="InputPassword" value="<?php echo set_value('InputPassword'); ?>" placeholder="Default input">
        </div>
        <div class="form-group">
          <label for="RepeatPasswords">Repeat Password</label>
          <input class="form-control" type="password" name="RepeatPassword" value="<?php echo set_value('RepeatPassword'); ?>" placeholder="Default input">
        </div>
        <div>
        <span style="color: red;"><?php echo validation_errors(); ?><span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
    <div class="">We know each other? <a href="<?php echo base_url('login'); ?>">Login here</a></div>

  </div>

</div>