<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<?php flash('likeerr_message'); ?>
<?php flash('like_message'); ?>
<?php flash('post_added'); ?>
<?php flash('post_message'); ?>
<main class="main-content">
  <section>
    <div class="container">
      <div class="row">
        <div style="display:flex;">
          <?php foreach ($data as $post) { ?>

            <div class="card" style="width: 18rem;margin: 0 5px;">
              <img class="card-img-top" src="<?= $post->image; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $post->title; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $post->name; ?></h6>
                <div>
                  <p><?= $post->body; ?></p>
                </div>
              </div>
              <div class="card-body" style="text-align:center;">
                <?php if (isset($_SESSION['user_id'])) : ?>
                  <a onclick="event.preventDefault();document.getElementById('like-<?= $post->id ?>').submit();">
                    <i class="material-icons" style="color:red;">favorite</i>
                    <form style="display:none;" id="like-<?= $post->id ?>" method="POST" action="<?php echo URLROOT; ?>/like/likepost ?>">
                      <input type="hidden" name="post_id" value="<?php echo $post->id ?>">

                    </form>
                  </a>
                  <?php if ($_SESSION['user_id'] && $post->author == $_SESSION['user_id']) { ?>
                    <a href="<?php echo URLROOT; ?>/post/edit/<?php echo $post->id; ?>" class="card-link"><i class="material-icons">edit</i></a>
                  <?php } ?>
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