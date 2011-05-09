<? /** $Id: form.php 261 2010-12-17 07:07:46Z christianhent $ */ ?>
<? defined('KOOWA') or die('Restricted access'); ?>

<?= @helper('behavior.tooltip');?>

<style src="media://com_news/css/grids.css" />
<style src="media://com_news/css/admin_css.css" />

<script src="media://lib_koowa/js/koowa.js" />

<div class="line admin_form">
	<form action="<?= @route('id='.$item->id) ?>" method="post" class="adminform" name="adminForm">
        <div class="unit size3of4 main">
			<div class="element line title">
				<label for="title" class="hasTip item_title" title="<?= @escape('Item Title') ?>::<?= @escape('Items should have title'); ?>"><?= @text('Item Title'); ?>
				<input id="title" type="text" name="title" value="<?= $item->title ?>" /></label>		
				<label for="slug" class="hasTip item_slug" title="<?= @escape('Alias/Slug') ?>::<?= @escape('Leave blank to generate automatically'); ?>"><?= @text('Alias'); ?>
				<input id="slug" type="text" name="slug" value="<?= $item->slug ?>" />		
			</div>
			<div class="element line image">
                <h3>Item Image</h3>
			    <div class="unit size1of5">
    			    <label for="image" class="hastip" title="<?= @escape('Item Image') ?>::<?= @escape('The image you want for this item.'); ?>">Insert Image</label>
    			    <?=@helper('admin::com.news.template.helper.listbox.images', array('name' => 'image', 'directory' => 'media://com_news/images/item/')) ?>
    			</div>
			    <div class="unit size1of5 lastUnit">
    			    <label for="upload_image">Upload an Image <input name="upload_image" type="file" id="upload_image" class="input_box" /></label>
    			</div>
    			<div class="image_preview">
    			    <h3>Image Preview</h3>
    			    <img src="media://com_news/images/item/<?= $item->image;?>" id="image-preview" />
    			</div>					
			</div>
			<div class="element editor">
			    <h3 class="introtext">Teaser Text</h3>
                <textarea name="introtext" cols="130" rows="10" value="<?= $item->introtext ?>"><?= $item->introtext ?></textarea>
			    <h3 class="fulltext">Full Text</h3>
				<?= @editor( array('name' => 'fulltext', 'editor' => 'tinymce', 'width' => '900', 'height' => '250', 'cols' => '130', 'rows' => '10', 'buttons' => null, 'options' => array('theme' => 'simple'))); ?>
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
                                <label for="disabled"><input type="radio" id="disabled" name="enabled" value="0" checked="checked" /> No </label>
                                <label for="enabled"><input type="radio" id="enabled" name="enabled" value="1" /> Yes </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label>Category</label>
                            </td>
                            <td>
                				<?= @helper('admin::com.news.template.helper.listbox.categories', array('name' => 'catid')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label>Access Level</label>
                            </td>
                            <td>
                				<?= @helper('admin::com.default.template.helper.listbox.access', array('name' => 'access')); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel">
                <h3>Metadata</h3>
                <table class="paramlist admintable">
                    <tbody>
                        <tr>
                            <td class="paramlist_key">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea name="metadesc" cols="30" rows="5" class="text_area" value="<?= $item->metadesc ?>"><?= $item->metadesc ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label>Keywords</label>
                            </td>
                            <td>
                                <textarea name="metakey" cols="30" rows="5" class="text_area" value="<?= $item->metakey ?>"><?= $item->metakey ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label>Robots</label>
                            </td>
                            <td>
                                <input name="metadata" type="text" class="text_area" value="<?= $item->metadata ?>" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</form>
</div>