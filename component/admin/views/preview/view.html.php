<?php
defined('_JEXEC') or die;

class RquoteViewPreview extends JViewLegacy
{
	protected $items;

	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');

		RquoteHelper::addSubmenu('preview');

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();

		$j3css = <<<ENDCSS
div#toolbar div#toolbar-back button.btn span.icon-back::before {
	content: "";
}
.rquote_quote{
	color: #555555;
	font-family: 'Titillium Maps',Arial;
	font-size: 14pt;
}
.myRquote{
	
	padding-bottom: 20px;
	float: left;
	padding-right: 20px;
}
.rquote_element{
	
	width: 450px;
	padding-top: 2px;
}
.rquote_author {
  display:block;
  text-align: right;
  
}
ENDCSS;
		JFactory::getDocument()->addStyleDeclaration($j3css);

		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		$state	= $this->get('State');
		$canDo	= RquoteHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_RQUOTE_MANAGER_RQUOTES'), '');

		JToolbarHelper::back('COM_RQUOTE_BUTTON_BACK', 'index.php?option=com_Rquote');

	}

}