<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ottawa City Job list. A list of all jobs available in Ottawa City, Emplois à la ville d'Ottawa, Jobs Available in the city of Ottawa, Emplois disponible à la ville D'Ottawa">
  <meta name="keywords" content="Ottawa city jobs, Ottawa emplois, Open Data jobs, Open data apps, Données ouvertes">
  <meta name="author" content="Guinsly Mondésir">
  <meta name="author" content="Mongex.info">
  <meta name='subject' content="">

    <title>Ottawa: Jobs with the City - Open Data</title>

  @include('partials.header')
</head>
<body>

<!--
 _  _          _
| \| |__ ___ _| |__  __ _ _ _
| .` / _` \ V / '_ \/ _` | '_|
|_|\_\__,_|\_/|_.__/\__,_|_|

                              -->
  @include('partials.navbar')

<!-- end Navbar -->


<!--
     _            _         _
  _ | |_  _ _ __ | |__  ___| |_ _ _ ___ _ _
 | || | || | '  \| '_ \/ _ \  _| '_/ _ \ ' \
  \__/ \_,_|_|_|_|_.__/\___/\__|_| \___/_||_|
-->
  @include('partials.jumbotron')
<!-- end Jumbotron -->


<div class="container">


<!--
  _
 | |   __ _ _ _  __ _ _  _ __ _ __ _ ___
 | |__/ _` | ' \/ _` | || / _` / _` / -_)
 |____\__,_|_||_\__, |\_,_\__,_\__, \___|
                |___/          |___/
-->

<br>

<br/>

<!--
    __    __           __                       __             __
   / /_  / /___  _____/ /__   _________  ____  / /____  ____  / /_
  / __ \/ / __ \/ ___/ //_/  / ___/ __ \/ __ \/ __/ _ \/ __ \/ __/
 / /_/ / / /_/ / /__/ ,<    / /__/ /_/ / / / / /_/  __/ / / / /_
/_.___/_/\____/\___/_/|_|   \___/\____/_/ /_/\__/\___/_/ /_/\__/

 -->
  <div class="col-lg-11 col-lg-offset-1">

  @yield('content')
  </div>
<!-- end content -->
  </div>
</div>

<!--
    ____            __
   / __/___  ____  / /____  _____
  / /_/ __ \/ __ \/ __/ _ \/ ___/
 / __/ /_/ / /_/ / /_/  __/ /
/_/  \____/\____/\__/\___/_/

                                 -->

<footer class="bs-docs-footer" role="contentinfo">
    <div class="container">
        <ul class="bs-docs-footer-links">
            <li><a target="_blank" href="https://github.com/guinslym/cityjobs">GitHub</a></li>
            <li><a target="_blank" href="https://twitter.com/">Twitter</a></li>
            <li><a target="_blank" href="/humans.txt">humans.txt</a></li>
        </ul>
        <p>Designed and built with all the love in the world by <a href="https://twitter.com/guinslym?lang=en" target="_blank">@guinslym</a>.
        <p>Code licensed <a target="_blank" href="https://creativecommons.org/licenses/by-nd/3.0/">CC-BY-ND</a>.</p>
        <p>Open data Ottawa</p>
    </div>
</footer>

<span id="scrollUp"></span>

<!--
       _                                  _       __
      (_)___ __   ______ ________________(_)___  / /_
     / / __ `/ | / / __ `/ ___/ ___/ ___/ / __ \/ __/
    / / /_/ /| |/ / /_/ (__  ) /__/ /  / / /_/ / /_
 __/ /\__,_/ |___/\__,_/____/\___/_/  /_/ .___/\__/
/___/                                  /_/
-->

<!-- I had some issue with Django trying to serve static files in Production
so I decided to put the css and js in a partial or directly within this file -->
<script type="text/javascript">

$('br').remove();

</script>
<!-- google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78680715-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>