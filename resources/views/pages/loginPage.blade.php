

@extends ('layouts.main')

@section ('container')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <div class="panel panel-default post">
          <div class="panel-body">
             <div class="row">

             </div>
          </div>
        </div>

      </div>

      @if (isset($user))
      @include ('layouts.rightbar')
      @endif

    </div>
  </div>
</section>
@stop