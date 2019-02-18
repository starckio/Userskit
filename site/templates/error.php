<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">
  <meta name="keywords" content="<?= $site->keywords()->html() ?>">
  <style>*{margin:0;padding:0;border:none;outline:none;font:inherit;color:inherit;line-height:inherit;vertical-align:baseline;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html,body{min-height:100%;width:100%;position:absolute}body{height:100%;width:100%;top:0;right:0;bottom:0;left:0;font:normal 400 66px/100% -apple-system,"Helvetica Neue",Helvetica,Arial,sans-serif;color:#fff;text-align:center;background:#111;position:absolute;-webkit-background-size:cover;-moz-background-size:cover;background-size:cover}body:before{content:'';height:100%;display:inline-block;vertical-align:middle}a{margin:0 auto;text-decoration:none;vertical-align:middle;display:inline-block;position:relative}a span{height:10%;width:100%;left:0;white-space:nowrap;position:absolute;z-index:-2}a span.outer{height:10%;overflow:hidden}@media (max-width:999px){body{font-size:44px}}@media (max-width:640px){body{font-size:24px}}@media (max-width:320px){body{font-size:17px}}</style>
</head>
<body>
<a href="<?= url() ?>"><?= $page->title()->html() ?></a>
<script>function rando(min,max){return Math.floor(Math.random()*(max-min+1))+min}
var cont=document.getElementsByTagName('a')[0],spanCount=8;for(var i=0;i<spanCount;i++){var outer=document.createElement('span'),inner=document.createElement('span'),text=document.createTextNode(cont.innerText);outer.className='outer';cont.appendChild(outer).appendChild(inner).appendChild(text)}
setInterval(function(){for(var i=0;i<spanCount;i++){var outer=cont.getElementsByClassName('outer')[i],inner=outer.getElementsByTagName('span')[0],colors=['30f7f5','e70b1c','fff'];if(i===0){outer.style.height='100%';inner.style.top='-'+rando(0,3)+'px';inner.style.left='-'+rando(0,3)+'px';inner.style.color='#'+colors[rando(0,1)]}else if(i===1){outer.style.height='100%';inner.style.top=rando(0,3)+'px';inner.style.left=rando(0,3)+'px';inner.style.color='#'+colors[rando(0,1)]}else{var width=rando(5,25),offset=rando(0,100-width),partCount=cont.offsetHeight/spanCount;outer.style.width=width+'%';outer.style.left=offset+'%';outer.style.top=partCount*i+'px';inner.style.top='-'+partCount*i+'px';inner.style.left='-'+(offset/width)*100+'%';inner.style.color='#'+colors[rando(0,colors.length)];inner.style.transform='translate('+rando(-5,5)+'px, '+rando(-5,5)+'px)'}(function(i){var outer=cont.getElementsByClassName('outer')[i];setTimeout(function(){outer.style.opacity=1},i*20);setTimeout(function(){outer.style.opacity=0},i*25+100)})(i)}},200)</script>
</body>
</html>