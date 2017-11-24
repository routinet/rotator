<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * Script file of Rquotes component
 * Group: Universe
 */
class com_RquoteInstallerScript
{
        
        function install($parent) 
        {
                echo '<p>The Rquotes component  has been installed</p>';
        }
 
        
        function uninstall($parent) 
        {
                echo '<p>The Rquotes component has been uninstalled</p>';
        }
 
            
 
        
        function preflight($type, $parent) 
        {
               
      			 if (file_exists('../media/com_rquote/css/rquote.css'))
                 {
                 	rename('../media/com_rquote/css/rquote.css','../media/com_rquote/css/rquote.css.old');
                 }
        }
 
      
        function postflight($type, $parent) 
        {
                 
               echo '<p>If this is an upgrade your existing css file in media/com_rquote/css/ has been renamed rquote.css.old.</p>';
        }
	
}
