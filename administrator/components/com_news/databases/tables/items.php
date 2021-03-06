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
                        'fulltext' => 'html', 'tidy' 
                );  

		parent::__construct($config);
    }
    
	protected function _initialize(KConfig $config)
    {
    	$config->behaviors = array('sluggable', 'creatable', 'modifiable', 'orderable');
	
		parent::_initialize($config);
    }
}