<? /** $Id: form.php 261 2010-12-17 07:07:46Z christianhent $ */ ?>
<? defined('KOOWA') or die('Restricted access'); ?>

<?= @helper('behavior.tooltip');?>

<style src="media://com_news/css/grids.css" />
<script src="media://lib_koowa/js/koowa.js" />

<div class="line form_frame">
	<form action="<?= @route('id='.$item->id) ?>" method="post" class="adminform" name="adminForm">
        <div class="unit size3of4 main">
			<div class="element line title">
				<label for="title" class="hasTip item_title" title="<?= @escape('Item Title') ?>::<?= @escape('Items should have title'); ?>"><?= @text('Item Title'); ?>
				<input id="title" type="text" name="title" value="" /></label>		
				<label for="slug" class="hasTip item_slug" title="<?= @escape('Alias/Slug') ?>::<?= @escape('Leave blank to generae automatically'); ?>"><?= @text('Alias'); ?>
				<input id="slug" type="text" name="slug" value="" />		
			</div>
			<div class="element editor">
			    <h3 class="introtext">Teaser Text</h3>
				<?= @editor( array('name' => 'introtext', 'editor' => 'tinymce', 'width' => '800', 'height' => '100', 'cols' => '800', 'rows' => '10', 'buttons' => null, 'options' => array('theme' => 'simple'))); ?>
			    <h3 class="fulltext">Full Text</h3>
				<?= @editor( array('name' => 'fulltext', 'editor' => 'tinymce', 'width' => '600', 'height' => '50', 'cols' => '600', 'rows' => '10', 'buttons' => null, 'options' => array('theme' => 'simple'))); ?>
			</div>
        </div>
        <div class="unit size1of4 attributes">
            <div class="panel">
                <h3>Publish</h3>
                <table class="paramlist admintable">
                    <tbody>
                        <tr>
                            <td class="paramlist_key">
                                <label>Published</label>
                            </td>
                            <td>
                                <label for="disabled"><input type="radio" id="disabled" name="enabled" value="0" /> No </label>
                                <label for="enabled"><input type="radio" id="enabled" name="enabled" value="1" /> Yes </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label>Category</label>
                            </td>
                            <td>
                                <select name="catid" id="catid" class="inputbox" size="1">
                                    
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</form>
</div>