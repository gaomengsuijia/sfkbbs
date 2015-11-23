/**
 * Created by Administrator on 2015/11/17.
 */
/* ��ʾ���ֲ� */
function showOverlay(id) {
    $(id).height(pageHeight());
    $(id).width(pageWidth());
    $(id).css('display','block');

    // fadeTo��һ������Ϊ�ٶȣ��ڶ���Ϊ͸����
    // ���ط�ʽ����͸���ȣ���֤�����ԣ���Ҳ�����޸��鷳������
    $(id).fadeTo(200, 0.5);
}

/* ���ظ��ǲ� */
function hideOverlay() {
    $("#screen").fadeOut(200);
}

/* ��ǰҳ��߶�? */
function pageHeight() {
	//获取滚动条的滚动高度
	var scrollH=$(document).scrollTop();
    return document.body.scrollHeight+scrollH;
}
/* ��ǰҳ���� */
function pageWidth() {
    return document.body.scrollWidth;
}
/* ��λ��ҳ������ */
function adjust(id) {
    var w = $(id).width();
    var h = $(id).height();
    var t = scrollY() + (windowHeight()/2) - (h/2);
    if(t < 0) t = 0;
    var l = scrollX() + (windowWidth()/2) - (w/2);
    if(l < 0) l = 0;
    $(id).css({left: l+'px', top: t+'px'});
}
//������ӿڵĸ߶�
function windowHeight() {
    var de = document.documentElement;
    return self.innerHeight || (de && de.clientHeight) || document.body.clientHeight;
}
//������ӿڵĿ��
function windowWidth() {
    var de = document.documentElement;
    return self.innerWidth || (de && de.clientWidth) || document.body.clientWidth
}
/* �������ֱ����λ�� */
function scrollY() {
    var de = document.documentElement;
    return self.pageYOffset || (de && de.scrollTop) || document.body.scrollTop;
}
/* �����ˮƽ����λ�� */
function scrollX() {
    var de = document.documentElement;
    return self.pageXOffset || (de && de.scrollLeft) || document.body.scrollLeft;
}
$(function(){
    //�򿪵�¼����
    $('#login').click(function(){
        showOverlay("#screen");
        $("#login_div").css("display",'block');
        adjust("#login_div");
    })
    
    //�رյ�¼����
    $(".login h2 .close ").click(function(){
    	$("#login_div").css("display",'none');
        $("#screen").css('display','none');
    });
})

