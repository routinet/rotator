<?php

/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RotatorController extends \Joomla\CMS\MVC\Controller\BaseController {

  function display($cachable = FALSE, $urlparams = FALSE) {
    $app = \Joomla\CMS\Factory::getApplication();

    // set default view if not set
    $app->input->set('view', $app->input->get('view', 'Blocks'));

    // Call the parent.
    parent::display($cachable);
  }
}
