<?php
/**
 */
class ComNewsViewHtml extends ComDefaultViewHtml
{
	public function __construct(KConfig $config)
	{
		$config->views = array(
			'items'	 		=> JText::_('Items'),
			'categories'	=> JText::_('Categories'),
        );
		
		parent::__construct($config);
	}
}