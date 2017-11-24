
 
CREATE TABLE IF NOT EXISTS `#__rquote`
(
  `id` int(11) NOT NULL auto_increment,
  `daily_number` int(11) NOT NULL,
  `quote` text NOT NULL,
  `author` text NOT NULL,
  `catid` int(11) NOT NULL default '0' ,
  `notes` text NOT NULL,
  `published` tinyint(1) unsigned NOT NULL default '0',
  `params` TEXT NOT NULL ,
  `user_id` int(11) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
 
   PRIMARY KEY  (`id`)
);

INSERT INTO `#__rquote` (`id`, `daily_number`, `quote`, `author`, `catid`, `notes`, `published`, `params`, `user_id`, `createdate`) VALUES
('', 0, '<p>A few sample records to get started.Thank you for downloading and using Rquotes Component Package<br />The component and Module have been installed.</p>', '', 0, '', 1, '', 0, '0000-00-00 00:00:00'),
('', 0, '<p><em>Component Quick Start Guide: Updated for version 3.2.0 Component:</em><br />Go to <strong>components</strong> and choose <strong>Rquotes</strong><br />On the left side menu Choose <strong>Categories</strong> <br /> Choose the green <strong>+New</strong> in the top menu<br /> Enter your category name in the title box and Description (description is optional)<br /> Click <strong>Save and Close</strong><br /> This brings you back to the Category Manager <br />Your category is now listed and saved in the database<br /> On the left side menu Choose  <strong>RQuotes</strong> &gt;<br />Choose the green <strong>+New</strong> in the top menu<br /> Enter your quote in the Quote Field<br />On the right choose the <strong>category</strong> you just created<br />Click on&gt;<strong>Save and Close<br /></strong>All the other fields are optional<br />This brings you back to the RQuote manager.<br />Your information is now listed here and saved in the DB<br />To display your quote or information on your web page see creating a menu guide or<br />use the module for greater flexibility.</p>', '', 0, '', 1, '', 0, '0000-00-00 00:00:00'),
('', 0, '<p>Creating a Menu Item Guide<br />Please make sure you have created a category and quotes before creating a menu item to avoid errors<br />To use the information in front end create a menu item as follows:<br />Go to Menus&gt;Main Menu&gt;Add New Menu Item<br />Enter a Title for your menu<br />Choose Select&gt;Rquote!&gt;List quotes by categories. <br />Choose A Category to display<br />Choose Save &amp; Close<br />That is it . You are Done</p>', '', 0, '', 1, '', 0, '0000-00-00 00:00:00'),
('', 0, '<p>Module Quick Start Guide (updated for version Mod_rquote-3.2.0)<br />Go to <strong>Extensions&gt;Modules</strong><br />Choose <strong>Rquotes</strong><br />Choose a<strong> Category</strong> :(required)<br />Choose a <strong>Position</strong> :(required)<br /><strong>Publish</strong> the module<br />Go to <strong>Menu Assignment</strong><br />Choose the pages to show the quotes<br />Choose <strong>Save &amp; Close</strong><br />That is it. You are Done</p>', '', 0, '', 1, '', 0, '0000-00-00 00:00:00');

DROP TABLE IF EXISTS `#__rquote_meta`;

CREATE TABLE IF NOT EXISTS `#__rquote_meta` (
  `id` int(11) NOT NULL DEFAULT '0',
  `number_reached` mediumint(9) NOT NULL DEFAULT '0',
  `date_modified` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `#__rquote_meta` (`id`, `number_reached`, `date_modified`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1);

