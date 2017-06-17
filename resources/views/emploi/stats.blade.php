@extends('emploi.base')
  @section('content')
  <div class="row">
  	<div class="col-md-12">
  		<h1>Stats page</h1>
  	</div>
  </div>

	<h1>Statistics</h1>

	<button id="example-c-PreviousDomain-selector" style="margin-bottom: 10px;" class="btn btn-info btn-xs">
		<i class="fa fa-arrow-circle-left"></i>
	</button>

	<button id="example-c-NextDomain-selector" style="margin-bottom: 10px;" class="btn btn-info btn-xs">
		<i class="fa fa-arrow-circle-right"></i>
	</button>

		</button>

	<div id="example-d"></div>
	<div id="onClick-placeholder">
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	</div>

	<style>
	.already_expired{
		font-style: italic;
		color: #999;
	}
	</style>
	
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<script type="text/javascript">


	   axios.get('/statisticsJSON', {
		    params: {
		      annee: 2017,
		      mois: 06,
		      jour: 15,
		    }
		  })
		  .then(function (response) {
		  	console.log('Les donnee via ajax');
		    console.log( response.data);
		  })
		  .catch(function (error) {
		    console.log(error);
		  });

	</script>
	<script type="text/javascript">


	Date.prototype.SubtractMonth = function(numberOfMonths) {

		var d = this;
		d.setMonth(d.getMonth() - numberOfMonths);
		d.setDate(1);

		return d;
	}

	var thisMonth = new Date();

	var cal = new CalHeatMap();
	cal.init({
		itemSelector: "#example-d",
		domain: "month",
	  itemName: ["job", "jobs"],
		data:  {!! $datas !!},
		start: thisMonth.SubtractMonth(5),
		cellSize: 12,
	  cellPadding: 5,
	  //domainGutter: 5,
	    label: {
	    position: "top"
	  },
	  tooltip: true,
	  domainDynamicDimension: false,
		range: 8,
		legend: [1, 2, 4, 6],
		previousSelector: "#example-c-PreviousDomain-selector",
		nextSelector: "#example-c-NextDomain-selector",
	    onClick: function(date, nb) {

	  var le_jour = date.getDate();
	  var le_mois = date.getMonth() + 1;
	  var l_annee = date.getFullYear();

		var today = new Date();
	console.log(le_jour + " " + le_mois + " " + l_annee);
	var jqxhr = $.ajax({
	  method: "GET",
	  url: "/statisticsJSON",
	  data: { 
	          annee: l_annee,
	  		  mois: le_mois,
	          jour:le_jour
	        }
	})
	  .done(function(data) {
	    //
	    console.log( data );
	    //mettre les données

	    $("#onClick-placeholder").empty();
	    data.forEach(function(entry) {
	      //console.log(entry);
	      //console.log(entry[fields]['slug'])
				//django needs [fields] but Laravel no ???
	      expirydate = Date.parse(entry['EXPIRYDATE']);
	      position = entry['POSITION'];
				greater = false;
				if (expirydate > today){
					expirydate = entry['EXPIRYDATE'];
				}else{
					expirydate = entry['EXPIRYDATE'] + "<span class='already_expired'> -> already expired</span>";
				}

				sentence = "Position : <b style='font-size:18px;'><a href=\"/" + "/emplois/" + entry['pk'] + '/' + "\"</a>" +  position + " </b><br/>" + " date : " +"<b>" +
			 expirydate + "</b> <br/> ";


	      $("#onClick-placeholder").append(
	       sentence
	    );

	    });
	    //foreach
	  })
	  .fail(function() {
	    //console.log( "error" );
	    //print error
	  })
	  .always(function() {
	    //console.log( "complete" );
	  });

	    }
	});
	</script>


  @stop