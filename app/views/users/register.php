<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="reg-form-container card card-body bg-light">
      <h2>register in twitter</h2>
      <p></p>
      <form action="<?php echo URLROOT; ?>/user/register" method="post">
        <div class="form-group">
          <label>name:<sup>*</label>
          <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
          <label>family:<sup>*</label>
          <input type="text" name="family" class="form-control form-control-lg <?php echo (!empty($data['family_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['family']; ?>">
          <span class="invalid-feedback"><?php echo $data['family_err']; ?></span>
        </div>
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
        <div class="form-group">
          <label>confirm password:<sup>*</sup></label>
          <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="form-row">
          <div class="col">
            <input type="submit" class="btn btn-success btn-block" value="Register">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php'; ?>