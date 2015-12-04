var quotes = [
    "quote1",
    "quote2",
    "quote3"
];

var i = -1;

setInterval(function() {
    $("#textslide").fadeOut(2000);
    var delay = 3000;
    setTimeout(function() {
        i++;
        $("#textslide").html(quotes[i]);
        $("#textslide").fadeIn(2000);
        if (i == quotes.length-1) {
            i = -1;
        }
    }, delay);   
}, 6 * 1000);