<?php
/**
 * @version		1.3
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
    
    // K2 human readable plugin name. This the title of the plugin users see in K2 form.
    var $pluginNameHumanReadable = 'Inceptive Image Gallery for K2';
    
    var $plg_copyrights_start		= "\n\n<!-- Inceptive \"K2ImageGallery\" Plugin (v1.3) starts here -->\n";
    var $plg_copyrights_end		= "\n<!-- Inceptive \"K2ImageGallery\" Plugin (v1.3) ends here -->\n\n";

    // Constructor
    public function __construct(&$subject, $config)
    {   
        // Construct
        parent::__construct($subject, $config);
        // Load plugin language
		$this->loadLanguage('plg_'.$this->_type.'_'.$this->_name);
	}

    function onK2BeforeDisplay( &$item, &$params, $limitstart) {
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin = JPluginHelper::getPlugin('k2', $this->pluginName);    
			
            $pluginParams = new JRegistry();
            $pluginParams->loadString($plugin->params, 'JSON');
			
            $k2IGposition = $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2BeforeDisplay')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }
    
    function onK2AfterDisplay( &$item, &$params, $limitstart) {
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin = JPluginHelper::getPlugin('k2', $this->pluginName);    
			
            $pluginParams = new JRegistry();
            $pluginParams->loadString($plugin->params, 'JSON');
			
            $k2IGposition = $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2AfterDisplay')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }
    
    function onK2BeforeDisplayTitle( &$item, &$params, $limitstart) {
        // ----------------------------------- Get plugin parameters -----------------------------------
        $plugin         =   JPluginHelper::getPlugin('k2', $this->pluginName);
        $pluginParams   =   new JParameter($plugin->params);
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin         =   JPluginHelper::getPlugin('k2', $this->pluginName);
            $pluginParams   =   new JParameter($plugin->params);
            $k2IGposition = $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2BeforeDisplayTitle')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }

    function onK2AfterDisplayTitle( &$item, &$params, $limitstart) {
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin = JPluginHelper::getPlugin('k2', $this->pluginName);    
			
            $pluginParams = new JRegistry();
            $pluginParams->loadString($plugin->params, 'JSON');
			
            $k2IGposition 	= $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2AfterDisplayTitle')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }

    function onK2BeforeDisplayContent( &$item, &$params, $limitstart) {
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin = JPluginHelper::getPlugin('k2', $this->pluginName);    
			
            $pluginParams = new JRegistry();
            $pluginParams->loadString($plugin->params, 'JSON');
			
            $k2IGposition 	= $pluginParams->get('k2IGposition');
        endif;
        
        if($k2IGposition == 'K2BeforeDisplayContent')
            return $this->renderK2ImageGallery($item, $params, $limitstart);
        else
            return '';
    }
    
    function onK2AfterDisplayContent( &$item, &$params, $limitstart) {        
        // ------------------------------- Get item specific parameters --------------------------------
        $k2PluginData = new K2Parameter($item->plugins, '', $this->pluginName);
        $igParameters = $k2PluginData->get('IGParameters');
        if($igParameters == 'custom'):
            $k2IGposition = $k2PluginData->get('k2IGposition');
        else:
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin = JPluginHelper::getPlugin('k2', $this->pluginName);    
			
            $pluginParams = new JRegistry();
            $pluginParams->loadString($plugin->params, 'JSON');
			
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
            // Includes
            require_once(dirname(__FILE__).'/'.'includes'.'/'.'helper.php');
            
            // ----------------------------------- Get plugin parameters -----------------------------------
            $plugin 		= JPluginHelper::getPlugin('k2', $this->pluginName);    
			
			$pluginParams = new JRegistry();
			$pluginParams->loadString($plugin->params, 'JSON');
			
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
                $plugin = JPluginHelper::getPlugin('k2', $this->pluginName);    
				
                $pluginParams = new JRegistry();
                $pluginParams->loadString($plugin->params, 'JSON');

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
            include($getTemplatePath->file);
            $output = $this->plg_copyrights_start.ob_get_clean().$this->plg_copyrights_end;     
            
            return $output;                
        }
    }
    
    function onRenderAdminForm (&$item, $type, $tab='') {
        if ($tab == 'gallery'  && $type == 'item')
        {
            // Includes
            require_once(dirname(__FILE__).'/'.'includes'.'/'.'helper.php');
            
            $inceptiveImageGalleryForK2 = (object) array('name' => 'Inceptive Image Gallery for K2', 'fields' => '');
            
            // $document = JFactory::getDocument();			
			
			// // Now we have the variables we need so let's include the HTML form (MVC FTW!)
			// ob_start();
			// include 'includes\elements\form.php';
			// $inceptiveImageGalleryForK2Fields = ob_get_clean();
            
            $getTemplatePath = K2ImageGalleryHelper::getTemplatePath($this->pluginName,'view.html.php',"Admin");
            include($getTemplatePath->file);
            $incptvImageGalleryForK2AdminView = new IncptvImageGalleryForK2AdminView($item, $this->pluginName); 
            $inceptiveImageGalleryForK2Fields = $incptvImageGalleryForK2AdminView->display();
            // $inceptiveImageGalleryForK2Fields = 
            $inceptiveImageGalleryForK2->fields = $inceptiveImageGalleryForK2Fields; 
            
            return $inceptiveImageGalleryForK2;
        }
    //     if ($tab == 'other' && $type == 'item') {
    //         $mainframe 		= JFactory::getApplication();
            
    //         $selectedCategories = array();
            
    //         if($item->id != 0)
    //         {
    //             $db 			= JFactory::getDBO();
    //             $rows 			= JTable::getInstance('IncptvK2MultipleCategories', 'Table');
    //             $retrievedCategories  = $rows->getSomeObjectsList('SELECT * FROM #__k2_multiple_categories mc WHERE mc.itemID = '.$item->id);
    //             foreach ($retrievedCategories as $retrievedCategory) { 
    //                 if($retrievedCategory->catID != $item->catid)
    //                 array_push($selectedCategories, $retrievedCategory->catID);
    //             }
    //         }
            
    //         if(empty($selectedCategories))
    //         array_push($selectedCategories, 0);
            
    //         $document 		= JFactory::getDocument();
    //         $path 		= str_replace("administrator/", "",JURI::base());
    //         $plugin_folder 	= basename(dirname(__FILE__));
    //         $document->addScript($path.'plugins/k2/'.$plugin_folder.'/js/incptvk2multiplecategories.js');
    //         $document->addStyleSheet($path.'plugins/k2/'.$plugin_folder.'/css/style.css');

    //         //Loading the appropriate language files
    //         $lang = JFactory::getLanguage();
    //         $languagePath = JPATH_PLUGINS.DS.'k2'.DS.'incptvk2multiplecategories';
    //         $lang->load("plg_k2_incptvk2multiplecategories", $languagePath, null, false);

    //         $categoriesModel = K2Model::getInstance('Categories', 'K2Model');
    //         $categories_option[] = JHTML::_('select.option', 0, JText::_('K2_SELECT_CATEGORY'));
    //         $categories = $categoriesModel->categoriesTree(NUll, true, false);
    //         if ($mainframe->isSite())
    //         {
    //         $task = JRequest::getCmd('task');
    //         JLoader::register('K2HelperPermissions', JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'permissions.php');
    //         if (isset($task) && ($task == 'add' || $task == 'edit') && !K2HelperPermissions::canAddToAll())
    //         {
    //             for ($i = 0; $i < sizeof($categories); $i++)
    //             {
    //             if (!K2HelperPermissions::canAddItem($categories[$i]->value) && $task == 'add')
    //             {
    //                 $categories[$i]->disable = true;
    //             }
    //             if (!K2HelperPermissions::canEditItem($item->created_by, $categories[$i]->value) && $task == 'edit')
    //             {
    //                 $categories[$i]->disable = true;
    //             }
    //             }
    //         }
    //         }
            
    //         for ($i = 0; $i < sizeof($categories); $i++)
    //         {
    //         if($categories[$i]->value == $item->catid)
    //             $categories[$i]->disable = true;
    //         }
            
    //         $categories_options = @array_merge($categories_option, $categories);

    //         $tabIncptvMC_innerHtml = '<table class="admintable"><tbody>';
    //         $tabIncptvMC_innerHtml .='<tr><td class="key">'.JText::_('PLG_K2_MC_ADDITIONAL_CATEGORIES_LABEL').'</td>';
    //         $tabIncptvMC_innerHtml .='<td class="adminK2RightCol">';
    //         $tabIncptvMC_innerHtml .= JHTML::_('select.genericlist', $categories_options, 'plugins[incptvk2multiplecategories][]', 'style="width:100%;" multiple="multiple" size="10"', 'value', 'text', $selectedCategories);
    //         $tabIncptvMC_innerHtml .= '</td></tr>';	    
    //         $tabIncptvMC_innerHtml .='</tbody></table>';
            
    //         $tabIncptvMC_innerHtmlK2ge27 = '<div class="itemAdditionalField">';
    //         $tabIncptvMC_innerHtmlK2ge27 .= '<div class="k2FLeft k2Right itemAdditionalValue">';
    //         $tabIncptvMC_innerHtmlK2ge27 .= '<label>'.JText::_('PLG_K2_MC_ADDITIONAL_CATEGORIES_LABEL').'</label>';
    //         $tabIncptvMC_innerHtmlK2ge27 .= '</div>';

    //         $tabIncptvMC_innerHtmlK2ge27 .= '<div class="itemAdditionalData">';
    //         $tabIncptvMC_innerHtmlK2ge27 .= JHTML::_('select.genericlist', $categories_options, 'plugins[incptvk2multiplecategories][]', 'style="width:100%;" multiple="multiple" size="10"', 'value', 'text', $selectedCategories);
    //         $tabIncptvMC_innerHtmlK2ge27 .= '</div>';
    //         $tabIncptvMC_innerHtmlK2ge27 .= '</div>';
            
    //         $tabIncptvMC	=   '<li id="tabIncptvMC">
    //                     <a href="#k2TabIncptvMC" id="tabIncptvMCold">'.JText::_('PLG_K2_MC_MULTIPLE_CATEGORIES_LABEL').'</a>
    //                     <a href="#k2TabIncptvMC" id="tabIncptvMCK2ge27"><i class="fa fa-clone" aria-hidden="true"></i> '.JText::_('PLG_K2_MC_MULTIPLE_CATEGORIES_LABEL').'</a>
    //                     </li>';
    //         $tabIncptvMC_content  = '<div id="k2TabIncptvMC" class="simpleTabsContent k2TabsContent k2TabsContentLower" >' . $tabIncptvMC_innerHtml . $tabIncptvMC_innerHtmlK2ge27 . '</div>';
            
    //         echo $tabIncptvMC.$tabIncptvMC_content;
    //     }
    }
}
