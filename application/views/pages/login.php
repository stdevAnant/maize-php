<div class="container d-flex justify-content-center align-items-center">

<div class="p-3 mt-3 shadow mb-5 bg-white rounded animationLabel">
    <h4>Login</h4>
  </div>
  <div class="w-50 p-3 mt-3 shadow mb-5 bg-white rounded">
  <div class="col-md-12 p-3 text-center alert alert-dark">
      <h4>Disease detection system</h4>
    </div>
    <form class="p-3" method="POST" action="authenticate">
      <div>
      <?php $this->load->library('form_validation'); ?>
        <span style="color: red;"><?php echo validation_errors(); ?><span>
        </div>
      <div class="d-flex justify-content-center">
        <img style="width: 150px ;" src="<?php echo base_url('assets/images/logo.jpg'); ?>" /></br>
      </div>
      <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="InputPassword">Password</label>
        <input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="">New here? <a href="<?php echo base_url('signup'); ?>">Signup here</a></div>
  </div>

</div>