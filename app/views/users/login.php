<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="login-form-container col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <?php flash('register_success'); ?>
      <h2>login</h2>
      <p></p>
      <form action="<?php echo URLROOT; ?>/user/login" method="post">
        <div class="form-group">
          <label>email:<sup>*</sup></label>
          <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label>password:<sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-row">
          <div class="col">
            <input type="submit" class="btn btn-success btn-block" value="Login">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">not a memeber ? register</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>