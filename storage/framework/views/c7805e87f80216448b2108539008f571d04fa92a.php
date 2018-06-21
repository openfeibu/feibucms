<!-- Start dropzone for <?php echo $field; ?> -->
<div class="upload-wraper">
    
<div class="dropzone  dropzone-previews" id="<?php echo $field; ?>">
    
</div>

<script type="text/javascript">
$(function () {
    Dropzone.autoDiscover = false;
    $("div#<?php echo $field; ?>").dropzone({
        url: "<?php echo $url; ?>",
        maxFiles: <?php echo $count; ?>,
        acceptedFiles: "<?php echo e($mime); ?>",
        parallelUploads : 1,
        maxfilesexceeded: function(file) {
            toastr.error('Files exceedes maximum size.', 'Error');
        },
        sending: function(file, xhr, formData) {
            formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
            // Laravel expect the token post value to be named _token by default
        },
        init: function() {
            this.on("success", function(file, response) {
                response['i'] = ++i;
                if(["jpg", "jpeg", "png"].indexOf(response.file.split('.').pop()) >= 0){
                    rendered = Mustache.render(template_image_<?php echo $field; ?>, response);
                } else {
                    rendered = Mustache.render(template_file_<?php echo $field; ?>, response);
                }
                $('#sortable_<?php echo $field; ?>').append(rendered);
                toastr.success('Files uploaded successfully.', 'Success');
            });
        },
        complete: function(file) {
          this.removeFile(file);
        }
    });

    var <?php echo $field; ?>_files = <?php echo json_encode($files); ?>;
    var template_image_<?php echo $field; ?> = $('#template_image_<?php echo $field; ?>').html();
    var template_file_<?php echo $field; ?> = $('#template_file_<?php echo $field; ?>').html();
    Mustache.parse(template_image_<?php echo $field; ?>);
    Mustache.parse(template_file_<?php echo $field; ?>);
    var rendered = '';
    var i = 1;
    $.each(<?php echo $field; ?>_files, function( index, value ) {
        i = index;
        value['i'] = index;

        if(["jpg", "jpeg", "png"].indexOf(value.file.split('.').pop()) >= 0){
            rendered = rendered + Mustache.render(template_image_<?php echo $field; ?>, value);
        } else {
            rendered = rendered + Mustache.render(template_file_<?php echo $field; ?>, value);
        }
    });

    $('#sortable_<?php echo $field; ?>').html(rendered);
    rendered = '';
});
</script>


<!-- End dropzone. -->
<script id="template_file_<?php echo $field; ?>" type="x-tmpl-mustache">
    <div class="file-box" id="image_box_{{i}}">
        <div class="file-container">
            <a href="<?php echo url("/file/download"); ?>/{{path}}" target="_blank" >
                {{file}}
            </a> 
            <a href="#" class="remove-file">
                <i class="fa fa-times"></i>
            </a>
        </div>                
        <input class="form-control" type="hidden" name="<?php echo $field; ?>[{{i}}][folder]" value="{{folder}}">
        <input class="form-control" type="hidden" name="<?php echo $field; ?>[{{i}}][time]" value="{{time}}">
        <input class="form-control" type="hidden" name="<?php echo $field; ?>[{{i}}][path]" value="{{path}}">
        <input class="form-control" type="hidden" name="<?php echo $field; ?>[{{i}}][file]" value="{{file}}">
    </div>
</script>

<!-- End dropzone. -->
<script id="template_image_<?php echo $field; ?>" type="x-tmpl-mustache">
    <div class="img-box" id="image_box_{{i}}">
        <div class="img-container">
            <a href="<?php echo url("/image/original"); ?>/{{path}}" target="_blank" >
                <img src="<?php echo url("/image/xs"); ?>/{{path}}" class="img-responsive" alt="">
            </a>
            <div class="btn-container">
                <a href="#" class="move-image">
                    <i class="fa fa-arrows"></i>
                </a>
                <a href="#" class="edit-image">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="#" class="remove-image">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="edit-wraper" style="display: none">
            <div class="row">
                <div class="col-sm-3">
                    <div id="main-img">
                        <img src="<?php echo url("/image/sm"); ?>/{{path}}" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="<?php echo $field; ?>_{{i}}_title">Title</label>
                        <input type="text" class="form-control" id="<?php echo $field; ?>_{{i}}_title" type="text" name="<?php echo $field; ?>[{{i}}][title]" value="{{caption}}" placeholder="Image Title">
                    </div>
                    <div class="form-group">
                        <label for="<?php echo $field; ?>_{{i}}_caption">Caption</label>
                        <input type="text" class="form-control" id="<?php echo $field; ?>_{{i}}_caption" type="text" name="<?php echo $field; ?>[{{i}}][caption]" value="{{caption}}" placeholder="Image Caption">
                    </div>
                    <div class="form-group">
                        <label for="<?php echo $field; ?>_{{i}}_url">Url</label>
                        <input type="text" class="form-control" id="<?php echo $field; ?>_{{i}}_url" type="text" name="<?php echo $field; ?>[{{i}}][url]" value="{{caption}}" placeholder="Image URL">
                    </div>
                    <div class="form-group">
                        <label for="<?php echo $field; ?>_{{i}}_desc">Description</label>
                        <textarea class="form-control" id="<?php echo $field; ?>_{{i}}_desc" type="text" name="<?php echo $field; ?>[{{i}}][desc]" placeholder="Image Description" rows="5">{{desc}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-success btn-close pull-right" type="submit">Save</button>
                </div>
            </div>

            <input class="form-control" type="hidden" name="<?php echo $field; ?>[{{i}}][folder]" value="{{folder}}">
            <input class="form-control" type="hidden" name="<?php echo $field; ?>[{{i}}][time]" value="{{time}}">
            <input class="form-control" type="hidden" name="<?php echo $field; ?>[{{i}}][path]" value="{{path}}">
            <input class="form-control" type="hidden" name="<?php echo $field; ?>[{{i}}][file]" value="{{file}}">
        </div>                    
    </div>
</script>

    <!-- Start image editor for <?php echo $field; ?> -->
    <?php echo Form::hidden($field)->forceValue('0'); ?>

    <div id="sortable_<?php echo $field; ?>" class="image-editor">

    </div>
</div>
<script type="text/javascript">
$(function () {
    $(document.body).on('click', ".remove-image", function(e){
        $(this).parents('.img-box').remove();
        e.preventDefault();
    });

    $(document.body).on('click', ".remove-file", function(e){
        $(this).parents('.file-box').remove();
        e.preventDefault();
    });

    $(document.body).on('click', ".btn-close", function(e){
        $(this).parents(".edit-wraper").hide();
        e.preventDefault();
    })
    
    $(document.body).on('click', ".edit-image", function(e){
        poff    = $(this).parents('.upload-wraper').offset();
        toff    = $(this).offset();
        mleft    = poff.left - toff.left;
        mtop     = poff.top - toff.top;

        $(this).parents('.img-box').children(".edit-wraper").css('margin-top', mtop-83);
        $(this).parents('.img-box').children(".edit-wraper").css('margin-left', mleft+67);
        $(this).parents('.img-box').children(".edit-wraper").show();
        e.preventDefault();
    });
    var el = document.getElementById('sortable_<?php echo $field; ?>');
    var sortable = Sortable.create(el, {
        handle: ".move-image"
    });

});
</script>
