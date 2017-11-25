<?php
/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RotatorControllerBlocks extends \Joomla\CMS\MVC\Controller\AdminController {

  /**
   * Proxy for getModel.
   *
   * @since  1.6
   */
  public function getModel($name = 'Block', $prefix = 'RotatorModel') {
    $model = parent::getModel($name, $prefix, ['ignore_request' => TRUE]);
    return $model;
  }
}
