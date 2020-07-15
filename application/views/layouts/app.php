<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title><?= isset($title) ? $title : 'CIShop'?> - CodeIgniter E-Commerce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fontawesome  css -->
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
      
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/assets/css/app.css">
  </head>
  <body>
    <!-- Navbar-->
    <?php $this->load->view('layouts/_navbar'); ?>
    <!-- Endnavbar -->
    
    <!-- content -->
    <?php $this->load->view($page); ?>
    <!-- end content -->
    <script src="/assets/jquery.min.js" ></script>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
