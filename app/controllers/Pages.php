<?php
  class Pages extends Controller{

    private $postModel;

    public function __construct()
    {
      $this->postModel = $this->model('PostModel');
    }
  public function index()
  {
 
    $posts = $this->postModel->getAllPosts();


    $this->view('pages/index', $posts);
  }

  public function edit($id){

    $this->view('pages/edit', $id);
  }

  }