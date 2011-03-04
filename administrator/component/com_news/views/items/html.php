<?php
/**
 */
class ComNewsViewItemsHtml extends ComNewsViewHtml
{
	public function display()
	{
		KFactory::get('admin::com.news.toolbar.items')
                ->settitle('News Items','items')
				->append('enable')
				->append('disable');
				
        return parent::display();
	}
}