// Get contact form and button
/*W3 Schools. (n.d.). How TO - CSS/JS Modal. Retrieved April 22, 2019, from https://www.w3schools.com/howto/howto_css_modals.asp*/
window.onload = function(){
    var contact = document.getElementsByClassName("contact")[0];
    var open = document.getElementById("open");
    var close = document.getElementById("close"); 

    open.onclick = function(){
            contact.style.display = "block";
    }

    close.onclick = function(){
            contact.style.display = "none";
    }

    window.onclick = function(event){
            if(event.target === contact){
                    contact.style.display = "none";
            }
    }

}

