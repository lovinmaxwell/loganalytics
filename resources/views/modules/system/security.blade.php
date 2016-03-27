@extends('backend.templates.default-nofooter-nosidebar-search')

@section('content')
<section class="content">
      <!-- Graph -->
      <div class="row">
        <div class="col-md-12">

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Security logs</h3>
              <div class="box-tools pull-right">
                Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
                  <button type="button" class="btn btn-default btn-xs" data-toggle="off">Off</button>
                </div>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div id="interactive" style="height: 300px;"></div>
            </div>
          </div>

        </div>
      </div>
</section>
@endsection

@section('extra_scripts')
<!-- FLOT CHARTS -->
<script src="{{ URL::asset('plugins/flot/jquery.flot.min.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ URL::asset('plugins/flot/jquery.flot.resize.min.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ URL::asset('plugins/flot/jquery.flot.pie.min.js') }}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ URL::asset('plugins/flot/jquery.flot.categories.min.js') }}"></script>
<!-- Page script -->
<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100;

    function getRandomData() {

      if (data.length > 0)
	data = data.slice(1);

      // Do a random walk
      while (data.length < totalPoints) {

	var prev = data.length > 0 ? data[data.length - 1] : 50,
	    y = prev + Math.random() * 10 - 5;

	if (y < 0) {
	  y = 0;
	} else if (y > 100) {
	  y = 100;
	}

	data.push(y);
      }

      // Zip the generated y values with the x values
      var res = [];
      for (var i = 0; i < data.length; ++i) {
	res.push([i, data[i]]);
      }

      return res;
    }

    var interactive_plot = $.plot("#interactive", [getRandomData()], {
      grid: {
	borderColor: "#f3f3f3",
	borderWidth: 1,
	tickColor: "#f3f3f3"
      },
      series: {
	shadowSize: 0, // Drawing is faster without shadows
	color: "#3c8dbc"
      },
      lines: {
	fill: true, //Converts the line chart to area chart
	color: "#3c8dbc"
      },
      yaxis: {
	min: 0,
	max: 100,
	show: true
      },
      xaxis: {
	show: true
      }
    });

    var updateInterval = 500; //Fetch data ever x milliseconds
    var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()]);

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw();
      if (realtime === "on")
	setTimeout(update, updateInterval);
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === "on") {
      update();
    }
    //REALTIME TOGGLE
    $("#realtime .btn").click(function () {
      if ($(this).data("toggle") === "on") {
	realtime = "on";
      }
      else {
	realtime = "off";
      }
      update();
    });
    /*
     * END INTERACTIVE CHART
     */

});
  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
	+ label
	+ "<br>"
	+ Math.round(series.percent) + "%</div>";
  }
</script>
@stop
