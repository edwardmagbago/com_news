<?php
/**
*/
class ComNewsDatabaseTableCategoriess extends KDatabaseTableAbstract
{
	public function __construct(KConfig $config)
	{
		$config->name = 'news_categories';
		$config->base = 'news_categories';

        $options['filters'] = array( 
                        'slug'          => 'alias', 
                        'description' => 'html' 
                );  

		parent::__construct($config);
    }
    
	protected function _initialize(KConfig $config)
    {
    	$config->behaviors = array('sluggable', 'creatable', 'modifiable', 'orderable');
	
		parent::_initialize($config);
    }
}