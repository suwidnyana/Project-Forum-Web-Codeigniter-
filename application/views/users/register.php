<style>
    /* body {
        height: 700px;
    } */
</style>

<!-- <?php echo validation_errors(); ?> -->

<?php echo form_open('users/register'); ?>

<body>

    <div class="row">

        <div class="col-md-4 offset-md-4">

            <h2 class="text-center"><?= $title ?></h2>

        </div>
    </div>

    <div class="row col-md-6 offset-md-3">
        <div class="col">

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
                <?= form_error('name', ' <small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
                <?= form_error('username', ' <small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="form-group">
                <label>Zipcode</label>
                <input type="text" class="form-control" name="zipcode" placeholder="Zip Code">
                <?= form_error('zipcode', ' <small class="text-danger pl-3">', '</small>'); ?>

            </div>


        </div>



        <div class="col">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
                <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>

            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>

            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
            </div>
        </div>



    </div>
    <button type="submit" class="btn btn-primary btn-block col-md-4 offset-4">Submit</button>

</body>
<?php echo form_close(); ?> 