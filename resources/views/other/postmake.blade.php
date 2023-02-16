@extends('layout.app')
@section('app')
    <style>
        img{
        max-width:180px;
        }
    </style>
    <h1>HELLO</h1>

    <form action="/post" method="post" enctype="multipart/form-data">
        @csrf
        Title: <br>
        <input type="text" name="title"><br>
        @error('title')
            {{$message}}
        @enderror
        Image: <br>
        <input type="file" name="image" onchange="readURL(this);"><br>
        @error('image')
            {{$message}}
        @enderror
        <input type="submit">
        @if ($subreddits->count())
        <select name="subreddit_id">
            @foreach ($subreddits as $subreddit)
                <option value="{{$subreddit->id}}"> {{$subreddit->name}}</option>
            @endforeach
        </select>
        @endif
    </form>
    <img id="blah" src="http://placehold.it/180" alt="your image" /> <br>
    @if (!$subreddits->count())
        <br> You don't joined any subreddits
    @endif
    <form action="/subreddit" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Create new</h1>
        <input type="text" name="name"><br>
        @error('text')
            {{$message}}
        @enderror
        <input type="file" name="image">
        <button type="submit">YARAT</button>
    </form>
    <script>
            $('#blah').hide();
             function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
                $('#blah').show();
            }
        }
    </script>
@endsection
