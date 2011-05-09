<?php

class ComNewsControllerItems extends ComDefaultControllerDefault 
{
    protected function _initialize(KConfig $config) 
    {	
        $config->append(array(
            'request' => array('layout' => 'default'),
        ));

        parent::_initialize($config);
    }
}