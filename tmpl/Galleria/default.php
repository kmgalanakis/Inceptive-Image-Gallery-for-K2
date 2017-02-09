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

        $getTemplatePath = K2ImageGalleryHelper::getTemplatePath($this->pluginName,'',$theme);
        $getTemplatePath = $getTemplatePath->http;
        $document = JFactory::getDocument();
        $document->addStyleSheet($getTemplatePath.'css'. '/' .'galleria.classic.css');
    ?>
	
	<style>
		/* This rule is read by Galleria to define the gallery height: */
		/*#galleria{height:320px}*/
	</style>
    
    <div id="galleria">
		<?php foreach($images as $key=>$image): ?>
			<a href="<?php echo JURI::root(true).$image; ?>">
				<img data-title="<?php echo (isset($imageTitles[$key])) ? $imageTitles[$key]: ""; ?>"
					 data-description="<?php echo (isset($imageDescriptions[$key])) ? $imageDescriptions[$key]: ""; ?>"
					 src="<?php echo JURI::root(true).$image; ?>">
			</a>
		<?php endforeach; ?>
    </div>

    <?php
        $document->addScript($getTemplatePath.'js/galleria-1.2.9.min.js');
		
		$document->addScript($getTemplatePath.'js/galleria-settings.js.php');
	
        //require_once(dirname(__FILE__).'/js/galleria-settings.js.php');
    ?>