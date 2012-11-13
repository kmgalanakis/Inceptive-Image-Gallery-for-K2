$K2(document).ready(

    function(event) {

        var number;
        // "Add Image" button click event
        $K2('#addImageButton').click(function(event){
            event.preventDefault();
            var inputs = $K2('input[id*="myK2ImageBrowseServer_"]').last();
            if(inputs.length == 1) {
                number = inputs.attr('id').replace('myK2ImageBrowseServer_','');
                number++;
            }
            else {
                number = 1;
            }
            var image = $K2('#image-list-item').clone().removeAttr('style').attr('id','image_' + number);
            image.find('#imagePlaceholder').attr('id','imagePlaceholder_' + number);
            image.find('#myExistingImageValue').attr('id','myExistingImageValue_'+number);
            image.find('#myK2ImageBrowseServer').attr('id','myK2ImageBrowseServer_'+number);

            //Add the new image holder to the list
            $K2('#sortable-images').prepend(image);

            //Refresh the "Browse server" button
            Refresh_Browse_Server_Click(number);

            number++;
            
            //Unhide the "drag to reorder" button
            $K2('#infobox').removeAttr('style');
            $K2('#imageGalleryParametersBox').removeAttr('style');

        });

        // "Remove Image" buttons click event
        $K2('.removeImageButton').live('click', function(event){
            event.preventDefault();
            $K2(this).parent().parent().remove();
            
            if($K2('ul#sortable-images li').length == 0)
            {
                //Hide the "drag to reorder" button
                $K2('#infobox').attr('style', 'display:none;');
                $K2('#imageGalleryParametersBox').attr('style', 'display:none;');
            }
        });

        $K2('.myK2ImageBrowseServer').click(function(event){
            event.preventDefault();
            var id = $K2(this).before($('input')).attr('id').replace('myK2ImageBrowseServer_','');
            SqueezeBox.initialize();
            SqueezeBox.fromElement(this, {
                    handler: 'iframe',
                    url: K2BasePath+'index.php?option=com_k2&view=media&type=image&tmpl=component&fieldID=myExistingImageValue_'+id,
                    size: {x: 800, y: 450}
            });
        });
        
        //Make image block sortable
        $K2(function() {
		$K2("#images ul").sortable({opacity: 0.6, cursor: 'move'});
	});
        
        //Remove the "Simple Image Gallery Pro missing" notification
        $K2('#k2Tab3 #system-message').remove();
        
        //Show or Hide custom image gallery parameters per K2 item
        $K2("#imageGalleryParameters").change(function() {
            if ($K2(this).val() == "custom") {
                $K2("#customParameters").slideDown("fast"); //Slide Down Effect
            }
            else {
                $K2("#customParameters").slideUp("fast"); //Slide Up Effect
            }
        });
    }
);

function Refresh_Browse_Server_Click(number)
{
    $K2('#myK2ImageBrowseServer_'+number).click(function(event){
        event.preventDefault();
        SqueezeBox.initialize();
        SqueezeBox.fromElement(this, {
                handler: 'iframe',
                url: K2BasePath+'index.php?option=com_k2&view=media&type=image&tmpl=component&fieldID=myExistingImageValue_'+number,
                size: {x: 800, y: 450}
        });
    }); 
}