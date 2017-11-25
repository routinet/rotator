<?php

/**
 * Rotator component by Steve Binkowski.
 * View for a list of Blocks.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class RotatorViewBlocks extends \Joomla\CMS\MVC\View\HtmlView {

  protected $items;

  protected $pagination;

  protected $published;

  public function display($tpl = NULL) {

    // Initialize variables.
    $this->items      = $this->get('Items');
    $this->pagination = $this->get('Pagination');
    $this->state      = $this->get('State');
    $this->published  = $this->get('Published');

    RotatorHelper::addSubmenu('COM_ROTATOR_SUBMENU_BLOCKS');

    // Check for errors.
    // TODO: this is deprecated.  Do we need to trap here?
    if ($errors = array_filter($this->get('Errors'))) {
      JError::raiseError(500, implode('<br />', $errors));
      return FALSE;
    }

    // Set the toolbar
    $this->addToolBar();
    $this->sidebar = JHtmlSidebar::render();

    // Display the template
    parent::display($tpl);


  }


  protected function addToolBar() {
    $state = $this->get('State');

    // Set the title.
    JToolBarHelper::title(JText::_('COM_ROTATOR_BLOCKS_MANAGER_LABEL'), 'block');

    // Add the toolbar buttons.
    JToolBarHelper::addNew('block.add', 'JTOOLBAR_NEW');
    JToolBarHelper::editList('block.edit', 'JTOOLBAR_EDIT');
    JToolBarHelper::divider();
    JToolBarHelper::custom('blocks.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', TRUE);
    JToolBarHelper::custom('blocks.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', TRUE);
    JToolBarHelper::divider();
    JToolBarHelper::archiveList('blocks.archive', 'JTOOLBAR_ARCHIVE');
    JToolBarHelper::deleteList('', 'blocks.delete', 'JTOOLBAR_DELETE');

    // TODO: these buttons
    /*    JToolBarHelper::divider();
        JToolBarHelper::preferences('com_rotator');
        JToolBarHelper::help('RQUOTE_HELP', TRUE);*/


    JHtmlSidebar::setAction('index.php?option=com_rotator&view=blocks');


    JHtmlSidebar::addFilter(
      JText::_('JOPTION_SELECT_PUBLISHED'),
      'filter_pub',
      JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.pub'), TRUE)
    );

    JHtmlSidebar::addFilter(
      JText::_('JOPTION_SELECT_CATEGORY'),
      'filter_category_id',
      JHtml::_('select.options', JHtml::_('category.options', 'com_rotator'), 'value', 'text', $this->state->get('filter.category_id'))
    );


  }

}
