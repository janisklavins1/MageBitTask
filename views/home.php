<h1>Hello Home</h1>

<!-- <h4>Hello <?php echo $name ?></h4> -->

<form action="" method="post">
    <label>Email</label><br>
    <input type="text" name="email" class="Form<?php echo $model->hasError('email') ? 'invalid' : '' ?>"><br>
    <div><?php echo $model->getFirstError('email') ?></div>
    <label>Agree with Terms</label>

    <input type="checkbox" name="checkBox">
    <div><?php echo $model->getFirstError('checkBox') ?></div><br>
    <input type="submit" value="Submit">
</form>