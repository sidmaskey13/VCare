@include('dashboard.header')
@include('dashboard.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper dashboard">



    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->

        @include('layouts.message')

        @yield('contents')
    </section>
    <!-- /.content -->
</div>





@include('dashboard.footer')