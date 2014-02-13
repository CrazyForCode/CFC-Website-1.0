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


