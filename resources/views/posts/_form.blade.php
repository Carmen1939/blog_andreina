@csrf 

<label class="uppercase text-gray-700 text-xs">Titulo</label>
<span class="text-xs text-red-600">@error('title') {{ $message }} @enderror</span>
<input type="text" name="title" 
value="{{old('title', $post->title) }}">
<br>
<br>
<label class="uppercase text-gray-700 text-xs">Url</label>
<span class="text-xs text-red-600">@error('slug') {{ $message }} @enderror</span>
<input type="text" name="slug" 
value="{{old('slug', $post->slug) }}">
<br>
<br>
<label class="uppercase text-gray-700 text-xs">ConTenido</label>
<span class="text-xs text-red-600">@error('body') {{ $message }} @enderror</span>
<textarea type="body" rows="5" name="body" value="">{{old('body', $post->body)}}</textarea>

<div>
    <a href="{{route('posts.index')}}"> Volver</a>
    <input type="submit" value="Enviar">
</div>