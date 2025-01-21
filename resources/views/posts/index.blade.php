<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('Posts')}}
            <a href="{{route('posts.create')}}">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-log">
                <div class="p-6 bg-white border-b border-gray-200">
               <table>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td><a href="{{route('posts.edit', $post)}}">Editar</a></td>
                    <td><form action="{{route('posts.destroy',$post)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <input type="submit"
                    value="Eliminar"
                    class="bg-gray-800 text-white rounded px-4 py-2"
                    onclick="return confirm('Desea eliminar el blog?')"
                    >
                    </form></td>
                </tr>
                @endforeach
               </table>
               {{$posts->links()}}
                </div>

            </div>
        </div>
    </div>

</x-app-layout>