<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<main class="main-content">
  <section>
    <div class="container">
      <div class="row">
        <div style="display:flex;">
          <?php if (sizeof($data) < 1) { ?>
            <div class="alert alert-warning">nothing found.</div>
          <?php } ?>

          <?php foreach ($data as $post) { ?>

            <div class="card" style="width: 18rem; margin: 0 5px;">
        
              <div class="card-body">
                <h5 class="card-title"><?php echo $post->title; ?></h5>
                <div>
                  <p><?= $post->body; ?></p>
                </div>
              </div>
              <div class="card-body" style="text-align:center;">
                <?php if (isset($_SESSION['user_id'])) : ?>
                  <a href="#" class="card-link">
                    <i class="material-icons" style="color:red;">favorite</i>
                  </a>
                  <a href="<?php echo URLROOT; ?>/post/edit/<?php echo $post->id; ?>" class="card-link"><i class="material-icons">edit</i></a>

                <?php endif ?>
              </div>
              <div class="card-footer text-muted"><?= $post->created_date; ?></div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>