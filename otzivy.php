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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "require.js", "otzivy.css"], "outOfDate":[]};
</script>
  
  <title>otzivy</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/otzivy.css?crc=4204035615" id="pagesheet"/>
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
    <div class="browser_width colelem" id="u645-bw">
     <div id="u645"><!-- group -->
      <div class="clearfix" id="u645_align_to_page">
       <div class="rounded-corners clearfix grpelem" id="u646"><!-- group -->
        <a class="nonblock nontext MuseLinkActive clearfix grpelem" id="u647-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u648"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u649-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
       </div>
       <a class="nonblock nontext museBGSize grpelem" id="u650" href="index.php"><!-- simple frame --></a>
       <div class="rounded-corners clearfix grpelem" id="u651"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u652-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u653"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u654-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
       </div>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="u3981-4"><!-- content -->
     <p>Отзывы:</p>
    </div>
    <form class="form-grp clearfix colelem" id="widgetu3930" method="post" enctype="multipart/form-data" action="scripts/form-u3930.php"><!-- none box -->
     <div class="fld-grp clearfix grpelem" id="widgetu3941" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3943-4" for="widgetu3941_input"><!-- content --><span class="actAsPara">Имя:</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u3942-4"><!-- content --><input class="wrapped-input" type="text" spellcheck="false" id="widgetu3941_input" name="custom_U3941" tabindex="1"/><label class="wrapped-input fld-prompt" id="widgetu3941_prompt" for="widgetu3941_input"><span class="actAsPara">Введите имя</span></label></span>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3937" data-required="true" data-type="email"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3938-4" for="widgetu3937_input"><!-- content --><span class="actAsPara">Электронная почта:</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u3939-4"><!-- content --><input class="wrapped-input" type="email" spellcheck="false" id="widgetu3937_input" name="Email" tabindex="2"/><label class="wrapped-input fld-prompt" id="widgetu3937_prompt" for="widgetu3937_input"><span class="actAsPara">Введите адрес электронной почты</span></label></span>
     </div>
     <div class="clearfix grpelem" id="u3946-4"><!-- content -->
      <p>Отправка формы…</p>
     </div>
     <div class="clearfix grpelem" id="u3931-4"><!-- content -->
      <p>На сервере произошла ошибка.</p>
     </div>
     <div class="clearfix grpelem" id="u3945-4"><!-- content -->
      <p>Форма получена.</p>
     </div>
     <div>
     <p><input type="file" name="photo" multiple accept="image/*,image/jpeg"></p>
   </div>
     <button class="submit-btn NoWrap rounded-corners clearfix grpelem" id="u3932-4" type="submit" value="Отправить" tabindex="4"><!-- content -->
      <div style="margin-top:-11px;height:11px;">
       <p>Отправить</p>
      </div>
     </button>
          <div class="fld-grp clearfix grpelem" id="widgetu3933" data-required="false"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3936-4" for="widgetu3933_input"><!-- content --><span class="actAsPara">Сообщение:</span></label>
      <span class="fld-textarea actAsDiv clearfix grpelem" id="u3935-4"><!-- content --><textarea class="wrapped-input" id="widgetu3933_input" name="custom_U3933" tabindex="3"></textarea><label class="wrapped-input fld-prompt" id="widgetu3933_prompt" for="widgetu3933_input"><span class="actAsPara">Введите сообщение</span></label></span>
     </div>
        </form>
    <div class="SlideShowWidget clearfix colelem" id="slideshowu603"><!-- none box -->
     <div class="popup_anchor" id="u606popup">
      <div class="SlideShowContentPanel clearfix" id="u606"><!-- stack box -->
       <div class="SSSlide rounded-corners grpelem" id="u607"><!-- content --></div>
      </div>
     </div>
     <div class="popup_anchor" id="u604popup">
      <div class="SlideShowCaptionPanel clearfix" id="u604"><!-- stack box -->
       <div class="SSSlideCaption clearfix grpelem" id="u605-3"><!-- content -->
        <p>&nbsp;</p>
       </div>
      </div>
     </div>
    </div>
    <div class="browser_width colelem" id="u675-bw">
     <div id="u675"><!-- group -->
      <div class="clearfix" id="u675_align_to_page">
       <div class="clearfix grpelem" id="pu676-4"><!-- column -->
        <div class="clearfix colelem" id="u676-4"><!-- content -->
         <p>© Все права защищены</p>
        </div>
        <div class="clearfix colelem" id="u677-4"><!-- content -->
         <p>Телефон: +7(927)961-51-54</p>
        </div>
        <div class="clearfix colelem" id="u678-4"><!-- content -->
         <p>E-mail: 9279615154@mail.ru</p>
        </div>
       </div>
       <div class="clearfix grpelem" id="pu680-4"><!-- column -->
        <a class="nonblock nontext MuseLinkActive clearfix colelem" id="u680-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
        <a class="nonblock nontext clearfix colelem" id="u681-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
        <a class="nonblock nontext clearfix colelem" id="u682-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
        <a class="nonblock nontext clearfix colelem" id="u685-4" href="dokuments.php"><!-- content --><p>Документы</p></a>
       </div>
       <div class="clearfix grpelem" id="pu686-4"><!-- column -->
        <a class="nonblock nontext clearfix colelem" id="u686-4" href="svyaz.php"><!-- content --><p>Обратная связь</p></a>
        <a class="nonblock nontext clearfix colelem" id="u684-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
        <a class="nonblock nontext clearfix colelem" id="u687-4" href="prise.php"><!-- content --><p>Прайс-лист услуг</p></a>
       </div>
       <div class="clearfix grpelem" id="u679-4"><!-- content -->
        <p>Сейчас Онлайн: <?php echo $online_count; ?></p>
       </div>
      </div>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="809" data-content-above-spacer="809" data-content-below-spacer="0"></div>
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
Muse.Utils.initWidget('#widgetu3930', ['#bp_infinity'], function(elem) { return new WebPro.Widget.Form(elem, {validationEvent:'submit',errorStateSensitivity:'high',fieldWrapperClass:'fld-grp',formSubmittedClass:'frm-sub-st',formErrorClass:'frm-subm-err-st',formDeliveredClass:'frm-subm-ok-st',notEmptyClass:'non-empty-st',focusClass:'focus-st',invalidClass:'fld-err-st',requiredClass:'fld-err-st',ajaxSubmit:true}); });/* #widgetu3930 */
Muse.Utils.initWidget('#slideshowu603', ['#bp_infinity'], function(elem) { var widget = new WebPro.Widget.ContentSlideShow(elem, {autoPlay:true,displayInterval:3000,slideLinkStopsSlideShow:false,transitionStyle:'fading',lightboxEnabled_runtime:false,shuffle:false,transitionDuration:500,enableSwipe:true,elastic:'off',resumeAutoplay:true,resumeAutoplayInterval:3000,playOnce:false,autoActivate_runtime:false}); $(elem).data('widget', widget); return widget; });/* #slideshowu603 */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=3951022091" type="text/javascript" async data-main="scripts/museconfig.js?crc=474374037" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
