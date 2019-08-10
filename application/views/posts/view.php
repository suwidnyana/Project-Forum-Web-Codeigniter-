
<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted On : <?php echo $post['created_at']; ?></small><br>
     <img class="img-thumbnail" src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image'];?>">
	 
<div class="post-body">
    <?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
<hr>
	<a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
	<a class="btn btn-danger" href="<?php echo base_url('posts/delete/'.$post['id']);?><?php echo $post['slug']; ?>">Delete</a>

	
	<!-- <?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger"> -->
</form>
<?php endif;?>



<hr>
<h3>Komentar</h3>

<?php if($comments) : ?>
	<?php foreach ($comments as $comment) : ?>
	<div class="card card-body bg-light mt-4">
	
	<p class="mb-0">
	<h5><?php echo $comment['body'];?> [by <strong><?php echo $comment['name'];?></strong>]</h5>
	</p>
	
	</div>
	<?php endforeach; ?>

<?php else : ?>
	<p>Tidak ada komentar</p>
<?php endif; ?>

<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>E-mail</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button clas="btn btn-danger" type="submit">Submit</button>
</form>