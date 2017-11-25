<?php
/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

class RotatorTableBlock extends RotatorTableBaseTable  {

  protected $_table_name = 'blocks';
  protected $boolint_fields = array('published');

}
