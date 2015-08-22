<?php
// echo basename($_SERVER["QUERY_STRING"]);
// echo "http://yelp.com/biz/".$_REQUEST["q"];
print file_get_contents("http://yelp.com/biz/".$_REQUEST["q"]);
