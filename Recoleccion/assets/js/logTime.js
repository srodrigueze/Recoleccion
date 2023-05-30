var url = "http://localhost/recoleccion/";

var timeoutID;
function resetTimer(){
    clearTimeout(timeoutID);
    timeoutID = setTimeout(doInactive,300000);
}

function doInactive(){
    location.href= url+"login.html";
}

window.onload = resetTimer;
window.onmousemove = resetTimer;
window.onmousedown = resetTimer;
window.ontouchstart = resetTimer;
window.onclick = resetTimer;
window.onkeypress = resetTimer;
window.addEventListener = resetTimer;