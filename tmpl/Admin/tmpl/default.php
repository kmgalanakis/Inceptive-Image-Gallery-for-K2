<div class="row">
	<a class="btn btn-success" id="addImageButton">
		<i class="fa fa-plus" aria-hidden="true"></i> <?php echo JText::_('PLG_K2_IG_ADD_IMAGE'); ?>
	</a>
</div>

<div class="row">
	<div id="images">        
        <?php
            foreach($images as $key => $image):
        ?>
            <div id="img<?php echo $key; ?>" class="incptvImageThumb">
                <div class="modalPlaceholder" data-toggle="modal" data-target="#myModal<?php echo $key; ?>" >                    
                    <div class="imagePlaceholder" style="background: url('<?php echo JURI::root(true).$image; ?>'); background-size: cover;" >
                    </div>
                </div>
                <a class="btn btn-danger btn-xs deleteSlideButton" onclick="deleteModalButton(<?php echo $key; ?>)">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        <?php
            endforeach;
        ?>
	</div>
    <div id="modals">
        <?php
            foreach($images as $key => $image):
        ?>
            <div class="incptvModal modal fade" id="myModal<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $key; ?>" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel<?php echo $key; ?>">Slide</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div id="imageDiv<?php echo $key; ?>" class="imageDiv" style="background: url('<?php echo JURI::root(true).$image; ?>'); background-size:cover;" ></div>
                                <input type="hidden" name="plugins[<?php echo $this->pluginName;?>Images][]" value="<?php echo $image; ?>" id="imagePath<?php echo $key; ?>"/>
                                <div class="imageInformation">
                                    <div class="k2FLeft k2Right itemAdditionalValue">
                                        <label><?php echo JText::_('PLG_K2_IG_IMAGE_TITLE'); ?></label>
                                    </div>
                                    <div class="itemAdditionalData">
                                        <input type="text" 
                                            name="plugins[<?php echo $this->pluginName;?>ImageTitles][]" 
                                            id="imageTitle<?php echo $key; ?>"
                                            class="text_area" 
                                            value="<?php echo (isset($imageTitles[$key])) ? $imageTitles[$key]: ""; ?>" />
                                    </div>
                                    <div class="k2FLeft k2Right itemAdditionalValue">
                                        <label><?php echo JText::_('PLG_K2_IG_IMAGE_DESCRIPTION'); ?></label>
                                    </div>
                                    <div class="itemAdditionalData">
                                        <input type="text" 
                                        name="plugins[<?php echo $this->pluginName;?>ImageDescriptions][]"
                                        id="imageDescription<?php echo $key; ?>"
                                        size="50" class="text_area" 
                                        value="<?php echo (isset($imageDescriptions[$key])) ? $imageDescriptions[$key]: ""; ?>" />
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary saveButton" onclick="saveModalButton(<?php echo $key; ?>)">Save slide</button>
                            <button type="button" class="btn btn-default cancelButton" onclick="cancelModalButton(<?php echo $key; ?>)">Cancel</button>
                            <button type="button" class="btn btn-danger deleteButton" onclick="deleteModalButton(<?php echo $key; ?>)">Delete slide</button>                            
                        </div>
                    </div>
                </div>
            </div>
        <?php
            endforeach;
        ?>
    </div>
</div>