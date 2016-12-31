<form action="<?php echo e(route('uploadFile')); ?>" method="post" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<input type="file" name="myFile"/>
	<input type="text" name="fileName"/>
	<input type="submit"/>
</form>