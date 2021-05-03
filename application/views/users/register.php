<?php echo form_open('http://localhost:8080/todo/users/register'); ?>
<div class="center">
    <div class="log-card">
        <?php echo validation_errors(); ?>
        <h1 class="text-center"><?= $title; ?></h1>
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="lastName" placeholder="lastName">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        <a href="http://localhost:8080/todo/users/login">Log In</a>
    </div>
</div>
<?php echo form_close(); ?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<style>
.center {
    display: grid;
    place-items: center;
    position: fixed;
    left: 0;
    height: 100%;
    width: 100%;
}

.btn {
    width: 100%;
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.log-card {
    width: 30%;
}
</style>