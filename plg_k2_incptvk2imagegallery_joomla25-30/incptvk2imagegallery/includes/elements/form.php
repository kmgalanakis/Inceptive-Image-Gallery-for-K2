<?php
/**
 * @version		1.2
 * @package		Inceptive Image Gallery for K2(K2 plugin)
 * @author              Inceptive - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

?>

<?php 
	jimport('joomla.registry.registry');
	jimport( 'joomla.filesystem.folder' );
	
	$pluginLivePath = JURI::root(true).'/plugins/k2/'.$this->pluginName.'/'.$this->pluginName;
?>

<?php 
    //$document->addStyleSheet($pluginLivePath.'/includes/elements/css/style.css'); 
    $document->addScript($pluginLivePath.'/includes/elements/js/k2ig.js');
?>
<link rel="stylesheet" type="text/css" href="<?php echo $pluginLivePath; ?>/includes/elements/css/style.css" />
<!--<script src="<?php echo $pluginLivePath; ?>/includes/elements/js/k2ig.js" type="text/javascript"></script>-->

<?php 

    // Get timthumb parameters from plugin settings
    $plugin = JPluginHelper::getPlugin('k2', $this->pluginName);    
	
    $pluginParams = new JRegistry();
    $pluginParams->loadString($plugin->params, 'JSON');

    $timthumbWidth = $pluginParams->get('twidth');
    $timthumbHeight = $pluginParams->get('theight');
    $timthumbQuality = $pluginParams->get('tquality');
    $timthumbLink = $pluginLivePath. '/' .'includes'. '/' .'elements'. '/' .'lib'. '/' .'timthumb.php?';
    
    if($timthumbWidth != '')
        $timthumbLink .= 'w='.$timthumbWidth.'&';
    if($timthumbHeight != '')
        $timthumbLink .= 'h='.$timthumbHeight.'&';
    if($timthumbQuality != '')
        $timthumbLink .= 'q='.$timthumbQuality.'&';
?>

<?php if(count($images) > 0): 
    $style= "";
else: 
    $style= "display:none;";
endif; ?>

<div class="info-holder">    
	<div id="infobox" class="info" style="<?php echo $style; ?>"><?php echo JText::_('PLG_K2_IG_DRAG_N_DROP_TO_REORDER'); ?></div>

	<!-- The add image button -->
	<a href="#" id="addImageButton" class="addImageButton">
		<?php echo JText::_('PLG_K2_IG_ADD_IMAGE'); ?>
	</a>

	<?php
		$parameterOptions = array('default','custom')
	?>

	<div id="imageGalleryParametersBox" class="imageGalleryParameters" style="<?php echo $style; ?>">
		<label for="imageGalleryParameters"><?php echo JText::_('PLG_K2_IG_IMAGE_GALLERY_PARAMETERS'); ?></label>
		<select id="imageGalleryParameters" name="plugins[<?php echo $this->pluginName;?>IGParameters]" style="width:200px;">
			<?php
				foreach($parameterOptions as $option):
					if($igParameters == $option):
						$selected = 'selected=\'selected\'';
					else:
						$selected = '';
					endif;
			?>
				<option value="<?php echo $option; ?>" <?php echo $selected; ?> ><?php echo JText::_('PLG_K2_IG_'. strtoupper($option) .'_PARAMETERS'); ?></option>
			<?php
				endforeach;
			?>
		</select>
	</div>
</div>

<?php
    $class = "";
    
    if($igParameters == 'custom')
        $class = "customParametersVisible";
?>

<div id="customParameters" class="<?php echo $class; ?>">
    <div class="parameters-holder">
        <fieldset>
            <legend><?php echo JText::_('PLG_K2_IG_CUSTOM_PARAMETERS_FIELDSET'); ?></legend>
            
            <label id="k2IGpositionLabel" for="k2IGposition"><?php echo JText::_('PLG_K2_IG_XML_POSITION'); ?></label>
            <select name="plugins[<?php echo $this->pluginName;?>k2IGposition]" id="k2IGposition" style="width:200px;">
                <option value="K2AfterDisplayContent" <?php if($k2IGposition == 'K2AfterDisplayContent'):echo 'selected="selected"';endif;?>><?php echo JText::_('PLG_K2_IG_XML_AFTER_DISPLAY_CONTENT'); ?></option>
                <option value="K2BeforeDisplay" <?php if($k2IGposition == 'K2BeforeDisplay'):echo 'selected="selected"';endif;?>><?php echo JText::_('PLG_K2_IG_XML_BEFORE_DISPLAY'); ?></option>
                <option value="K2AfterDisplay" <?php if($k2IGposition == 'K2AfterDisplay'):echo 'selected="selected"';endif;?>><?php echo JText::_('PLG_K2_IG_XML_AFTER_DISPLAY'); ?></option>                    
                <!-- <option value="K2BeforeDisplayTitle" <?php if($k2IGposition == 'K2BeforeDisplayTitle'):echo 'selected="selected"';endif;?>><?php echo JText::_('PLG_K2_IG_XML_BEFORE_DISPLAY_TITLE'); ?></option> 
                <option value="K2AfterDisplayTitle" <?php if($k2IGposition == 'K2AfterDisplayTitle'):echo 'selected="selected"';endif;?>><?php echo JText::_('PLG_K2_IG_XML_AFTER_DISPLAY_TITLE'); ?></option> -->
                <option value="K2BeforeDisplayContent" <?php if($k2IGposition == 'K2BeforeDisplayContent'):echo 'selected="selected"';endif;?>><?php echo JText::_('PLG_K2_IG_XML_BEFORE_DISPLAY_CONTENT'); ?></option>                
            </select>
            <br />
            
            <?php 
                require_once(dirname(__FILE__).'/'.'..'.'/'.'helper.php');
                $getThemesPath = K2ImageGalleryHelper::getTemplatePath($this->pluginName,'','');
                $themeFolders = JFolder::listFolderTree($getThemesPath->file,'',1,0,0);
            ?>
            
            <div id="themeParameters" class="<?php //echo $classSlider; ?>">
                <label id="k2IGthemeLabel" for="k2IGtheme"><?php echo JText::_('PLG_K2_IG_SELECTED_THEME'); ?></label>
                <select name="plugins[<?php echo $this->pluginName;?>k2IGtheme]" id="k2IGtheme" style="width:200px;">
                    <?php foreach($themeFolders as $themeFolder): ?>
                    <option value="<?php echo $themeFolder['name']; ?>" <?php if($k2IGtheme == $themeFolder['name']):echo 'selected="selected"';endif;?>><?php echo $themeFolder['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </fieldset>
    </div>
</div>

<!-- Output the existing image -->
<div id="images">
    <ul id="sortable-images">
        <?php $number = 1; ?>
        <?php foreach($images as $key => $image): ?>
            <?php //if($number != count($images)): ?>
            <li id="image_<?php echo $number; ?>">
                <div class="image-holder" id="imagePlaceholder_<?php echo $number; ?>">
                    <?php if (!empty($image)): ?>
                        <div class="image-preview">
                            <p class="key_label"><?php echo JText::_('PLG_K2_IG_IMAGE_PREVIEW'); ?></p>
                            <a class="modal" rel="{handler: 'image'}" href="<?php echo $image; ?>" title="<?php echo JText::_('K2_CLICK_ON_IMAGE_TO_PREVIEW_IN_ORIGINAL_SIZE'); ?>">
                                        <img alt="<?php echo (isset($imageTitles[$key])) ? $imageTitles[$key]: ''; ?>" 
                                            src="<?php echo $timthumbLink.'src='.JURI::root(true).$image; ?>" class="k2ImageGalleryAdminImage" />
                                </a>
                        </div>
                    <?php endif; ?>
                    <table class="imagetable">
                        <tr>
                                <td align="right" class="key_label">
                                        <?php echo JText::_('PLG_K2_IG_IMAGE_PATH'); ?>
                                </td>
                                <td>
                                    <input type="text" 
                                        name="plugins[<?php echo $this->pluginName;?>Images][]" 
                                        id="myExistingImageValue_<?php echo $number; ?>" 
                                        value="<?php echo $image; ?>" 
                                        class="text_area" readonly="" size="20" />
                                    <input type="button" value="<?php echo JText::_('K2_BROWSE_SERVER'); ?>" id="myK2ImageBrowseServer_<?php echo $number; ?>" class="myK2ImageBrowseServer" />
                                    
                                </td>
                        </tr>
                        <tr>
                                <td align="right" class="key_label">
                                        <?php echo JText::_('PLG_K2_IG_IMAGE_TITLE'); ?>
                                </td>
                                <td>
                                        <input type="text" 
                                            name="plugins[<?php echo $this->pluginName;?>ImageTitles][]" 
                                            size="30" class="text_area" 
                                            value="<?php echo (isset($imageTitles[$key])) ? $imageTitles[$key]: ""; ?>" />
                                </td>
                        </tr>
                        <tr>
                                <td align="right" class="key_label">
                                        <?php echo JText::_('PLG_K2_IG_IMAGE_DESCRIPTION'); ?>
                                </td>
                                <td>
                                        <input type="text" 
                                            name="plugins[<?php echo $this->pluginName;?>ImageDescriptions][]" 
                                            size="50" class="text_area" 
                                            value="<?php echo (isset($imageDescriptions[$key])) ? $imageDescriptions[$key]: ""; ?>" />
                                </td>
                        </tr>
                        <?php if (!empty($image)): ?>
                        <tr>
<!--                                <td align="right" class="key_label">
                                        <?php echo JText::_('K2_ITEM_IMAGE_PREVIEW'); ?>
                                </td>
                                <td>
                                        <a class="modal" rel="{handler: 'image'}" href="<?php echo $image; ?>" title="<?php echo JText::_('K2_CLICK_ON_IMAGE_TO_PREVIEW_IN_ORIGINAL_SIZE'); ?>">
                                                <img alt="<?php echo $imageTitles[$key]; ?>" 
                                                    src="<?php echo $timthumbLink.'src='.JURI::root(true).$image; ?>" class="k2ImageGalleryAdminImage" />
                                        </a>
                                </td>-->
                        </tr>
                        <?php endif; ?>
                    </table>

                    <div style="clear:both;"></div>

                    <a style="display:block;clear:both;" href="#" class="removeImageButton">
                        <?php echo JText::_('PLG_K2_IG_REMOVE_IMAGE'); ?>
                    </a>
                </div>
            </li>
            <?php //endif; ?>
            <?php $number++; ?>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Placeholder code to use when user clicks the "Add Video" button -->
<li id="image-list-item" style="display:none;">
    <div class="image-holder" id="imagePlaceholder">
        <table class="imagetable">
            <tr>
                    <td align="right" class="key_label">
                            <?php echo JText::_('PLG_K2_IG_IMAGE_PATH'); ?>
                    </td>
                    <td>
                        <input type="text" name="plugins[<?php echo $this->pluginName;?>Images][]" id="myExistingImageValue" class="text_area" readonly="" size="20"></input>
                        <input type="button" value="<?php echo JText::_('K2_BROWSE_SERVER'); ?>" id="myK2ImageBrowseServer" class="myK2ImageBrowseServer" />
                    </td>
            </tr>
            <tr>
                    <td align="right" class="key_label">
                            <?php echo JText::_('PLG_K2_IG_IMAGE_TITLE'); ?>
                    </td>
                    <td>
                            <input type="text" name="plugins[<?php echo $this->pluginName;?>ImageTitles][]" size="30" class="text_area" value="<?php if(isset($this->row->image_title)):echo $this->row->image_title;endif; ?>" />
                    </td>
            </tr>
            <tr>
                    <td align="right" class="key_label">
                            <?php echo JText::_('PLG_K2_IG_IMAGE_DESCRIPTION'); ?>
                    </td>
                    <td>
                            <input type="text" name="plugins[<?php echo $this->pluginName;?>ImageDescriptions][]" size="50" class="text_area" value="<?php if(isset($this->row->image_description)):echo $this->row->image_description;endif; ?>" />
                    </td>
            </tr>
        </table>

        <div style="clear:both;"></div>

        <a style="display:block;clear:both;" href="#" class="removeImageButton">
            <?php echo JText::_('PLG_K2_IG_REMOVE_IMAGE'); ?>
        </a>
    </div>
</li>


