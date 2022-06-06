var h = document.head;
var l = document.createElement("link"); l.type = "text/css";
l.rel = "stylesheet";
l.href = chatx_server + './assets/css/demo-ui.css';
h.appendChild(l);

window.addEventListener('load', function() {
    var s = "<div class='demo-title'><center><h3>" + title + "</h3></center></div><img class='arrow' src='./assets/img/arrow.png'><span class='demo-desc1'>" + expandChat + "</span><img class='move' width='105' src='./assets/img/move.svg'><div class='containment one'><span class='move-desc'>" + moveChat + "</span></div><img class='resize' width='80' src='./assets/img/resize.svg'><div class='containment two'><span class='resize-desc'>" + resizeChat + "</span></div>";

    document.body.insertAdjacentHTML('beforeend', s);
    a = '.arrow, .demo-desc1, .demo-title h3';
    b = '.move, .resize, .containment.one, .containment.two';

    if(document.querySelector("#chatx").classList.contains("expanded")) {
        for (const e of document.querySelectorAll(a)) {
            e.style.display = 'none';
        }
        for (const e of document.querySelectorAll(b)) {
            e.style.display = 'block';
        }
    }
    document.querySelector(".chxicon-expand").addEventListener('click', function() {
        for (const e of document.querySelectorAll(a)) {
            e.style.display = 'none';
        }        
        for (const e of document.querySelectorAll(b)) {
            e.style.display = 'block';
        }
    });
    document.querySelector(".chxicon-minimize").addEventListener('click', function() {
    //$(".icon-minimize").click(function(){
        for (const e of document.querySelectorAll(a)) {
            e.style.display = 'block';
        }
        for (const e of document.querySelectorAll(b)) {
            e.style.display = 'none';
        }        

    });

});