<?php
/**
 */
class ComNewsViewCategoriesHtml extends ComNewsViewHtml
{
	public function display()
	{
		KFactory::get('admin::com.news.toolbar.categories')
                ->settitle('Categories','categories')
				->append('enable')
				->append('disable');
				
        return parent::display();
	}
}