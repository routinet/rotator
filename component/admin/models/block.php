<?php

/**
 * Rotator component by Steve Binkowski.
 * Model for a single Block.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RotatorModelBlock extends \Joomla\CMS\MVC\Model\AdminModel {

  // TODO: is this necessary?

  /**
   * Method override to check if you can edit an existing record.
   *
   * @param  array  $data An array of input data.
   * @param  string $key  The name of the key for the primary key.
   *
   * @return  boolean
   * @since  1.6
   */
  /*  protected
    function allowEdit($data = [], $key = 'id') {
      // Check specific edit permission then general edit permission.
      return JFactory::getUser()
          ->authorise('core.edit', 'com_rquote.message.' . ((int) isset($data[$key]) ? $data[$key] : 0)) or parent::allowEdit($data, $key);
    }*/

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
