@if($errors->has())
  <ul class="error">
 @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul>
@endif

@if (Session::has('success'))
  <ul class="success">
    <li>{{ Session::get('success') }}</li>
  </ul>
@endif
