/**
 * Created by Tu TV on 03/9/2015.
 */

jQuery(document).ready(function ($) {
    jQuery('body').on('click', '#save', function () {
        jQuery(document).bind('ajaxComplete', function (e, f, g) {
            if (g.url && g.url.indexOf('admin-ajax') >=0 ) {
                var save = jQuery('#save');
                if (save.val() != 'Saved') {
                    alert(save_customize_failed);
                }
            }
        });
    });
});