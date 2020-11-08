$(document).ready(function(){

    $.getJSON("runway_events.php", function(data, status){

        alert("Data: " + data + "\nStatus: " + status);
        console.log(data)
        
    })
  
})