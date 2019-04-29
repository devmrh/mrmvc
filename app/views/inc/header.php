<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URLROOT . '/css/main.css'; ?>">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo URLROOT . '/scss/app.css' ?>" rel="stylesheet">

</head>

<body>
  <div id="app">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Twitter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['user_id'])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/user/logout"><i class="material-icons">
                    exit_to_app
                  </i> Logout</a>
              </li>

            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/user/register">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/user/login">Login</a>
              </li>
            <?php endif; ?>
          </ul>
          <?php if (isset($_SESSION['user_id'])) : ?>
            <div class="nav-item" style="
              color:#bcb86f;
              margin-right:10px;
              color: #bcb86f;
              margin-right: 20px;
              font-size: 14px;
              cursor: pointer;">
              <a class="nav-link" href="<?php echo URLROOT; ?>/user/dashboard">welcome
                  <?= $_SESSION['user_email'] ?>
                </a>
              </div>
          <?php endif ?>
          <form class=" form-inline mt-2 mt-md-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
          </div>
      </nav>
    </header>