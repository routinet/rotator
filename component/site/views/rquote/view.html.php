<?php
// No direct access to this file
defined('_JEXEC') or die;
jimport('joomla.application.component.view');
class RquoteViewRquote extends JViewLegacy
{
  protected $item;  
  function display($tpl = null)
  {
    // Assign data to the view
	
    $this->item = $this->get('item');
        
	// Display the view
	parent::display($tpl);
  }
}
