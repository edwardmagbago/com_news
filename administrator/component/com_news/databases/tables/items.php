<?php
/**
*/
class ComNewsDatabaseTableItems extends KDatabaseTableAbstract
{
	public function __construct(KConfig $config)
	{
		$config->name = 'news_items';
		$config->base = 'news_items';

        $options['filters'] = array( 
                        'slug'          => 'alias', 
                        'description' => 'html' 
                );  

		parent::__construct($config);
    }
    
	protected function _initialize(KConfig $config)
    {
    	$config->behaviors = array('sluggable', 'creatable', 'modifiable', 'orderable', 'hittable');
	
		parent::_initialize($config);
    }
}