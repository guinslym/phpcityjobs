@extends('emploi->base')
  @section('content')
  <div class="row">
  	<div class="col-md-12">
  		<h1>Detail page</h1>
  	</div>
  </div>

	<div class="row">
		<div class="col-lg-12">
			<h1>{{ $emploi->POSITION }} <small>{{ $emploi->JOBREF }}</small></h1>

				<ul>

					<li><strong>Salary Max: </strong>
					 $ {{ $emploi->SALARYMAX }}
					</li>
					<li><strong>Salary Min: </strong>
					$ {{ $emploi->SALARYMIN  }}
					</li>
					<li><strong>Expiring date: </strong>{{ $emploi->EXPIRYDATE }}</li>
					<li><strong>postdate: </strong> {{ $emploi->POSTDATE }}</li>
					<li><strong>apply link: </strong> <a href="{{ $emploi->JOBURL }}" target="_blank">apply</a></li>
			</ul>


		</div>
	</div>

<div class="row text-center">
	<h3><a href="/"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a></h3>
</div>




<script type="text/javascript">
	$(function() {
	   $("br").remove();
	});
</script>

  @stop







