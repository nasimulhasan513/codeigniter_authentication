<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CI Authentication</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style>
  </style>
</head>

<body>

<?php  $uri = service('uri'); ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">CI Authentication</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
          
          <?php if (session()->get('loggedIn')) : ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?=($uri->getSegment(1)=='dashboard'?'active':'')?>" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=($uri->getSegment(1)=='profile'?'active':'')?>" href="/profile">Profile</a>
            </li></ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a href="/logout" class="nav-link">Logout</a>
              </li>
            </ul>
          <?php else : ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?=($uri->getSegment(1)=='login'?'active':'')?>" href="/">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=($uri->getSegment(1)=='register'?'active':'')?>" href="/register">Register</a>
            </li></ul>
          <?php endif ?>
        </ul>

      </div>
    </div>
  </nav>