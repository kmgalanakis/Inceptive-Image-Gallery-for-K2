var $incptvK2 = jQuery.noConflict();

var modalTitle;
var modalDescription;

function cancelModalButton(key) {
    $incptvK2('#myModal' + key).find('#imageTitle' + key).val(modalTitle);
    $incptvK2('#myModal' + key).find('#imageDescription' + key).val(modalDescription);
    $incptvK2('#myModal' + key).modal('hide');
};

function saveModalButton(key) {
    modalTitle = $incptvK2('#myModal' + key).find('#imageTitle' + key).val();
    modalDescription = $incptvK2('#myModal' + key).find('#imageDescription' + key).val();
    $incptvK2('#myModal' + key).modal('hide');
};

function deleteModalButton(key) {
    $incptvK2('#img' + key).remove();
    $incptvK2('#myModal' + key).modal('hide');
    $incptvK2('#myModal' + key).remove();
};

$incptvK2(document).ready(function () {

    $incptvK2('#addImageButton').click(function (event) {
        event.preventDefault();
        var basepath = K2BasePath.replace('/administrator/', '');
        var placeholderImagePath = '/plugins/k2/incptvk2imagegallery/media/placeholder.png';
        var modalPath = '/plugins/k2/incptvk2imagegallery/tmpl/Admin/tmpl/elfinder.php';
        var lastImage = $incptvK2('div[id*="img"]').last();
        var lastImageIndex;
        var newImageIndex = 0;
        if (lastImage.length == 1) {
            lastImageIndex = lastImage.attr('id').replace('img', '');
            newImageIndex = parseInt(lastImageIndex) + 1;
        }

        if(newImageIndex != 0)
        {
            $incptvK2('#myModal' + lastImageIndex).clone().attr("id", "myModal" + newImageIndex).appendTo($incptvK2('#modals'));
            $incptvK2('#myModal' + newImageIndex).find('#imagePath' + lastImageIndex).attr("id", "imagePath" + newImageIndex);
            $incptvK2('#myModal' + newImageIndex).find('#imageDiv' + lastImageIndex).attr("id", "imageDiv" + newImageIndex);
            $incptvK2('#myModal' + newImageIndex).find('#imageTitle' + lastImageIndex).attr("id", "imageTitle" + newImageIndex).val('');
            $incptvK2('#myModal' + newImageIndex).find('#imageDescription' + lastImageIndex).attr("id", "imageDescription" + newImageIndex).val('');
            $incptvK2('#myModal' + newImageIndex).find('.cancelButton').attr('onclick', 'cancelModalButton(' + newImageIndex + ')');
            $incptvK2('#myModal' + newImageIndex).find('.saveButton').attr('onclick', 'saveModalButton(' + newImageIndex + ')');
            $incptvK2('#myModal' + newImageIndex).find('.deleteButton').attr('onclick', 'deleteModalButton(' + newImageIndex + ')');
            $incptvK2('#img' + lastImageIndex).clone().attr("id", "img" + newImageIndex).appendTo($incptvK2('#images'));
            $incptvK2('#img' + newImageIndex).find('.modalPlaceholder').data("target", "#myModal" + newImageIndex);
            $incptvK2('#img' + newImageIndex).find('.modalPlaceholder').attr("data-target", "#myModal" + newImageIndex);
            $incptvK2('#img' + newImageIndex).find('.imagePlaceholder').attr("style", "background: url('" + basepath + placeholderImagePath + "'); background-size: contain;");
            $incptvK2('#imageDiv' + newImageIndex).attr("style", "background: url('" + basepath + placeholderImagePath + "'); background-size: contain;");
            $incptvK2('#imagePath' + newImageIndex).val(placeholderImagePath);
        }
        else
        {
            var thumb = '<div id="img' + newImageIndex + '" class="incptvImageThumb">'+
            '                <div class="modalPlaceholder" data-toggle="modal" data-target="#myModal' + newImageIndex + '" >'+
            '                    <div class="imagePlaceholder" style="background: url(\'' + basepath + placeholderImagePath + '\'); background-size: cover;" >'+
            '                    </div>'+
            '                </div>'+
            '                <a class="btn btn-danger btn-xs deleteSlideButton" onclick="deleteModalButton(' + newImageIndex + ')">'+
            '                    <i class="fa fa-times" aria-hidden="true"></i>'+
            '                </a>'+
            '            </div>';
            $incptvK2('#images').append(thumb);
            
            var modal = '<div class="incptvModal modal fade" id="myModal' + newImageIndex + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel' + newImageIndex + '" aria-hidden="true" style="display: none;">'+
                '<div class="modal-dialog" role="document">'+
                    '<div class="modal-content">'+
                        '<div class="modal-header">'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '<h4 class="modal-title" id="myModalLabel' + newImageIndex + '">Slide</h4>'+
                        '</div>'+
                        '<div class="modal-body">'+
                            '<div class="row">'+
                                '<div id="imageDiv' + newImageIndex + '" class="imageDiv" style="background: url(\'' + basepath + placeholderImagePath + '\'); background-size:cover;" ></div>'+
                                '<input type="hidden" name="plugins[incptvk2imagegalleryImages][]" value="' + placeholderImagePath + '" id="imagePath' + newImageIndex + '"/>'+
                                '<div class="imageInformation">'+
                                    '<div class="k2FLeft k2Right itemAdditionalValue">'+
                                        '<label>' + Joomla.JText._('PLG_K2_IG_IMAGE_TITLE') + '</label>'+
                                    '</div>'+
                                    '<div class="itemAdditionalData">'+
                                        '<input type="text" '+
                                            'name="plugins[incptvk2imagegalleryImageTitles][]"'+ 
                                            'id="imageTitle' + newImageIndex + '"'+
                                            'class="text_area" '+
                                            'value="" />'+
                                    '</div>'+
                                    '<div class="k2FLeft k2Right itemAdditionalValue">'+
                                        '<label>' + Joomla.JText._('PLG_K2_IG_IMAGE_DESCRIPTION') + '</label>'+
                                    '</div>'+
                                    '<div class="itemAdditionalData">'+
                                        '<input type="text" '+
                                        'name="plugins[incptvk2imagegalleryImageDescriptions][]"'+
                                        'id="imageDescription' + newImageIndex + '"'+
                                        'size="50" class="text_area" '+
                                        'value="" />'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+                      
                        '</div>'+
                        '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-primary saveButton" onclick="saveModalButton(' + newImageIndex + ')">Save slide</button>'+
                            '<button type="button" class="btn btn-default cancelButton" onclick="cancelModalButton(' + newImageIndex + ')">Cancel</button>'+
                            '<button type="button" class="btn btn-danger deleteButton" onclick="deleteModalButton(' + newImageIndex + ')">Delete slide</button>'+                            
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
            
            $incptvK2('#modals').append(modal);
        }     
        console.log(basepath + modalPath);
        SqueezeBox.initialize();
        SqueezeBox.fromElement(this, {
            url: basepath + modalPath,
            size: { x: 800, y: 434 }
        });
        // SqueezeBox.fromElement(this, {
        //     handler: 'iframe',
        //     url: K2BasePath + 'index.php?option=com_k2&view=media&type=image&tmpl=component&fieldID=imagePath' + newImageIndex,
        //     size: { x: 800, y: 434 },
        //     onClose: function () {
        //         if ($incptvK2('#imagePath' + newImageIndex).val() !== placeholderImagePath)
        //         {
        //             var selectedImagePath = $incptvK2('#imagePath' + newImageIndex).val();
        //             $incptvK2('#img' + newImageIndex).find('.imagePlaceholder').attr("style", "background: url('" + basepath + selectedImagePath + "'); background-size: cover;");
        //             $incptvK2('#imageDiv' + newImageIndex).attr("style", "background: url('" + basepath + selectedImagePath + "'); background-size: cover;");    
        //         }
        //         else
        //         {
        //             $incptvK2('#myModal' + newImageIndex).remove();
        //             $incptvK2('#img' + newImageIndex).remove();
        //         }                
        //     }
        // });
    });

    $incptvK2("#images").sortable(
        {
            opacity: 0.6,
            cursor: 'move',
            update: function (event, ui) {
                var nextPosition;
                var index = ui.item.attr('id').replace('img', '');
                currPosition = $incptvK2('#myModal' + index);
                if (ui.item.next().attr('id') === undefined) {
                    nextPosition = $incptvK2('#modals div:last');
                    currPosition.insertAfter(nextPosition);
                } else {
                    index = ui.item.next().attr('id').replace('img', '');
                    nextPosition = $incptvK2('#myModal' + index);
                    currPosition.insertBefore(nextPosition);
                }
            }
        }
    );

    $incptvK2('.incptvModal').on('shown.bs.modal', function (e) {
        var id = e.currentTarget.id.replace('myModal', '');
        modalTitle = $incptvK2(e.currentTarget).find('#imageTitle' + id).val();
        modalDescription = $incptvK2(e.currentTarget).find('#imageDescription' + id).val();
    });

});