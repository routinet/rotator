<?php
/*
 * @version     $Id: rquote.php  2/5/2011 
 * @package     Joomla16.rquote
 * @subpackage  Components
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @author      Kevin Burke
 * @link        http://www.mytidbits.us
 * @license     License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Rquote Component Controller
 */
class RquoteController extends JControllerLegacy
{

 //   function display()
 function display($cachable = false, $urlparams = false)
  {
        $document = JFactory::getDocument();
        $document->addStyleSheet(RQuoteHelper::getComponentBase().'rquote.css');
        parent::display();
    }

    function create() {
        JRequest::checkToken() or jexit( 'Invalid Token' );
        if (JRequest::getInt('user_id') != JFactory::getUser()->get('id')) {
            jexit('Invalid Input');
        }
        $quotesListLink = RQuoteHelper::getListLink();
        $model =& $this->getModel('create');
        if ($model->create()) {
            $message = JText::_('COM_RQUOTE_QUOTE_SUCCESSFULLY_CREATED');
            $this->setRedirect($quotesListLink, $message);
        } else {
            $view =& $this->getView('create', 'html');
            $mainframe =& JFactory::getApplication();
            $mainframe->enqueueMessage('COM_RQUOTE_ERROR_WHILE_CREATING_QUOTE');
            $mainframe->enqueueMessage($model->getErrorMsg());
            $view->setModel($model, true);
            $view->display();
        }
 
    }
}
