<?php
/**
 */
class ComNewsViewCategoryHtml extends ComNewsViewHtml
{
	public function display()
	{
		KFactory::get('admin::com.news.toolbar.category')
                ->settitle('Category Edit/Add','category');

		return parent::display();
	}
}