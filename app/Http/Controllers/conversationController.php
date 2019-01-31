<?php

namespace App\Http\Controllers;

use App\Notifications\MessageReceived;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use App\Http\Requests\StoreMessage;

class conversationController extends Controller
{

    private $conversationRepository;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth)
    {
        $this->middleware('auth');
        $this->repo=$conversationRepository;
        $this->auth=$auth;
    }
    public function index(){

     return view('conversation',[
         'users'=>$this->repo->getConversation($this->auth->user()->id),
         'unread'=>$this->repo->unreadCount($this->auth->user()->id)
     ]);

    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user){

        $me = $this->auth->user();
        $message=$this->repo->getMessageFor($me->id, $user->id)->paginate(15);
        $unread=$this->repo->unreadCount($me->id);

        if (isset($unread[$user->id])){
            $this->repo->readAllFrom($user->id,$me->id);
            unset($unread[$user->id]);
        }

        return view('show',[
            'users' => $this->repo->getConversation($me->id),
            'user'=>$user,
            'messages'=> $message,
            'unread'=> $unread
        ] );

    }

    /**
     * @param User $user
     * @param StoreMessage $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(User $user, StoreMessage $request){

        $message=$this->repo->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );


         /*
          * mettre en place un serveur de messagerie
          * exemple maildev
          * telechager maildev
          */
        //$user->notify(new MessageReceived($message));
        return redirect(route('conversations.show',['id'=>$user->id]));
    }
}
