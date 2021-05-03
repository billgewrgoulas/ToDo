<h2><?= $title ?></h2>
<?php if($users) : ?>
<?php foreach($users as $user) : ?>
<div class="card" style="width: 50%; margin: auto; margin-bottom: 20px !important;">
    <div class="card-header">
        <div style="display: inline-block;">Customer <?php echo $user['name']; ?></div>
        <div style="margin-left: auto; float:right">last interactive</div>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                Name: <?php echo $user['name']; ?><br>
                Last name: <?php echo $user['lastName']; ?><br>
                email: <?php echo $user['email']; ?>
            </div>
        </div>
        <?php echo form_open('http://localhost:8080/todo/users/delete/'.$user['id']); ?>
        <input style="margin-top: 5px" type="submit" value="Delete" class="btn btn-danger">
        <a class="btn btn-primary" style="margin-top: 5px"
            href="http://localhost:8080/todo/users/edit/<?php echo $user['id']; ?>">Edit</a>
        <a class="btn btn-primary" style="margin-top: 5px"
            href="http://localhost:8080/todo/users/<?php echo $user['id']; ?>/comments">All Comments</a>
        </form>
    </div>
</div>
<?php endforeach; ?>
<?php else : ?>
<p>No Customers</p>
<?php endif; ?>

<br>
<?php echo $this->session->flashdata('customer_deleted'); ?>