<?php
/**
 * @version		1.3
 * @package		Inceptive Image Gallery for K2(K2 plugin)
 * @author              Inceptive Design Labs - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
    define( '_JEXEC', 1 );
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' ); 
        define( 'DS', DIRECTORY_SEPARATOR );
	
	$jpath_base = realpath(dirname(__FILE__).'/'.'../../../../../..' );
        
	if(file_exists($jpath_base .'/'.'includes')):
		define( 'JPATH_BASE', $jpath_base);
		require_once ( $jpath_base .'/'.'includes'.'/'.'defines.php' );
		require_once ( $jpath_base .'/'.'includes'.'/'.'framework.php' );
	else:
		$jpath_base = realpath(dirname(__FILE__).'/'.'../../../../../../..' );
		define( 'JPATH_BASE', $jpath_base);
		require_once ( $jpath_base .'/'.'includes'.'/'.'defines.php' );
		require_once ( $jpath_base .'/'.'includes'.'/'.'framework.php' );
	endif;

        $mainframe = JFactory::getApplication('site');
	
	jimport( 'joomla.plugin.helper' );
    
	$plugin = JPluginHelper::getPlugin('k2', 'incptvk2imagegallery');
    
	$pluginParams = new JRegistry();
	$pluginParams->loadString($plugin->params, 'JSON');    
	
        $autoplay	= $pluginParams->get('galleriaAutoplay');
	$carousel	= $pluginParams->get('galleriaCarousel');
	$carouselSpeed	= $pluginParams->get('galleriaCarouselSpeed');
	$carouselSteps	= $pluginParams->get('galleriaCarouselSteps');
	$clicknext	= $pluginParams->get('galleriaClickNext');
	$debug	= $pluginParams->get('galleriaDebug');
	$easing	= $pluginParams->get('galleriaEasing');
	$fullscreenCrop	= $pluginParams->get('galleriaFullScreenCrop');
	$fullscreenDoubleTap	= $pluginParams->get('galleriaFullScreenDoubleTap');
	$fullscreenTransition	= $pluginParams->get('galleriaFullScreenTransition');
	$height	= $pluginParams->get('galleriaHeight');
	$idleMode	= $pluginParams->get('galleriaIdleMode');
	$idleTime	= $pluginParams->get('galleriaIdleTime');
	$idleSpeed	= $pluginParams->get('galleriaIdleSpeed');
	$imageCrop	= $pluginParams->get('galleriaImageCrop');
	$imageMargin	= $pluginParams->get('galleriaImageMargin');
	$imagePan	= $pluginParams->get('galleriaImagePan');
	$imagePanSmoothness	= $pluginParams->get('galleriaImagePanSmoothness');
	$imagePosition	= $pluginParams->get('galleriaImagePosition');
	$imageTimeout	= $pluginParams->get('galleriaImageTimeout');
	$initialTransition	= $pluginParams->get('initialTransition');
	$keepSource	= $pluginParams->get('keepSource');
	$layerFollow	= $pluginParams->get('galleriaLayerFollow');
	$lightbox	= $pluginParams->get('galleriaLightbox');
	$lightboxFadeSpeed	= $pluginParams->get('galleriaLightboxFadeSpeed');
	$lightboxTransitionSpeed	= $pluginParams->get('galleriaLightboxTransitionSpeed');
	$maxScaleRatio	= $pluginParams->get('maxScaleRatio');
	$minScaleRatio	= $pluginParams->get('minScaleRatio');
	$overlayBackground	= $pluginParams->get('galleriaOverlayBackground');
	$overlayOpacity	= $pluginParams->get('galleriaOverlayOpacity');
	$pauseOnInteraction	= $pluginParams->get('galleriaPauseOnInteraction');
	$popupLinks	= $pluginParams->get('popupLinks');
	$preload	= $pluginParams->get('galleriaPreload');
	$queue	= $pluginParams->get('galleriaQueue');
	$responsive	= $pluginParams->get('galleriaResponsive');
	$show	= $pluginParams->get('galleriaShowCounter');
	$showCounter	= $pluginParams->get('showCounter');
	$showInfo	= $pluginParams->get('galleriaShowInfo');
	$showImagenav	= $pluginParams->get('galleriaShowImageNav');
	$swipe	= $pluginParams->get('galleriaSwipe');
	$thumbCrop	= $pluginParams->get('thumbCrop');
	$thumbDisplayOrder	= $pluginParams->get('thumbDisplayOrder');
	$thumbMargin	= $pluginParams->get('thumbMargin');
	$thumbnails	= $pluginParams->get('galleriaThumbnails');
	$thumbQuality	= $pluginParams->get('thumbQuality');
	$touchTransition	= $pluginParams->get('touchTransition');
	$transition	= $pluginParams->get('galleriaTransition');
	$transitionSpeed	= $pluginParams->get('galleriaTransitionSpeed');
	$trueFullscreen	= $pluginParams->get('galleriaTrueFullScreen');
	$wait	= $pluginParams->get('wait');
	$width	= $pluginParams->get('width');
	

?>
	Galleria.loadTheme('<?php echo JURI::root(true).'/../themes/classic/galleria.classic.min.js'; ?>');
	
	Galleria.configure({
		autoplay: 	<?php if($autoplay && strtolower($autoplay) !== "false"):if(strtolower($autoplay === 1)):echo $autoplay;else:echo "true";endif;else:echo "false";endif; ?>,
		carousel: 	<?php if($carousel && strtolower($carousel) !== "false"):echo "true";else:echo "false";endif; ?>,
		carouselSpeed: 	<?php echo $carouselSpeed; ?>,
		carouselSteps: 	<?php if(strtolower($carouselSteps) !== "auto"): echo $carouselSteps;else:echo "'".$carouselSteps."'";endif; ?>,
		clicknext: 	<?php if($clicknext && strtolower($clicknext) !== "false"):echo "true";else:echo "false";endif; ?>,
		debug: 	<?php if($debug && strtolower($debug) !== "false"):echo "true";else:echo "false";endif; ?>,
		easing: 	'<?php echo $easing; ?>',
		fullscreenCrop: 	<?php if($fullscreenCrop && strtolower($fullscreenCrop) !== "false"):if(strtolower($fullscreenCrop === 'height') || strtolower($fullscreenCrop === 'width') || strtolower($fullscreenCrop === 'landscape') || strtolower($fullscreenCrop === 'portrait')):echo "'".$fullscreenCrop."'";else:echo "true";endif;else:echo "false";endif; ?>,
		fullscreenDoubleTap: 	<?php if($fullscreenDoubleTap && strtolower($fullscreenDoubleTap) !== "false"):echo "true";else:echo "false";endif; ?>,
		fullscreenTransition: 	'<?php echo $fullscreenTransition; ?>',
		height: 	<?php echo $height; ?>,
		idleMode: 	<?php if($idleMode && strtolower($idleMode) !== "false"):if(strtolower($idleMode === 'hover')):echo "'".$idleMode."'";else:echo "true";endif;else:echo "false";endif; ?>,
		idleTime: 	<?php echo $idleTime; ?>,
		idleSpeed: 	<?php echo $idleSpeed; ?>,
		imageCrop: 	<?php if($imageCrop && strtolower($imageCrop) !== "false"):if(strtolower($imageCrop === 'height') || strtolower($imageCrop === 'width') || strtolower($imageCrop === 'landscape') || strtolower($imageCrop === 'portrait')):echo "'".$imageCrop."'";else:echo "true";endif;else:echo "false";endif; ?>,
		imageMargin: 	<?php echo $imageMargin; ?>,
		imagePan: 	<?php if($imagePan && strtolower($imagePan) !== "false"):echo "true";else:echo "false";endif; ?>,
		imagePanSmoothness: 	<?php echo $imagePanSmoothness; ?>,
		imagePosition: 	<?php /*echo $imagePosition;*/ echo "'center'"; ?>,
		imageTimeout: 	<?php /*echo $imageTimeout;*/ echo '30000'; ?>,
		/*initialTransition: 	<?php echo $initialTransition; ?>,*/
		/*keepSource: 	<?php echo $keepSource; ?>,*/
		layerFollow: 	<?php if($layerFollow && strtolower($layerFollow) !== "false"):echo "true";else:echo "false";endif; ?>,
		lightbox: 	<?php if($lightbox && strtolower($lightbox) !== "false"):echo "true";else:echo "false";endif; ?> ,
		lightboxFadeSpeed: 	<?php echo $lightboxFadeSpeed; ?>,
		lightboxTransitionSpeed: 	<?php echo $lightboxTransitionSpeed; ?>,
		maxScaleRatio: 	<?php /*echo $maxScaleRatio;*/ echo 'undefined'; ?>,
		minScaleRatio: 	<?php /*echo $minScaleRatio;*/ echo 'undefined';?>,
		overlayBackground: 	'<?php echo $overlayBackground; ?>',
		overlayOpacity: 	<?php echo $overlayOpacity; ?>,
		pauseOnInteraction: 	<?php if($pauseOnInteraction && strtolower($pauseOnInteraction) !== "false"):echo "true";else:echo "false";endif; ?>,
		popupLinks: 	<?php /*echo $popupLinks;*/ echo "false"; ?>,
		preload: 	<?php if(strtolower($preload) !== "all"): echo $preload;else:echo "'".$preload."'";endif; ?>,
		queue: 	<?php if($queue && strtolower($queue) !== "false"):echo "true";else:echo "false";endif; ?>,
		responsive: 	<?php if($responsive && strtolower($responsive) !== "false"):echo "true";else:echo "false";endif; ?>,
		show: 	<?php /*echo $show;*/ echo '0' ?>,
		showCounter: 	<?php if($showCounter && strtolower($showCounter) !== "false"):echo "true";else:echo "false";endif; ?>,
		showInfo: 	<?php if($showInfo && strtolower($showInfo) !== "false"):echo "true";else:echo "false";endif; ?>,
		showImagenav: 	<?php if($showImagenav && strtolower($showImagenav) !== "false"):echo "true";else:echo "false";endif; ?>,
		swipe: 	<?php if($swipe && strtolower($swipe) !== "false"):echo "true";else:echo "false";endif; ?>,
		thumbCrop: 	<?php /*echo $thumbCrop;*/ echo "true"; ?>,
		thumbDisplayOrder: 	<?php /*echo $thumbDisplayOrder;*/ echo "true";?>,
		thumbMargin: 	<?php /*echo $thumbMargin;*/ echo "0" ?>,
		thumbnails: 	<?php if($thumbnails && strtolower($thumbnails) !== "false"):echo "true";else:echo "false";endif; ?>,
		thumbQuality: 	<?php /*echo $thumbQuality;*/ echo "true"; ?>,
		touchTransition: 	<?php /*echo $touchTransition;*/ echo "undefined"; ?>,
		transition: 	'<?php echo $transition; ?>',
		transitionSpeed: 	<?php echo $transitionSpeed; ?>,
		trueFullscreen: 	<?php if($trueFullscreen && strtolower($trueFullscreen) !== "false"):echo "true";else:echo "false";endif; ?>,
		wait: 	<?php /*echo $wait;*/ echo "5000"; ?>,
		width:	<?php /*echo $width;*/ echo "'auto'"; ?>
	});

			
	Galleria.run('#galleria');