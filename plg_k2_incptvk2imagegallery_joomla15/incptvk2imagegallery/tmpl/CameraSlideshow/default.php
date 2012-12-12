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
    
    $getTemplatePath = K2ImageGalleryHelper::getTemplatePath($this->pluginName,'',$theme);
    $getTemplatePath = $getTemplatePath->http;

    $document->addScript($getTemplatePath.'js'. '/' .'jquery.min.js');
    $document->addScript($getTemplatePath.'js'. '/' .'jquery.mobile.customized.min.js');
    $document->addScript($getTemplatePath.'js'. '/' .'jquery.easing.1.3.js');
    $document->addScript($getTemplatePath.'js'. '/' .'camera.min.js');
    $document->addScript($getTemplatePath.'js'. '/' .'camera.settings.js.php');
    
    $document->addStyleSheet($getTemplatePath.'css'. '/' .'camera.css');

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



    <div class="fluid_container">
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <?php foreach($images as $key=>$image): ?>
                <div data-thumb="<?php echo $timthumbLink.'src='.JURI::root(true).$image; ?>" data-src="<?php echo JURI::root(true).$image; ?>">
                <?php //if($imageDescriptions[$key] != ''): ?>
                    <div class="camera_caption">
                        <strong><?php echo (isset($imageTitles[$key])) ? $imageTitles[$key]: ""; ?></strong><br/><em><?php echo (isset($imageDescriptions[$key])) ? $imageDescriptions[$key]: ""; ?></em>
                    </div>
                <?php //endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>