<?php
/**
 * @version		1.3
 * @package		Inceptive Image Gallery for K2(K2 plugin)
 * @author              Inceptive Design Labs - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
 
// no direct access
defined('_JEXEC') or die;

class IncptvImageGalleryForK2AdminView
{
                
    var $pluginName = 'incptvk2imagegallery';
    var $item;
    
    function __construct($item, $pluginName) {
        $this->item = $item;
        $this->pluginName = $pluginName;
    }

	function display($tpl = null)
	{
        JText::script('PLG_K2_IG_IMAGE_TITLE');
        JText::script('PLG_K2_IG_IMAGE_DESCRIPTION');
        $document = JFactory::getDocument();
        $pluginLivePath = JURI::root(true).'/plugins/k2/'.$this->pluginName;
        
        $document->addScript($pluginLivePath.'/js/k2ig.js');
        $document->addStyleSheet($pluginLivePath.'/css/style.css');
        
        // Check if we already have videos for this item
        $k2PluginData = new K2Parameter($this->item->plugins, '', $this->pluginName);
        $images = array_filter($k2PluginData->get('Images', array()));
        $imageTitles = array_filter($k2PluginData->get('ImageTitles', array()));
        $imageDescriptions = array_filter($k2PluginData->get('ImageDescriptions', array()));
        
        $igParameters = $k2PluginData->get('IGParameters');
        $k2IGposition = $k2PluginData->get('k2IGposition');
        $k2IGtheme = $k2PluginData->get('k2IGtheme');
        
        ob_start();
        include 'tmpl/default.php';
        $output = ob_get_clean();
        
        return $output;
    }
}