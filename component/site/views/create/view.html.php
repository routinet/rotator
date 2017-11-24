<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

//if (!JFactory::getUser()->authorize('core.create', 'com_rquote')) {
//	if (!JFactory::user->authorize('core.create', 'com_rquote')) {
 //   JError::raise(401, JText::_('JGLOBAL_AUTH_ACCESS_DENIED'));
//}

// import Joomla view library
jimport('joomla.application.component.view');
//$app		= JFactory::getApplication();
//		$user		= JFactory::getUser();
/**
 * HTML View class for the Rquote Component
 */
class RquoteViewCreate extends JViewLegacy
{
    function display($tpl = null) 
    {
        $this->task    = "create";
        $this->quote   = "";
        $this->author  = "";
       $this->user_id = JFactory::getUser()->get('id');

        parent::display($tpl);
    }

}