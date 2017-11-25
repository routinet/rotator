<?php

/**
 * Rotator component by Steve Binkowski.
 * Table for a single Block.
 */


// No direct access
defined('_JEXEC') or die('Restricted access');


class RotatorTableBlock extends RotatorTableBaseTable  {

  protected $_table_name = 'blocks';
  protected $boolint_fields = array('published');

  // TODO: figure this out momentarily. remember parent has a different bind
/*  public function bind($array, $ignore = '') {
    if (isset($array['params']) && is_array($array['params'])) {
      // Convert the params field to a string.
      $parameter = new JRegistry;
      $parameter->loadArray($array['params']);
      $array['params'] = (string) $parameter;
    }
    return parent::bind($array, $ignore);
  }*/

}
