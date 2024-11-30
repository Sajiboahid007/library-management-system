<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bootstrap Sidebar Layout</title>
  <link href="./global-style.css" rel="stylesheet" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- //ajax cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    /* Custom styles for the sidebar */
    .sidebar {
      height: 100vh;
      /* Full height */
      background-color: #343a40;
      /* Sidebar background */
      color: white;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      /* Remove underline */
    }

    .sidebar a:hover {
      background-color: #495057;
      /* Darker on hover */
      border-radius: 5px;
      /* Rounded corners */
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">