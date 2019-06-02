<?php
require "cookies.php";
require "db.php";
$cookie_key='online-cache';
 $ip= $_SERVER['REMOTE_ADDR'];
 $online= R::findOne('online', 'ip=?',array($ip));
 if($online)
 {
  $do_update=false;
   //обновляем
  if( CookieManager::stored($cookie_key))
  {
$c=(array) @json_decode(CookieManager::read($cookie_key), true);
if($c)
{
if($c['lastvisit']<(time()-(60*5)))
{$do_update= true;}
}else
{
  $do_update= true;
}
  }else
  {
    $do_update= true;
  }
  if($do_update)
  {$time=time();
  $online->lastvisit=$time;
  R::store($online);
  CookieManager::store($cookie_key, json_encode(array('id' =>$online->id, 'lastvisit'=>$time)));}
 }else
 {
//содаем
  $time=time();
  $online=R::dispense('online');
  $online->lastvisit=$time;
  $online->ip=$ip;
  R::store($online);
  CookieManager::store($cookie_key, json_encode(array('id' =>$online->id, 'lastvisit'=>$time)));
 }
 $online_count = R::count('online', "lastvisit > " . ( time() - (3600) ));
 ?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="ru-RU">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2017.0.4.363"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "require.js", "uslugi.css"], "outOfDate":[]};
</script>
  
  <title>uslugi</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/uslugi.css?crc=3964262342" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   var __adobewebfontsappname__ = "muse";
</script>
  <!-- JS includes -->
  <script src="https://webfonts.creativecloud.com/abril-fatface:i4:all.js" type="text/javascript"></script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="browser_width colelem" id="u3012-bw">
     <div id="u3012"><!-- group -->
      <div class="clearfix" id="u3012_align_to_page">
       <div class="rounded-corners clearfix grpelem" id="u3013"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u3014-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u3015"><!-- group -->
        <a class="nonblock nontext MuseLinkActive clearfix grpelem" id="u3016-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
       </div>
       <a class="nonblock nontext museBGSize grpelem" id="u3017" href="index.php"><!-- simple frame --></a>
       <div class="rounded-corners clearfix grpelem" id="u3018"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u3019-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u3020"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u3021-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
       </div>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="u3109"><!-- group -->
     <div class="clearfix grpelem" id="u3112-4"><!-- content -->
      <p>Онлайн заказ грузоперевозок</p>
     </div>
    </div>
    <div class="clearfix colelem" id="u3115-4"><!-- content -->
     <p>Статус заказчика:</p>
    </div>
    <div class="clearfix colelem" id="pu3118"><!-- group -->
     <div class="rounded-corners clearfix grpelem" id="u3118"><!-- group -->
      <a class="nonblock nontext clearfix grpelem" id="u3121-4" href="chl.php"><!-- content --><p>Частное лицо</p></a>
     </div>
     <div class="rounded-corners clearfix grpelem" id="u3124"><!-- group -->
      <a class="nonblock nontext clearfix grpelem" id="u3125-4" href="org.php"><!-- content --><p>Организация</p></a>
     </div>
    </div>
    <div class="browser_width colelem" id="u4841-bw">
     <div id="u4841"><!-- group -->
      <div class="clearfix" id="u4841_align_to_page">
       <div class="clearfix grpelem" id="pu4842-4"><!-- column -->
        <div class="clearfix colelem" id="u4842-4"><!-- content -->
         <p>© Все права защищены</p>
        </div>
        <div class="clearfix colelem" id="u4843-4"><!-- content -->
         <p>Телефон: +7(927)961-51-54</p>
        </div>
        <div class="clearfix colelem" id="u4844-4"><!-- content -->
         <p>E-mail: 9279615154@mail.ru</p>
        </div>
       </div>
       <div class="clearfix grpelem" id="pu4846-4"><!-- column -->
        <a class="nonblock nontext clearfix colelem" id="u4846-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
        <a class="nonblock nontext MuseLinkActive clearfix colelem" id="u4847-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4848-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4850-4" href="dokuments.php"><!-- content --><p>Документы</p></a>
       </div>
       <div class="clearfix grpelem" id="pu4851-4"><!-- column -->
        <a class="nonblock nontext clearfix colelem" id="u4851-4" href="svyaz.php"><!-- content --><p>Обратная связь</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4849-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4852-4" href="prise.php"><!-- content --><p>Прайс-лист услуг</p></a>
       </div>
       <div class="clearfix grpelem" id="u4845-4"><!-- content -->
        <p>Сейчас Онлайн: <?php echo $online_count; ?></p>
       </div>
      </div>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="733" data-content-above-spacer="733" data-content-below-spacer="0"></div>
   </div>
  </div>
  <!-- Other scripts -->
  <script type="text/javascript">
   // Decide weather to suppress missing file error or not based on preference setting
var suppressMissingFileError = false
</script>
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Некоторые файлы на сервере могут отсутствовать или быть некорректными. Очистите кэш-память браузера и повторите попытку. Если проблему не удается устранить, свяжитесь с разработчиками сайта.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(f+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(f)):alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.musepolyfill.bgsize","jquery.watch"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=3951022091" type="text/javascript" async data-main="scripts/museconfig.js?crc=474374037" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
