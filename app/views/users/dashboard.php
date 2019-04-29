<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="card m-auto" style="width: 60rem;">
  <div class="card-body" style="height:400px;text-align:center;">
    <h5 class="card-title">welcome <?= $_SESSION['user_email'];  ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Mini dashboard</h6>
    <p class="card-text">
      You can see all posts and likes here.
    </p>
    <a href="<?php echo URLROOT; ?>/post/allpost" class="card-link">all posts</a>
    <a href="<?php echo URLROOT; ?>/like/alllike" class="card-link">all likes</a>
    <a href="<?php echo URLROOT; ?>/post/add" class="card-link">add post</a>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>