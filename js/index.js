/**
 * Created by Administrator on 2015/11/17.
 */
/* ï¿½ï¿½Ê¾ï¿½ï¿½ï¿½Ö²ï¿½ */
function showOverlay(id) {
    $(id).height(pageHeight());
    $(id).width(pageWidth());
    $(id).css('display','block');

    // fadeToï¿½ï¿½Ò»ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½Îªï¿½Ù¶È£ï¿½ï¿½Ú¶ï¿½ï¿½ï¿½ÎªÍ¸ï¿½ï¿½ï¿½ï¿½
    // ï¿½ï¿½ï¿½Ø·ï¿½Ê½ï¿½ï¿½ï¿½ï¿½Í¸ï¿½ï¿½ï¿½È£ï¿½ï¿½ï¿½Ö¤ï¿½ï¿½ï¿½ï¿½ï¿½Ô£ï¿½ï¿½ï¿½Ò²ï¿½ï¿½ï¿½ï¿½ï¿½Þ¸ï¿½ï¿½é·³ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½
    $(id).fadeTo(200, 0.5);
}

/* ï¿½ï¿½ï¿½Ø¸ï¿½ï¿½Ç²ï¿½ */
function hideOverlay() {
    $("#screen").fadeOut(200);
}

/* ï¿½ï¿½Ç°Ò³ï¿½ï¿½ß¶ï¿? */
function pageHeight() {
    return document.body.scrollHeight;
}
/* ï¿½ï¿½Ç°Ò³ï¿½ï¿½ï¿½ï¿½ */
function pageWidth() {
    return document.body.scrollWidth;
}
/* ¶¨Î»µ½Ò³ÃæÖÐÐÄ */
function adjust(id) {
    var w = $(id).width();
    var h = $(id).height();
    var t = scrollY() + (windowHeight()/2) - (h/2);
    if(t < 0) t = 0;
    var l = scrollX() + (windowWidth()/2) - (w/2);
    if(l < 0) l = 0;
    $(id).css({left: l+'px', top: t+'px'});
}
//ä¯ÀÀÆ÷ÊÓ¿ÚµÄ¸ß¶È
function windowHeight() {
    var de = document.documentElement;
    return self.innerHeight || (de && de.clientHeight) || document.body.clientHeight;
}
//ä¯ÀÀÆ÷ÊÓ¿ÚµÄ¿í¶È
function windowWidth() {
    var de = document.documentElement;
    return self.innerWidth || (de && de.clientWidth) || document.body.clientWidth
}
/* ä¯ÀÀÆ÷´¹Ö±¹ö¶¯Î»ÖÃ */
function scrollY() {
    var de = document.documentElement;
    return self.pageYOffset || (de && de.scrollTop) || document.body.scrollTop;
}
/* ä¯ÀÀÆ÷Ë®Æ½¹ö¶¯Î»ÖÃ */
function scrollX() {
    var de = document.documentElement;
    return self.pageXOffset || (de && de.scrollLeft) || document.body.scrollLeft;
}
$(function(){
    //´ò¿ªµÇÂ¼½çÃæ
    $('#login').click(function(){
        showOverlay("#screen");
        $("#register").css("display",'block');
        adjust("#register");
    })
    //¹Ø±ÕµÇÂ¼½çÃæ
    $("#register h2 .close ").click(function(){
        $("#register").css("display",'none');
        $("#screen").css('display','none');
    });
})

