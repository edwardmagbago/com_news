<?php
/**
 */

class ComNewsDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
                'controller'	=> 'items'
        ));

        parent::_initialize($config);
    }
}