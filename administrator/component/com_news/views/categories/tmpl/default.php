<? defined('KOOWA') or die('Restricted access'); ?>

<?= @helper('behavior.tooltip'); ?>

<style src="media://com_default/css/admin.css" />

<form action="<?= @route()?>" method="get">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="5">
					<?= @text('#') ?>
				</th>
				<th width="20"><input type="checkbox" name="toggle" value="" /></th>
				<th>
					<?= @text('Name') ?>
				</th>
				<th width="100"><?= @text('Enabled')?></th>
			</tr>
    		<tr>
				<td></td>
				<td></td>
				<td><?= @text('Filter:'); ?> <?= @template('admin::com.default.view.list.search_form'); ?></td>
    			<td align="center">
    				<?= @helper('listbox.enabled', array('name' => 'enabled', 'attribs' => array('onchange' => 'this.form.submit()'))); ?>
    			</td>
    		</tr>
		</thead>
        <tbody>
        	<? $i = 0; $m = 0; ?>
        	<? foreach ($categories as $category) : ?>
        		<tr class="<?= 'row'.$m; ?>">
        			<td align="center" width="40"><?= $i + 1; ?></td>
        			<td align="center" width="40"><?= @helper('grid.checkbox', array('row' => $category))?></td>
        			<td width="900">
        				<span class="editlinktip hasTip" title="<?= @text('Edit this news.') ?> :: <?= @escape($category->name) ?>">
        					<a href="<?= @route('view=category&id='.$category->id); ?>">
        						<?= $category->name; ?>
        					</a>
            			</span>
        			</td>
        			<td align="center" width="40"><?= @helper('grid.enable', array('row' => $category)) ?></td>
        		</tr>
        	<? $i = $i + 1; $m = (1 - $m); ?>
        	<? endforeach; ?>
	
        	<? if (!count($category)) : ?>
        		<tr>
        			<td colspan="20" align="center">
        				<p class="null_text"><?= @text('No news Found'); ?></p>
        			</td>
        		</tr>
        	<? endif; ?>	
        </tbody>
    </table>
</form>