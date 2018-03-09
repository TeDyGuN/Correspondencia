@extends('Plantilla/plantilla')

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
            <div class="widget-body no-padding">
              <div class="easy-pie-chart txt-color-blue easyPieChart" data-percent="36" data-pie-size="180">
                <div class="">
                  <span class="percent percent-sign txt-color-blue font-xl semi-bold" style="width: 150%;">36</span>
                </div>

                      <canvas height="180" width="180"></canvas>
              </div>
              <div class="easy-pie-chart txt-color-red easyPieChart" data-percent="36" data-pie-size="180">
                      <span class="percent percent-sign txt-color-red font-xl semi-bold" style="width: 150%;">36</span>
                      <canvas height="180" width="180"></canvas>
              </div>
            </div>
            <!-- end widget content -->

          </div>
        </div>
      </div>

    </div>

    <div class="col-md-6">
      <div class="panel panel-default" style="margin-top:20px;">
        <div class="panel-heading" style="background:#568a89; color:white;">
          <h3 class="panel-title"><span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>Multi Anual</h3>
        </div>
        <div class="panel-body">
          <div role="content">
            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
              <!-- This area used as dropdown edit box -->

            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body no-padding">
              <div class="easy-pie-chart txt-color-darken easyPieChart" data-percent="36" data-pie-size="180">
                <div class="">
                  <span class="percent percent-sign txt-color-darken font-xl semi-bold" style="width: 150%;">36</span>
                </div>

                      <canvas height="180" width="180"></canvas>
              </div>
              <div class="easy-pie-chart txt-color-greenLight chart4" data-percent="100" data-pie-size="180">
                      <span class="percent percent-sign txt-color-greenLight font-xl semi-bold" style="width: 150%;">55</span>
                      <canvas height="180" width="180"></canvas>
              </div>
            </div>
            <!-- end widget content -->

          </div>
        </div>
      </div>

    </div>
	</div>

	<!-- end row -->

	<!-- row -->


</section>
<!-- end widget grid -->



@stop

@push('scripts')
  {{-- <script>
      $(function() {
        $('.chart4').easyPieChart({

        });
      });
  </script> --}}
@endpush
