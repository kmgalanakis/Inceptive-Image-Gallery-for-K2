<?php 

@include_once JPATH_COMPONENT_ADMINISTRATOR.DS.'lib'.DS.'elfinder'.DS.'elFinderConnector.class.php';
@include_once JPATH_COMPONENT_ADMINISTRATOR.DS.'lib'.DS.'elfinder'.DS.'elFinder.class.php';
@include_once JPATH_COMPONENT_ADMINISTRATOR.DS.'lib'.DS.'elfinder'.DS.'elFinderVolumeDriver.class.php';
@include_once JPATH_COMPONENT_ADMINISTRATOR.DS.'lib'.DS.'elfinder'.DS.'elFinderVolumeLocalFileSystem.class.php';

$jpath_base = realpath(dirname(__FILE__).'/'.'../../../../../..' );


        
	if(file_exists($jpath_base .'/'.'includes')):
		define( 'JPATH_BASE', $jpath_base);
        echo $jpath_base;
		require_once ( $jpath_base .'/'.'includes'.'/'.'defines.php' );
		require_once ( $jpath_base .'/'.'includes'.'/'.'framework.php' );
	else:
		$jpath_base = realpath(dirname(__FILE__).'/'.'../../../../../../..' );
		define( 'JPATH_BASE', $jpath_base);
		require_once ( $jpath_base .'/'.'includes'.'/'.'defines.php' );
		require_once ( $jpath_base .'/'.'includes'.'/'.'framework.php' );
	endif;

    $mainframe = JFactory::getApplication('site');

?>
<script type="text/javascript">
	$K2(document).ready(function() {
		var basePath = '<?php echo JURI::root(true); ?>';
		var elf = $K2('#elfinderIG').elfinder({
			url : '<?php echo JURI::base(true); ?>/index.php?option=com_k2&view=media&task=connector',
			onlyMimes: ['image'],
			commandsOptions : {
				// configure value for "getFileCallback" used for editor integration
				getfile : {
					// allow to return multiple files info
					multiple : true
				}
			},
			getFileCallback : function(path) {
				console.log('hello');
			}
		}).elfinder('instance');
	});
</script>
<div id="elfinderIG"></div>