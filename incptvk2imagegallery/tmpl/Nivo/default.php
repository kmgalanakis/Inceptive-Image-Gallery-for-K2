<?php
/**
 * @version		1.0
 * @package		K2 Image Gallery (K2 plugin)
 * @author              Inceptive - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

        $getTemplatePath = K2ImageGalleryHelper::getTemplatePath($this->pluginName,'',$theme);
        $getTemplatePath = $getTemplatePath->http;
    
        $document->addStyleSheet($getTemplatePath.'themes'. DS .'default'. DS .'default.css');
        $document->addStyleSheet($getTemplatePath.'css'. DS .'nivo-slider.css');
        $document->addStyleSheet($getTemplatePath.'css'. DS .'style.css');
    ?>
    
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <?php foreach($images as $key=>$image): ?>
                <img src="<?php echo JURI::root(true).$image; ?>" data-thumb="<?php echo JURI::root(true).$image; ?>" alt="<?php echo $imageTitles[$key]; ?>" title="#htmlcaption_<?php echo $key; ?>"/>
            <?php endforeach; ?>
        </div>
        <?php foreach($images as $key=>$image): ?>
            <div id="htmlcaption_<?php echo $key; ?>" class="nivo-html-caption">
                <a href="#" target=""><strong><?php echo $imageTitles[$key]; ?></strong></a>
                <br /><em><?php echo $imageDescriptions[$key]; ?></em>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
        //$document->addScript($getTemplatePath.'js/jquery-1.7.1.min.js');
        $document->addScript($getTemplatePath.'js/jquery.nivo.slider.js');
        $document->addScript($getTemplatePath.'js/nivo-slider-settings.js.php');
        
        return;
        
        $effect             = 'random';
        $slices             = 15;
        $boxCols            = 8;
        $boxRows            = 4;
        $animSpeed          = 500;
        $pauseTime          = 3000;
        $directionNav       = 'true';
        $directionNavHide   = 'true';
        $controlNav         = 'true';
        $controlNavThumbs   = 'false';
        $pauseOnHover       = 'true';
        $manualAdvance      = 'false';
        $prevText           = 'Prev';
        $nextText           = 'Next';
        $randomStart        = 'false';
    ?>

    <script>
        $(window).load(function() {
            $('#slider').nivoSlider({
                effect: '<?php echo $effect; ?>', // Specify sets like: 'fold,fade,sliceDown'
                slices: <?php echo $slices; ?>, // For slice animations
                boxCols: <?php echo $boxCols; ?>, // For box animations
                boxRows: <?php echo $boxRows; ?>, // For box animations
                animSpeed: <?php echo $animSpeed; ?>, // Slide transition speed
                pauseTime: <?php echo $pauseTime; ?>, // How long each slide will show
                startSlide: <?php echo $pauseOnHover; ?>, // Set starting Slide (0 index)
                directionNav: <?php echo $directionNav; ?>, // Next & Prev navigation
                directionNavHide: <?php echo $directionNavHide; ?>, // Only show on hover
                controlNav: <?php echo $controlNav; ?>, // 1,2,3... navigation
                controlNavThumbs: <?php echo $controlNavThumbs; ?>, // Use thumbnails for Control Nav
                pauseOnHover: <?php echo $pauseOnHover; ?>, // Stop animation while hovering
                manualAdvance: <?php echo $manualAdvance; ?>, // Force manual transitions
                prevText: '<?php echo $prevText; ?>', // Prev directionNav text
                nextText: '<?php echo $nextText; ?>', // Next directionNav text
                randomStart: <?php echo $randomStart; ?>, // Start on a random slide
                beforeChange: function(){}, // Triggers before a slide transition
                afterChange: function(){}, // Triggers after a slide transition
                slideshowEnd: function(){}, // Triggers after all slides have been shown
                lastSlide: function(){}, // Triggers when last slide is shown
                afterLoad: function(){} // Triggers when slider has loaded
            });
        });
    </script>