<!DOCTYPE html>
<html>
    <!-- head -->
    @include('layouts.head')
    <!-- /.head -->
    <body class="hold-transition skin-blue sidebar-mini">
        <!--<body class="hold-transition skin-blue sidebar-mini">-->
        <!-- Site wrapper -->
        <div class="wrapper">

            <!-- header -->
            @include('layouts.header2')
            <!-- /.header -->

           

            <!-- Content Wrapper. Contains page content -->
            @yield('main_content')
            <!-- /.content-wrapper -->

            <!-- Footer. contains the footer -->
            @include('layouts.footer')
            <!-- /.Footer -->

            <!-- Add the side bar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- Scripts. contains the script -->
        @include('layouts.scripts')
        <!-- /.Scripts -->
    </body>
</html>
