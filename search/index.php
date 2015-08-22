<?php
// echo basename($_SERVER["QUERY_STRING"]);
$str = file_get_contents("http://yelp.com/search?".basename($_SERVER["QUERY_STRING"]));
$file = preg_replace ( '@class="biz-name" href="\/biz\/([\w\-]*)\?osq=\w*"@' , 'class="biz-name" href="../biz/?q=${1}"' , $str);

$appendedJavascript = '

var x;
function getLocation() {
    if (navigator.geolocation) {
        x = navigator.geolocation.getCurrentPosition(showPosition);
    } else {
       alert("position not supported in this browser");
    }
}
function showPosition(position) {
    alert(position.coords.latitude + " "  + position.coords.longitude) 
}

function GetPrice(start_lat,start_long,product_id,end_long,end_lat)
{
$.ajax({
  url: "http://uber-api-erthr.c9.io/api.php?action=get_prices&user_longitude="+start_lat+"&user_latitude="+start_long+"&destination_longitude="+end_long+"&destination_latitude="+end_lat+"&product_id="+product_id,
  success:function(data){console.log(data);}
})
}

function GetCoords()
{
    $.each($("address"), function(){
    tagged =  $(this).html();
    var regex = /(<([^>]+)>)/ig;
    result = tagged.replace(regex, " ");
    result = result.replace(/" "/, " ");
    $.ajax({
  url: "http://uber-api-erthr.c9.io/api.php?action=get_prices&user_longitude=-77.037684&user_latitude=38.898748&destination_longitude="+result,
  success:function(data){console.log(data);}
})
    
});
}
</script>';

$file = substr_replace($file, $appendedJavascript, strrpos (  $file , '</script>'), 9);

echo $file;