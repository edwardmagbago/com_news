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
}