@component('mail::message')
# Подтверждение почты

Здравствуйте, **{{'@'.$verify->user->username}}**. Пожалуйста, подтвердите Вашу почту.

Если вы не создавали учетную запись, пожалуйста, проигнорируйте это письмо.

@component('mail::button', ['url' => $verify->url()])
Подтвердить!
@endcomponent

<p>Эта ссылка действует 24 часа.</p>
<br>

Спасибо!<br>
<p>Команда Speechka</p>
<!-- <a href="{{ config('app.url') }}">{{ config('pixelfed.domain.app') }}</a> -->
@endcomponent
