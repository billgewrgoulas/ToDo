<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('http://localhost:8080/todo/comments/create'); ?>
<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
</div>
<div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
</div>
<button type="submit" class="btn btn-default">Submit</button>
<?php echo form_close(); ?>
© 2021 GitHub, Inc.