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
          <a href="">Posted within the last 2 weeks</a>
        </li>
      <li class=""><a href="">Will expired in 2 weeks from now</a></li>
      <li class=""><a href="">All jobs</a></li>
    </ul>
  </div>

<div class="row">
<div class="text-left">
<br/>


  		
        <hr>
  		


<div class="outterspace">

<span class="nonetype" style="display:none;">
</span>
  @foreach($emplois as $emploi)
  <div class="filterWrap">

    <h3><a href="">{{ $emploi->POSITION }}.</a>
    <!-- Need to have an if else statement here -->
  {{ ((Carbon\Carbon::parse($emploi->EXPIRYDATE)->isPast()) ===1)  }}
          <small><i class="fa fa-ban" aria-hidden="true"></i></small>
 

    
      </h3>

    <p>
            {{ str_limit($emploi->JOB_SUMMARY, 50) }}
    </p>
    <ul>

          <li><strong>Salary Max: </strong>
           $ {{ $emploi->SALARYMAX }}
          </li>
          <li><strong>Salary Min: </strong>
          $ {{ $emploi->SALARYMIN  }}
          </li>


      <li><strong>Expiring date : </strong> <em>{{ Carbon\Carbon::parse($emploi->EXPIRYDATE)->format('Y-m-d') }} <abbr title="ordre"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></abbr> </em></li>
      <li><strong>postdate: </strong> {{ Carbon\Carbon::parse($emploi->POSTDATE)->format('Y-m-d') }} </li>
      <li><strong>Apply link: </strong> <a href="{{ $emploi->JOBURL }}" target="_blank">Apply</a></li>
    </ul>

  </div><!-- div.filterWrap-->
  @endforeach
</div><!-- div.outterspace-->



  </div>
  </div>

  @stop