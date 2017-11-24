<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * Script file of HelloWorld plugin
 * Group: Universe
 */
class com_RquoteInstallerScript
{
        /**
         * Method to install the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function install($parent) 
        {
                echo '<p>The component has been installed</p>';
        }
 
        /**
         * Method to uninstall the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function uninstall($parent) 
        {
                echo '<p>The component has been uninstalled</p>';
        }
 
        /**()
         * Method to update the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function update($parent) 
        {		
       
        			if (file_exists('../administrator/components/com_rquote/tables'))
        			
        			{	
        		rename('../administrator/components/com_rquote/tables/rquote.php','temp.php');
				Delete('../administrator/components/com_rquote/tables');
				mkdir('../administrator/components/com_rquote/tables');
        		rename('temp.php','../administrator/components/com_rquote/tables/rquote.php');
        		 echo '<p>The component has been updated to version ' . $parent->get('manifest')->version . '</p>';
                }
                 
                           
        		
        		 
        }
 
        /**
         * Method to run before an install/update/uninstall method
         * $parent is the class calling this method
         * $type is the type of change (install, update or discover_install)
         *
         * @return void
         */
        function preflight($type, $parent) 
        {
               //echo '<p>Anything here happens before the installation/update/uninstallation of the module</p>';
      			 if (file_exists('../components/com_rquote/rquote.css'))
                 {
                 	rename('../components/com_rquote/rquote.css','rquote.css.old');
                 }
        }
 
        /**
         * Method to run after an install/update/uninstall method
         * $parent is the class calling this method
         * $type is the type of change (install, update or discover_install)
         *
         * @return void
         */
        function postflight($type, $parent) 
        {
               // echo '<p>Anything here happens after the installation/update/uninstallation of the module</p>';
               if (file_exists('rquote.css.old'))
              {
               rename('rquote.css.old','../media/com_rquote/css/rquote.css.old');
              }
               echo '<p>If this is an upgrade your existing css file has been moved to the front end directory media/com_rquote/css and renamed rquote.css.old.</p>';
        }
	
}
function Delete($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            Delete(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

else if (is_file($path) === true)
{
    return unlink($path);
}

return false;
}