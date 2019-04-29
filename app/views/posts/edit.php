<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i style="font-size: 34px;
font-weight: bold;
color: #aaa;" class="material-icons">
    keyboard_backspace
  </i></a>
<div class="edit-container bg-light mt-5">

  <div class="container">
    <h6 class="edit-title"> You are editing this post: <span style="font-size: 20px;
color: #424242;
text-decoration: underline;"><?= $data['title']; ?></span></h6>

    <form class="edit-form" action="<?php echo URLROOT; ?>/post/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label>Title:<sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg " value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"></span>
      </div>
      <div class="form-group">
        <label>Body:<sup>*</sup></label>
        <textarea name="body" class="form-control form-control-lg"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"></span>
      </div>
      <div class="form-group">
        <label>image url:<sup>*</sup></label>
        <textarea name="image" class="form-control form-control-lg <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add image url..."><?php echo $data['image']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
      </div>
      <input type="hidden" name="author" value="<?= $data['author']; ?>">
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>