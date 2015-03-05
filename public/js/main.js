var dummyEmpty=function(){   
};

jQuery(document).ready(function($){
   var feuserName=jQuery('#feuserName').val();
    var feuserIcon=jQuery('#feuserIcon').val();
    var baseurl=jQuery('#baseurl').val()+'/';
    
    jQuery('.audiogallery').each(function(index,element){
       var playerid=jQuery(element).attr('id');
       
       
       var settings_ap = {
        disable_volume: 'on'
                ,cue:'on'
                ,autoplay:'off'
                ,disable_volume: 'off'
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
        'settings_php_handler':'http://der-rote-faden.ephemeroid.net/filecomments/switch/'
        };
        dzsag_init('#'+playerid,{
        'transition':'fade'
        ,'autoplay' : 'off'
        ,'settings_ap':settings_ap
        });
   });
   
   
   jQuery('.comments-holder').on('click', '.delete', function(e) {
       var commentUid=jQuery(this).attr("id").split('_')[1];
       jQuery(this).parent().parent().remove();
       ajaxIt('filecomments','delete','uid='+commentUid,dummyEmpty);
       
   });
   
   jQuery('.comments-holder').on('click', '.update', function(e) {
       var commentUid=jQuery(this).attr("id").split('_')[1];
	   var hashtagsEl=jQuery(this).parent().find('.the-comment-author');	   
           
	   var commentEl=jQuery(this).parent().find('.the-comment-comment');
       jQuery('#hashtag-update-input').val(hashtagsEl.html());
	   jQuery('#comment-update-input').val(commentEl.html());
	   jQuery('#comments-updater').removeClass('hidden');
	   jQuery('.submit-up-comment').click(function(e){
		   e.preventDefault();
		   var newHashtag=jQuery('#hashtag-update-input').val();
		   var newComment=jQuery('#comment-update-input').val();
		   jQuery(hashtagsEl).html(newHashtag);
		   jQuery(commentEl).html(newComment);
		   ajaxIt('filecomments','update','uid='+commentUid+'&hashtags='+newHashtag+'&comment='+newComment,dummyEmpty);		   
		   
		   jQuery('#comments-updater').addClass('hidden');
	   });
       jQuery('.cancel-up-comment').click(function(e){
		   jQuery('#comments-updater').addClass('hidden');
	   });
       
   });
   
   
   var ajaxIt=function(controller,action,formdata,successhandler){
            jQuery.ajax({
                    url: jQuery('#baseurl').val()+controller+'/'+action,
                    cache: false,
                    async: true,
                    data: formdata,   
                    type: 'POST',
                    success: function(data) {
                            
                            successhandler(data);
                    },
                    error: function(e){			
            
                            }
                    });

    };
    
});
