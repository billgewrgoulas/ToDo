<?php if($this->session->userdata('role') === 'customer') : ?>
<h2 style="width: 50%; margin: auto;">My Comments</h2>
<?php else: ?>
<h2 style="width: 50%; margin: auto;">All Comments</h2>
<?php endif; ?>
<?php if($comments) : ?>
<?php foreach($comments as $comment) : ?>
<div class="card" style="width: 50%; margin: auto; margin-bottom: 20px !important;">
    <div class="card-header">
        <div style="display: inline-block;"><?php echo $comment['title']; ?></div>
        <div style="margin-left: auto; float:right">Submitted on <?php echo $comment['date']; ?></div>
    </div>
    <div class="card-body">
        <div class="wrapper">
            <div class="inner-wrapper">
                <div class="info">
                    Submitter:
                </div>
                <div class="card">
                    <div class="card-body">
                        Name: <?php echo $comment['name']; ?><br>
                        Last name: <?php echo $comment['lastName']; ?><br>
                        email: <?php echo $comment['email']; ?>
                    </div>
                </div>
            </div>
            <div class="inner-wrapper">
                <div class="info">
                    Comment:
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><?php echo $comment['body']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_open('http://localhost:8080/todo/comments/delete/'.$comment['id']); ?>
        <input style="margin-top: 2rem" type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
</div>
<?php endforeach; ?>
<?php else : ?>
<p>No Comments</p>
<?php endif; ?>
<?php echo $this->session->flashdata('comment_deleted'); ?>




<style>
.wrapper {
    display: flex;
    flex-direction: row;
    gap: 3rem;
}

.inner-wrapper {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
</style>