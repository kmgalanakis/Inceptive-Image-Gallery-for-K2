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

    $plugin =   JPluginHelper::getPlugin('k2', 'incptvk2imagegallery');

    $pluginParams = new JRegistry();
    $pluginParams->loadString($plugin->params, 'JSON');
	
    $effect             = $pluginParams->get('nivoEffect');
    $slices             = $pluginParams->get('nivoSlices');
    $boxCols            = $pluginParams->get('nivoBoxCols');
    $boxRows            = $pluginParams->get('nivoBoxRows');
    $animSpeed          = $pluginParams->get('nivoAnimSpeed');
    $pauseTime          = $pluginParams->get('nivoPauseTime');
    $directionNav       = $pluginParams->get('nivoDirectionNav');
    $directionNavHide   = $pluginParams->get('nivoDirectionNavHide');
    $controlNav         = $pluginParams->get('nivoControlNav');
    $controlNavThumbs   = $pluginParams->get('nivoControlNavThumbs');
    $pauseOnHover       = $pluginParams->get('nivoPauseOnHover');
    $manualAdvance      = $pluginParams->get('nivoManualAdvance');
    $prevText           = $pluginParams->get('nivoPrevText');
    $nextText           = $pluginParams->get('nivoNextText');
    $randomStart        = $pluginParams->get('nivoRandomStart');
?>

var $incptvK2 = jQuery.noConflict();
$incptvK2(window).load(function() {
    $incptvK2('#slider').nivoSlider({
        effect: '<?php echo $effect; ?>', // Specify sets like: 'fold,fade,sliceDown'
        slices: <?php echo $slices; ?>, // For slice animations
        boxCols: <?php echo $boxCols; ?>, // For box animations
        boxRows: <?php echo $boxRows; ?>, // For box animations
        animSpeed: <?php echo $animSpeed; ?>, // Slide transition speed
        pauseTime: <?php echo $pauseTime; ?>, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: <?php if($directionNav && strtolower($directionNav) !== "false"):echo "true";else:echo "false";endif; ?>, // Next & Prev navigation
        
        controlNav: <?php if($controlNav && strtolower($controlNav) !== "false"):echo "true";else:echo "false";endif; ?>, // 1,2,3... navigation
        controlNavThumbs: <?php if($controlNavThumbs && strtolower($controlNavThumbs) !== "false"):echo "true";else:echo "false";endif; ?>, // Use thumbnails for Control Nav
        pauseOnHover: <?php if($pauseOnHover && strtolower($pauseOnHover) !== "false"):echo "true";else:echo "false";endif; ?>, // Stop animation while hovering
        manualAdvance: <?php if($manualAdvance && strtolower($manualAdvance) !== "false"):echo "true";else:echo "false";endif; ?>, // Force manual transitions
        prevText: '<?php echo $prevText; ?>', // Prev directionNav text
        nextText: '<?php echo $nextText; ?>', // Next directionNav text
        randomStart: <?php if($randomStart && strtolower($randomStart) !== "false"):echo "true";else:echo "false";endif; ?>, // Start on a random slide
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});