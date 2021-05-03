<?php echo form_open('http://localhost:8080/todo/users/login'); ?>
<div class="center">
    <div class="log-card">
        <?php echo validation_errors(); ?>
        <h1 class="text-center"><?php echo $title; ?></h1>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter email" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <a href="http://localhost:8080/todo/users/register">Register</a><br>
        <a href="http://localhost:8080/todo/users/recover">Lost My Pass</a>
    </div>
</div>
<?php echo form_close(); ?>

<style>
.center {
    display: grid;
    place-items: center;
    position: fixed;
    top: -20px;
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

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">