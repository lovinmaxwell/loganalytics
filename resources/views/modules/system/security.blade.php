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

      <div class="row">

              </div>
      <!-- Table -->
      <div class="row">

        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Security access denied [ Top 15 ]</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">

              <div class="col-md-6">
                <!-- Right column -->
                <!-- DONUT CHART -->
                <div class="box ">

                  <div class="box-body">
                    <div class="chart" id="canvasBarChartContainer">
                    <canvas id="barChart2" style="height: 264px"></canvas>
                  </div>

                    <div class="table-responsive">
                      <table class="table no-margin">
                        <tbody>
                          <tr>
                            <td><i class="fa fa-square text-blue1"></i>&nbsp;Access
                              Denied</td>
                            <td><i class="fa fa-square text-blue2"></i>&nbsp;PING
                              FROM F/W</td>
                            <td><i class="fa fa-square text-blue3"></i>&nbsp;PING TO
                              F/W</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- / .right column -->
              <div class="col-md-6"> <!-- Right column -->
                <!-- DONUT CHART -->
                <div class="box ">

                    <div class="box-body">
                        <div id="PiechartContainer" style="text-align:center;"></div>
                        <div class="table-responsive">
                          <table class="table no-margin">
                            <tbody>
                              <tr>
                                <td><i class="fa fa-square text-blue1"></i>&nbsp;Access
                                  Denied</td>
                                <td><i class="fa fa-square text-blue2"></i>&nbsp;PING
                                  FROM F/W</td>
                                <td><i class="fa fa-square text-blue3"></i>&nbsp;PING TO
                                  F/W</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- / .right column -->

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
                <td rowspan="3" class="valign-center">N/A</td>
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
                <td rowspan="3" class="valign-center">N/A</td>
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
              <h3 class="box-title">System security access denied [ Top 15 ]</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

              <div class="col-md-12">
            <!-- Line chart -->
            <div class="box">

              <div class="box-body">
                <div id="line-chart" style="height: 300px;"></div>
              </div>
              <!-- /.box-body-->
            </div>
            <!-- /.box -->
            </div>
            <table class="table table-bordered table-striped table-condensed">

            <tr>
              <th style="width: 10px">#</th>
              <th>Event Type</th>
              <th> Event Message</th>
              <th>Interface In</th>
              <th>Interface Out</th>
              <th>IP Source</th>
              <th>IP Destination</th>
              <th>Port Source</th>
              <th>Port Destination</th>
              <th>Mac source</th>
              <th>Mac Destination</th>
              <th>Protocol</th>
              <th>TCP flags</th>
              <th>Packet Length</th>
              <th>TOs</th>
              <th>TTL</th>
              <th>Frequency</th>
            </tr>

            <tr>
              <td rowspan="14" class="text-center valign-center">1.</td>
              <td rowspan="14" class="text-center valign-center">AC</td>
              <td rowspan="14" class="text-center valign-center">Access Denied</td>
              <td rowspan="6" class="text-center valign-center">eth0</td>
              <td rowspan="5" class="text-center valign-center">eth1</td>
              <td rowspan="4" class="text-center valign-center">131.107.3.225</td>
              <td>192.9.200.102</td>
              <td>427</td>
              <td>57587</td>
              <td>14:58:d0:3f:c9:50</td>
              <td>00:90:0b:32:c7:18</td>
              <td>UDP</td>
              <td></td>
              <td>413</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-red">95%</span></td>
            </tr>
            <tr>
            <td>192.9.200.144</td>
              <td>3207</td>
              <td>52956</td>
              <td>14:58:d0:3f:c9:50</td>
              <td>00:90:0b:32:c7:18</td>
              <td>UDP</td>
              <td></td>
              <td>2290</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-orange">85%</span></td>
            </tr>
            <tr>
            <td>192.9.200.159</td>
              <td>3702</td>
              <td>50218</td>
              <td>14:58:d0:3f:c9:50</td>
              <td>00:90:0b:32:c7:18</td>
              <td>UDP</td>
              <td></td>
              <td>2290</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-blue">65%</span></td>
            </tr>
            <tr>
            <td>192.9.200.221</td>
              <td>3702</td>
              <td>61849</td>
              <td>14:58:d0:3f:c9:50</td>
              <td>00:90:0b:32:c7:18</td>
              <td>UDP</td>
              <td></td>
              <td>2289</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-red">95%</span></td>
            </tr>


            <tr>
            <td>131.107.3.51</td>
              <td>192.168.0.100</td>
              <td>52518</td>
              <td>161</td>
              <td>b8:ac:6f:a5:b8:1f</td>
              <td>00:90:0b:32:c7:18</td>
              <td>UDP</td>
              <td></td>
              <td>105</td>
              <td>0X00</td>
              <td>127</td>
              <td><span class="badge bg-green">55%</span></td>
            </tr>

            <tr>
              <td>N/A</td>
              <td>131.107.3.2</td>
              <td>192.168.222.1</td>
              <td>1217</td>
              <td>443</td>
              <td>c8:9c:dc:aa:50:78</td>
              <td>00:90:0b:32:c7:18</td>
              <td>TCP</td>
              <td>SYN</td>
              <td>52</td>
              <td>0X00</td>
              <td>128</td>
              <td><span class="badge bg-yellow">86%</span></td>
            </tr>

            <tr>
              <td rowspan="6" class="text-center valign-center">eth1</td>
              <td rowspan="6" class="text-center valign-center">eth0</td>
              <td rowspan="3" class="text-center valign-center">192.9.200.4</td>
              <td>131.107.3.14</td>
              <td>53</td>
              <td>57481</td>
              <td>00:1a:64:0a:4d:0c</td>
              <td>00:90:0b:32:c7:19</td>
              <td>UDP</td>
              <td></td>
              <td>109</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-blue">50%</span></td>
            </tr>
            <tr>
            <td>131.107.3.50</td>
              <td>53</td>
              <td>32836</td>
              <td>00:1a:64:0a:4d:0c</td>
              <td>00:90:0b:32:c7:19</td>
              <td>UDP</td>
              <td></td>
              <td>69</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-red">50%</span></td>
            </tr>
           <tr>
            <td>131.107.3.51</td>
              <td>53</td>
              <td>57335</td>
              <td>00:1a:64:0a:4d:0c</td>
              <td>00:90:0b:32:c7:19</td>
              <td>UDP</td>
              <td></td>
              <td>62</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-blue">50%</span></td>
            </tr>

            <tr>
            <td rowspan="3" class="text-center valign-center">192.9.200.5</td>
              <td>131.107.3.2</td>
              <td>53</td>
              <td>61187</td>
              <td>00:1a:64:0a:4d:0c</td>
              <td>00:90:0b:32:c7:19</td>
              <td>UDP</td>
              <td></td>
              <td>72</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-blue">50%</span></td>
            </tr>
            <tr>
            <td>131.107.3.32</td>
              <td>53</td>
              <td>61066</td>
              <td>00:1a:64:0a:4d:0c</td>
              <td>00:90:0b:32:c7:19</td>
              <td>UDP</td>
              <td></td>
              <td>109</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-orange">60%</span></td>
            </tr>
           <tr>
            <td>131.107.3.52</td>
              <td>53</td>
              <td>53861</td>
              <td>00:1a:64:0a:4d:0c</td>
              <td>00:90:0b:32:c7:19</td>
              <td>UDP</td>
              <td></td>
              <td>69</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-green">80%</span></td>
            </tr>

            <tr>
              <td>eth3</td>
              <td>eth0</td>
              <td>192.168.222.1</td>
              <td>131.107.3.31</td>
              <td>20031</td>
              <td>20031</td>
              <td>a0:48:1c:76:e8:9b</td>
              <td>00:90:0b:32:c7:1b</td>
              <td>UDP</td>
              <td></td>
              <td>536</td>
              <td>0X00</td>
              <td>63</td>
              <td><span class="badge bg-grey">20%</span></td>
            </tr>

            <tr>
              <td>N/A</td>
              <td>lo</td>
              <td>127.0.0.1</td>
              <td>127.0.0.1</td>
              <td>48913</td>
              <td>53</td>
              <td>N/A</td>
              <td>N/A</td>
              <td>UDP</td>
              <td></td>
              <td>70</td>
              <td>0X00</td>
              <td>64</td>
              <td><span class="badge bg-orange">20%</span></td>
            </tr>



            <tr>
              <td rowspan="4" class="text-center valign-center">2.</td>
              <td rowspan="4" class="text-center valign-center">SE</td>
              <td rowspan="4" class="text-center valign-center">NIDS ENABLED</td>
              <td>NULL</td>
              <td>NULL</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
              <td><span class="badge bg-grey">35%</span></td>
            </tr>





          </table>
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
<script src="http://d3js.org/d3.v3.min.js"></script>
      <!-- ChartJS 1.0.1 -->
    <script src="{{ URL::asset('plugins/chartjs/Chart.min.js') }}"></script>
     <!-- canvasjs -->
    <script type="text/javascript" src="{{ URL::asset('plugins/canvasjs/canvasjs.min.js') }}"></script>
    <!-- FLOT CHARTS -->
<script src="{{ URL::asset('plugins/flot/jquery.flot.min.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ URL::asset('plugins/flot/jquery.flot.resize.min.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ URL::asset('plugins/flot/jquery.flot.pie.min.js') }}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ URL::asset('plugins/flot/jquery.flot.categories.min.js') }}"></script>
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

  var areaChartData = {
							                labels: ["10-4-2012", "16-4-2012", "17-4-2012"],
							                datasets: [
							                           {
							                               label: "Access Denied",
							                               fillColor: "#55818F",
							                               strokeColor: "#55818F",
							                               pointColor: "#55818F",
							                               pointStrokeColor: "#55818F",
							                               pointHighlightFill: "#fff",
							                               pointHighlightStroke: "rgba(60,141,188,1)",

							                               data: [4, 2, 1]
							                             },
							                             {
							                               label: "PING FROM F/W",
							                               fillColor: "#51ABD2",
							                               strokeColor: "#51ABD2",
							                               pointColor: "#51ABD2",
							                               pointStrokeColor: "#51ABD2",
							                               pointHighlightFill: "#fff",
							                               pointHighlightStroke: "rgba(60,141,188,1)",

							                               data: [3, 1, 2]
							                             },
							                                   {
							                               label: "PING TO F/W",
							                               fillColor: "#B1D3DD",
							                               strokeColor: "#B1D3DD",
							                               pointColor: "#B1D3DD",
							                               pointStrokeColor: "#B1D3DD",
							                               pointHighlightFill: "#fff",
							                               pointHighlightStroke: "rgba(60,141,188,1)",

							                               data: [1, 4, 1]
							                             }
							                           ]
							              };
							       var barChartCanvas = $("#barChart2").get(0).getContext("2d");
							          var barChart = new Chart(barChartCanvas);
							          var barChartData = areaChartData;
							          var barChartOptions = {
							            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
							            scaleBeginAtZero: true,
							            //Boolean - Whether grid lines are shown across the chart
							            scaleShowGridLines: true,
							            //String - Colour of the grid lines
							            scaleGridLineColor: "rgba(0,0,0,.05)",
							            //Number - Width of the grid lines
							            scaleGridLineWidth: 1,
							            //Boolean - Whether to show horizontal lines (except X axis)
							            scaleShowHorizontalLines: true,
							            //Boolean - Whether to show vertical lines (except Y axis)
							            scaleShowVerticalLines: true,
							            //Boolean - If there is a stroke on each bar
							            barShowStroke: true,
							            //Number - Pixel width of the bar stroke
							            barStrokeWidth: 1,
							            //Number - Spacing between each of the X value sets
							            barValueSpacing: 5,
							            //Number - Spacing between data sets within X values
							            barDatasetSpacing: 1,
							            //String - A legend template
							            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
							            //Boolean - whether to make the chart responsive
							            responsive: true,
							            maintainAspectRatio: true
							          };

							          barChartOptions.datasetFill = false;
							          barChart.Bar(barChartData, barChartOptions);

                        var w = 265;
                         var h = 265;
                         var r = h/2;
                         var color = d3.scale.ordinal()
                         .range(["#55818F", "#51ABD2", "#B1D3DD"]);

                         var data = [{ "value":20},
                         		          {"value":50},
                         		          {"value":30}];


                         var vis = d3.select('#PiechartContainer').append("svg:svg").data([data]).attr("width", w).attr("height", h).append("svg:g").attr("transform", "translate(" + r + "," + r + ")");
                         var pie = d3.layout.pie().value(function(d){return d.value;});

                         // declare an arc generator function
                         var arc = d3.svg.arc().outerRadius(r);

                         // select paths, use arc generator to draw
                         var arcs = vis.selectAll("g.slice").data(pie).enter().append("svg:g").attr("class", "slice");
                         arcs.append("svg:path")
                             .attr("fill", function(d, i){
                                 return color(i);
                             })
                             .attr("d", function (d) {
                                 // log the result of the arc generator to show how cool it is :)
                                 console.log(arc(d));
                                 return arc(d);
                             });

                         // add the text
                         arcs.append("svg:text").attr("transform", function(d){
                         			d.innerRadius = 0;
                         			d.outerRadius = r;
                             return "translate(" + arc.centroid(d) + ")";}).attr("text-anchor", "middle").text( function(d, i) {
                             return data[i].label;}
                         		);

                            /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [], cos = [];
    for (var i = 0; i < 40; i += 0.5) {
      sin.push([i, Math.sin(i)]);
      cos.push([i, Math.cos(i)]);
    }
    var line_data1 = {
      data: sin,
      color: "#3c8dbc"
    };
    var line_data2 = {
      data: cos,
      color: "#00c0ef"
    };
    $.plot("#line-chart", [line_data1, line_data2], {
      grid: {
        hoverable: true,
        borderColor: "#f3f3f3",
        borderWidth: 1,
        tickColor: "#f3f3f3"
      },
      series: {
        shadowSize: 0,
        lines: {
          show: true
        },
        points: {
          show: true
        }
      },
      lines: {
        fill: false,
        color: ["#3c8dbc", "#f56954"]
      },
      yaxis: {
        show: true,
      },
      xaxis: {
        show: true
      }
    });
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: "absolute",
      display: "none",
      opacity: 0.8
    }).appendTo("body");
    $("#line-chart").bind("plothover", function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2);

        $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
            .css({top: item.pageY + 5, left: item.pageX + 5})
            .fadeIn(200);
      } else {
        $("#line-chart-tooltip").hide();
      }

    });
    /* END LINE CHART */

</script>
@endsection
