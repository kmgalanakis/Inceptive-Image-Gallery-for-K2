<?php
/**
 * @version		1.1
 * @package		Inceptive Image Gallery for K2(K2 plugin)
 * @author              Inceptive - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
    define( '_JEXEC', 1 );
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' ); 
    define( 'DS', DIRECTORY_SEPARATOR );
	
    $jpath_base = realpath(dirname(__FILE__).'/'.'../../../../../../..' );
        
	if(file_exists($jpath_base .'/'.'includes')):
		define( 'JPATH_BASE', $jpath_base);
		require_once ( $jpath_base .'/'.'includes'.'/'.'defines.php' );
		require_once ( $jpath_base .'/'.'includes'.'/'.'framework.php' );
	else:
		$jpath_base = realpath(dirname(__FILE__).'/'.'../../../../../..' );
		define( 'JPATH_BASE', $jpath_base);
		require_once ( $jpath_base .'/'.'includes'.'/'.'defines.php' );
		require_once ( $jpath_base .'/'.'includes'.'/'.'framework.php' );
	endif;

    $mainframe = JFactory::getApplication('site');
    
    jimport( 'joomla.plugin.helper' );
    
    $plugin             =   &JPluginHelper::getPlugin('k2', 'incptvk2imagegallery');
    
	jimport( 'joomla.html.parameter' );
	$pluginParams = new JParameter($plugin->params);    
	    
    $alignment              = $pluginParams->get('cameraAlignment');
    $autoAdvance            = $pluginParams->get('cameraAutoAdvance');
    $mobileAutoAdvance      = $pluginParams->get('cameraMobileAutoAdvance');
    $barDirection           = $pluginParams->get('cameraBarDirection');
    $barPosition            = $pluginParams->get('cameraBarPosition');
    $cols                   = $pluginParams->get('cameraCols');
    $easing                 = $pluginParams->get('cameraEasing');
    $mobileEasing           = $pluginParams->get('cameraMobileEasing');
    $fx                     = $pluginParams->get('cameraFx');
    $mobileFx               = $pluginParams->get('cameraMobileFx');
    $gridDifference         = $pluginParams->get('cameraGridDifference');
    $height                 = $pluginParams->get('cameraHeight');
    $hover                  = $pluginParams->get('cameraHover');
    $loader                 = $pluginParams->get('cameraLoader');
    $loaderColor            = $pluginParams->get('cameraLoaderColor');
    $loaderBgColor          = $pluginParams->get('cameraLoaderBgColor');
    $loaderOpacity          = $pluginParams->get('cameraLoaderOpacity');
    $loaderPadding          = $pluginParams->get('cameraLoaderPadding');
    $loaderStroke           = $pluginParams->get('cameraLoaderStroke');
    $minHeight              = $pluginParams->get('cameraMinHeight');
    $navigation             = $pluginParams->get('cameraNavigation');
    $navigationHover        = $pluginParams->get('cameraNavigationHover');
    $mobileNavHover         = $pluginParams->get('cameraMobileNavHover');
    $opacityOnGrid          = $pluginParams->get('cameraOpacityOnGrid');
    $overlayer              = $pluginParams->get('cameraOverlayer');
    $pagination             = $pluginParams->get('cameraPagination');
    $playPause              = $pluginParams->get('cameraPlayPause');
    $pauseOnClick           = $pluginParams->get('cameraPauseOnClick');
    $pieDiameter            = $pluginParams->get('cameraPieDiameter');
    $piePosition            = $pluginParams->get('cameraPiePosition');
    $portrait               = $pluginParams->get('cameraPortrait');
    $rows                   = $pluginParams->get('cameraRows');
    $slicedRows             = $pluginParams->get('cameraSlicedRows');
    $slicedCols             = $pluginParams->get('cameraSlicedCols');
    $slideOn                = $pluginParams->get('cameraSlideOn');
    $thumbnails             = $pluginParams->get('cameraThumbnails');
    $time                   = $pluginParams->get('cameraTime');
    $transPeriod            = $pluginParams->get('cameraTransPeriod');
?>

jQuery(function(){
        jQuery('#camera_wrap_1').camera({
            alignment: '<?php echo $alignment; ?>',
            autoAdvance: <?php if($autoAdvance && strtolower($autoAdvance) !== "false"):echo "true";else:echo "false";endif; ?>,
            mobileAutoAdvance: <?php if($mobileAutoAdvance && strtolower($mobileAutoAdvance) !== "false"):echo "true";else:echo "false";endif; ?>,
            barDirection: '<?php echo $barDirection; ?>',
            barPosition: '<?php echo $barPosition; ?>',
            cols: '<?php echo $cols; ?>',
            easing: '<?php echo $easing ?>',
            mobileEasing: '<?php echo $mobileEasing ?>',
            fx: '<?php echo $fx; ?>',
            mobileFx: '<?php echo $mobileFx; ?>',
            gridDifference: <?php echo $gridDifference; ?>,
            height: '<?php echo $height; ?>',
            hover: <?php if($hover && strtolower($hover) !== "false"):echo "true";else:echo "false";endif; ?>,
            loader: '<?php if($loader && strtolower($loader) !== "false"):echo "true";else:echo "false";endif; ?>',
            loaderColor: '<?php echo $loaderColor; ?>',
            loaderBgColor: '<?php echo $loaderBgColor; ?>',
            loaderOpacity: <?php echo $loaderOpacity; ?>,
            loaderPadding: <?php echo $loaderPadding; ?>,
            loaderStroke: <?php echo $loaderStroke; ?>,
            minHeight: '<?php echo $minHeight; ?>',
            navigation: <?php if($navigation && strtolower($navigation) !== "false"):echo "true";else:echo "false";endif; ?>,
            navigationHover: <?php if($navigationHover && strtolower($navigationHover) !== "false"):echo "true";else:echo "false";endif; ?>,
            mobileNavHover: <?php if($mobileNavHover && strtolower($mobileNavHover) !== "false"):echo "true";else:echo "false";endif; ?>,
            opacityOnGrid: <?php if($opacityOnGrid && strtolower($opacityOnGrid) !== "false"):echo "true";else:echo "false";endif; ?>,
            overlayer: <?php if($overlayer && strtolower($overlayer) !== "false"):echo "true";else:echo "false";endif; ?>,
            pagination: <?php if($pagination && strtolower($pagination) !== "false"):echo "true";else:echo "false";endif; ?>,
            playPause: <?php if($playPause && strtolower($playPause) !== "false"):echo "true";else:echo "false";endif; ?>,
            pauseOnClick: <?php if($pauseOnClick && strtolower($pauseOnClick) !== "false"):echo "true";else:echo "false";endif; ?>,
            piePosition: '<?php echo $piePosition; ?>',
            portrait: <?php if($portrait && strtolower($portrait) !== "false"):echo "true";else:echo "false";endif; ?>,
            rows: <?php echo $rows; ?>,
            slicedRows: <?php echo $slicedRows; ?>,
            slicedCols: <?php echo $slicedCols; ?>,
            slideOn: '<?php echo $slideOn; ?>',
            thumbnails: <?php if($thumbnails && strtolower($thumbnails) !== "false"):echo "true";else:echo "false";endif; ?>,
            time: <?php echo $time; ?>,
            transPeriod: <?php echo $transPeriod; ?>
            
            });
});