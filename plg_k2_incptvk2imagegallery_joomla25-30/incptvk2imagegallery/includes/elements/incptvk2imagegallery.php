<?php
/**
 * @version		1.3
 * @package		Inceptive Image Gallery for K2(K2 plugin)
 * @author              Inceptive Design Labs - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

// Import the JElement class
jimport('joomla.html.parameter.element');

if(version_compare(JVERSION,'3.0.0','ge'))
{
	class JFormFieldIncptvK2ImageGallery extends JFormField
	{
		// Declare the element type
		public $type = 'image';
		
		// K2 plugin name. Used to namespace parameters.
		var $pluginName = 'incptvk2imagegallery';

		// This function returns the input of the element
		protected function getInput()
		{   
			$document = JFactory::getDocument();
			
			// Get the K2 Item id.
			$id = JRequest::getInt('cid');

			// Get the K2 item table class and load the item
			$item = JTable::getInstance('K2Item', 'Table');
			$item->load($id);
			
			// Check if we already have videos for this item
			$k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
			$images = $k2PluginData->get('Images', array()); //print_r($images);
			$imageTitles = $k2PluginData->get('ImageTitles', array()); //print_r($imageTitles);
			$imageDescriptions = $k2PluginData->get('ImageDescriptions', array()); //print_r($imageDescriptions);
			
			// Filter the videos array to remove any empty entries
			$images = array_filter($images);
			$imageTitles = array_filter($imageTitles);
			$imageDescriptions = array_filter($imageDescriptions);
			
			$igParameters = $k2PluginData->get('IGParameters');
			$k2IGposition = $k2PluginData->get('k2IGposition');
			$k2IGtheme = $k2PluginData->get('k2IGtheme');
			
			// Now we have the variables we need so let's include the HTML form (MVC FTW!)
			ob_start();
			include 'form.php';
			$output = ob_get_clean();
			return $output;
		}

		// This function returns the element label. We are returning NULL since we use our own HTML form
		function fetchTooltip($label, $description, &$xmlElement, $control_name = '', $name = '')
		{
			return NULL;
		}

	}
}

if(version_compare(JVERSION,'3.0.0','l'))
{
	class JFormFieldIncptvK2ImageGallery extends JFormField
	{
		// Declare the element type
		var $_name = 'image';
		
		// K2 plugin name. Used to namespace parameters.
		var $pluginName = 'incptvk2imagegallery';

		// This function returns the input of the element
		function getInput()
		{   
			$document = JFactory::getDocument();
			
			// Get the K2 Item id.
			$id = JRequest::getInt('cid');

			// Get the K2 item table class and load the item
			$item = JTable::getInstance('K2Item', 'Table');
			$item->load($id);
			
			// Check if we already have videos for this item
			$k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
			$images = $k2PluginData->get('Images', array()); //print_r($images);
			$imageTitles = $k2PluginData->get('ImageTitles', array()); //print_r($imageTitles);
			$imageDescriptions = $k2PluginData->get('ImageDescriptions', array()); //print_r($imageDescriptions);
			
			// Filter the videos array to remove any empty entries
			$images = array_filter($images);
			$imageTitles = array_filter($imageTitles);
			$imageDescriptions = array_filter($imageDescriptions);
			
			$igParameters = $k2PluginData->get('IGParameters');
			$k2IGposition = $k2PluginData->get('k2IGposition');
			$k2IGtheme = $k2PluginData->get('k2IGtheme');
			
			// Now we have the variables we need so let's include the HTML form (MVC FTW!)
			ob_start();
			include 'form.php';
			$output = ob_get_clean();
			return $output;
		}

		// This function returns the element label. We are returning NULL since we use our own HTML form
		function fetchTooltip($label, $description, &$xmlElement, $control_name = '', $name = '')
		{
			return NULL;
		}

	}
}