<?php
/**
 */

class ComNewsDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
                'controller_default'	=> 'items'
        ));

        parent::_initialize($config);
    }
}