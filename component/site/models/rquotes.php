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

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * Rquotes Model
 */
class RquoteModelRquotes extends JModelItem
{
    /**
     * @var object item
     */
    protected $items;

    /**
     * Get the quote
     * @return object The quote to be displayed to the user
     */
    public function getItems() 
    {
        $app = JFactory::getApplication('site');
        $mycom_params =   $app->getParams('com_rquote');
		  $catid        = JRequest::getInt('catid');
 		 $number_items = JRequest::getInt('number_items');
 		  $sort_column  = JRequest::getInt('sort_column');
 		  $sort_order = JRequest::getInt('sort_order');
 		  
 /*	echo 'catiid= '.$catid.'<br>';	  
 	echo 'number_items= '.$number_items.'<br>';	  
 	echo 'sort_column= '.$sort_column.'<br>';
 	echo 'sort_order= '.$sort_order.'<br>';
 */		  
 		 if($sort_order){
 		$sort_by_order ='ASC';
 		}
 		else {
 			$sort_by_order ='DESC';
 			
 		}
 		  
 		    if($sort_column ==0){
   	$sort_by_column='id';
   	  	 }
    if($sort_column ==1){
   	$sort_by_column='daily_number';
 
   	}	
     if($sort_column ==2){
   	$sort_by_column='quote';
 
   	}
    if($sort_column ==3){
   	$sort_by_column='author';
 
   	}
       if($sort_column ==4){
   	$sort_by_column='notes';

   	}	
     if($sort_column ==5){
   	$sort_by_column='createdate';
 
   	}
    if($sort_column ==6){
   	$sort_by_column='user_id';
 
   	}
 		  
       
  
        $catid        = JRequest::getInt('catid');
//       $published    = JRequest::getInt('published','0');
 		
        if (!isset($this->items)) {
            $db = JFactory::getDbo();
        }
        $db->setQuery(
         'SELECT *'.
         ' FROM #__rquote'.
//        ' WHERE published = '.(int)$published .
 			' WHERE published = '.(int)1 .
         '  AND catid = '.(int) $catid.
         '  ORDER BY '.$sort_by_column .' '.$sort_by_order.
         ' LIMIT '.$number_items
        ) ;
       	
        $this->items = $this->_db->loadObjectList(); 
        return $this->items;
    }    
}
