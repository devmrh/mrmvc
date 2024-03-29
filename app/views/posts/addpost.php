<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
<div class="container">
  <div class="card card-body bg-light mt-5">
    <h2>Add Post</h2>
    <p>you can add new record here</p>
    <form action="<?php echo URLROOT; ?>/post/add" method="post">
      <div class="form-group">
        <label>title:<sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="Add a title...">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label>description:<sup>*</sup></label>
        <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some text..."><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
      </div>
      <div class="form-group">
        <label>image url:<sup>*</sup></label>
        <textarea name="image" class="form-control form-control-lg <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add image url..."><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>