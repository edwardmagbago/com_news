<? /** $Id: form.php 261 2010-12-17 07:07:46Z christianhent $ */ ?>
<? defined('KOOWA') or die('Restricted access'); ?>

<?= @helper('behavior.tooltip');?>

<script src="media://lib_koowa/js/koowa.js" />

<div class="line">
	<form action="<?= @route('id='.$category->id) ?>" method="post" class="adminform" name="adminForm">
		<fieldset>
			<legend><?= @text('Add New Category'); ?></legend>
		</fieldset>
	</form>
</div>