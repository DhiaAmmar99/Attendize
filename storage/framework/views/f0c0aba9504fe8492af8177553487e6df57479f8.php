<?php echo Html::script('vendor/simplemde/dist/simplemde.min.js'); ?>

<?php echo Html::style('vendor/simplemde/dist/simplemde.min.css'); ?>


<script>
    $(function() {
        try {
            $(".geocomplete").geocomplete({
                    details: "form.gf",
                    types: ["geocode", "establishment"]
                }).bind("geocode:result", function(event, result) {
                    console.log(result);
            }, 1000);

        } catch (e) {
            console.log(e);
        }

        $('.editable').each(function() {
            var simplemde = new SimpleMDE({
                element: this,
                spellChecker: false,
                status: false
            });
            simplemde.render();
        })

        $("#DatePicker").remove();
        var $div = $("<div>", {id: "DatePicker"});
        $("body").append($div);
        $div.DateTimePicker({
            dateTimeFormat: window.Attendize.DateTimeFormat,
            dateSeparator: window.Attendize.DateSeparator
        });

    });


    /*        JS group checkbox        */
    
    jQuery('.btn-success').click(function() {
    if ((jQuery("#program").is(':checked')) || (jQuery("#Social_events").is(':checked')) || (jQuery("#Gala_dinner").is(':checked')) || (jQuery("#workshops").is(':checked'))) {
        jQuery(`#event_error`).text("");
        jQuery(".event_type").css("color", "#6f6f6f", "!important");
            
    } else {
        jQuery("#event_error").text("Please check event.");
        jQuery(".event_type").css("color", "#ED5466", "!important");
    }
});

    /*        JS group select         */
jQuery("#programSelect, #socialSelect, #dinnerSelect, #workshopsSelect").hide();
jQuery('#program').click(function() {
    if(this.checked) {
        jQuery("#programSelect").show();
     }else{
        jQuery("#programSelect").hide();
     }
});
jQuery('#Social_events').click(function() {
    if(this.checked) {
        jQuery("#socialSelect").show();
     }else{
        jQuery("#socialSelect").hide();
     }
});
jQuery('#Gala_dinner').click(function() {
    if(this.checked) {
        jQuery("#dinnerSelect").show();
     }else{
        jQuery("#dinnerSelect").hide();
     }
});
jQuery('#workshops').click(function() {
    if(this.checked) {
        jQuery("#workshopsSelect").show();
     }else{
        jQuery("#workshopsSelect").hide();
     }
});
</script>
<style>
    .editor-toolbar {
        border-radius: 0 !important;
    }
    .CodeMirror, .CodeMirror-scroll {
        min-height: 100px !important;
    }

    .create_organiser, .address-manual {
        padding: 10px;
        border: 1px solid #ddd;
        margin-top: 10px;
        margin-bottom: 10px;
        background-color: #FAFAFA;
    }

    .in-form-link {
        display: block; padding: 5px;margin-bottom: 5px;padding-left: 0;
    }
</style>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Partials/EventCreateAndEditJS.blade.php ENDPATH**/ ?>