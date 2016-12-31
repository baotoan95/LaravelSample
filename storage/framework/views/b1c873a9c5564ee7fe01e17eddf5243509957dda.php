<form action="<?php echo e(route('GetName')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	<input type="text" name="hoTen"/>
	<input type="submit"/>
</form>