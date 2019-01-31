<br>

        <div class="col-md-3">
        <div class="list-group">
            @foreach ($users as $user)
             <a  class="list-group-item nav-item" href="{{ route('conversations.show',$user->id)}}">
                 {{ $user->name }}
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 @if(isset($unread[$user->id]))

                     <span class="badge badge-pill badge-primary">
                           {{ $unread[$user->id] }}
                     </span>

                 @endif
             </a>
            @endforeach
        </div>
    </div>
