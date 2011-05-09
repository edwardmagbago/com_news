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
					<?= @text('Title') ?>
				</th>
				<th width="100"><?= @text('Enabled')?></th>
    			<th width="100"><?= @helper('grid.sort', array('column' => 'ordering')); ?></th>
				<th width="100"><?= @text('Access Level')?></th>
				<th width="100"><?= @text('Category')?></th>
				<th width="100"><?= @text('Author')?></th>
			</tr>
    		<tr>
				<td></td>
				<td></td>
				<td><?= @text('Filter:'); ?> <?= @template('admin::com.default.view.list.search_form'); ?></td>
    			<td align="center">
    				<?= @helper('listbox.enabled', array('name' => 'enabled', 'attribs' => array('onchange' => 'this.form.submit()'))); ?>
    			</td>
    			<td></td>
    			<td align="center">
    				<?= @helper('admin::com.default.template.helper.listbox.access', array('name' => 'access', 'attribs' => array('onchange' => 'this.form.submit();'))); ?>
    			</td>
    			<td align="center">
    				<?= @helper('admin::com.news.template.helper.listbox.categories', array('name' => 'categories', 'attribs' => array('onchange' => 'this.form.submit();'))); ?>
    			</td>
    			<td align="center">
    				<?= @helper('admin::com.news.template.helper.listbox.users', array('name' => 'users', 'attribs' => array('onchange' => 'this.form.submit();'))); ?>
    			</td>
    		</tr>
		</thead>

        <tbody>
        	<? $i = 0; $m = 0; ?>
        	<? foreach ($items as $newsitem) : ?>
        		<tr class="<?= 'row'.$m; ?>">
        			<td align="center"><?= $i + 1; ?></td>
        			<td align="center"><?= @helper('grid.checkbox', array('row' => $newsitem))?></td>
        			<td width="900">
        				<span class="editlinktip hasTip" title="<?= @text('Edit this news.') ?> :: <?= @escape($newsitem->title) ?>">
        					<a href="<?= @route('view=item&id='.$newsitem->id); ?>">
        						<?= $newsitem->title; ?>
        					</a>
            			</span>
        			</td>
        			<td align="center"><?= @helper('grid.enable', array('row' => $newsitem)) ?></td>
        			<td align="center"><?= @helper('grid.order', array('row' => $newsitem)); ?></td>
        			<td align="center"><?= @helper('grid.access', array('row' => $newsitem)) ?></td>
                    <td align="center"><?= $newsitem->category_name ?></td>
        			<td align="center"><?= $newsitem->created_by_name ?></td>
        		</tr>
        	<? $i = $i + 1; $m = (1 - $m); ?>
        	<? endforeach; ?>
	
        	<? if (!count($newsitem)) : ?>
        		<tr>
        			<td colspan="20" align="center">
        				<p class="null_text"><?= @text('No news Found'); ?></p>
        			</td>
        		</tr>
        	<? endif; ?>	
        </tbody>

		<tfoot>
			<tr>
	        	<td colspan="20"><?= @helper('paginator.pagination', array('total' => $total)) ?></td>
			</tr>
		</tfoot>
    </table>
</form>