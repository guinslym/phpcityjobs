@extends('emploi.base')
  @section('content')
  <div class="row">
  	<div class="col-md-12">
		<h1>About page</h1>

		<p>This website provides the current and past job opportunities at the  <a href="http://ottawa.ca/en/city-hall/jobs-city" target="_blank">City of Ottawa</a>. The data obtained comes directly from the <a href="http://data.ottawa.ca/en/dataset/job-opportunities" target="_blank">Ottawa Open data portal</a>. All the jobs are in ascending order on the Expiration Date. Meaning that Jobs that will be expired soon will be first and jobs that will be expired later will be further down the pagination.</p>

		<p> You can find the github repository of this web application <a href="https://github.com/guinslym/cityjobs"  target="_blank">here (django app)</a> and <a href="https://github.com/guinslym/phpcityjobs"  target="_blank">here (Laravel app)</a>.  This project is inpired from <a href="http://www.ottawacityjobs.ca/"  target="_blank">OttawaCityJobs</a></p>

		<p>The content of this website is under the <a target="_blank" href="https://creativecommons.org/licenses/by-nd/3.0/">CC-BY-ND</a> license. The images of the Ottawa city flags is under the Wiki Creative Commons License. The code for this application is also available on <a href="https://github.com/guinslym/cityjobs" target="_blank">Github</a>. Some third party of the code can't be transfert like the Twitter bot api and the bitly api.</p>
  	</div>
  </div>

  @stop





