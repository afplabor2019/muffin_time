var zipInput = $("#zip");
var cityInput = $("#city");
var url = "getCity.php?zip=";
var params = "";
zipInput.bind("change paste keyup", function(e) {
    params = zipInput.val();
    $.get(url, {zip: params}).done(function(data){
        cityInput.val(data);
    })
});