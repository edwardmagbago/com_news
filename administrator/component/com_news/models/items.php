<?php
/**
 */
class ComNewsModelItems extends ComDefaultModelDefault
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		$this->_state->insert('item_id', 'int')
            ->insert('ordering', 'int')
            ->insert('enabled', 'int')
            ->insert('access', 'int')
            ->insert('categories', 'int')
            ->insert('users', 'int');
	}

	protected function _buildQueryColumns(KDatabaseQuery $query)
	{
		$query->select('creator.name AS created_by_name')
		    ->select('category.name AS category_name');

		parent::_buildQueryColumns($query);
	}

	protected function _buildQueryJoins(KDatabaseQuery $query)
	{
		$query->join('LEFT', 'users AS creator', 'created_by = creator.id')
		    ->join('LEFT', 'news_categories AS category', 'catid = category.news_category_id');

		parent::_buildQueryJoins($query);
	}

	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;

        if(is_numeric($state->enabled)) {
            $query->where('tbl.enabled', '=', $state->enabled);
        }
        
		if(is_numeric($state->access)) {
			$query->where('tbl.access', '=',  $state->access);
        }

		if(is_numeric($state->categories)) {
			$query->where('tbl.catid', '=',  $state->categories);
        }
        
		if(is_numeric($state->users)) {
			$query->where('tbl.created_by', '=',  $state->users);
        }
        
		if($state->search) {
			$search = '%'.$state->search.'%';
			$query->where('tbl.title', 'LIKE',  $search);
		}

		parent::_buildQueryWhere($query);
	}
}