<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

class RquoteModelCreate extends JModelItem
 {   private $table;
    private $errorMsg;

    public function getTable($type = 'Rquote', $prefix = 'RquoteTable', $config = array()) {
        $this->table =& JTable::getInstance($type, $prefix, $config);
        return $this->table;
    }

 //   public function getItem($id) {
        
//    }

    public function create() 
    {
        $errorMsg = 'No Error!';
        $quoteTable = $this->getTable();
        $now = new DateTime('NOW');
 //need values  
  
       $_POST['catid'] = JRequest::getInt('catid');
   
        $_POST['published'] = JRequest::getInt('published');
   
  //end      
        $_POST['createdate'] = $now->format("Y-m-d H:i:s");
        $_POST['user_id']   = JFactory::getUser()->get('id');
       
        if (!$quoteTable->bind( JRequest::get('post') ) ) {
            $this->errorMsg = $row->getError();
            return false;
        }
        if (!$quoteTable->store()) {
            $this->errorMsg = $row->getError();
            return false;
        }
        return true;
    }    

    public function getErrorMsg() {
        return $this->errorMsg;
    }

}

 
