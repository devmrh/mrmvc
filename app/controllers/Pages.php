<?php
  class Pages extends Controller{
    public function __construct()
    {
      
    }
  public function index()
  {
 
    //Set Data
    $data = [
      'title' => 'Welcome To SharePosts',
      'description' => 'Simple social network built on the TraversyMVC PHP framework'
    ];

    // Load homepage/index view
    
    $this->view('pages/index', $data);
  }
  }