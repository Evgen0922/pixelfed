@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="col-12 col-md-8 offset-md-2">
    @if (session('status'))
        <div class="alert alert-success">
            <p class="font-weight-bold mb-0">{{ session('status') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            <p class="font-weight-bold mb-0">{{ session('error') }}</p>
        </div>
    @endif

    @if(Auth::user()->email_verified_at)
    	<p class="lead text-center mt-5">Ваша почта подтверждена. <a href="/" class="font-weight-bold">Нажмите здесь</a> что-бы продолжить.</p>
    @else
    <div class="card shadow-none border">
      <div class="card-header font-weight-bold bg-white">Подтвердить почту</div>
      <div class="card-body">
        <p class="lead text-break">Вам необходимо подтвердить свой адрес электронной почты <span class="font-weight-bold">{{Auth::user()->email}}</span> перед продолжением.</p>
        @if(!$recentSent)
        <form method="post">
          @csrf
          <button type="submit" class="btn btn-primary btn-block py-1 font-weight-bold">Отправить подтверждение</button>
        </form>
        @else
        	<button class="btn btn-primary btn-block py-1 font-weight-bold" disabled>Письмо отправлено</button>
        @endif
    	<p class="mt-3 mb-0 small text-muted"><a href="/settings/email" class="font-weight-bold">Нажмите здесь</a> что бы поменять почту.</p>
      </div>
    </div>

    @if($recentSent)
    <div class="card mt-3 border shadow-none">
    	<div class="card-body">
    		<p class="mb-0 text-muted">If you are experiencing issues receiving your email confirmation, you can <a href="/i/verify-email/request" class="font-weight-bold">request manual verification</a>.</p>
    	</div>
    </div>
    @endif

    @endif
  </div>
</div>
@endsection

