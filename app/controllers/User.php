<?php
class User extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('UserModel');
  }

  public function index()
  {
    redirect('welcome');
  }

  public function register()
  {
    if ($this->isLoggedIn()) {
      redirect('posts');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'name' => trim($_POST['name']),
        'family' => trim($_POST['family']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_err' => '',
        'family_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      if (empty($data['email']) && !filter_var( $data['email'], FILTER_VALIDATE_EMAIL)) {
        $data['email_err'] = 'please enter valid email';
        if (empty($data['name'])) {
          $data['name_err'] = 'please enter your name';
        }
      } else {
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'this email is exists';
        }
      }

     

      if (empty($data['password'])) {
        $data['password_err']  = 'password is empty';
      } elseif (strlen($data['password']) < 4) {
        $data['password_err'] = 'password must have at least 4 characters.';
      }

      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'please confirm password.';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'password do not match.';
        }
      }

      if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($this->userModel->register($data)) {
          flash('register_success', 'You are now registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('users/register', $data);
      }
    } else {

      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'family' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      $this->view('users/register', $data);
    }
  }

  public function login()
  {

    if ($this->isLoggedIn()) {
      redirect('posts');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      if (empty($data['email'])) {
        $data['email_err'] = 'please enter email.';
      }

      if (!$this->userModel->findUserByEmail($data['email'])) {
        $data['email_err'] = 'This email is not registered';
      } 

      if (empty($data['email_err']) && empty($data['password_err'])) {

        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'incorrect password';
          
          $this->view('users/login', $data);
        }
      } else {
        $this->view('users/login', $data);
      }
    } else {

      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

   
      $this->view('users/login', $data);
    }
  }

  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->name;
    redirect('posts');
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('user/login');
  }

  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }


  public function dashboard(){
    
    $this->view('users/dashboard', $data);

  }
}
