<?php

/**
 * Rquotes default layout file
 * This file includes quotation marks before and after quote
 * @package    Joomla.Rquotes
 * @subpackage Modules
 * @link www.mytidbits.us
 * @license		GNU/GPL-2
 */

 //no direct access
 defined('_JEXEC') or die('Restricted access');
$css = JURI::base().'modules/mod_rquotes/assets/rquote.css';
 $document =& JFactory::getDocument();
 $document->addStyleSheet($css); 

$quotemarks= $params->get('quotemarks'); 

if($quotemarks==0)
 	{
		echo $rquote->quote;
		echo '<div align="right">'.$rquote->author.'</div>';
	}
 
if($quotemarks==1)
	{
		$rquote->quote = strip_tags($rquote->quote,'<img><br><a>');
		echo '<div>'.' " '.$rquote->quote.' "'.'</div>';
		echo '<div align="right">'.$rquote->author.'</div>';
	}

if($quotemarks==2)
	{
		$rquote->quote = strip_tags($rquote->quote,'<img><br><a>');
		echo '<div>'.'<img src="modules/mod_rquotes/assets/images/quote1_25_start.png" width="15" height="15"> '.$rquote->quote.' <img src="modules/mod_rquotes/assets/images/quote1_25_end.png" width="15" height="15">'.'</div>';
		echo '<div align="right">'.$rquote->author.'</div>';
	}

if($quotemarks==3)
	{
		$rquote->quote = strip_tags($rquote->quote,'<img><br><a>');
		echo '<div class="mod_rquote_css"><p><span>'.$rquote->quote .'</span></p></div>';
	//	echo '<div align="right">'.$rquote->author;
	echo '<div class="mod_rquote_author">'.$rquote->author .'</div>';
	}
	