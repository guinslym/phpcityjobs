@extends('emploi.base')
  @section('content')
  <div class="row">
  	<div class="col-md-12">
  		<h1>Job list</h1>
  	</div>
  </div>



  <div class="row text-right">
    <ul>
      <li><strong>Sort by:</strong></li>
        <li class="">
          <a href="{{  route('posted_whithin_the_last_2_weeks') }}">Posted within the last 2 weeks</a>
        </li>
      <li class=""><a href="{{  route('will_expire_2_weeks_from_now' ) }}">Will expired in 2 weeks from now</a></li>
      <li class=""><a href="{{  route('home') }}">All jobs</a></li>
    </ul>
  </div>

<div class="row">
<div class="text-left">
<br/>


  		
        <hr>
  		


<div class="outterspace">

<h3>
  {{ $emplois->total() }} 
  {{ str_plural(' job', $emplois->total() ) }}
  found
</h3>
{{ $emplois->links() }}

<span class="nonetype" style="display:none;">
</span>
  @foreach($emplois as $emploi)
  <div class="filterWrap">

    <h3><a href="{{ url('emploi/show', [$emploi->id]) }}">{{ $emploi->POSITION }}. <span style='display:none;'>--{{ $emploi->id  }}</span> </a>
    <!-- Need to have an if else statement here -->
    @if ((Carbon\Carbon::parse($emploi->EXPIRYDATE)->isPast()) ===1)
          <small><i class="fa fa-ban" aria-hidden="true"></i></small>
    @endif
 

    
      </h3>

    <p>
            {!! str_limit($emploi->JOB_SUMMARY, 300) !!}
    </p>
    <ul>

          <li><strong>Salary Max: </strong>
           $ {{ $emploi->SALARYMAX }}
          </li>
          <li><strong>Salary Min: </strong>
          $ {{ $emploi->SALARYMIN  }}
          </li>


      <li><strong>Expiring date : </strong> <em>{{ Carbon\Carbon::parse($emploi->EXPIRYDATE)->format('Y-m-d') }} <abbr title="acending order or the Expiring date"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></abbr> </em></li>
      <li><strong>postdate: </strong> {{ Carbon\Carbon::parse($emploi->POSTDATE)->format('Y-m-d') }} </li>
      <li><strong>Apply link: </strong> <a href="{{ $emploi->JOBURL }}" target="_blank">Apply</a></li>
    </ul>

  </div><!-- div.filterWrap-->
  @endforeach

  <div class="filterWrap text-center">
    @if ($emplois->count() ===0)
          <h3>No job found</h3>
    @endif
  </div>


  {{ $emplois->links() }}
</div><!-- div.outterspace-->



  </div>
  </div>

  @stop