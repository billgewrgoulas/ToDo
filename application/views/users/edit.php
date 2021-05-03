<?php echo validation_errors(); ?>

<?php echo form_open('http://localhost:8080/todo/users/update/'.$id); ?>
<div style="width: 40%; margin: auto; margin-top: 50px !important;">
    <h1 class="text-center"><?= $title; ?></h1>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $name ?>">
    </div>
    <div class="form-group">
        <label>lastName</label>
        <input type="text" class="form-control" name="lastName" placeholder="lastName" value="<?= $lastName ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $email ?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" type="password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</div>
<?php echo form_close(); ?>
<?php echo $this->session->flashdata('info_updated'); ?>