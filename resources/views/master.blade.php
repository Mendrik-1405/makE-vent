  @include('template/head')
  @include('template/division')
  @include('template/header')
  @include('template/aside')
<body>
<div class="page-wrapper">
  @yield('content')
</div>

  @include('template/footer')