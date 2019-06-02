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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "webpro.js", "require.js", "svyaz.css"], "outOfDate":[]};
</script>
  
  <title>svyaz</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/svyaz.css?crc=4048377626" id="pagesheet"/>
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
    <div class="browser_width colelem" id="u3262-bw">
     <div id="u3262"><!-- group -->
      <div class="clearfix" id="u3262_align_to_page">
       <div class="rounded-corners clearfix grpelem" id="u3263"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u3264-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u3265"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u3266-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
       </div>
       <a class="nonblock nontext museBGSize grpelem" id="u3267" href="index.php"><!-- simple frame --></a>
       <div class="rounded-corners clearfix grpelem" id="u3268"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u3269-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u3270"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u3271-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
       </div>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="u3497-4"><!-- content -->
     <p>Форма обратной связи</p>
    </div>
    <form class="form-grp clearfix colelem" id="widgetu3446" method="post" enctype="multipart/form-data" action="scripts/form-u3446.php"><!-- none box -->
     <div class="fld-grp clearfix grpelem" id="widgetu3455" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3456-4" for="widgetu3455_input"><!-- content --><span class="actAsPara">Имя:</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u3457-4"><!-- content --><input class="wrapped-input" type="text" spellcheck="false" id="widgetu3455_input" name="custom_U3455" tabindex="1"/><label class="wrapped-input fld-prompt" id="widgetu3455_prompt" for="widgetu3455_input"><span class="actAsPara">Введите имя</span></label></span>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3447" data-required="true" data-type="email"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3450-4" for="widgetu3447_input"><!-- content --><span class="actAsPara">Электронная почта:</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u3448-4"><!-- content --><input class="wrapped-input" type="email" spellcheck="false" id="widgetu3447_input" name="Email" tabindex="2"/><label class="wrapped-input fld-prompt" id="widgetu3447_prompt" for="widgetu3447_input"><span class="actAsPara">Введите адрес электронной почты</span></label></span>
     </div>
     <div class="clearfix grpelem" id="u3460-4"><!-- content -->
      <p>Отправка формы…</p>
     </div>
     <div class="clearfix grpelem" id="u3461-4"><!-- content -->
      <p>На сервере произошла ошибка.</p>
     </div>
     <div class="clearfix grpelem" id="u3459-4"><!-- content -->
      <p>Форма получена.</p>
     </div>
     <button class="submit-btn NoWrap rounded-corners clearfix grpelem" id="u3462-4" type="submit" value="Отправить" tabindex="4"><!-- content -->
      <div style="margin-top:-19px;height:19px;">
       <p>Отправить</p>
      </div>
     </button>
     <div class="fld-grp clearfix grpelem" id="widgetu3451" data-required="false"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3452-4" for="widgetu3451_input"><!-- content --><span class="actAsPara">Сообщение:</span></label>
      <span class="fld-textarea actAsDiv clearfix grpelem" id="u3453-4"><!-- content --><textarea class="wrapped-input" id="widgetu3451_input" name="custom_U3451" tabindex="3"></textarea><label class="wrapped-input fld-prompt" id="widgetu3451_prompt" for="widgetu3451_input"><span class="actAsPara">Введите сообщение</span></label></span>
     </div>
    </form>
    <div class="clearfix colelem" id="u3503-4"><!-- content -->
     <p>Если что-то случилось с сайтом то пишите сюда и мы ответим на все вопросы. Ответы будут отправляться на почту</p>
    </div>
    <div class="browser_width colelem" id="u4985-bw">
     <div id="u4985"><!-- group -->
      <div class="clearfix" id="u4985_align_to_page">
       <div class="clearfix grpelem" id="pu4986-4"><!-- column -->
        <div class="clearfix colelem" id="u4986-4"><!-- content -->
         <p>© Все права защищены</p>
        </div>
        <div class="clearfix colelem" id="u4987-4"><!-- content -->
         <p>Телефон: +7(927)961-51-54</p>
        </div>
        <div class="clearfix colelem" id="u4988-4"><!-- content -->
         <p>E-mail: 9279615154@mail.ru</p>
        </div>
       </div>
       <div class="clearfix grpelem" id="pu4990-4"><!-- column -->
        <a class="nonblock nontext clearfix colelem" id="u4990-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4991-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4992-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4994-4" href="dokuments.php"><!-- content --><p>Документы</p></a>
       </div>
       <div class="clearfix grpelem" id="pu4995-4"><!-- column -->
        <a class="nonblock nontext MuseLinkActive clearfix colelem" id="u4995-4" href="svyaz.php"><!-- content --><p>Обратная связь</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4993-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
        <a class="nonblock nontext clearfix colelem" id="u4996-4" href="prise.php"><!-- content --><p>Прайс-лист услуг</p></a>
       </div>
       <div class="clearfix grpelem" id="u4989-4"><!-- content -->
        <p>Сейчас Онлайн: <?php echo $online_count; ?></p>
       </div>
      </div>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="904" data-content-above-spacer="903" data-content-below-spacer="0"></div>
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
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.musepolyfill.bgsize","jquery.watch","webpro"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.initWidget('#widgetu3446', ['#bp_infinity'], function(elem) { return new WebPro.Widget.Form(elem, {validationEvent:'submit',errorStateSensitivity:'high',fieldWrapperClass:'fld-grp',formSubmittedClass:'frm-sub-st',formErrorClass:'frm-subm-err-st',formDeliveredClass:'frm-subm-ok-st',notEmptyClass:'non-empty-st',focusClass:'focus-st',invalidClass:'fld-err-st',requiredClass:'fld-err-st',ajaxSubmit:true}); });/* #widgetu3446 */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=3951022091" type="text/javascript" async data-main="scripts/museconfig.js?crc=474374037" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
