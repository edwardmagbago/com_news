<?php
/**
 */
class ComNewsViewHtml extends ComDefaultViewHtml
{
	public function __construct(KConfig $config)
	{
		$config->views = array(
			'items'	 		=> JText::_('Items'),
			'item' 			=> JText::_('Add Item'),
			'categories' 		=> JText::_('Categories'),
			'category' 		=> JText::_('Add Category'),
        );
		
		parent::__construct($config);
	}
}