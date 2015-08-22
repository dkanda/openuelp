<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once('./yelp/yelp_api_wrapper.php');
require_once('api.php');
$authCode = $_COOKIE['kanda-hack-app'];
if(!isset($authCode))
{
    header("Location: http://uber-api-erthr.c9.io/redir.php");
}
else
{
    $authCode = $_COOKIE['kanda-hack-app'];
}
$term = isset( $_REQUEST['term'])?  $_REQUEST['term'] : "taxi";
$loc = isset( $_REQUEST['loc'])?  $_REQUEST['loc'] : "182 Howard Street, San Francisco, CA 94105";
$locateme = isset( $_REQUEST['pickup'])?  $_REQUEST['pickup'] : "";
$getLocation = false;

if($loc == "182 Howard Street, San Francisco, CA 94105" || $loc == "")
{
    $getLocation = true;
    $loc = "182 Howard Street, San Francisco, CA 94105";
}
elseif($loc == "")
{
    $loc = $_COOKIE['uber-location-address'];

}
?>
<html class="js">
    <head>
        <style type="text/css">
            #myInput		{
              width:150px;
              -webkit-transition:width 0.3s ease-in-out;
            }
            #myInput:focus	{
              width:150px;
              -webkit-transition:width 0.5s ease-in-out;
            }
            .gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style>
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <style type="text/css">@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}</style>
        <style type="text/css">.gm-style{font-family:Roboto,Arial,sans-serif;font-size:11px;font-weight:400;text-decoration:none}</style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
        window.yPageStart = new Date().getTime();
</script>
<link rel="stylesheet" href="slider-tabs/styles/jquery.sliderTabs.min.css">
<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script-->
<script src="slider-tabs/jquery.sliderTabs.min.js"></script>
    <title>
            <?php echo $term; ?> | Open Uelp
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="en">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="pnotify/pnotify.custom.min.js"></script>

    
        <link rel="canonical" href="http://www.yelp.com/search?find_desc=food&amp;find_loc=Laguna+Niguel%2C+CA%2C+USA">
    <link rel="stylesheet" type="text/css" media="all" href="http://s3-media3.fl.yelpassets.com/assets/2/mobile/css/3d77461f5f7c/mobile-pkg.css">
    <link rel="stylesheet" type="text/css" media="all" href="pnotify/pnotify.custom.min.css">


            <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">


        <link rel="apple-touch-icon" sizes="152x152" href="http://s3-media3.fl.yelpassets.com/assets/2/mobile/img/c0103fc5afec/mobile/homescreen_ipad_retina.png">
    <link rel="apple-touch-icon" sizes="120x120" href="http://s3-media4.fl.yelpassets.com/assets/2/mobile/img/b06b797be45f/mobile/homescreen_iphone_retina.png">
    <link rel="apple-touch-icon" sizes="76x76" href="http://s3-media1.fl.yelpassets.com/assets/2/mobile/img/92be110d2af0/mobile/homescreen_ipad.png">
    <link rel="apple-touch-icon" href="http://s3-media2.fl.yelpassets.com/assets/2/mobile/img/e0c5dde90469/mobile/homescreen_iphone.png">

    <link rel="icon" sizes="192x192" href="http://s3-media4.fl.yelpassets.com/assets/2/mobile/img/fa42a5ca2686/mobile/homescreen_android.png">


    <meta name="description" content="Reviews on food in Laguna Niguel   Baja Fish Tacos, Deemer’s American Grill, Tastes Of Greece, Ebi Sushi &amp; Grill, China Moon, Bella Roma, Chick fil A, In N Out Burger, Ball Park Pizza, Jizake Sushi Restaurant">

    <meta name="format-detection" content="telephone=no address=no">

    <meta name="msapplication-tap-highlight" content="no">


<script type="text/javascript">
        (function(H){H.className=H.className.replace(/\bno-js\b/,'js');})(document.documentElement);


</script>
    <script>
            (function() {
                var main = null;

                var main=function(){function c(n,j){var o;j=j||{};this.trackingClick=false;this.trackingClickStart=0;this.targetElement=null;this.touchStartX=0;this.touchStartY=0;this.lastTouchIdentifier=0;this.touchBoundary=j.touchBoundary||10;this.layer=n;this.tapDelay=j.tapDelay||200;if(c.notNeeded(n)){return}function p(l,i){return function(){return l.apply(i,arguments)}}var h=["onMouse","onClick","onTouchStart","onTouchMove","onTouchEnd","onTouchCancel"];var m=this;for(var k=0,g=h.length;k<g;k++){m[h[k]]=p(m[h[k]],m)
}if(b){n.addEventListener("mouseover",this.onMouse,true);n.addEventListener("mousedown",this.onMouse,true);n.addEventListener("mouseup",this.onMouse,true)}n.addEventListener("click",this.onClick,true);n.addEventListener("touchstart",this.onTouchStart,false);n.addEventListener("touchmove",this.onTouchMove,false);n.addEventListener("touchend",this.onTouchEnd,false);n.addEventListener("touchcancel",this.onTouchCancel,false);if(!Event.prototype.stopImmediatePropagation){n.removeEventListener=function(l,r,i){var q=Node.prototype.removeEventListener;
if(l==="click"){q.call(n,l,r.hijacked||r,i)}else{q.call(n,l,r,i)}};n.addEventListener=function(q,r,l){var i=Node.prototype.addEventListener;if(q==="click"){i.call(n,q,r.hijacked||(r.hijacked=function(s){if(!s.propagationStopped){r(s)}}),l)}else{i.call(n,q,r,l)}}}if(typeof n.onclick==="function"){o=n.onclick;n.addEventListener("click",function(i){o(i)},false);n.onclick=null}}var b=navigator.userAgent.indexOf("Android")>0;var f=/iP(ad|hone|od)/.test(navigator.userAgent);var d=f&&(/OS 4_\d(_\d)?/).test(navigator.userAgent);
var e=f&&(/OS ([6-9]|\d{2})_\d/).test(navigator.userAgent);var a=navigator.userAgent.indexOf("BB10")>0;c.prototype.needsClick=function(g){switch(g.nodeName.toLowerCase()){case"button":case"select":case"textarea":if(g.disabled){return true}break;case"input":if((f&&g.type==="file")||g.disabled){return true}break;case"label":case"video":return true}return(/\bneedsclick\b/).test(g.className)};c.prototype.needsFocus=function(g){switch(g.nodeName.toLowerCase()){case"textarea":return true;case"select":return !b;
case"input":switch(g.type){case"button":case"checkbox":case"file":case"image":case"radio":case"submit":return false}return !g.disabled&&!g.readOnly;default:return(/\bneedsfocus\b/).test(g.className)}};c.prototype.sendClick=function(h,i){var g,j;if(document.activeElement&&document.activeElement!==h){document.activeElement.blur()}j=i.changedTouches[0];g=document.createEvent("MouseEvents");g.initMouseEvent(this.determineEventType(h),true,true,window,1,j.screenX,j.screenY,j.clientX,j.clientY,false,false,false,false,0,null);
g.forwardedTouchEvent=true;h.dispatchEvent(g)};c.prototype.determineEventType=function(g){if(b&&g.tagName.toLowerCase()==="select"){return"mousedown"}return"click"};c.prototype.focus=function(g){var h;if(f&&g.setSelectionRange&&g.type.indexOf("date")!==0&&g.type!=="time"){h=g.value.length;g.setSelectionRange(h,h)}else{g.focus()}};c.prototype.updateScrollParent=function(h){var i,g;i=h.fastClickScrollParent;if(!i||!i.contains(h)){g=h;do{if(g.scrollHeight>g.offsetHeight){i=g;h.fastClickScrollParent=g;
break}g=g.parentElement}while(g)}if(i){i.fastClickLastScrollTop=i.scrollTop}};c.prototype.getTargetElementFromEventTarget=function(g){if(g.nodeType===Node.TEXT_NODE){return g.parentNode}return g};c.prototype.onTouchStart=function(i){var g,j,h;if(i.targetTouches.length>1){return true}g=this.getTargetElementFromEventTarget(i.target);j=i.targetTouches[0];if(f){h=window.getSelection();if(h.rangeCount&&!h.isCollapsed){return true}if(!d){if(j.identifier&&j.identifier===this.lastTouchIdentifier){i.preventDefault();
return false}this.lastTouchIdentifier=j.identifier;this.updateScrollParent(g)}}this.trackingClick=true;this.trackingClickStart=i.timeStamp;this.targetElement=g;this.touchStartX=j.pageX;this.touchStartY=j.pageY;if((i.timeStamp-this.lastClickTime)<this.tapDelay){i.preventDefault()}return true};c.prototype.touchHasMoved=function(g){var i=g.changedTouches[0],h=this.touchBoundary;if(Math.abs(i.pageX-this.touchStartX)>h||Math.abs(i.pageY-this.touchStartY)>h){return true}return false};c.prototype.onTouchMove=function(g){if(!this.trackingClick){return true
}if(this.targetElement!==this.getTargetElementFromEventTarget(g.target)||this.touchHasMoved(g)){this.trackingClick=false;this.targetElement=null}return true};c.prototype.findControl=function(g){if(g.control!==undefined){return g.control}if(g.htmlFor){return document.getElementById(g.htmlFor)}return g.querySelector("button, input:not([type=hidden]), keygen, meter, output, progress, select, textarea")};c.prototype.onTouchEnd=function(i){var k,j,h,m,l,g=this.targetElement;if(!this.trackingClick){return true
}if((i.timeStamp-this.lastClickTime)<this.tapDelay){this.cancelNextClick=true;return true}this.cancelNextClick=false;this.lastClickTime=i.timeStamp;j=this.trackingClickStart;this.trackingClick=false;this.trackingClickStart=0;if(e){l=i.changedTouches[0];g=document.elementFromPoint(l.pageX-window.pageXOffset,l.pageY-window.pageYOffset)||g;g.fastClickScrollParent=this.targetElement.fastClickScrollParent}h=g.tagName.toLowerCase();if(h==="label"){k=this.findControl(g);if(k){this.focus(g);if(b){return false
}g=k}}else{if(this.needsFocus(g)){if((i.timeStamp-j)>100||(f&&window.top!==window&&h==="input")){this.targetElement=null;return false}this.focus(g);this.sendClick(g,i);if(!f||h!=="select"){this.targetElement=null;i.preventDefault()}return false}}if(f&&!d){m=g.fastClickScrollParent;if(m&&m.fastClickLastScrollTop!==m.scrollTop){return true}}if(!this.needsClick(g)){i.preventDefault();this.sendClick(g,i)}return false};c.prototype.onTouchCancel=function(){this.trackingClick=false;this.targetElement=null
};c.prototype.onMouse=function(g){if(!this.targetElement){return true}if(g.forwardedTouchEvent){return true}if(!g.cancelable){return true}if(!this.needsClick(this.targetElement)||this.cancelNextClick){if(g.stopImmediatePropagation){g.stopImmediatePropagation()}else{g.propagationStopped=true}g.stopPropagation();g.preventDefault();return false}return true};c.prototype.onClick=function(g){var h;if(this.trackingClick){this.targetElement=null;this.trackingClick=false;return true}if(g.target.type==="submit"&&g.detail===0){return true
}h=this.onMouse(g);if(!h){this.targetElement=null}return h};c.prototype.destroy=function(){var g=this.layer;if(b){g.removeEventListener("mouseover",this.onMouse,true);g.removeEventListener("mousedown",this.onMouse,true);g.removeEventListener("mouseup",this.onMouse,true)}g.removeEventListener("click",this.onClick,true);g.removeEventListener("touchstart",this.onTouchStart,false);g.removeEventListener("touchmove",this.onTouchMove,false);g.removeEventListener("touchend",this.onTouchEnd,false);g.removeEventListener("touchcancel",this.onTouchCancel,false)
};c.notNeeded=function(h){var g;var j;var i;if(typeof window.ontouchstart==="undefined"){return true}j=+(/Chrome\/([0-9]+)/.exec(navigator.userAgent)||[,0])[1];if(j){if(b){g=document.querySelector("meta[name=viewport]");if(g){if(g.content.indexOf("user-scalable=no")!==-1){return true}if(j>31&&document.documentElement.scrollWidth<=window.outerWidth){return true}}}else{return true}}if(a){i=navigator.userAgent.match(/Version\/([0-9]*)\.([0-9]*)/);if(i[1]>=10&&i[2]>=3){g=document.querySelector("meta[name=viewport]");
if(g){if(g.content.indexOf("user-scalable=no")!==-1){return true}if(document.documentElement.scrollWidth<=window.outerWidth){return true}}}}if(h.style.msTouchAction==="none"){return true}return false};c.attach=function(h,g){return new c(h,g)};if(typeof define=="function"&&typeof define.amd=="object"&&define.amd){define(function(){return c})}else{if(typeof module!=="undefined"&&module.exports){module.exports=c.attach;module.exports.FastClick=c}else{window.FastClick=c}}};

                if (main === null) {
                    throw 'invalid inline script, missing main declaration.';
                }
                main();
            })();
    </script>
</head>

<body class="android country-us has-fixed-search-bar">

<script type="text/javascript">
        (function(hash){
            if (hash && hash.match('state')) {
                var body = document.getElementsByTagName('body')[0];
                body.className = body.className + ' app-loading';
            }
        })(document.location.hash);


</script>
<?php
$authCode = $_COOKIE['kanda-hack-app'];
if(!isset($authCode))
{
    $authURL = getAuthURL();
    header("Location: $authURL");
    echo "maybe you should sign into <a href='$authURL'>Uber</a>";
}
else
{
    $authCode = $_COOKIE['kanda-hack-app'];
}
?>

    <div id="wrap" class="flex-container-column" style="min-height: 640px;">
                <div id="search-bar" class="search-bar webview-hidden collapsed">
    <div class="flex-container masthead js-fast search-form">
        <a class="logo-icon logo page-link" href="http://yelp.com">
            <img src="uelp1.png" height="35px">
            <span class="offscreen">Yelp</span>
        </a>
        <p>
<form class="form-inline" method="GET" action="/">
  <div class="container-fluid"> 
      <div class="row">
      <input type="text" style="float:left" name="term" class="form-control input-lg" value="<?php echo $term; ?>" id="myInput" placeholder="Food">
  <input type="hidden" id="loc" name="loc" value=""/>
  <!--button type="submit" class="btn btn-default">Go</button-->
  </div></div>
  
 </form>
</p>
    </div>
    
    </div>
    

    <div data-title="<?php echo $term; ?>
" class="page-content flex-box search flex-container-column no-top-space list-tab-visible" data-component-bound="true">
            


        <div id="main-status-message" class="stick-alert status-message hidden" data-component-bound="true">
        <div class="stick-alert-story message-container">
            
        </div>
    </div>
                    <div class="tab-controls" id="view-tab-controls" data-component-bound="true">
                                <div class="tab-control-group">
                                        <a href="#" onclick="javascript:RequestRandom()" class="control-btn js-fast button dark-grey non-toggleable" data-control-action="filter-list">Go to a random place on this page</a>
                        
                                </div>

                        <!--div class="tab-control-group right">
                                <a href="#" class="control-btn js-fast button dark-grey depressed" data-control-action="list-tab">UberX</a>
                                <a href="#" class="control-btn js-fast button dark-grey map-view-btn" data-control-action="map-tab">UberXL</a>
                                <a href="#" class="control-btn js-fast button dark-grey map-view-btn" data-control-action="map-tab">UberBlack</a>
                                <a href="#" class="control-btn js-fast button dark-grey map-view-btn" data-control-action="map-tab">UberTAXI</a>
                        </div-->
    </div>

            <div class="tab-controls" id="filter-tab-controls" data-component-bound="true">
        <div class="tab-control-group">
                <a href="#" class="control-btn js-fast button dark-grey non-toggleable" data-control-action="cancel">Cancel</a>

        </div>

        <div class="tab-control-group right">
                <a href="#" class="control-btn js-fast button dark-grey non-toggleable" data-control-action="filter-submit">Search</a>

        </div>
    </div>


        <div class="all-results flex-container-column flex-box">
            
    <div class="active-filters hidden">
    </div>
 <div class="list-tab flex-box">
 <ol>
<content>

   
   
</content>


    </ol>
            </div>

                <div class="map-tab flex-box">
        <div class="map-container absolute-fill" data-component-bound="true">
            <div class="engine-container absolute-fill" style="overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);" data-component-bound="true"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -177px; top: -278px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -177px; top: -22px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -177px; top: -278px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -177px; top: -22px;"></div></div></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: -100px; top: 74px; z-index: 999999;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: -64px; top: -240px; z-index: 999998;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -32px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: -65px; top: 62px; z-index: 999997;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -64px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: 31px; top: -58px; z-index: 999996;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -96px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: -97px; top: 46px; z-index: 999995;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -128px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: 37px; top: -65px; z-index: 999994;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -160px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: 65px; top: -140px; z-index: 999993;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -192px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: -62px; top: -215px; z-index: 999992;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -224px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: -98px; top: 56px; z-index: 999991;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -256px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 24px; height: 32px; overflow: hidden; position: absolute; left: -80px; top: 44px; z-index: 999990;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: -288px; width: 48px; height: 320px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -177px; top: -22px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i13!2i1417!3i3285!2m3!1e0!2sm!3i298000000!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmYscy50OjJ8cy5lOmx8cC52Om9mZixzLnQ6MjB8cC52Om9mZg!4e0!5m1!5f2" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -177px; top: -278px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i13!2i1417!3i3284!2m3!1e0!2sm!3i298000000!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmYscy50OjJ8cy5lOmx8cC52Om9mZixzLnQ6MjB8cC52Om9mZg!4e0!5m1!5f2" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: -108px; top: 66px; z-index: 999999;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: -72px; top: -248px; z-index: 999998;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: -73px; top: 54px; z-index: 999997;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: 23px; top: -66px; z-index: 999996;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: -105px; top: 38px; z-index: 999995;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: 29px; top: -73px; z-index: 999994;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: 57px; top: -148px; z-index: 999993;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: -70px; top: -223px; z-index: 999992;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: -106px; top: 48px; z-index: 999991;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gmnoprint" title="" style="width: 40px; height: 48px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: -88px; top: 36px; z-index: 999990;"><img src="//media2.fl.yelpassets.com/mapmarkers/yelp_map_range/20150122/1/10.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 40px; height: 48px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="http://maps.google.com/maps?ll=33.538236,-117.699108&amp;z=13&amp;t=m&amp;hl=en&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 62px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google_white2_hdpi.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 0px; bottom: 0px; width: 12px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span style="display: none;"></span></div></div></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 0px; height: 0px; position: absolute; left: 5px; top: 5px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;"></div><div style="width: 19.5px; height: 19.5px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -3px; top: -504px; width: 88.5px; height: 738px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><img src="http://maps.gstatic.com/mapfiles/transparent.png" draggable="false" style="width: 35.5px; height: 35.5px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; position: absolute; right: 4px; top: 4px; z-index: 10001; cursor: pointer;"></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);"></div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; position: absolute; -webkit-user-select: none; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a href="http://www.google.com/intl/en_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div class="gmnoprint" draggable="false" controlwidth="40" controlheight="79" style="margin: 5px; -webkit-user-select: none; position: absolute; left: 0px; top: 0px;"><div class="gmnoprint" controlwidth="40" controlheight="79" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: absolute; left: 0px; top: 0px;"><div style="display: none; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAgCAYAAADEx4LTAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOwwAADsMBx2+oZAAAALRJREFUOMvtkk0KwjAQRic1ghR3ehHP4BVEj+lS3HVZ68JzuKg/1dgaW8dvNHUhQosggnTgMTPJSxhIFD1CgS4YgB7ogAzEYAWOgEtRhFEQBFNjTMwIydLLOug7jzQYhuFiZm3B2TnnNMvvWfooWs5l33nkg/F2b8zBWH5ll5xS7E/E0+5Ei1Tbzwt6E1rm96TwXFEnPF1WzNX2hzJ97eZ/n/laQ6771I3cyD+Sn/95vblUyje+KGSRfCpbOwAAAABJRU5ErkJggg==);"></div><div style="display: none; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAgCAYAAADEx4LTAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOwwAADsMBx2+oZAAAAUlJREFUOMu1UktOwzAQnUxctwlNSCtQpCLBAZA4AwjY0R0XANaop4B7IMGKPYJTcAq23KAeZuwkKrW9QBaWXt7M+OV5/EFwIzu/eTq6un97Xa7ev5arDxKWXOoyT0SAElzcPh+XdftZNdV1u9hfHBy2ICy51C/vXk4yHiLOdVE/7s7q2XxvDsXOFPSktCy51Hn+QXQi1pjr02lT818TUIKxY8nrpoEMR2dWxx/FK1RaBCNtkSs9xGqsgedL0YkY7Q5RMXLOkBk7zm29G4h9RJABb9jCGMe2xhjUQ8SzBJ1I4o5tsC02XDRs6SEqjsAXG17aOO7R5wGxicIT04bjb/dU5zU7xOC3Yc82DP9S+Frd7W30S66e1rN123Lu88DbQDBr8iD1wGmYKPw2Aq6De/oGI0hr4z83+IeeqXu7ISQeHcXhiQv6jqIfP+zRDZOs2ojUAAAAAElFTkSuQmCC);"></div><div style="display: none; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAASCAYAAAC9+TVUAAAAOElEQVQ4y2P4//8/A6WYgeaG6Hm2/4fhUUPINARZA7F4EBvyHwtA04ANjKYTMnMxRiAOTFFALAYAE5RaixpJh0cAAAAASUVORK5CYII=);"></div><div style="display: none; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAASCAYAAAC9+TVUAAAAPklEQVQ4y2P4//8/A6WYgaqGGPq3Y+D/SACH/KghhAz5Tx4YrIYA/fgfHaOFCTb50XRCjiFoAUlUYhvY8gQAM1wGsIOii6kAAAAASUVORK5CYII=);"></div><div title="Zoom in" style="border-width: 5px; position: relative; margin: 0px; padding: 0px; width: 30px; height: 30px; -webkit-border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAgCAYAAADEx4LTAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOwwAADsMBx2+oZAAAALRJREFUOMvtkk0KwjAQRic1ghR3ehHP4BVEj+lS3HVZ68JzuKg/1dgaW8dvNHUhQosggnTgMTPJSxhIFD1CgS4YgB7ogAzEYAWOgEtRhFEQBFNjTMwIydLLOug7jzQYhuFiZm3B2TnnNMvvWfooWs5l33nkg/F2b8zBWH5ll5xS7E/E0+5Ei1Tbzwt6E1rm96TwXFEnPF1WzNX2hzJ97eZ/n/laQ6771I3cyD+Sn/95vblUyje+KGSRfCpbOwAAAABJRU5ErkJggg==) 5 fill;"><div style="width: 100%; height: 100%; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAASCAYAAAC9+TVUAAAAOElEQVQ4y2P4//8/A6WYgeaG6Hm2/4fhUUPINARZA7F4EBvyHwtA04ANjKYTMnMxRiAOTFFALAYAE5RaixpJh0cAAAAASUVORK5CYII=); background-position: 50% 50%; background-repeat: no-repeat;"></div></div><div style="display: none; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAjCAYAAABCU/B9AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOwwAADsMBx2+oZAAAAMdJREFUOI1jYoCCsze+/seFYWqYgFgAiCPFhVgZcGGQPEgdEwMJYFTxqOIBVPz/P25MoWI8mJ7OGHUzmSb/+/3n9zdspv758+cHSB6mGMT4cv3qpSPYTL129eIhkDxIHUjxHyB+GOZnOe/0yUMbfvz4/gFkCogG8UHiQO4jkDqQ4l9A/AKIb8SHuyww0uDP0FJgiwLRID5IHIifg9SBFP8F4k9A/ASIrwDxVSR8BSoOkv/LBPXHbyD+CDUBZOVDKP0cKg6S/w8AZhAEn5vcfRcAAAAASUVORK5CYII=);"></div><div style="display: none; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAjCAYAAABCU/B9AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOwwAADsMBx2+oZAAAAVRJREFUOI21k7FKA0EQhtc1OYw2Cj5CerW0srSwsbWx82m0UQI2PoNNsBIMwUIEbU4r06iFVxkwhoTksjvOH/bkyO4EjtOFj2Fmf/7d2ZvTitf24SXozAEypZnV9bUV2tyq1yWwD51WbkVLyyLZ+hVXo5qIJ9aViognVgtaZlZsLYl4YiISCThbEV/MDhLl7lzsGv/mbNhBotw7m0mqiI/M9hCRoy42CKd8/IMGjQk+G+q+syGR4DVMgPAXNO7ovKud41xsREOzERzRIg2Gmsso50zCLNPs5yayfXRNbjPPtE40yMQ2HfXvNY2Dz4Z6Ovq+gw7iSdK5Pa7SsLdoh+zGMzIdT6OQo/7x0j6BDuJxfHP2+Nw+3zeDpBWZz26NugoROepPrcYDdBBjrHqvcTO+vjg4umrs7TRPdzcQkaOOfeggRrv4Hb6YhHln3lxMXD3lJukHEsWEqzelDiQAAAAASUVORK5CYII=);"></div><div style="display: none; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAASCAYAAAC9+TVUAAAAJklEQVQ4y2P4//8/A6WYYdSQoWCInmf7f1LxIDbkP3lgNJ2MDEMARXp4i4nQinYAAAAASUVORK5CYII=);"></div><div style="display: none; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAASCAYAAAC9+TVUAAAAJUlEQVQ4y2P4//8/A6WYYdSQIWIIOWCwGmLo3/6fVDyaTkaMIQA+c6zmC6HM1QAAAABJRU5ErkJggg==);"></div><div title="Zoom out" style="border-width: 5px; position: relative; margin: -1px 0px 0px; padding: 0px; width: 30px; height: 30px; -webkit-border-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAjCAYAAABCU/B9AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOwwAADsMBx2+oZAAAAMdJREFUOI1jYoCCsze+/seFYWqYgFgAiCPFhVgZcGGQPEgdEwMJYFTxqOIBVPz/P25MoWI8mJ7OGHUzmSb/+/3n9zdspv758+cHSB6mGMT4cv3qpSPYTL129eIhkDxIHUjxHyB+GOZnOe/0yUMbfvz4/gFkCogG8UHiQO4jkDqQ4l9A/AKIb8SHuyww0uDP0FJgiwLRID5IHIifg9SBFP8F4k9A/ASIrwDxVSR8BSoOkv/LBPXHbyD+CDUBZOVDKP0cKg6S/w8AZhAEn5vcfRcAAAAASUVORK5CYII=) 5 fill;"><div style="width: 100%; height: 100%; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAASCAYAAAC9+TVUAAAAJklEQVQ4y2P4//8/A6WYYdSQoWCInmf7f1LxIDbkP3lgNJ2MDEMARXp4i4nQinYAAAAASUVORK5CYII=); background-position: 50% 50%; background-repeat: no-repeat;"></div></div></div></div></div></div>
        </div>
        <div class="redo-overlay" data-component-bound="true">
            <button class="button default large redo-btn">
                Redo Search in Map
            </button>
        </div>
    </div>

                <form class="filter-list flex-container-column flex-box" id="filter-list" action="/" method="GET" data-component-bound="true">
        <div class="inner flex-box">
            <fieldset data-field-type="radio" data-field-required="true">
                <legend>Sort by</legend>

                <div class="wrap clearfix set-2">
                        <label onclick="" class="active">
        <input type="checkbox" name="sortby" value="best_match" checked="checked" data-initially-checked="true">
        <span>
            Best Match
        </span>
    </label>



                        <label onclick="">
        <input type="checkbox" name="sortby" value="rating">
        <span>
            Highest Rated
        </span>
    </label>

                </div>
            </fieldset>



            <fieldset>
                <div class="wrap clearfix">
                        <label onclick="">
        <input type="checkbox" name="deals_filter" value="">
        <span>
            Offering a Deal
        </span>
    </label>

                </div>
            </fieldset>
        </div>

        <div class="filter-actions" id="filter-tab-controls-lower" data-component-bound="true">
                <a href="#" class="control-btn js-fast non-toggleable cancel" data-control-action="cancel">Cancel</a>

                <a href="#" class="control-btn js-fast button dark-grey non-toggleable" data-control-action="filter-submit">Search</a>

        </div>
    </form>

                <div class="pagination-controls">
        <div class="flex-container">
                    <div class="inline-layout-content">
            <button class="button default large next">
                View More Results
            </button>
    </div>


        </div>
    </div>


        </div>


    </div>
        <div class="mobile-menu js-navigation clearfix">
        <ul class="action-list action-list-menu">
                   <li class="action-item">
   </li>


               <li class="action-item">
       <a class="page-link action flex-container flex-center js-fast" data-url="/categories" href="/categories">
                <i class="i ig-main i-stroked-nearby-main flex-avatar"></i>
            <div class="flex-box">
                <strong>Nearby</strong>
           </div>
       </a>
   </li>


               <li class="action-item">
       <a class="page-link action flex-container flex-center js-fast js-bookmark-nav" data-url="/bookmark/list" href="/bookmark/list">
                <i class="i ig-main i-stroked-bookmarks-main flex-avatar"></i>
            <div class="flex-box">
                <strong>Bookmarks</strong>
           </div>
       </a>
   </li>


                   <li class="action-item">
       <a class="page-link action flex-container flex-center js-fast" data-url="/food_orders" href="/food_orders">
                <i class="i ig-main i-stroked-order-main flex-avatar"></i>
            <div class="flex-box">
                <strong>Food Orders</strong>
           </div>
       </a>
   </li>


                   <li class="action-item">
       <a class="page-link action flex-container flex-center js-fast" data-url="/profile" href="/profile">
                <i class="i ig-main i-stroked-settings-main flex-avatar"></i>
            <div class="flex-box">
                <strong>Settings</strong>
           </div>
       </a>
   </li>


                   <li class="action-item">
       <a class="page-link action flex-container flex-center js-fast" href="#" id="logout-link">
                <div class="avatar-placeholder flex-avatar"></div>
            <div class="flex-box">
                <strong>Log Out</strong>
           </div>
       </a>
   </li>

        </ul>
        
    <div class="mobile-menu_footer text-centered">
        <a class="mobile-menu_footer-link" href="http://m.yelp.com/static?p=thirdpartyterms#adchoices">Ad Choices</a>
        <a class="mobile-menu_footer-link" href="mailto:mobile-feedback@yelp.com">Site Feedback</a>
        <div class="mobile-menu_footer-burst">
            <i class="i ig-main i-gray-burst-main"></i>
        </div>
    </div>

    </div>

    <div id="page-wrap-shim" class="page-shim js-fast"></div>

                <div class="site-footer webview-hidden" id="site-footer">
        <div class="site-footer-upper">
        </div>

        <div class="site-footer-lower">
            <ul class="action-list">
                <li class="action-item">
                    <a href="javascript:;" class="action flex-container flex-center locale-selector">
                        <i class="i ig-country_flags i-US-country_flags flex-avatar"></i>
                        <span class="flex-box">
                            <strong>Viewing in English</strong>
                            United States
                        </span>
                        <i class="i ig-main i-progressive-disclosure-arrow-main"></i>
                    </a>
                </li>
            </ul>

            <ul class="inline-layout-content-wrap extra-links text-centered">
                    <li class="inline-layout-content">
                        <a class="full-site" href="/www_redirect?path=%2Fsearch%3Ffind_desc%3Dfood%26find_loc%3DLaguna%2BNiguel%252C%2BCA%252C%2BUSA%26mapsize%3D398%252C598">Desktop Site</a>
                    </li>
                    <li class="inline-layout-content">
                        <a class="link-tos" href="/static?p=tos">Terms of Service</a>
                    </li>
                    <li class="inline-layout-content">
                        <a class="link-privacy" href="/tos/privacy_en_us_20130910">Privacy Policy</a>
                    </li>
            </ul>

            <div class="text-centered">
                    <div class="main-footer_copyright">
    </div>

            </div>
        </div>
    </div>


            

        <div id="smart-banner" class="smart-banner-box fixed smart-banner-android" data-component-bound="true">
            <div class="inner clearfix">
                <a id="banner-decline-temp" class="close-x"></a>
                <div class="logo-box"></div>

                <h3>Yelp</h3>


                    <span class="banner-app-developer">Yelp, Inc <i class="i ig-smart_banner i-android-top-developer-smart_banner banner-top-developer"></i></span>
                    <i class="i ig-smart_banner i-grey-4-5-smart_banner banner-review-stars"></i>


                <a href="market://details?id=com.yelp.android&amp;referrer=utm_source%3Dyelp-web%26utm_medium%3Dsmart-banner%26utm_campaign%3Dm.yelp" id="banner-download" class="app-link">Install</a>
                <a class="app-link" data-bridge="enabled" data-fallback-url="market://details?id=com.yelp.android&amp;referrer=utm_source%3Dyelp-web%26utm_medium%3Dsmart-banner%26utm_campaign%3Dm.yelp" href="intent://yelp.com/search?find_desc=food&amp;find_loc=Laguna+Niguel%2C+CA%2C+USA#Intent;scheme=http;package=com.yelp.android;end;" id="banner-open" style="display: none;">Open</a>
            </div>
        </div>

    </div> 

        <div id="overlay">
        <div id="overlay-content">
            <div id="loader">
                <span id="loader-msg">Loading...</span>
            </div>
        </div>
    </div>


    <div id="no-js-msg">
            <noscript>
        &lt;h1&gt;Aww, your browser has JavaScript turned off!&lt;/h1&gt;
        &lt;p&gt;Did you know that JavaScript does the following?&lt;/p&gt;
        &lt;ul class="bullet-list-outside"&gt;
            &lt;li&gt;
                Make web pages really cool.
            &lt;/li&gt;
            &lt;li&gt;
                Compliments you when you've had a bad day.
            &lt;/li&gt;
            &lt;li&gt;
                Can single handedly save the world from all its woes.
            &lt;/li&gt;
        &lt;/ul&gt;

        &lt;p&gt;But you'll never know that now.&lt;/p&gt;

        &lt;p&gt;At this point you're probably reconsidering your decision to have JavaScript disabled.  This is natural.  Please go to the settings menu on your phone related to your web browser, and re-enable JavaScript.  We'll have so much fun together once you do.&lt;/p&gt;
    </noscript>

    </div>

            <div class="flex-container searchbar-modal js-searchbar-modal hidden minimal-header" data-component-bound="true">
        <div class="page-shim"></div>
        <form method="get" action="/search" name="header_find_form" id="search-form" class="search-form" autocomplete="off">
            <div class="flex-container masthead js-fast">
                <div class="flex-box form-inputs">
                    <div class="fake-input js-fake-input flex-container">
                        <i class="i ig-main i-search-main search-icon"></i>

                        <div class="flex-box input-holder">
                            <form action="/" method="GET">
                            <input type="text" class="find-desc input input-reset" name="find_desc" placeholder="e.g. tacos, Mel's" value="food" tabindex="1" autocomplete="off" autocorrect="off" autocapitalize="off" data-component-bound="true" />
                        </form>
                        </div>

                        <i class="i ig-main i-close-small-light-main cancel js-cancel"></i>
                    </div>

                    <div class="fake-input js-fake-input flex-container">
                        <i class="i ig-main i-location-main location-icon regular" style="display: block;"></i>
                        <i class="i ig-main i-location-stale-main location-icon stale" style="display: none;"></i>
                        <i class="i ig-main i-location-current-main location-icon current" style="display: none;"></i>
                        <div class="flex-box input-holder">
                            <input class="find-loc input input-reset" type="text" name="find_loc" data-lat="33.5382363196" data-lng="-117.699108124" data-default-loc="Laguna Niguel, CA, USA" value="Laguna Niguel, CA, USA" tabindex="2" autocomplete="off" autocorrect="off" autocapitalize="off" data-component-bound="true">
                        </div>
                        <i class="i ig-main i-close-small-light-main cancel js-cancel"></i>
                    </div>
                </div>

                <button class="masthead-btn submit js-fast" type="submit">
                    <i class="i ig-main i-search-large-light-main"></i>
                </button>
            </div>
        </form>

        <div class="location-refresh-bar" data-component-bound="true">
            <div class="flex-container">
                <div class="message">
                    <strong>Hey, your location might be old.</strong><br>
                    <span class="last-updated"></span>
                </div>
                <div class="refresh-btn-container">
                    <a class="button default refresh-btn js-fast" href="javascript:;">
                        <i class="i ig-main i-refresh-main"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="suggestions-list-container flex-box js-fast hidden" data-component-bound="true">
            <ul class="suggestions-list"></ul>
        </div>
    </div>


            <div id="locale-selector-modal" class="modal-container minimal-header locale-selector-modal" data-component-bound="true">
        <div class="flex-container-column modal">
                <div class="masthead">
                        <h4><span>Choose Language</span></h4>

                    <span class="button nav back-btn js-fast">Back</span>

                </div>
            <section class="flex-box modal-content">
                    <div id="main-status-message" class="stick-alert status-message hidden">
        <div class="stick-alert-story message-container">
            
        </div>
    </div>
            </section>
        </div>
    </div>

    <noscript>&lt;img src="https://sb.scorecardresearch.com/p?cj=1&amp;amp;c15=&amp;amp;c3=&amp;amp;c2=7130511&amp;amp;c1=2&amp;amp;c6=&amp;amp;c5=&amp;amp;c4="&gt;</noscript>
    <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');


</script>



    <script>
            (function() {
                var main = null;

                var main=function loadSpice(a){var c=new Image();function b(){return(window._gaUserPrefs&&window._gaUserPrefs["ioo"]&&typeof(window._gaUserPrefs["ioo"])==="function"&&window._gaUserPrefs["ioo"]()===true||false)?"1":"0"}var e=["/sp","ice?","r=",a];if(!document.webkitHidden){e.push("&pagevis=0");e.push("&gablock=");e.push(b());c.src=e.join("")}else{var d=false;document.addEventListener("webkitvisibilitychange",function(){if(document.webkitHidden||d){return}d=true;e.push("&pagevis=1");e.push("&gablock=");
e.push(b());c.src=e.join("")})}};

                if (main === null) {
                    throw 'invalid inline script, missing main declaration.';
                }
                main("39aeb115eb6153e2");
            })();
    </script>

            <script>
            (function() {
                var main = null;

                var main=function(){var a=new Image(1,1);a.onerror=a.onload=function(){a.onerror=a.onload=null};a.src=["//secure-us.imrworldwide.com/cgi-bin/m?ci=us-804377h&cg=0&cc=1&si=",escape(window.location.href),"&rp=",escape(document.referrer),"&ts=compact&rnd=",(new Date()).getTime()].join("")};

                if (main === null) {
                    throw 'invalid inline script, missing main declaration.';
                }
                main();
            })();
    </script>
        <noscript>
                &lt;img src="//secure-us.imrworldwide.com/cgi-bin/m?ci=us-804377h&amp;amp;cg=0&amp;amp;cc=1&amp;amp;ts=noscript" width="1" height="1" alt=""&gt;
        </noscript>

<script type="text/javascript">
var request_id;
var lat;
var lng;
var yelp;
$(document).ready(function(){
    term = "<?php echo $term; ?>"
    loc = "<?php echo $loc; ?>";
    addr = "<?php echo str_replace( " ", "+", $loc); ?>"
    GetYelp(term, loc, addr)  
    
    $(".openTable").each(function(){
        output = "address="+$(this).attr("address")+"&zip="+$(this).attr("zip");
        GetOpenTable(output, $(this))      
    })
    
})

GetOpenTable = function(values, wheretoputit)
{
    $.ajax("http://opentable.herokuapp.com/api/restaurants?"+ values, 
        {
            dataType: 'jsonp',
            success: function(data) {
                if(data.restaurants[0].mobile_reserve_url)
                    str = "Good News! <a target='_blank' href='"+data.restaurants[0].mobile_reserve_url+"'>Make a reservation on OpenTable</a>";
                $(wheretoputit).html(str);
            }
        }
    )
}


GetYelp = function(term, loc, addr)
{
    values = "action=yelp&term="+term+"&loc="+loc;
    $.ajax("http://uber-api-erthr.c9.io/api.php?"+ values, 
        {
            dataType: 'json',
            success: function(data) {
                    yelp = data
                    ListYelp();
            }
        })
    $.ajax("http://uber-api-erthr.c9.io/api.php?action=addr_to_coords&addr="+ addr, 
        {
            dataType:'json',
            success: function(data){
                lat = data.results[0].geometry.location.lat;
                lng = data.results[0].geometry.location.lng;
                ListYelp();
            }
        })
                        

}

ListYelp = function(){
    if(!yelp)
        return;
        
        for(i=1; i<= yelp.businesses.length; i++)
        {
         url = yelp.businesses[i].url;
        rating = yelp.businesses[i].rating;
        rating_img_url = yelp.businesses[i].rating_img_url;
        snippet_image_url = yelp.businesses[i].image_url;
        name = yelp.businesses[i].name;
        review_count = yelp.businesses[i].review_count;
        phone = yelp.businesses[i].phone;
        // address = yelp.businesses[i].location.display_address[0];
        address = yelp.businesses[i].location.display_address;
        distance = yelp.businesses[i].distance*0.000621371,1; 
        rawAddress = yelp.businesses[i].location.address[0]; 
        zip = yelp.businesses[i].location.postal_code;
        
        dest_lat = yelp.businesses[i].location.coordinate.latitude;
        dest_lon = yelp.businesses[i].location.coordinate.longitude;
        daUber = FindUber(dest_lat, dest_lon, i, rawAddress,zip);
        
         template = '<li class="flex-container biz-listing page-link full-width js-fast active-background interactive-list-item" data-url="'+url+'"> \
        <div class="photo-box"> <img src="'+snippet_image_url+'"></div><div class="info-col flex-box"><h3><a href="'+url+'" class="h-link"> \
        '+i+'   '+name+'                </a></h3><ul class="biz-attrs"><li>'+distance+'</li></ul><div class="biz-info"><div itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating"> \
    <div class="rating-reviews"><img src="'+rating_img_url+'">      <meta itemprop="ratingValue" content="4.5"><span class="review-count"><span itemprop="reviewCount">'+review_count+'</span> Reviews</span> \
    </div></div><address>'+address+'   </address><p class="category'+i+'">'+daUber+' </p><ul class="search-result_tags"></ul></div></div></li>';
         $("content").html($("content").html()+template);
        }
         
}


FindUber = function(dest_lat, dest_lon, i, address, zip){
    values = "action=get_prices&user_latitude="+lat+"&user_longitude="+lng+"&destination_latitude="+dest_lat+"&destination_longitude="+dest_lon
    $.ajax("http://uber-api-erthr.c9.io/api.php?"+ values, 
        {
            dataType: 'json',
            success: function(data) {
                uberTop = '<div id="mySliderTabs'+i+'" style="width:400px;position:relative;left:-75px"><ul>';
                uberBottom = "";
                //throw openTable here
                uberTop += "<li><a href='#openTable'>OpenTable</a></li>";
                uberBottom += "<div class='openTable' id='openTable' address='"+address+"' zip='"+zip+"'>Sorry, this place doesn't accept openTable reservations </div>";
                for(j=0;j<3;j++)
                {
                    uber_product_id = data.prices[j].product_id;
                    uber_name =  data.prices[j].localized_display_name;
                    uber_estimate = data.prices[j].estimate;
                    uber_duration =  Math.floor(data.prices[j].duration /60);
                    uber_surge =  data.prices[j].surge_multiplier;
                    uberTop += "<li><a href='#"+uber_name+"'>"+uber_name+"</a></li>";
                    uberBottom += "<div id='"+uber_name+"'>\
                    <table><tr><td><b>Estimate: </b></td><td>"+uber_estimate+"</td></tr>\
                    <tr><td><b>Trip Time: </b></td><td>"+uber_duration+" min</td></tr>\
                    <tr><td><b>Surge Multiplier: </b></td><td>x"+uber_surge+"</td></tr>\
                    <tr><td colspan=2><button onclick='javascript:RequestUber(\"action=request&product_id="+uber_product_id+"&user_latitude="+lat+"&user_longitude="+lng+"&destination_longitude="+dest_lon+"&destination_latitude="+dest_lat+"\")'>Request</td></tr> \
                    </table>\
                    </div>"
                }
                uberTop += "</ul>";
                uberBottom += "</div>";
                $(".category"+i).html(uberTop+uberBottom)
                var slider = $("div#mySliderTabs"+i).sliderTabs();
                $(".openTable").each(function(){
                    output = "address="+$(this).attr("address")+"&zip="+$(this).attr("zip");
                    GetOpenTable(output, $(this))      
                })
            }
        })
}

    var slider = $("div#mySliderTabs").sliderTabs();
    function RequestUber(queryString)
    {
        ans = window.confirm("We're picking you up at <?php echo $loc;?>?\n If this isn't right, refresh the page");
        if(!ans)
        {
            alert("Ride Cancelled")
            return;
        }
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                responseArr = JSON.parse(xmlhttp.responseText);
                request_id = responseArr['request_id'];
                new PNotify({
                    title: 'Uber Requested',
                    text: 'Uber will be here in ' + responseArr['eta'] +' minutes',
                    icon: 'glyphicon glyphicon-question-sign',
                    type: 'success',
                    hide: false,
                    confirm: {
                        confirm: true
                    },
                    buttons: {
                        closer: false,
                        sticker: false
                    },
                    history: {
                        history: false
                    }
                }).get().on('pnotify.confirm', function() {
                    
                }).on('pnotify.cancel', function() {
                    $.ajax({
                        url: '/api.php?action=cancel&request_id='+request_id+'&auth_code=<?php echo $authCode; ?>',
                        success: function(result) {
                            if(result == "success")
                            {
                                new PNotify({
                                    title: 'Uber Cancelled',
                                    text: 'Your ride has been cancelled, no worries m8',
                                    type: 'success'
                                });
                            }
                            else
                            {
                                new PNotify({
                                    title: 'Uber NOT Cancelled',
                                    text: 'Uh oh, we got an error',
                                    type: 'error'
                                });
                            }
                        }
                    });
                });
            }
        }
        xmlhttp.open("GET", "/api.php?"+queryString+"&auth_code=<?php echo $authCode; ?>", true);
        xmlhttp.send();
    }
    
    
    
    <?php 
    if($getLocation) 
    { 
        ?>
    if(navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(getCoords)
        }
    
    
function getCoords(position){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                add = JSON.parse(xmlhttp.responseText);
                $("#loc").val(add.results[0].formatted_address)
                 new PNotify({
                    title: 'We Found You!',
                    text: 'Your address is set to:\n'+add.results[0].formatted_address+'\nPlease search again',
                    type: 'success'
                });
            }
        }
        xmlhttp.open("GET", "/api.php?action=record_coords&user_latitude="+position.coords.latitude+"&user_longitude="+position.coords.longitude, true);
        xmlhttp.send();
}
<?php
}
?>
function RequestRandom()
{
    random = Math.floor(Math.random()*10);
    $("button").eq(random).click();
}


</script>
</body></html>