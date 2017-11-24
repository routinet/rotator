<?php
/**
 * @version		$Id: rquote.php  1/5/2014 
 * @package		Joomla16.rquote
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @author		Kevin Burke
 * @link		http://www.mytidbits.us
 * @license		License GNU General Public License version 2 or later
 */
defined('_JEXEC') or die;

class RquoteControllerPreview extends JControllerAdmin
{
	public function getModel($name = 'Preview', $prefix = 'RquoteModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}