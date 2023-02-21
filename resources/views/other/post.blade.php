<a href="/subreddit/{{$post->subreddit->id}}"> <h4>{{$post->subreddit->name}}
    @if (auth()->user()->isBanned($post->subreddit))
        -Banned
    @endif  
<img src="{{asset("storage/".$post->subreddit->image)}}" width="40px" height="30px"></h4></a>  
<a href="/post/{{$post->id}}" style="text-decoration: none;text-color:black;">

    <h2>Title:{{$post->title}}</a><a href="/homes/{{$post->user->id}}" style="text-decoration: none;text-color:black;">
        @if(auth()->user() == $post->user)

            - Posted By You
        @else

            - {{$post->user->name}} <img src="{{asset('storage/'.$post->user->image)}}" width="40px" height="25px">
            @if ($post->user->isJoined($post->subreddit))
                @can('subredditdelete',$post->subreddit)
                    @if (!$post->user->isMod($post->subreddit))
                        <form action="/giverole/{{$post->user->id}}/{{$post->subreddit->id}}" method="post">
                            @csrf
                            <button type="submit">MODERATORLUQ VER</button>
                        </form>
                    @elseif ($post->user->isMod($post->subreddit))
                        <form action="/takerole/{{$post->user->id}}/{{$post->subreddit->id}}" method="post">
                            @csrf
                            <button type="submit">MODERATORLUQ Al</button>
                        </form>
                    @endif
                @endcan
                    @can('subredditdelete',$post->subreddit)
                            <form action="/ban/{{$post->id}}" method="post">
                                @csrf
                                <button type="submit">Banla</button>
                            </form>
                        @endcan
                    @if (auth()->user()->id != $post->subreddit->creator_id)
                        @if($post->user->id != $post->subreddit->creator_id)
                                @if(!$post->user->isMod($post->subreddit))
                                    @can('moddelete',$post->subreddit)
                                        <form action="/ban/{{$post->id}}" method="post">
                                            @csrf
                                            <button type="submit">Banla</button>
                                        </form>
                                    @endcan
                                @endif
                        @endif
                    @endif
            @endif                
        @endif</h2></a><a href="/post/{{$post->id}}" style="text-decoration: none;text-color:black;">
        <img src="{{asset('storage/'.$post->image)}}" width="480px" height="270px"> <br>
        <form action="/like/{{$post->id}}" method="post">
            @csrf
            <button type="submit">Like {{$post->likes->count()}}</button>
        </form>
        @can('postdelete', $post)
            <form action="/post/{{$post->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
            <a href="/post/{{$post->id}}/edit">Edit</a>
        @elsecan('moddelete', $post->subreddit)
            <form action="/post/{{$post->id}}" method="post">
                @csrf
                @method('delete')
                @if($post->user->id != $post->subreddit->creator_id)
                <button type="submit">Delete</button>
                @endif
            </form>
        @endcan
       </div>
</a>
