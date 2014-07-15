(function(){
    var sTop=64;    //profileBg top 值
    var CW;     //content的宽度
     function addOverListener(E){      //鼠标移上去的监听
         function doOver(){
             this.setAttribute('do',1);
             var tt=this;
             var eAllDiv=this.getElementsByTagName('div');
             var img=this.getElementsByTagName('img');
             var doNow;
             for (var i=0; i<eAllDiv.length; i++){
                 if (eAllDiv[i].getAttribute('class') == 'profileBg') {
                     var top = 100;
                     doNow=i;
                     if (eAllDiv[doNow].style.top) top = parseInt(eAllDiv[doNow].style.top.split('%')[0]);
                        //document.getElementById('A').innerHTML = "TOP:" + top + "";
                     var t=setInterval(function(){
                         eAllDiv[doNow].style.top = top + '%';
                         //document.getElementById('B').innerHTML ="in:"+top+"";
                         //层移
                         //img[0].style.height=(top+(100-top)/2)+'%';
                         img[0].style.top=-(100-top)/4+"%";

                         top-=2;
                        if (top<sTop || tt.getAttribute('do')!=1) {
                            clearInterval(t);
                        }
                     }, 2);
                     /**放大**/
                     //$(img[0]).animate({top:'-20%',left:'-20%',width:'120%',height:'120%'},200);

                 }
             }

         }

         function doOut(){
             this.setAttribute('do',0);
             var tt=this;
             var eAllDiv=this.getElementsByTagName('div');
             var img=this.getElementsByTagName('img');
             var doNow;
             for (var i=0; i<eAllDiv.length; i++){
                 if (eAllDiv[i].getAttribute('class') == 'profileBg') {
                     var top = sTop;
                     doNow=i;
                     if (eAllDiv[doNow].style.top)  top=parseInt(eAllDiv[doNow].style.top.split('%')[0]);
                     var t=setInterval(function(){
                         eAllDiv[doNow].style.top = top + '%';
                         //层移还原
                         img[0].style.top=-(100-top)/4+'%';
                         //img[0].style.height=(top+(100-top)/2)+'%';

                         top+=2;
                         if (top>100 || tt.getAttribute('do')!=0) {
                             clearInterval(t);
                         }
                     }, 2);
                     //$(img[0]).animate({ top: '0%', left: '0%', width: '100%', height: '100%' },200);
                 }
             }
         }

         var EAllDiv= E.getElementsByTagName('div');
         for (var i=0; i<EAllDiv.length; i++)
         {
             if (EAllDiv[i].getAttribute('class')=='divfirst'){
                 if (EAllDiv[i].addEventListener) {
                     EAllDiv[i].addEventListener("mouseover",doOver, false);
                     EAllDiv[i].addEventListener("mouseleave",doOut, false);
                 } else{
                     EAllDiv[i].attachEvent("onmouseover", doOver);
                     EAllDiv[i].attachEvent("onmouseleave", doOut);
                 }
             }
         }
     }

    function Common(){
    return {
        getScrollLeft: function(){
            if(document.all) return (document.documentElement.scrollLeft) ? document.documentElement.scrollLeft : document.body.scrollLeft;
            else return window.pageXOffset;
        },
        getWindowWidth: function(){
            if (window.innerWidth)	return window.innerWidth;
            if(document.documentElement && document.documentElement.clientWidth) return document.documentElement.clientWidth;
        },
        getDocumentWidth: function(){
            if (document.width) return document.width;
            if(document.body.offsetWidth) return document.body.offsetWidth;
        }
      }
    }
     function doScroll(e){                    //滚动效果
         var tt=this;
         var value;
         var tag=document.getElementsByTagName('body')[0];
         var scrollLeft=Common().getScrollLeft();
         e=e || window.event;
         if(e.wheelDelta){//IE/Opera/Chrome
            value= e.wheelDelta;
         }else if(e.detail){//Firefox
            value= e.detail;
         }

         var t=setInterval(function(){
             var flag=1;
             var l=Common().getScrollLeft();
             if (value>0){
             window.scrollTo(Common().getScrollLeft()-10,0);
             } else window.scrollTo(Common().getScrollLeft()+10,0);
             if (Common().getScrollLeft()-l==0) flag=0;

            if (Math.abs(Common().getScrollLeft()-scrollLeft)>200 || flag==0){
                clearInterval(t);
            }
         },2);
     }

     function controlScroll(){
         if (window.addEventListener) {
             window.addEventListener("DOMMouseScroll", doScroll, false);
         } else document.attachEvent("onmousewheel", doScroll);
         window.onmousewheel=doScroll;
     }

     function controlContent(){
         var contentTag = document.getElementById('CFCcontent');
        var contentAllDiv=contentTag.getElementsByTagName('div');
        var contentWidth=0;
        for (var i=0; i<contentAllDiv.length; i++) {
           var E=contentAllDiv[i];
           switch (E.getAttribute('class')) {
               case 'entireDiv':contentWidth+=500; addOverListener(E); break;
               case 'halfDiv':contentWidth+=450; addOverListener(E); break;
               case 'threeDiv': contentWidth+=400; addOverListener(E); break;
           }
        contentTag.style.width=contentWidth+'px';
        CW=contentWidth;
        }
     }

     window.onload=function(){
            controlContent();
            controlScroll();
     }
})(window,document);

