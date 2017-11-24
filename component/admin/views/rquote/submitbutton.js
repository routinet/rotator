/**
 * @version		$Id: rquote.php  2/5/2011 
 * @package		Joomla16.rquote
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @author		Kevin Burke
 * @link		http://www.mytidbits.us
 * @license		License GNU General Public License version 2 or later
 */

Joomla.submitbutton = function(task)
{
	if (task == '')
	{
		return false;
	}
	else
	{
		var isValid=true;
		var action = task.split('.');
		if (action[1] != 'cancel' && action[1] != 'close')
		{
			var forms = $$('form.form-validate');
			for (var i=0;i<forms.length;i++)
			{
				if (!document.formvalidator.isValid(forms[i]))
				{
					isValid = false;
					break;
				}
			}
		}
	
		if (isValid)
		{
			Joomla.submitform(task);
			return true;
		}
		else
		{
			alert(Joomla.JText._('COM_RQUOTE_RQUOTE_ERROR_UNACCEPTABLE','Some values are unacceptable'));
			return false;
		}
	}
}

