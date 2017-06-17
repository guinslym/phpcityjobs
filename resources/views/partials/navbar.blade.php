<div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">Ottawa City Jobs</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('statistics') }}">Stats</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('download') }}">Download</a></li>
            <!--
            <li><a href={{ asset('jobs_file/logo.png') }}>Download</a></li>
            -->
          </ul>

        </div>
      </div>
    </div>