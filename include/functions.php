<?php

$host = "http://localhost/ACCOUNTING";
define("host",$host);
define("path", "D:/xampp/htdocs/Accounting/");


function getAbsoluteUrl($pageUrl,$imgSrc)
{
    $imgInfo = parse_url($imgSrc);
    if (! empty($imgInfo['host'])) {
        //img src is already an absolute URL
        return $imgSrc;
    }
    else {
        $urlInfo = parse_url($pageUrl);
        $base = $urlInfo['scheme'].'://'.$urlInfo['host'];
        if (substr($imgSrc,0,1) == '/') {
            //img src is relative from the root URL
            return $base . $imgSrc;
        }
        else {
            //img src is relative from the current directory
               return 
                    $base
                    . substr($urlInfo['path'],0,strrpos($urlInfo['path'],'/'))
                    . '/' . $imgSrc;
        }
    }
}
//url as a absolute path
function url($url){
    echo '"'.host.$url.'"';
}

function urlreturn($url){
    return host.$url;
}


function editImage($url,$option){
    $imgHost = "https://res.cloudinary.com/krishantha/image/upload/";
    $s = "https://res.cloudinary.com/krishantha/image/upload/w_200,c_fill,ar_1:1,g_face/";
    if($option == "s"){
        return str_replace($imgHost,$s,$url);
    } else return $url;
}