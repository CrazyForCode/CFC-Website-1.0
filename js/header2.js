function navLight(con) {
    if (con < 0 || con == 4) {
        con = 4;
        $(".a0").removeClass("DH");
    }
    else {
        var selet = ".a" + (con+1);
        $(selet).removeClass("DH");
    }
    selet = ".a" + con;
    $(selet).addClass("DH");
    con--;
    setTimeout("navLight("+con+")", 2800);
}
$(function () {
    navLight(4);

    //NAV BG
    $("#headers").mouseenter(
       function () {
           $("#headersBG").animate({ height: '150px' });
       }
        );
    $("#headers").mouseleave(
       function () {
           $("#headersBG").animate({ height: '0px' });
       }
        );
    //NAV
    $(".navHover").mouseenter(
       function () {
           $("#headersBG").css("display", "none");
           $("#navs").css("display", "none");
           $("#navOverBG").css("display", "block");
           var navRight;
           var navLev = 60;
          // alert($(this).attr('class'));
           switch ($(this).attr('class')) {
               
               case 'navHover nh0': {
                   navRight = "0px";
                   $("#navOverBar_in").html("<li><a href=''>关于</a></li>");
                   break;
               }
               case 'navHover nh1': {
                   navRight = navLev * 1 + "px";
                   $("#navOverBar_in").html("<li><a href=''>合作机构</a></li><li><a href=''>合作流程</a></li>");
                   break;
               }
               case 'navHover nh2': {
                   navRight = navLev * 2 + "px";
                   $("#navOverBar_in").html("<li><a href=''>团队介绍</a></li><li><a href=''>艺人展示</a></li><li><a href=''>现在报名</a></li>");
                   break;
               }
               case 'navHover nh3': {
                   navRight = navLev * 3 + "px";
                   $("#navOverBar_in").html("<li><a href=''>影视作品</a></li><li><a href=''>平面作品</a></li>");
                   break;
               }
               case 'navHover nh4': {
                   navRight = navLev * 4 + "px";
                   $("#navOverBar_in").html("<li><a href=''>首页</a></li>");
                   break;
               }
           }
           $("#navOverBar").css("right", navRight);
           $("#navOverBar").css("display", "block");
           $("#navOverBar").animate({
               width: '96px',
           }, 300, function () {
               $("#navOverBar_in").css("display", "block");
           });
           
       }
        );
    $("#navOverBar").mouseleave(
       function () {
           $("#navOverBar_in").css("display", "none");
           $("#navOverBar").animate({
               width: '0px',
           }, 300, function () {
               $("#navOverBG").css("display", "none");
               $("#navOverBar").css("display", "none");
               $("#navs").css("display", "block");
               $("#headersBG").css("display", "block");
           });
       }
        );
});

