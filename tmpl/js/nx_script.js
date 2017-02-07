/*

    Script to define the Video Dimensions

*/
var nxplayersArray=[];

var nxvideobox = (function(){
    jQuery('div.nx-videobox-container').each(function(){
        var videocontainer = jQuery(this);
        var videoframe = jQuery(this).children('iframe');
        //videoframe.hide();

        var videocontainerwidth = videocontainer.width();
        var videoheight = videocontainerwidth/1.777778;
        jQuery(this).css('min-height',videoheight);
        var videoframe = jQuery(this).children();
        videoframe.attr('height',videoheight);
        videoframe.attr('width',videocontainerwidth);
        videoframe.fadeIn('slow');
    });
});
            
jQuery(window).resize(nxvideobox);

function onYouTubePlayerAPIReady() {
    
    for(var i = 0; i< nxplayersArray.length; i++){
        nxplayersArray[i]();
    }      
    nxvideobox();
}