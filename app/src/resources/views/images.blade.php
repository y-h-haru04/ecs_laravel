<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
        @if (session('message'))
            <div style="padding:16px 8px;border:1px solid; color: red;">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ url('/') }}">Home</a>
        <ul>
            @foreach($images as $image)
              <li>
                <a href="{{ url('/images')}}/{{ $image->id }}">{{$image->file_name}}</a>
              </li>
            @endforeach
        </ul>
    </body>
</html>
