<?php
/*
 * @version		$Id: rquote.php  2/5/2011 
 * @package		Joomla16.rquote
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @author		Kevin Burke
 * @link		http://www.mytidbits.us
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');


$app = JFactory::getApplication('site');
$mycom_params =   $app->getParams('com_rquote');

if ($mycom_params->get('show_page_heading')) {
  echo '<h2>'.$mycom_params->get('page_heading').'</h3>';
} 


$show_quote = JRequest::getInt('show_quote');
$show_author = JRequest::getInt('show_author');
$show_notes = JRequest::getInt('show_notes');
$show_createdate = JRequest::getInt('show_createdate');
$use_css = JRequest::getInt('use_css');
/*
echo 'show quote='.$show_quote;
echo '<br>use_css ='.$use_css;
echo '<br>show author='.$show_author;
echo '<br>show_notes='.$show_notes.'<br>';
 */


?>
<!--  <div id="rquote_content">-->
<?php
foreach ($this->items as $i => $item)
{  
   

 
 if($use_css==0) //Don't use CSS
{
  		if($show_quote)
 		{
 			echo '<div >'.$item->quote.'</div>';
 							//echo '<span>'.$this->items['quote'].'</span>';
		}	

		 	
 	
		if($show_author)
		{
 	 		//$item->author = trim($item->author,'<p></p>');
        echo '<div style="text-align:right">'.$item->author.'</div>';
   	}
   	
 	   if($show_createdate)
  		{
        echo '<div >'.'Added '.$item->createdate.'</div>';
      }
   
	  if($show_notes)
	  {
	    echo '<div >'.$item->notes.'</div>';
     }
   
}
if($use_css==1)	// Use CSS file	
{		
		if($show_quote)
 				{
 				echo '<div class="com_rquote_quote">'.$item->quote.'</div>';
 				}
 				
 				if($show_author)
 				{
 	 	 			$item->author = trim($item->author,'<p></p>');
      		  echo '<div class="com_rquote_author">'.$item->author.'</div>';
   			}
    if($show_createdate)
    		{
      	  echo '<div class="com_rquote_createdate">'.'Added '.$item->createdate.'</div>';
       	}
   

	 if($show_notes)
		 {
	       echo '<div class="com_rquote_notes">'.$item->notes.'</div>';
  		 }
}
}
  
 