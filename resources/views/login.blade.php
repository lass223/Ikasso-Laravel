@extends('base')

@section('content')
<form class="form-a contactForm" method="POST" action="{{ route('login') }}" style="margin-top: 200px;">
    @csrf


 <div class="col-md-12 mb-3">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required autofocus>
    </div>
 </div>
    
  <div class="col-md-12 mb-3">
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
  </div>

    <button type="submit" class="btn btn-a">S'authentifier</button>
    <a class="log-lien" href="{{ route('formUser') }}" style="color: #2eca6a;">S'inscrire</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
@endsection
