<?php
function LoadCommentsMainPage() // Загрузить комментарии на главной странице
{
  echo "<div class='comments'>
    <div id='disqus_thread'></div>
<script>
  var disqus_config = function () {
  this.page.url = 'http://u-vision.zzz.com.ua/';
  this.page.identifier = '';
  };
  (function() {
  var d = document, s = d.createElement('script');
  s.src = 'https://http-u-vision-zzz-com-ua.disqus.com/embed.js';
  s.setAttribute('data-timestamp', +new Date());
  (d.head || d.body).appendChild(s);
  })();
</script>
<noscript>Please enable JavaScript to view the <a href='https://disqus.com/?ref_noscript'>comments powered by Disqus.</a></noscript>
  </div>";
}
function LoadCommentsOther() // Загрузить комментарии на остальных страницах
{
  echo "<div class='comments'>
    <div id='disqus_thread'></div>
<script>
  var disqus_config = function () {
  this.page.url = 'http://u-vision.zzz.com.ua/htmls/Serials/AllSerials/AllSerials.php';
  this.page.identifier = '/htmls/Serials/AllSerials/AllSerials.php';
  };
  (function() {
  var d = document, s = d.createElement('script');
  s.src = 'https://http-u-vision-zzz-com-ua.disqus.com/embed.js';
  s.setAttribute('data-timestamp', +new Date());
  (d.head || d.body).appendChild(s);
  })();
</script>
<noscript>Please enable JavaScript to view the <a href='https://disqus.com/?ref_noscript'>comments powered by Disqus.</a></noscript>
  </div>";
}
 ?>
