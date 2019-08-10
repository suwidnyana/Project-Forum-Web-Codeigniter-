<!DOCTYPE html>
<html>
<head>
    <title>Project Web</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
   
    
    <link rel="icon" href="<?php echo base_url('blogger-icon.png')?>" class="img-circle">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

   
 <div class="navbar-collapse collapse dropdown" id="navbarColor01" style="">
  
    <ul class="navbar-nav mr-auto">
    <?php if($this->session->userdata('logged_in')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li >
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>categories">Category</a>
      </li>
       <?php endif; ?>
    </ul>

     

    
  <ul class="navbar-nav ml-auto">

  <?php if($this->session->userdata('logged_in')) : ?>
      <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
        </li>

        <li class="nav-item">
           <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Category</a>
       </li>
       
       <li class="nav-item">
           <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
       </li>
   <?php endif; ?>


   <?php if(!$this->session->userdata('logged_in')) : ?>
      <div class="dropdown">
      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Menu
      </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <a class="dropdown-item" href="<?php echo base_url(); ?>users/login">Login</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>users/register">Register</a>
          </div>
    </div>
<?php endif; ?>



   </ul>
 </div>
 
</nav>

<div class="container">
  <br>

  <?php if($this->session->flashdata('user_registered')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered'). '</p>';?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedin')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin'). '</p>';?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_logout')) : ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_logout'). '</p>';?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_failed')) : ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed'). '</p>';?>
  <?php endif; ?>


  <?php if($this->session->flashdata('post_created')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created'). '</p>';?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_updated')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated'). '</p>';?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_created')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created'). '</p>';?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_deleted')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted'). '</p>';?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_deleted')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted'). '</p>';?>
  <?php endif; ?>
  














