<div class="jumbotron">

    <div class="col-lg-10  col-lg-offset-1 text-center" id="main-page">
      <h3>Ottawa City Jobs</h3>

    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Flag_of_Ottawa%2C_Ontario.svg/250px-Flag_of_Ottawa%2C_Ontario.svg.png">

	{!! Form::open(['method'=>'GET' ,'url' => 'search', 'class'=>'form-group main-form', 'id'=>'search-form', 'role'=>'search']) !!}
	<input class="form-group main-form" id="q_objname_en_cont" name="searchKey"  placeholder='Search by Job title' required="required" style="height:40px;width:60%" type="search">
	<input class="btn btn-warning" type="submit" value="Search">
	{!! Form::close() !!}

</div>
</div>