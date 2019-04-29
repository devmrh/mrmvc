<?php
class Post extends Controller
{
  private $postModel;

  public function __construct()
  {
    $this->postModel = $this->model('PostModel');
  }


  public function allpost()
  {
    $posts = $this->postModel->getAllUserPosts();
    $this->view('posts/allpost', $posts);
  }


  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'image' => trim($_POST['image']),
        'author' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];

      if (empty($data['title'])) {
        $data['title_err'] = 'title is empty!';
        if (empty($data['body'])) {
          $data['body_err'] = 'body is required!';
        }
      }

      if (empty($data['title_err']) && empty($data['body_err'])) {

        if ($this->postModel->addPost($data)) {
          flash('post_added', 'New Post Added!');
          redirect('posts');
        } else {
          die('something went wrong');
        }
      } else {
        $this->view('post/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'body' => '',
        'image' => '',
      ];

      $this->view('posts/addpost', $data);
    }
  }

  public function edit($id)
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'image' => trim($_POST['image']),
        'author' => $_POST['author'],
        'title_err' => '',
        'body_err' => ''
      ];

      if (empty($data['title'])) {
        $data['title_err'] = 'title can not be empty';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'post body can not be empty';
      }

      if (empty($data['title_err']) && empty($data['body_err'])) {
        if ($this->postModel->updatePost($data)) {
          flash('post_message', 'Post Updated');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('posts/edit', $data);
      }
    }

    $post = $this->postModel->getSinglePost($id);

    $data = [
      'id' => $id,
      'title' => $post->title,
      'body' => $post->body,
      'image' => $post->image,
      'author' => $post->author
    ];


    $this->view('posts/edit', $data);
  }

  public function delete()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $post_id = $_POST['post_id'];
    
      if ($this->postModel->deletePost($post_id)) {
        flash('post_message', 'post deleted');
        redirect('posts');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('/');
    }
  }

}
