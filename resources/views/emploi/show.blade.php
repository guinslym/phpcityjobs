@extends('emploi.base')
  @section('content')

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
					<li><strong>Expiring date: </strong>
					{{  Carbon\Carbon::parse($emploi->EXPIRYDATE)->format('Y-m-d') }}</li>
					<li><strong>postdate: </strong> {{ Carbon\Carbon::parse($emploi->POSTDATE)->format('Y-m-d') }}</li>
					<li><strong>apply link: </strong> <a href="{{ $emploi->JOBURL }}" target="_blank">apply</a></li>
			</ul>
		
			<!-- Description -->
			{!! $emploi->KNOWLEDGE !!}
			{!! $emploi->LANGUAGE_CERTIFICATES !!}
			{!! $emploi->EDUCATIONANDEXP !!}
			{!! $emploi->COMPANY_DESC !!}

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







