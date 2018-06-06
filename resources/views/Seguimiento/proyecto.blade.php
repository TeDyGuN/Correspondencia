@extends('Plantilla/plantilla')
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
      }
    </style>
@section('content')

    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Proyectos</li>
        </ol>
    </div>
    <div class="container-fluid">


      <div id="content" style="opacity: 1;"><div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> <a href="{{ url('proyectos')}}">Proyectos</a> <span>&gt; {{ $proyectos[0]->nombre}}</span></h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
				<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm"><canvas width="89" height="26" style="display: inline-block; width: 89px; height: 26px; vertical-align: top;"></canvas></div>
			</li>
			<li class="sparks-info">
				<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up"></i>&nbsp;45%</span></h5>
				<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"><canvas width="82" height="26" style="display: inline-block; width: 82px; height: 26px; vertical-align: top;"></canvas></div>
			</li>
			<li class="sparks-info">
				<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
				<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm"><canvas width="82" height="26" style="display: inline-block; width: 82px; height: 26px; vertical-align: top;"></canvas></div>
			</li>
		</ul>
	</div>
</div>

<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Proyectos</a></li>
  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Mapas</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="home">
    <!-- widget grid -->
    <section id="widget-grid" class="">

    	<!-- row -->
    	<div class="row">


        <div class="col-md-6">
          <div class="panel panel-default" style="margin-top:20px;">
            <div class="panel-heading" style="background:#6e587a; color:white;">
                <h3 class="panel-title"><span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>Anual</h3>
            </div>
            <div class="panel-body">
              <div role="content">
                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                  <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding" style="margin-top:15px;">
                  <div class="easy-pie-chart txt-color-blue easyPieChart" data-percent="36" data-pie-size="180">
                      <span class="percent percent-sign txt-color-blue font-xl semi-bold" style="width: 150%;">36</span>
                      <h4 style="width: 150%;margin-bottom:10px;" class="text-center">2018 Ejecución Actividades</h4>
                    <canvas height="180" width="180"></canvas>
                  </div>
                  <div class="easy-pie-chart txt-color-red easyPieChart" data-percent="36" data-pie-size="180">
                      <span class="percent percent-sign txt-color-red font-xl semi-bold" style="width: 150%;">36</span>
                      <h4 style="width: 150%;margin-bottom:10px;" class="text-center">2018 Ejecución Presupuestaria</h4>
                      <canvas height="180" width="180"></canvas>
                  </div>
                </div>
                <!-- end widget content -->

              </div>
            </div>
          </div>

        </div>

        <div class="col-md-6">
          <div class="panel panel-default" style="margin-top:15px;">
            <div class="panel-heading" style="background:#568a89; color:white;">
              <h3 class="panel-title"><span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>Fase</h3>
            </div>
            <div class="panel-body">
              <div role="content">
                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                  <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding"style="margin-top:20px;">
                  <div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="36" data-pie-size="180">
                    <div class="">
                      <span class="percent percent-sign txt-color-darken font-xl semi-bold" style="width: 150%;">36</span>
                      <h4 style="width: 150%;margin-bottom:10px;" class="text-center">Ejecución Actividades Fase</h4>
                    </div>

                          <canvas height="180" width="180"></canvas>
                  </div>
                  <div class="easy-pie-chart txt-color-greenLight chart4" data-percent="98" data-pie-size="180">
                          <span class="percent percent-sign txt-color-greenLight font-xl semi-bold" style="width: 150%;">55</span>
                          <h4 style="width: 150%;margin-bottom:10px;" class="text-center">2018 Ejecución Fase</h4>
                          <canvas height="180" width="180"></canvas>
                  </div>
                </div>
                <!-- end widget content -->

              </div>
            </div>
          </div>

        </div>
    	</div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default" style="margin-top:20px;">
            <div class="panel-heading" style="background:#568a89; color:white;">
              <h3 class="panel-title"><span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>Indicadores de Resultado</h3>
            </div>
            <div class="panel-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="5%">Codigo</th>
                    <th width="30%">Indicador</th>
                    <th width="4%">Tipo</th>
                    <th width="6%">Ejecutado</th>
                    <th width="6%">Planificado</th>
                    <th width="4%">Porcentaje</th>
                    <th width="46%">Progreso</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($indicadores as $f)
                    <tr>
                      <td rowspan="2">{{ $f->id }}</td>
                      <td rowspan="2">{{ $f->indicador }}</td>
                      <td>Anual</td>
                      <td>{{ $f->a_ejecutado }}</td>
                      <td>{{ $f->a_planificado}}</td>
                      <td>{{ number_format(($f->a_ejecutado / $f->a_planificado) * 100, 0) }}%</td>
                      <td>
                        <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
      										<div class="progress">
      											<div class="progress-bar bg-color-red" style="width: {{ ($f->a_ejecutado / $f->a_planificado) * 100 }}%;"></div>
      										</div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Fase</td>
                      <td>{{ $f->f_ejecutado }}</td>
                      <td>{{ $f->f_planificado}}</td>
                      <td>{{ number_format(($f->f_ejecutado / $f->f_planificado) * 100, 0) }}%</td>
                      <td>
                        <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
      										<div class="progress">
      											<div class="progress-bar bg-color-blueDark" style="width: {{ ($f->f_ejecutado / $f->f_planificado) * 100 }}%;"></div>
      										</div>
                        </div>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
              {{-- <div role="content">
    			       <div class="jarviswidget-editbox">

    			       </div>
    			       <div class="widget-body no-padding">
      		         <div id="bar-chart-h" class="chart" style="padding: 0px; position: relative;">
                     <canvas class="flot-base" width="1112" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1112px; height: 220px;">
                     </canvas>
                     <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                       <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 21px; text-align: center;">0.0</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 114px; text-align: center;">2.5</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 206px; text-align: center;">5.0</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 299px; text-align: center;">7.5</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 388px; text-align: center;">10.0</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 480px; text-align: center;">12.5</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 573px; text-align: center;">15.0</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 665px; text-align: center;">17.5</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 758px; text-align: center;">20.0</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 850px; text-align: center;">22.5</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 942px; text-align: center;">25.0</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 126px; top: 205px; left: 1035px; text-align: center;">27.5</div>
                       </div>
                       <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                         <div class="flot-tick-label tickLabel" style="position: absolute; top: 188px; left: 0px; text-align: right;">Empleo</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; top: 151px; left: 3px; text-align: right;">Educacion</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; top: 114px; left: 3px; text-align: right;">telefoia</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; top: 77px; left: 3px; text-align: right;">Inteneret</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; top: 40px; left: 3px; text-align: right;">Salud y Gobierno</div>
                         <div class="flot-tick-label tickLabel" style="position: absolute; top: 3px; left: 3px; text-align: right;">Ese no se que se llamara</div>
                       </div>
                     </div>
                     <canvas class="flot-overlay" width="1112" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1112px; height: 220px;"></canvas>
                   </div>
    						</div>
    		      </div> --}}
            </div>
          </div>

        </div>
      </div>

    	<!-- end row -->

    	<!-- row -->


    </section>
    <!-- end widget grid -->

  </div>
  <div role="tabpanel" class="tab-pane" id="profile">
    <div id="map" ></div>
  </div>
</div>





@stop

@section('addscripts')


  <script>
var plot_4;
var pagefunction = function() {

/* chart colors default */
var $chrt_border_color = "#efefef";
var $chrt_grid_color = "#DDD"
var $chrt_main = "#E24913";			/* red       */
var $chrt_second = "#6595b4";		/* blue      */
var $chrt_third = "#FF9F01";		/* orange    */
var $chrt_fourth = "#7e9d3a";		/* green     */
var $chrt_fifth = "#BD362F";		/* dark red  */
var $chrt_mono = "#000";

/* bar-chart-h */
if ($("#bar-chart-h").length) {
  //Display horizontal graph
  var d1_h = [];
  for (var i = 0; i <= 3; i += 1)
    d1_h.push([100, i]);


  console.log(d1_h);
  var d2_h = [];
  for (var i = 0; i <= 3; i += 1)
    d2_h.push([parseInt(Math.random() * 100), i]);

  var ds_h = new Array();
  ds_h.push({
    data : d1_h,
    bars : {
      horizontal : true,
      show : true,
      barWidth : 0.3,
      order : 1,
    }
  });
  ds_h.push({
    data : d2_h,
    bars : {
      horizontal : true,
      show : true,
      barWidth : 0.3,
      order : 2
    }
  });
  // display graph
  plot_4 = $.plot($("#bar-chart-h"), ds_h, {
    colors : ["#6595b4", "#FF9F01", "#666", "#BBB"],
    grid : {
      show : true,
      hoverable : true,
      clickable : true,
      tickColor : "#efefef",
      borderWidth : 0,
      borderColor : "#efefef",
    },
    legend : true,
    tooltip : true,
    tooltipOpts : {
      content : "<b>%x</b> = <span>%y</span>",
      defaultTheme : false
    },
    bars: {
      show: true,
      lineWidth: 0,
      fill: true
    }
  });

}




};
pagefunction();
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1MIbn2JdzxbxXGtmvSR859e_f_oLIMBg&callback=initMap"></script>
  <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -16.290154, lng: -63.588653},
          zoom: 6
        });
      }
      // Define the LatLng coordinates for the polygon's path.
              var triangleCoords = [
                {lat: 25.774, lng: -80.190},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757},
                {lat: 25.774, lng: -80.190}
              ];

              // Construct the polygon.
              var bermudaTriangle = new google.maps.Polygon({
                paths: triangleCoords,
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35
              });
              bermudaTriangle.setMap(map);
  </script>

@endsection('addscripts')
