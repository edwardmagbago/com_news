<?php
/**
 */
class ComNewsViewItemHtml extends ComNewsViewHtml
{
	public function display()
	{
		KFactory::get('admin::com.news.toolbar.item')
                ->settitle('Item Edit/Add','item');

		return parent::display();
	}
}