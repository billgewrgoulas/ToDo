<html>

<head>
    <!-- CSS only -->
    <link rel="stylesheet" href="http://localhost:8080/todo/assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>blog</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost:8080/todo/home">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active"
                    href="http://localhost:8080/todo/users/edit/<?php echo $this->session->userdata('user_id'); ?>">My
                    profile</a>
                <a class="nav-item nav-link active" href="http://localhost:8080/todo/users/show">Customers</a>
                <a class="nav-item nav-link active" href="http://localhost:8080/todo/comments/view">History</a>
                <a class="nav-item nav-link" href="http://localhost:8080/todo/users/logout">logout</a>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 5rem;">