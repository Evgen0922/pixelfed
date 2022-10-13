	<div class="col-12 col-md-3 py-3" style="border-right:1px solid #ccc;">
		<ul class="nav flex-column settings-nav">
			<li class="nav-item pl-3 {{request()->is('settings/home')?'active':''}}">
				<a class="nav-link font-weight-light  text-muted" href="{{route('settings')}}">Аккаунт</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/accessibility')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.accessibility')}}">Доступность</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/email')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.email')}}">Почта</a>
			</li>
			@if(config('pixelfed.user_invites.enabled'))
			<li class="nav-item pl-3 {{request()->is('settings/invites*')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.invites')}}">Приглашения</a>
			</li>
			@endif
			<li class="nav-item pl-3 {{request()->is('settings/media*')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.media')}}">Медиа</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/notifications')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.notifications')}}">Уведомления</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/password')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.password')}}">Пароль</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/privacy*')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.privacy')}}">Конфиденциальность</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/relationships*')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.relationships')}}">Отношения с пользователями</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/security*')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.security')}}">Защита</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/timeline*')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.timeline')}}">Временные метки</a>
			</li>
			<li class="nav-item">
				<hr>
			</li>
			@if(config_cache('pixelfed.import.instagram.enabled'))
			<li class="nav-item pl-3 {{request()->is('*import*')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.import')}}">Импорт</a>
			</li>
			@endif
			<li class="nav-item pl-3 {{request()->is('settings/data-export')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.dataexport')}}">Экспорт данных</a>
			</li>

			@if(config_cache('pixelfed.oauth_enabled') == true)
			<li class="nav-item">
			<hr>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/applications')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.applications')}}">Applications</a>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/developers')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.developers')}}">Developers</a>
			</li>
			@endif

			<li class="nav-item">
			<hr>
			</li>
			<li class="nav-item pl-3 {{request()->is('settings/labs*')?'active':''}}">
				<a class="nav-link font-weight-light text-muted" href="{{route('settings.labs')}}">Бета</a>
			</li>
		</ul>
	</div>
