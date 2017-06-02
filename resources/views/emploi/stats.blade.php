@extends('emploi.base')
  @section('content')
  <div class="row">
  	<div class="col-md-12">
  		<h1>Stats page</h1>
  	</div>
  </div>

	<h1>Statistics</h1>
array of objects::{{ App\Emploi::all() }}
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

	<script type="text/javascript">
	   var lang = "en"
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
	var hello =0;
	cal.init({
		itemSelector: "#example-d",
		domain: "month",
	  itemName: ["job", "jobs"],
		data: {{ App\Emploi::all() }},
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

	        //Add AJAX call for all the jobs for that date
	        //Add cookie or variable for the language i18n
	        /*
	        $("#onClick-placeholder").html("You just clicked <br/>on <b>" +
	            date + "</b> <br/>with <b>" +
	            (nb === null ? "unknown" : nb) + "</b> jobs"
	        );
	*/
	  var le_jour = date.getDate();
	  var le_mois = date.getMonth() + 1;
	  var l_annee = date.getFullYear();

		var today = new Date();

	  //console.log(le_jour);
	  //console.log(le_mois);
	  //console.log(l_annee);
	var jqxhr = $.ajax({
	  method: "GET",
	  url: "/statistics",
	  data: { mois: le_mois,
	          annee: l_annee,
	          jour:le_jour,
	          language: lang
	        }
	})
	  .done(function(data) {
	    //
	    console.log( data );
	    //mettre les données
	    $("#onClick-placeholder").empty();
	    data.forEach(function(entry) {
	      //console.log(entry);
	      //console.log(entry['fields']['slug'])
				//console.log(entry['fields']['EXPIRYDATE']);
	      expirydate = Date.parse(entry['fields']['EXPIRYDATE']);
	      position = entry['fields']['POSITION'];
				greater = false;
				if (expirydate > today){
					expirydate = entry['fields']['EXPIRYDATE'];
				}else{
					expirydate = entry['fields']['EXPIRYDATE'] + "<span class='already_expired'> -> already expired</span>";
				}

				sentence = "Position : <b style='font-size:18px;'><a href=\"/" + lang +"/emplois/" + entry['pk'] + '/' + "\"</a>" +  position + " </b><br/>" + " date : " +"<b>" +
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