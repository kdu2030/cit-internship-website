/*How TO - Filter/Search Table. (n.d.). Retrieved April 24, 2019, from https://www.w3schools.com/howto/howto_js_filter_table.asp*/

function search(){
    var searchbox = document.getElementById("search");
    var input = searchbox.value.toUpperCase();
    var users = document.getElementById("userlist");
    var card = document.getElementsByClassName("card");
    var paragraph, txtValue;
    
    for(i = 0; i < card.length; i++){
       paragraph = card[i].getElementsByTagName("p")[0];
       if(paragraph){
           txtValue = paragraph.textContent || paragraph.innerText;
           if(txtValue.toUpperCase().indexOf(input) > -1){
               card[i].style.display = "";
           }
           else{
               card[i].style.display = "none";
           }
       }
    }
}
