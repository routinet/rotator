<?php
defined('_JEXEC') or die('Restricted access');

class RQuoteHelper {

    private static $baseLink = 'index.php?option=com_rquote';

    public static function getCreateLink() {
        $menuId = JRequest::getInt('Itemid');
        $link = self::$baseLink.'&Itemid='.$menuId.'&view=create';
        $link = JRoute::_($link, true);
        return $link;
    }

    public static function getListLink() {
        $menuId = JRequest::getInt('Itemid');
        $link = self::$baseLink.'&Itemid='.$menuId.'&view=rquotes';
        $link = JRoute::_($link, true);
        return $link;

    }

    public static function getComponentBase() {
        return JURI::base(true).'/components/com_rquote/';
    }

    public static function getIcon($filename, $linktext) {
        return 
            '<img src="'.self::getComponentBase().'images/'.$filename.'" '.
            'alt="'.  JText::_($linktext).'" '.
            'title="'.JText::_($linktext).'" />'.
            '<br />'. JText::_($linktext);
    }

    public static function getAddPostLink() {
        return JRoute::_('index.php', true);
    }
}


