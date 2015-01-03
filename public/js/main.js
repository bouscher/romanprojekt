jQuery(document).ready(function($){
   var feuserName=jQuery('#feuserName').val();
    var feuserIcon=jQuery('#feuserIcon').val();
    
    jQuery('.audiogallery').each(function(index,element){
       var playerid=jQuery(element).attr('id');
       
       console.log(feuserName);
       var settings_ap = {
        disable_volume: 'on'
                ,cue:'on'
                ,autoplay:'off'
                ,disable_scrub: 'default'
                ,design_skin: 'skin-wave'
                ,skinwave_dynamicwaves:'on'
                ,skinwave_enableSpectrum:'off'
                ,settings_backup_type:'full'
                ,settings_useflashplayer:'auto'
                ,skinwave_spectrummultiplier: '4'
                ,skinwave_comments_playerid:playerid
                ,skinwave_comments_enable:'on'
                ,skinwave_comments_account:feuserName
                ,skinwave_comments_retrievefromajax:"on"
                ,skinwave_comments_avatar:feuserIcon
                ,playfrom:'0',
        'settings_php_handler':'filecomments/switch/'
        };
        dzsag_init('#'+playerid,{
        'transition':'fade'
        ,'autoplay' : 'off'
        ,'settings_ap':settings_ap
        });
   });
    
});
