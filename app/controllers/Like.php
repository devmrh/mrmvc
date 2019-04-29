<?php
  class Like extends Controller {

  private $postModel;

  public function __construct()
  {
    $this->postModel = $this->model('LikeModel');
  }

  public function likepost()
  {
    $user_id = $_SESSION['user_id'];
    if (!$user_id) {
      flash('likeerr_message', 'please login', 'alert alert-warning');
      redirect('/');

    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $postid = trim($_POST['post_id']);

      if ( $this->postModel->likePost($postid)) {
        flash('like_message', 'like Updated');
        redirect('posts');
      } else {
        die('Something went wrong');
      }
    }
  }

  public function alllike()
  {
    $posts = $this->postModel->getAllUserLikes();
    $this->view('likes/alllike', $posts);
  }

  }