<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<main class="main-content">
  <section>
    <div class="container">
      <div class="row">
        <div style="display:flex;">
          <?php if (sizeof($data) < 1) { ?>
            <div class="alert alert-warning">You Dont Have Any Post.</div>
          <?php } ?>

          <?php foreach ($data as $post) { ?>

            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?= $post->image; ?>">
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
                  <a class="btn btn-danger" onclick="event.preventDefault();document.getElementById('del-<?= $post->id ?>').submit();">
                    <i class="" style="color:red;">delete</i>
                    <form style="display:none;" id="del-<?= $post->id ?>" method="POST" action="<?php echo URLROOT; ?>/post/delete">
                      <input type="hidden" name="post_id" value="<?php echo $post->id ?>">

                    </form>
                  </a>
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