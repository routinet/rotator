<?php

/*
 * @version     $Id: rquote.php  6/26/2011 
 * @package     Joomla16.rquote
 * @subpackage  Components
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @author      Kevin Burke
 * @link        http://www.mytidbits.us
 * @license     License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the Rquote Component
 */
class RquoteViewRquotes extends JViewLegacy
{
    // Overwriting JView display method
    function display($tpl = null) 
    {
        // Assign data to the view
        $this->items = $this->get('Items');
        $pagination    = $this->get('pagination');
 $this->user_id = JFactory::getUser()->get('id');
        // Check for errors.
        if (count($errors = $this->get('Errors'))) 
        {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        // Display the view
        parent::display($tpl);
    }
}

