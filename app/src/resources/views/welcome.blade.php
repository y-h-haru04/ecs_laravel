<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <div>
            <a href="{{ url('/images') }}">Images</a>
            <form method="post" action="/images" enctype="multipart/form-data" style="display:flex;flex-direction:column;"> 
                @csrf
                <label for="image">Upload Image:</label>
                <input type="file" id="image" class="bg-white" name="image" />
                <button style="width:300px;border:1px solid;">Upload</button>
            </form>
        </div>
    </body>
</html>
