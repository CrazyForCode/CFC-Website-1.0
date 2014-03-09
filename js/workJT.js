(function(){
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

     window.onload=function(){
            
         controlScroll();
         newImg = imgLight();
     }
})(window, document);




/****/
    var $ = function (i) {
        return document.getElementById(i);
    }
//取得滚动值 
function getWheelValue(e) {
    //alert('ff');
    e = e || event;
    return (e.wheelDelta ? e.wheelDelta / 120 : -(e.detail % 3 == 0 ? e.detail / 3 : e.detail));
}
function stopEvent(e) {
    e = e || event;
    if (e.preventDefault) e.preventDefault();
    e.returnValue = false;
}
//绑定事件,这里对mousewheel做了判断,注册时统一使用mousewheel 
function addEvent(obj, type, fn) {
    var isFirefox = typeof document.body.style.MozUserSelect != 'undefined';
    if (obj.addEventListener)
        obj.addEventListener(isFirefox ? 'DOMMouseScroll' : type, fn, false);
    else
        obj.attachEvent('on' + type, fn);
    return fn;
}
//移除事件,这里对mousewheel做了兼容,移除时统一使用mousewheel 
function delEvent(obj, type, fn) {
    var isFirefox = typeof document.body.style.MozUserSelect != 'undefined';
    if (obj.removeEventListener)
        obj.removeEventListener(isFirefox ? 'DOMMouseScroll' : type, fn, false);
    else
        obj.detachEvent('on' + type, fn);
}
/*限制范围函数, 
参数是三个数字,如果num 大于 max, 则返回max， 如果小于min，则返回min,如果在max和min之间，则返回num 
*/
function range(num, max, min) {
    return Math.min(max, Math.max(num, min));
}
var slider = document.getElementsByClassName('slider');
/* <h2>鼠标滚动控制滑块移动</h2> */
//alert(slider.length);
for (var i = 0; i < slider.length; i++) {

    addEvent(slider[i], 'mousewheel', function (e) {
        stopEvent(e);
        var delta = getWheelValue(e);

        var tar = this.childNodes[3];
        var img = this.childNodes[1].childNodes[1];
        //alert(this.childNodes[1].childNodes[1].className);

        //杯具的反转，因为tar.offsetTop 越大，滑块就越往下，所以delta又需要反转回来，向上是负的，向下是正的，所以乘以-1 
        tar.style.top = range(tar.offsetTop + (-1 * delta * 10), 400, 0) + 'px';
        img.style.top = -range(tar.offsetTop + (-1 * delta * 10), 400, 0) + 'px';

    }


         );
}

    function imgLight() {
        var text = document.getElementsByClassName('one');

        for (var i = 0; i < text.length; i++) {

            var oThis = text[i];
            oThis.onmouseover = function () {

                this.childNodes[1].style.display = "block"
                oView(this.childNodes[1]);
            }
            oThis.onmouseleave = function () {

                oClose(this.childNodes[1]);
            }
        }
    }



this.oView = function (Obj) {
    var iMain = Obj;
    var iSpeed = 1;
    var timer = null;
    iMain.onmouseout = function () { oClose(this); }
    timer = setInterval(function () {
        iMain.style.filter = 'alpha(opacity=' + iSpeed + ')';
        iMain.style.opacity = iSpeed / 100;
        iSpeed += 1;
        if (iSpeed >= 60) { clearInterval(timer); }
    }, 1);
}

this.oClose = function (Obj) {
    var oMain = Obj;
    var oSpeed = 60;
    var otimer = null;
    otimer = setInterval(function () {
        oMain.style.filter = 'alpha(opacity=' + oSpeed + ')';
        oMain.style.opacity = oSpeed / 100;
        oSpeed -= 1;
        if (oSpeed <= 0) { clearInterval(otimer); oMain.style.display = "none"; };
    }, 1);
}


