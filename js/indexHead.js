function NAVhover(obj) {
    var nodes = obj.childNodes;
    for (var i = 0; i < obj.childNodes.length; i++) {
        if (nodes[i].className == "NAVhover") {
            obj = nodes[i];
            break;
        }
    }
     obj.style.display = "block";
}
function NAVout(obj) {
    var nodes = obj.childNodes;
    for (var i = 0; i < obj.childNodes.length; i++) {
        if (nodes[i].className == "NAVhover") {
            obj = nodes[i];
            break;
        }
    }
    obj.style.display = "none";
}


$(function () {
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
});

