(function () {
    /****/
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
    function Init() {
        var slider = document.getElementsByClassName('slider');
        /* <h2>鼠标滚动控制滑块移动</h2> */
        //alert(slider.length);
        for (var i = 0; i < slider.length; i++) {

            addEvent(slider[i], 'mousewheel', function (e) {
                stopEvent(e);
                var delta = getWheelValue(e);
                var tar = this.childNodes[3];
                var imgList = this.childNodes[1].childNodes[1];
                //alert(this.childNodes[1].childNodes[1].className);
                //杯具的反转，因为tar.offsetTop 越大，滑块就越往下，所以delta又需要反转回来，向上是负的，向下是正的，所以乘以-1 
                var numLv = parseInt(imgList.offsetHeight * (10 / (slider[0].offsetHeight - 45)));
                tar.style.top = range(tar.offsetTop + (-1 * delta * 10), slider[0].offsetHeight - 45, 0) + 'px';
                imgList.style.top = -range(-imgList.offsetTop + (-1 * delta * numLv), imgList.offsetHeight - slider[0].offsetHeight - 10, 0) + 'px';
            }
                 );
            /*slider[i].onmouseover = function (e) {
               // var seletlv = (this.offsetLeft-500)/280;
                    document.body.scrollLeft += 280;
            }*/
        }
    }
    function controlContent() {
        var contentTag = document.getElementById('CFCcontent');
        var contentAllDiv = contentTag.getElementsByTagName('div');
        var contentWidth = 0;
        for (var i = 0; i < contentAllDiv.length; i++) {
            var E = contentAllDiv[i];
            switch (E.getAttribute('class')) {
                case 'imLOGO': contentWidth += 500;  break;
                case 'slider': contentWidth += 280;break;
            }
            contentTag.style.width = contentWidth + 'px';
            
        }
        Init();
    }
    function BDScrollTo(pos, t, f) {
        if (document.body.scrollLeft <= 0 || document.body.scrollLeft>=document.body.offsetWidth) return false;
        if (f>0 && document.body.scrollLeft < pos) {
            window.scrollTo(document.body.scrollLeft+10*f*t, 0);
            setTimeout(function () { BDScrollTo(pos,++t, f); },100);
        }
        if (f < 0 && document.body.scrollLeft > pos) {
            window.scrollTo(document.body.scrollLeft + 10 * f * t, 0);
            setTimeout(function () { BDScrollTo(pos, ++t, f); }, 100);
        }
    }
     window.onload=function(){
         var MouseRight = document.getElementById("MouseRight");
         var MouseLeft = document.getElementById("MouseLeft");
         MouseRight.onmouseover = function (e) {
             //document.body.scrollLeft += 280;
             this.style.backgroundColor = "#000000";
             window.scrollTo(document.body.scrollLeft + 280, 0);
             //BDScrollTo(document.body.scrollLeft + 280, 0, 2);
         };
         MouseRight.onmouseleave = function (e) {
             this.style.backgroundColor = "transparent";
         };
         MouseLeft.onmouseover = function (e) {
             //document.body.scrollLeft += 280;
             this.style.backgroundColor = "#000000";
             window.scrollTo(document.body.scrollLeft - 280, 0);
             //BDScrollTo(document.body.scrollLeft - 280, 0, -2);
         };
         MouseLeft.onmouseleave = function (e) {
             this.style.backgroundColor = "transparent";
         };

         controlContent();
         
     }
})(window, document);







