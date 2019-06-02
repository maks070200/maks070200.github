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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "require.js", "index.css"], "outOfDate":[]};
</script>
  
  <title>Домашняя</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?crc=120112319" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   var __adobewebfontsappname__ = "muse";
</script>
  <!-- JS includes -->
  <script src="https://webfonts.creativecloud.com/abril-fatface:i4:all.js" type="text/javascript"></script>
    <!--custom head HTML-->
  <title>ИП "Васильев А.Г."</title>
 </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="browser_width colelem" id="u214-bw">
     <div id="u214"><!-- group -->
      <div class="clearfix" id="u214_align_to_page">
       <div class="rounded-corners clearfix grpelem" id="u223"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u235-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u238"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u241-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
       </div>
       <a class="nonblock nontext MuseLinkActive museBGSize grpelem" id="u266" href="index.php"><!-- simple frame --></a>
       <div class="rounded-corners clearfix grpelem" id="u280"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u283-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u286"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u289-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
       </div>
      </div>
     </div>
    </div>
    <div class="SlideShowWidget clearfix HeroFillFrame colelem" id="slideshowu378"><!-- none box -->
     <div class="popup_anchor" id="u381popup">
      <div class="SlideShowContentPanel clearfix" id="u381"><!-- stack box -->
       <div class="SSSlide museBGSize clip_frame grpelem" id="u382"><!-- image -->
        <img class="ImageInclude" id="u382_img" data-src="images/slid11.jpg?crc=524559555" src="images/blank.gif?crc=4208392903" alt="" data-width="1186" data-height="494"/>
       </div>
       <div class="SSSlide invi museBGSize clip_frame grpelem" id="u450"><!-- image -->
        <img class="ImageInclude" id="u450_img" data-src="images/slide2-1920x1090.jpg?crc=419809524" src="images/blank.gif?crc=4208392903" alt="" data-width="1186" data-height="673"/>
       </div>
       <div class="SSSlide invi museBGSize clip_frame grpelem" id="u475"><!-- image -->
        <img class="ImageInclude" id="u475_img" data-src="images/cropped-callout-bg.jpg?crc=162695638" src="images/blank.gif?crc=4208392903" alt="" data-width="1186" data-height="711"/>
       </div>
      </div>
     </div>
     <div class="popup_anchor" id="u387-4popup">
      <div class="SlideShowLabel SSSlideCount clearfix" id="u387-4"><!-- content -->
       <p>1 - 3</p>
      </div>
     </div>
     <div class="popup_anchor" id="u391-4popup">
      <div class="SSPreviousButton clearfix" id="u391-4"><!-- content -->
       <p>&lt;</p>
      </div>
     </div>
     <div class="popup_anchor" id="u388-4popup">
      <div class="SSNextButton clearfix" id="u388-4"><!-- content -->
       <p>&gt;</p>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="pu147-8"><!-- group -->
     <div class="clearfix grpelem" id="u147-8"><!-- content -->
      <p>ДОБРО ПОЖАЛОВАТЬ НА САЙТ ТРАНСПОРТНОЙ КОМПАНИИ&nbsp; &quot;ИП Васильев А. Г.&quot;</p>
      <p>&nbsp;</p>
      <p>Наша компания занимается грузоперевозками любой сложности&nbsp; по всей территории РФ (включая Крым) и странам СНГ с 2009 года. За это время мы успешно организовали более 80 000 перевозок грузов по для компаний и частных лиц.&nbsp; География перевозок насчитывает более чем 2000 населенных пунктов.&nbsp;&nbsp; С 2020 года мы планируем организовывать мультимодальные перевозки из/в Европу.</p>
      <p>&nbsp;</p>
     </div>
     <div class="grpelem" id="u150"><!-- simple frame --></div>
    </div>
    <div class="browser_width colelem" id="u144-bw">
     <div id="u144"><!-- group -->
      <div class="clearfix" id="u144_align_to_page">
       <div class="clearfix grpelem" id="pu164-4"><!-- column -->
        <div class="clearfix colelem" id="u164-4"><!-- content -->
         <p>© Все права защищены</p>
        </div>
        <div class="clearfix colelem" id="u167-4"><!-- content -->
         <p>Телефон: +7(927)961-51-54</p>
        </div>
        <div class="clearfix colelem" id="u170-4"><!-- content -->
         <p>E-mail: 9279615154@mail.ru</p>
        </div>
       </div>
       <div class="clearfix grpelem" id="pu347-4"><!-- column -->
        <a class="nonblock nontext clearfix colelem" id="u347-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
        <a class="nonblock nontext clearfix colelem" id="u350-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
        <a class="nonblock nontext clearfix colelem" id="u353-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
        <a class="nonblock nontext clearfix colelem" id="u362-4" href="dokuments.php"><!-- content --><p>Документы</p></a>
       </div>
       <div class="clearfix grpelem" id="pu365-4"><!-- column -->
        <a class="nonblock nontext clearfix colelem" id="u365-4" href="svyaz.php"><!-- content --><p>Обратная связь</p></a>
        <a class="nonblock nontext clearfix colelem" id="u359-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
        <a class="nonblock nontext clearfix colelem" id="u371-4" href="prise.php"><!-- content --><p>Прайс-лист услуг</p></a>
       </div>
       <div class="clearfix grpelem" id="u292-4"><!-- content -->
        <p>Сейчас Онлайн: <?php echo $online_count; ?></p>
       </div>
      </div>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="1004" data-content-above-spacer="1003" data-content-below-spacer="1"></div>
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
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.musepolyfill.bgsize","jquery.watch","webpro","musewpslideshow","jquery.museoverlay","touchswipe"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.initWidget('#slideshowu378', ['#bp_infinity'], function(elem) { var widget = new WebPro.Widget.ContentSlideShow(elem, {autoPlay:true,displayInterval:3000,slideLinkStopsSlideShow:false,transitionStyle:'fading',lightboxEnabled_runtime:false,shuffle:false,transitionDuration:500,enableSwipe:true,elastic:'fullWidth',resumeAutoplay:true,resumeAutoplayInterval:3000,playOnce:false,autoActivate_runtime:false}); $(elem).data('widget', widget); return widget; });/* #slideshowu378 */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=3951022091" type="text/javascript" async data-main="scripts/museconfig.js?crc=474374037" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
