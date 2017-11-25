<?php

/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RotatorViewBlock extends \Joomla\CMS\MVC\View\HtmlView {

  protected $state;

  protected $item;

  protected $form;

  protected $isNew;

  public function display($tpl = NULL) {
    // get the Data
    $this->form  = $this->get('Form');
    $this->item  = $this->get('Item');
    $this->isNew = (boolean) $this->item->id;

    // Check for errors.
    // TODO: this is deprecated.  Do we need to trap here?
    if ($errors = array_filter($this->get('Errors'))) {
      JError::raiseError(500, implode('<br />', $errors));
      return FALSE;
    }

    // Set the toolbar
    $this->addToolBar();

    // Set the document
    $this->setDocument();

    // Display the template
    return parent::display($tpl);

  }

  /**
   * Setting the toolbar
   */
  protected function addToolBar() {
    \Joomla\CMS\Factory::getApplication()->input->set('hidemainmenu', TRUE);

    $title = \Joomla\CMS\Language\Text::_($this->isNew ? 'COM_ROTATOR_CREATE_BLOCK' : 'COM_ROTATOR_EDIT_BLOCK');
    JToolBarHelper::title($title);

    // Built the actions for new and existing records.
    // For all records, allow for Save and Cancel.
    JToolBarHelper::apply('block.apply', 'JTOOLBAR_APPLY');
    JToolBarHelper::save('block.save', 'JTOOLBAR_SAVE');

    // For existing records, also add "Save As New" and "Save As Copy"
    if (!$this->isNew) {
      JToolBarHelper::custom('block.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', FALSE);
      JToolBarHelper::custom('block.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', FALSE);
    }

    // Don't forget Cancel.
    JToolBarHelper::cancel('block.cancel', 'JTOOLBAR_CANCEL');
  }

  protected function setDocument() {
    $doc = \Joomla\CMS\Factory::getDocument();
    $title = \Joomla\CMS\Language\Text::_($this->isNew ? 'COM_ROTATOR_CREATE_BLOCK' : 'COM_ROTATOR_EDIT_BLOCK');
    $doc->setTitle($title);
  }
}
