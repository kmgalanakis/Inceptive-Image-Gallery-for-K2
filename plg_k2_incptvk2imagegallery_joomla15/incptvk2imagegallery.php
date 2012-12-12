<?php
/**
 * @version		1.2
 * @package		Inceptive Image Gallery for K2(K2 plugin)
 * @author		Inceptive - http://www.inceptive.gr
 * @copyright	Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

// Load the base K2 plugin class. All K2 plugins extend this class.
JLoader::register('K2Plugin', JPATH_ADMINISTRATOR.'/'.'components'.'/'.'com_k2'.'/'.'lib'.'/'.'k2plugin.php');

class plgK2IncptvK2ImageGallery extends K2Plugin
{
    // K2 plugin name. Used to namespace parameters.
    var $pluginName = 'incptvk2imagegallery';
	var $pluginType = 'k2';
    
    // K2 human readable plugin name. This the title of the plugin users see in K2 form.
    var $pluginNameHumanReadable = 'Inceptive Image Gallery for K2';
    
    var $plg_copyrights_start		= "\n\n<!-- Inceptive \"K2ImageGallery\" Plugin (v1.2) starts here -->\n";
    var $plg_copyrights_end		= "\n<!-- Inceptive \"K2ImageGallery\" Plugin (v1.2) ends here -->\n\n";

    // Constructor
    public function __construct(&$subject, $config)
    {
        // Construct
        parent::__construct($subject, $config);
        // Load plugin language
        
		$lang = &JFactory::getLanguage();
		$lang->load('plg_'.$this->pluginType.'_'.$this->pluginName, JPATH_ADMINISTRATOR);
    }

    function onK2BeforeDisplay( &$item, &$params, $limitstart) {
        $mainframe = &JFactory::getApplication();
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin 		= &JPluginHelper::getPlugin('k2', $this->pluginName);    
			
			$pluginParams = new JParameter($plugin->params);
			
			
            $k2IGposition 	= $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2BeforeDisplay')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }
    
    function onK2AfterDisplay( &$item, &$params, $limitstart) {
        $mainframe = &JFactory::getApplication();
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin 		= &JPluginHelper::getPlugin('k2', $this->pluginName);    
			
			$pluginParams = new JParameter($plugin->params);    
			
            $k2IGposition 	= $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2AfterDisplay')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }
    
    function onK2BeforeDisplayTitle( &$item, &$params, $limitstart) {
        $mainframe = &JFactory::getApplication();
        // ----------------------------------- Get plugin parameters -----------------------------------
        $plugin         =   &JPluginHelper::getPlugin('k2', $this->pluginName);
        $pluginParams   =   new JParameter($plugin->params);
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin         =   &JPluginHelper::getPlugin('k2', $this->pluginName);
            $pluginParams   =   new JParameter($plugin->params);
            $k2IGposition = $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2BeforeDisplayTitle')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }

    function onK2AfterDisplayTitle( &$item, &$params, $limitstart) {
        $mainframe = &JFactory::getApplication();
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin 		= &JPluginHelper::getPlugin('k2', $this->pluginName);    
			
			$pluginParams = new JParameter($plugin->params);    
			
            $k2IGposition 	= $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2AfterDisplayTitle')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }

    function onK2BeforeDisplayContent( &$item, &$params, $limitstart) {
        $mainframe = &JFactory::getApplication();
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin 		= &JPluginHelper::getPlugin('k2', $this->pluginName);    

			$pluginParams = new JParameter($plugin->params);    
			
            $k2IGposition 	= $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2BeforeDisplayContent')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }
    
    function onK2AfterDisplayContent( &$item, &$params, $limitstart) {
        $mainframe = &JFactory::getApplication();
        
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin 		= &JPluginHelper::getPlugin('k2', $this->pluginName);    
			
			$pluginParams = new JParameter($plugin->params);    
			
            $k2IGposition 	= $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2AfterDisplayContent')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }
    
    function renderK2ImageGallery(&$item, &$params, $limitstart) {
        
        // Fetch some variables
        $option =   JRequest::getCmd('option');
        $view   =   JRequest::getCmd('view');
        $id     =   JRequest::getInt('id');
        
        // We only want to display the images in the item view
        if ($option == 'com_k2' && $view == 'item' && $id == $item->id)
        {
            //$mainframe= &JFactory::getApplication();
            $document = &JFactory::getDocument();

            // Assign paths
            //$sitePath = JPATH_SITE;
            //$siteUrl  = JURI::root(true);
                
            // Includes
            require_once(dirname(__FILE__).'/'.$this->pluginName.'/'.'includes'.'/'.'helper.php');
            
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin 		= &JPluginHelper::getPlugin('k2', $this->pluginName);    
			
			$pluginParams = new JParameter($plugin->params);    
			
            
			$pluginLivePath = JURI::root(true). '/' .'plugins'. '/' .'k2'. '/' .''.$this->pluginName;
            
            // ------------------------------- Get item specific parameters --------------------------------
            $k2PluginData   =   new K2Parameter($item->plugins, '', $this->pluginName);
            $igParameters = $k2PluginData->get('IGParameters');
            
            if ($igParameters == 'custom'):
                /* General parameters */
                $layout     =   $k2PluginData->get('k2IGlayout');
                $theme     =   $k2PluginData->get('k2IGtheme');
            else:
                // ----------------------------------- Get plugin parameters -----------------------------------
                $plugin 		= &JPluginHelper::getPlugin('k2', $this->pluginName);    
				
				$pluginParams = new JParameter($plugin->params);    

                /* General parameters */
                $theme     =   $pluginParams->get('defaultTheme');

                /* Nivo Slider parameters */                
            endif;
                        
            
            // ----------------------------------- Get plugin data -----------------------------------
            $images             =   $k2PluginData->get('Images', array()); //print_r($images);
            $imageTitles        =   $k2PluginData->get('ImageTitles', array()); //print_r($imageTitles);
            $imageDescriptions   =   $k2PluginData->get('ImageDescriptions', array()); //print_r($imageDesriptions);
            
            /* Filter the videos array to remove any empty entries */
            $images         =   array_filter($images);
            $imageTitles  =   array_filter($imageTitles);
            $imageDescriptions   =   array_filter($imageDescriptions);
            
            
            
            // ----------------------------------- Render the output -----------------------------------
            // If we have no videos return an empty string
            if (count($images) == 0):
                return;
            else:
                $output = '';
            endif;
            
            ob_start();
            $getTemplatePath = K2ImageGalleryHelper::getTemplatePath($this->pluginName,'default.php',$theme);
            $getTemplatePath = $getTemplatePath->file;
            include($getTemplatePath);
            $output = $this->plg_copyrights_start.ob_get_clean().$this->plg_copyrights_end;     
            
            return $output;                
        }
    }
}
