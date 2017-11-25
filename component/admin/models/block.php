<?php
/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RotatorModelBlock extends \Joomla\CMS\MVC\Model\AdminModel {

  /**
   * Returns a reference to the a Table object, always creating it.
   */
  public function getTable($type = 'Block', $prefix = 'RotatorTable', $config = []) {
    return \Joomla\CMS\Table\Table::getInstance($type, $prefix, $config);
  }

  /**
   * Method to get the record form.
   */
  public function getForm($data = [], $loadData = TRUE) {
    // Get the form.
    $form = $this->loadForm('com_rotator.block', 'block', [
      'control'   => 'jform',
      'load_data' => $loadData,
    ]);
    if (empty($form)) {
      return FALSE;
    }
    return $form;
  }

  /**
   * Method to get the data that should be injected in the form.
   */
  protected function loadFormData() {
    // Check the session for previously entered form data.
    $data = JFactory::getApplication()
      ->getUserState('com_rotator.edit.block.data', []);
    if (empty($data)) {
      $data = $this->getItem();
    }
    return $data;
  }
}
