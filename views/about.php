<h1>About</h1>
<?php 
function isMobileDevice() { 
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
, $_SERVER["HTTP_USER_AGENT"]); 
} 
if(isMobileDevice()){ 
    echo "Mobile Browser Detected<br>".$_SERVER["HTTP_USER_AGENT"]; 
} 
else { 
    echo "Mobile Browser Not Detected<br>".$_SERVER["HTTP_USER_AGENT"]; 
} 
?> 