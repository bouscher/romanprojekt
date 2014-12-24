jQuery(document).ready(function($){
    
   var settings_ap = {
        disable_volume: 'off'
        ,disable_scrub:'default'
        ,design_skin: 'skin-wave'
        ,skinwave_dynamicwaves:'on',        
        'settings_php_handler':'romanprojekt/public/'
        };
        dzsag_init('.audiogallery',{
        'transition':'fade'
        ,'autoplay' : 'off'
        ,'settings_ap':settings_ap
   }); 
});
