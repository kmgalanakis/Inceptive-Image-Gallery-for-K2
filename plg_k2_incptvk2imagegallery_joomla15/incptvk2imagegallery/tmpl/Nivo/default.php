<?php
/**
 * @version		1.0
 * @package		Inceptive Image Gallery for K2(K2 plugin)
 * @author              Inceptive - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

        $getTemplatePath = K2ImageGalleryHelper::getTemplatePath($this->pluginName,'',$theme);
        $getTemplatePath = $getTemplatePath->http;
    
        $document->addStyleSheet($getTemplatePath.'themes'. '/' .'default'. '/' .'default.css');
        $document->addStyleSheet($getTemplatePath.'css'. '/' .'nivo-slider.css');
        $document->addStyleSheet($getTemplatePath.'css'. '/' .'style.css');
    ?>
    
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <?php foreach($images as $key=>$image): ?>
                <img src="<?php echo JURI::root(true).$image; ?>" data-thumb="<?php echo JURI::root(true).$image; ?>" alt="<?php echo (isset($imageTitles[$key])) ? $imageTitles[$key]: ""; ?>>" title="#htmlcaption_<?php echo $key; ?>"/>
            <?php endforeach; ?>
        </div>
        <?php foreach($images as $key=>$image): ?>
            <div id="htmlcaption_<?php echo $key; ?>" class="nivo-html-caption">
                <a href="#" target=""><strong><?php echo (isset($imageTitles[$key])) ? $imageTitles[$key]: ""; ?></strong></a>
                <br /><em><?php echo (isset($imageDescriptions[$key])) ? $imageDescriptions[$key]: ""; ?></em>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
        $document->addScript($getTemplatePath.'js/jquery.nivo.slider.js');
        $document->addScript($getTemplatePath.'js/nivo-slider-settings.js.php');
    ?>