<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">

      <meta httpequiv="XUACompatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Laravelloooo</title>

      <link href="/assets/css/bootstrap/bootstrap.css" rel="stylesheet" />

      <link href="/assets/css/material_design/bootstrap-material-design.css" rel="stylesheet" />

      <link href="/assets/css/material_design/ripples.css" rel="stylesheet" />

      <link href="/assets/css/custom/layout.css" rel="stylesheet" />
	</head>
	<body style="padding-top:60px;">

      <!--bagian navigation-->

      @include('shared.head_nav')

      <!-- Bagian Content -->

      <div class="container clearfix">

        <div class="row row-offcanvas row-offcanvas-left ">

          <!--Bagian Kiri-->

         <!-- @include("shared.left_nav")-->


          <!--Bagian Kanan-->

          <div id="main-content" class="col-xs-12 col-sm-12 main pull-right">

            <div class="panel-body">

              @if (Session::has('error'))

                <div class="session-flash alert-danger">

                    {{Session::get('error')}}

                </div>

              @endif

              @if (Session::has('notice'))

                <div class="session-flash alert-info">

                    {{Session::get('notice')}}

                </div>

              @endif

              @yield("content")

            </div>

          </div>

        </div>

      </div>

      <script src="/assets/js/jquery/jquery-2.2.5.js"></script>

      <script src="/assets/js/bootstrap/bootstrap.js"></script>
      <script src="/assets/js/bootstrap/bootstrap.min.js"></script>

      <script src="/assets/js/material-design/material.js"></script>

      <script src="/assets/js/material-design/ripples.js"></script>
      <script src="/assets/js/jquery/jquery.js"></script>
      <script src="/assets/js/bootstrap/modal.js"></script>      
      <script src="/assets/js/bootstrap/dropdown.js"></script>      
      <script src="/assets/js/bootstrap/collapse.js"></script>      

      <script src="/assets/js/custom/layout.js"></script>      

    </body>
</html>
