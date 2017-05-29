
@extends ('layouts.main')

@section ('container')
    <section>
      <div class="container">

        <div class="row">

          <div class="col-md-8">

            <div class="members">

              <h1 class="page-header">Members</h1>

              @foreach ($users as $user)
              <div class="row member-row">
                <div class="col-md-3">
                  <img src="img/user.png" class="img-thumbnail" alt="">
                  <div class="text-center">
                    <a href="{{ URL::route('showWall', $user->wall_id) }}">{{ $user->name }}</a>
                  </div>
                </div>

                <div class="col-md-3">
                  <p>

                  @if (in_array($user->id, $friendsId))
                    <a href="" class="btn btn-default btn-block"><i class="fa fa-users"></i> Friend</a>
                    </p>
                </div>
                <div class="col-md-3">
                  <p><a href="#" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Unfriend</a></p>
                </div>

                  @elseif (in_array($user->id, $friendRequestsId))
                    <a href="{{ URL::route('acceptFreq', $user->id) }}" class="btn btn-default btn-block"><i class="fa fa-users"></i> Accept</a>
                    </p>
                </div>
                <div class="col-md-3">
                  <p><a href="{{ URL::route('declineFreq', $user->id ) }}" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Decline</a></p>
                </div>

                  @elseif (in_array($user->id, $friendRequestSentsId))
                    <a href="" class="btn btn-default btn-block"><i class="fa fa-users"></i> Friend Request Sent</a>
                    </p>
                </div>
                <div class="col-md-3">
                  <p><a href="#" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Send Message</a></p>
                </div>

                  @elseif ($user->id == $session_user->id)
                    <a href="" class="btn btn-default btn-block"><i class="fa fa-users"></i></a>
                    </p>
                </div>
                <div class="col-md-3">
                  <p><a href="#" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> </a></p>
                </div>

                  @else 
                    <a href="{{ URL::route('addfr', $user->id) }}" class="btn btn-success btn-block"><i class="fa fa-users"></i> Add Friend</a>
                    </p>
                </div>
                <div class="col-md-3">
                  <p><a href="#" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Send Message</a></p>
                </div>

                  @endif
                  

                <div class="col-md-3">
                  <p><a href="{{ URL::route('profile', $user->profile_id) }}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>
                </div>

              </div>
              @endforeach

            </div>
          </div>
          
          @include ('layouts.rightbar')
        </div>
      </div>
    </section>
@stop
