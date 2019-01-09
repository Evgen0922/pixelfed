@extends('settings.template')

@section('section')

  <div class="title">
    <h3 class="font-weight-bold">Account Settings</h3>
  </div>
  <hr>
  <div class="form-group row">
    <div class="col-sm-3">
      <img src="{{Auth::user()->profile->avatarUrl()}}" width="38px" height="38px" class="rounded-circle float-right">
    </div>
    <div class="col-sm-9">
      <p class="lead font-weight-bold mb-0">{{Auth::user()->username}}</p>
      <p><a href="#" class="font-weight-bold change-profile-photo" data-toggle="collapse" data-target="#avatarCollapse" aria-expanded="false" aria-controls="avatarCollapse">Change Profile Photo</a></p>
      <div class="collapse" id="avatarCollapse">
        <form method="post" action="/settings/avatar" enctype="multipart/form-data">
        @csrf
        <div class="card card-body">
          <div class="custom-file mb-1">
            <input type="file" name="avatar" class="custom-file-input" id="avatarInput">
            <label class="custom-file-label" for="avatarInput">Select a profile photo</label>
          </div>
          <p><span class="small font-weight-bold">Must be a jpeg or png. Max avatar size: <span id="maxAvatarSize"></span></span></p>
          <div id="previewAvatar"></div>
          <p class="mb-0"><button type="submit" class="btn btn-primary px-4 py-0 font-weight-bold">Upload</button></p>
        </div>
        </form>
      </div>
    </div>
  </div>
  <form method="post">
    @csrf
    <div class="form-group row">
      <label for="name" class="col-sm-3 col-form-label font-weight-bold text-right">Name</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{Auth::user()->profile->name}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="username" class="col-sm-3 col-form-label font-weight-bold text-right">Username</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{Auth::user()->profile->username}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="website" class="col-sm-3 col-form-label font-weight-bold text-right">Website</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="{{Auth::user()->profile->website}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="bio" class="col-sm-3 col-form-label font-weight-bold text-right">Bio</label>
      <div class="col-sm-9">
        <textarea class="form-control" id="bio" name="bio" placeholder="Add a bio here" rows="2" data-max-length="{{config('pixelfed.max_bio_length')}}">{{Auth::user()->profile->bio}}</textarea>
        <p class="form-text">
          <span class="bio-counter float-right small text-muted">0/{{config('pixelfed.max_bio_length')}}</span>
        </p>
      </div>
    </div>
    <div class="pt-5">
      <p class="font-weight-bold text-muted text-center">Private Information</p>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label font-weight-bold text-right">Email</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{Auth::user()->email}}">
        <p class="help-text small text-muted font-weight-bold">
          @if(Auth::user()->email_verified_at)
          <span class="text-success">Verified</span> {{Auth::user()->email_verified_at->diffForHumans()}}
          @else
          <span class="text-danger">Unverified</span> You need to <a href="/i/verify-email">verify your email</a>.
          @endif
        </p>
      </div>
    </div>
    <div class="pt-5">
      <p class="font-weight-bold text-muted text-center">Storage Usage</p>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label font-weight-bold text-right">Storage Used</label>
      <div class="col-sm-9">
        <div class="progress mt-2">
          <div class="progress-bar" role="progressbar" style="width: {{$storage['percentUsed']}}%"  aria-valuenow="{{$storage['percentUsed']}}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="help-text">
          <span class="small text-muted">
            {{$storage['percentUsed']}}% used
          </span>
          <span class="small text-muted float-right">
            {{$storage['usedPretty']}} / {{$storage['limitPretty']}}
          </span>
        </div>
      </div>
    </div>
    <hr>
    <div class="form-group row">
      <div class="col-12 d-flex align-items-center justify-content-between">
        <a class="font-weight-bold" href="{{route('settings.remove.temporary')}}">Temporarily Disable Account</a>
        <button type="submit" class="btn btn-primary font-weight-bold float-right">Submit</button>
      </div>
    </div>
  </form>

@endsection

@push('scripts')
<script type="text/javascript">

  $(document).on('click', '.modal-close', function(e) {
    swal.close();
  });

  $('#bio').on('change keyup paste', function(e) {
    let el = $(this);
    let len = el.val().length;
    let limit = el.data('max-length');

    if(len > 100) {
      el.attr('rows', '4');
    }

    let val = len + ' / ' + limit;

    if(len > limit) {
      let diff = len - limit;
      val = '<span class="text-danger">-' + diff + '</span> / ' + limit;
    }

    $('.bio-counter').html(val);
  });

  $('#maxAvatarSize').text(filesize({{config('pixelfed.max_avatar_size') * 1024}}, {round: 0}));
</script>
@endpush
