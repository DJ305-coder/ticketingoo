@include('admin.includes.header')

@include('admin.includes.navbar')
@include('admin.includes.sidebar')

@yield('content')

@include('admin.includes.footer')
@include('admin.includes.js-files')

@yield('script')

</body>

</html>