<h2><?= $title; ?></h2>

    

    <?php echo form_open_multipart('posts/create'); ?>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title">
        

        <div class="alert-danger">
            <?php echo form_error('title');?>
        </div>

    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
        
        <div class="alert-danger">
          <strong><?php echo form_error('body');?></strong>
        </div>

    </div>
    <br>
    
    <div class="form-group">
        <label>Category</label>
            <select name="category_id" class="form-control">
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                <?php endforeach; ?>
            </select>

            <div class="alert-danger">
          <strong><?php echo form_error('category_id');?></strong>
            </div>
    </div>

   <div class="form-group">
        <label>Upload Image</label>
        <input class="form-control-file" type="file" name="userfile" size="20">

        
    </div>
   
    <button type="submit" class="btn btn-default">Submit</button>
</form>