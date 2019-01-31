@extends('layouts.welcome')

@section('title')
    123 Causons
@endsection

@section('content')

@include('includes.conversation_header')
<br>
<div class="row">
@include('includes.users',['users'=>$users,'unread'=>$unread])

  <div class="col-md-9">
      @if ($errors->any())

      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <div class="card">
          <div class="card-header">{{ $user->name }}</div>
          <div class="card-body conversations">
              <br>
              @if($messages->hasMorePages())
                   <div class="text-center">
                       <a href="{{ $messages->nextPageUrl() }}" class="btn btn-info">
                           Messages precedents
                       </a>
                   </div>
              @endif

            @foreach ( array_reverse($messages->items()) as $message)
                <div class="row">
                    <div class="col-md-10 {{ $message->from->id !== $user->id ? 'offset-md-1 text-right' : ''}}">
                        <p>
                            <br>
                            &nbsp;&nbsp;<strong>{{$message->from->id !== $user->id ? 'Moi': $message->from->name }}</strong><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;{!!  nl2br(e($message->content))  !!}
                        </p>
                    </div>
                </div>
                <hr>
                  @if($messages->previousPageUrl())
                      <div class="text-center">
                          <a href="{{ $messages->PreviousPageUrl() }}" class="btn btn-info">
                              Messages suivant
                          </a>
                      </div>
                  @endif
            @endforeach
              <form action="" method="post">
                  {{ csrf_field() }}
                  <br>
                  <div class="row">
                      <div class="col-md-1"></div>
                      <div class="col-md-10">
                          <div class="form-group">
                    <textarea class="form-control" name="content" cols="3"  placeholder="Ecrivez votre message..."></textarea>
                  </div>
                      </div>
                      <div class="col-md-1"></div>
                  </div>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="submit" class="btn btn-primary">Envoyer</button>
              </form>
              <br>
          </div>
      </div>
  </div>
</div>

@endsection


