@include('admin.layouts.header')

@include('admin.layouts.navbar')



@include('admin.layouts.message')
<section class="content">
    <div class="container-fluid"> 
@yield('content')


</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')