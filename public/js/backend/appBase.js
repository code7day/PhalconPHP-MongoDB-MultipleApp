jQuery(function(){
    jQuery.ajaxSetup({type:'post'})
    jQuery('form').validationEngine('attach');
})