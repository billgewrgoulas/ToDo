<?php if($this->session->userdata('role') === 'customer') : ?>
<h2 style="width: 50%; margin: auto;">My Comments</h2>
<?php else : ?>
<h2 style="width: 50%; margin: auto;">All Comments of user: <?php echo $name; ?></h2>
<?php endif; ?>
<?php if($comments) : ?>
<?php foreach($comments as $comment) : ?>
<div class="card" style="width: 50%; margin: auto; margin-bottom: 20px !important;">
    <div class="card-header">
        <?php echo $comment['title']; ?>
        <div style="margin-left: auto; float:right"><?php echo $comment['date']; ?></div>
    </div>
    <div class="card-body">
        <p class="card-text"><?php echo $comment['body']; ?></p>
        <?php echo form_open('http://localhost:8080/todo/comments/delete/'.$comment['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
</div>
<?php endforeach; ?>
<?php else : ?>
<p>No Comments</p>
<?php endif; ?>
<?php echo $this->session->flashdata('comment_deleted'); ?>