<?php
// No direct access to this file
defined('_JEXEC') or die;


// Get values from menu Options
$show_quote = JRequest::getInt('show_quote');
$show_author = JRequest::getInt('show_author');
$show_notes = JRequest::getInt('show_notes');
$show_createdate = JRequest::getInt('show_createdate');
$use_css=JRequest::getInt('use_css');

$app = JFactory::getApplication('site');
$mycom_params =   $app->getParams('com_rquote');

if ($mycom_params->get('show_page_heading')) {
  echo '<h2>'.$mycom_params->get('page_heading').'</h3>';
} 


/*
echo 'show quote='.$show_quote;
echo '<br>use_css ='.$use_css;
echo '<br>show author='.$show_author;
echo '<br>show_notes='.$show_notes.'<br>';
 */


 	if($use_css==0) //Don't use CSS
  	{
  				if($show_quote)
 						{
 							echo '<span>'.$this->item['quote'].'</span>';
						}	
				if ($show_author)
  						{
 							 echo '<div style="text-align:right"> '.$this->item['author'].'</div>';
 						}
 		
 				if ($show_notes)
  					{
  						echo '<span >'.$this->item['notes'].'</span>';
  					} 
 		
 				if ($show_createdate)
  					{
 						echo '<span >Added '.$this->item['createdate'].'</span>';
 					}
 	}	
 		
 		
	if($use_css==1)	// Use CSS file	
	{		
			if($show_quote)
 				{
					echo '<div class="com_rquote_quote">'.$this->item['quote'].'</div>';
					
				}
			if ($show_author)
  						{
 							 echo '<span class="com_rquote_author">'.$this->item['author'].'</span>';
 						}
 		
 				if ($show_notes)
  					{
  						echo '<span class="com_rquote_notes">'.$this->item['notes'].'</span>';
  					} 
 		
 				if ($show_createdate)
  					{
 						echo '<span class="com_rquote_createdate">Added '.$this->item['createdate'].'</span>';
 					}
 
 	 }
  ?>
 
 
<pre>
<?php 
// uncomment the next line to see the array
// print_r($this->item); ?>
</pre>
 