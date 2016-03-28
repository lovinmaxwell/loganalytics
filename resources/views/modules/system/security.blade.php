@extends('backend.templates.default-nofooter-nosidebar-search')

@section('content')
<section class="content-header">
  <h1>
    Security logs
    <small>Firewall responses, Security access, System access</small>
  </h1>
</section>

<section class="content">

      <!-- Graph -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Firewall response hits - [ Hits vs Time in ms.] </h3>
              <div class="box-tools pull-right">
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="on"><i class="fa fa-minus"></i></button>
                </div>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div id="interactive" style="height: 300px;"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Table -->
      <div class="row">

        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Security access denied [ Top 10 ]</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">


              <p>Graph</p>

              <table class="table table-bordered table-striped table-condensed">

              <tr>
                <th style="width: 10px">#</th>
                <th>Type</th>
                <th>Message</th>
                <th>Int. In</th>
                <th>Int. Out</th>
                <th>Source</th>
                <th>Destination</th>
                <th>ICMP Type</th>
                <th>Packet Length</th>
                <th>TOS</th>
                <th>TTL</th>
                <th>Freq.</th>
              </tr>

              <tr>
                <td rowspan="6" class="text-center valign-center">1.</td>
                <td rowspan="6" class="text-center valign-center">AC</td>
                <td rowspan="6" class="text-center valign-center">Access Denied</td>
                <td>eth0</td>
                <td>eth1</td>
                <td>131.107.3.51</td>
                <td>192.9.200.2</td>
                <td>8</td>
                <td>60</td>
                <td>0X00</td>
                <td>127</td>
                <td><span class="badge bg-red">95%</span></td>
              </tr>

              <tr>
                <td>eth1</td>
                <td>eth0</td>
                <td>192.9.200.172</td>
                <td>131.107.3.200</td>
                <td>3</td>
                <td>56</td>
                <td>0X00</td>
                <td>63</td>
                <td><span class="badge bg-yellow">86%</span></td>
              </tr>

              <tr>
                <td>Io</td>
                <td>N/A</td>
                <td>192.168.222.1</td>
                <td>192.168.222.1</td>
                <td>3</td>
                <td>117</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-blue">50%</span></td>
              </tr>

              <tr>
                <td rowspan="3" class="text-center valign-center">N/A</td>
                <td>eth3</td>
                <td>192.168.222.1</td>
                <td>192.168.222.2</td>
                <td>3</td>
                <td>60</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-red">20%</span></td>
              </tr>

              <tr>
                <td>eth1</td>
                <td>192.9.200.173</td>
                <td>192.9.200.172</td>
                <td>5</td>
                <td>68</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-blue">55%</span></td>
              </tr>

              <tr>
                <td>eth0</td>
                <td>131.107.3.1</td>
                <td>131.107.3.225</td>
                <td>11</td>
                <td>108</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-red">36%</span></td>
              </tr>

              <tr>
                <td rowspan="5" class="text-center valign-center">2.</td>
                <td rowspan="5" class="text-center valign-center">SE</td>
                <td rowspan="5" class="text-center valign-center">PING FROM F/W</td>
                <td >eth0</td>
                <td>eth1</td>
                <td>131.107.3.51</td>
                <td>192.9.200.2</td>
                <td>8</td>
                <td>60</td>
                <td>0X00</td>
                <td>127</td>
                <td><span class="badge bg-yellow  ">35%</span></td>
              </tr>


              <tr>
                <td>eth1</td>
                <td>eth0</td>
                <td>131.107.2.2</td>
                <td>131.107.3.2</td>
                <td>8</td>
                <td>60</td>
                <td>0X00</td>
                <td>126</td>
                <td><span class="badge bg-grey">45%</span></td>
              </tr>


              <tr>
                <td rowspan="3" class="text-center valign-center">N/A</td>
                <td>Io</td>
                <td>192.9.200.173</td>
                <td>192.9.200.173</td>
                <td>8</td>
                <td>92</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-yellow">33%</span></td>
              </tr>

              <tr>
                <td>eth0</td>
                <td>131.107.3.1</td>
                <td>131.107.3.2</td>
                <td>8</td>
                <td>84</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-grey">10%</span></td>
              </tr>

              <tr>
                <td>eth1</td>
                <td>192.9.200.173</td>
                <td>192.9.200.172</td>
                <td>8</td>
                <td>84</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-blue">66%</span></td>
              </tr>

              <tr>
                <td rowspan="5" class="text-center valign-center">3.</td>
                <td rowspan="5" class="text-center valign-center">SE</td>
                <td rowspan="5" class="text-center valign-center">PING TO F/W</td>
                <td >eth0</td>
                <td>N/A</td>
                <td>131.107.3.50</td>
                <td>131.107.3.1</td>
                <td>8</td>
                <td>84</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-grey">35%</span></td>
              </tr>


              <tr>
                <td>eth1</td>
                <td>N/A</td>
                <td>192.9.200.172</td>
                <td>192.9.200.173</td>
                <td>8</td>
                <td>60</td>
                <td>0X00</td>
                <td>127</td>
                <td><span class="badge bg-red">45%</span></td>
              </tr>


              <tr>
                <td>Io</td>
                <td>N/A</td>
                <td>192.9.200.173</td>
                <td>192.9.200.173</td>
                <td>8</td>
                <td>124</td>
                <td>0X00</td>
                <td>64</td>
                <td><span class="badge bg-blue">45%</span></td>
              </tr>

            </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">System security access denied [ Top 10 ]</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

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
      },
      axisLabels: {
            show: true
        },
        xaxes: [{
            axisLabel: 'foo',
        }],
        yaxes: [{
            position: 'left',
            axisLabel: 'bar',
        }, {
            position: 'right',
            axisLabel: 'bleem'
        }]
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
@endsection
