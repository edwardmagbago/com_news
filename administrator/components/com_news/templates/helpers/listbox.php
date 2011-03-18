<?php
/**
 */
class ComNewsTemplateHelperListbox extends ComDefaultTemplateHelperListbox
{
	public function users($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'		=> '',
			'state' 	=> null,
			'attribs'	=> array(),
		))->append(array(
			'value'		=> $config->name,
			'selected'  => $config->{$config->name}
		))->append(array(
			'text'		=> $config->value,
			'column'    => $config->value,
			'deselect'  => true
		));

		$table = KFactory::tmp('admin::com.users.database.table.users', array('name' => 'users'));
		$model = KFactory::tmp('admin::com.users.model.users', array('table' => $table));
		$list = $model->getList();

		$options = array();
	 	if($config->deselect) {
         	$options[] = $this->option(array('text' => '- '.JText::_( 'Select').' -'));
        }
		foreach($list as $item) {
			$options[] =  $this->option(array('text' => $item->name.' ('.$item->username.')', 'value' => $item->id));
		}

		//Add the options to the config object
		$config->options = $options;

		return $this->optionlist($config);
	}

	public function categories($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'		=> '',
			'state' 	=> null,
			'attribs'	=> array(),
		))->append(array(
			'value'		=> $config->name,
			'selected'  => $config->{$config->name}
		))->append(array(
			'text'		=> $config->value,
			'column'    => $config->value,
			'deselect'  => true
		));

		$table = KFactory::tmp('admin::com.news.database.table.categories', array('name' => 'news_categories'));
		$model = KFactory::tmp('admin::com.news.model.categories', array('table' => $table));
		$list = $model->getList();

		$options = array();
	 	if($config->deselect) {
         	$options[] = $this->option(array('text' => '- '.JText::_( 'Select').' -'));
        }
		foreach($list as $item) {
			$options[] =  $this->option(array('text' => $item->name, 'value' => $item->id));
		}

		//Add the options to the config object
		$config->options = $options;

		return $this->optionlist($config);
	}
    
    public function images($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'extensions' => 'bmp|gif|jpg|png',
            'directory'  => KRequest::root()->path.'/images/stories/',
            'attribs'    => array('id' => $config->name)
        ));
            
        $base = KRequest::url()->setPath($config->directory)->get(KHttpUri::PART_BASE);
               
		jimport( 'joomla.filesystem.folder' );
		$files  = JFolder::files( str_replace( KRequest::root()->path, '', JPATH_ROOT).DS.$config->directory );
		$options[]	= $this->option(array('text' => '- '.JText::_( 'Select image').' -'));
			
		foreach ($files as $file) 
		{
            if (preg_match("#".$config->extensions."#i", $file)) 
            {
				$options[] 	= $this->option(array('text' => $file, 'value' => $file));
				$preload[]	= $base.$file;
			}
		}

		if (!$config->javascript) 
		{
			$config->javascript = "
			new Asset.images(".json_encode($preload).");
			window.addEvent('domready', function(){
				$('".$config->name."').addEvent('change', function(){
					$('".$config->name."-preview').setProperty('src', '" .$base. "' + this.value);
				});
			});
			";
			
			KFactory::get('lib.joomla.document')->addScriptDeclaration($config->javascript);
		}

		$list = $this->optionlist(array(
			'options'   => $options,
			'name'      => $config->name,
			'selected'  => $config->{$config->name},
			'attribs'   => $config->attribs
		));

		return $list;
    }
}