<x-app-layout>
    <div class="w-full flex h-[100px] items-center justify-center">
        <a href="{{ route('producto.create') }}" class="border-2 px-4 py-2 rounded-lg bg-white shadow-lg hover:bg-blue-400 hover:text-white">Agregar Producto</a>
    </div>
    
    <section class="w-full flex justify-center">
    <div class="w-3/12 bg-gray-500 border-2 text-white text-center p-2 rounded-md">
        @forelse($products as $product)
        <div class="flex w-full items-center border-b-2 justify-between py-2 relative ">
            <img class="w-1/8 h-10" src="https://upload.wikimedia.org/wikipedia/commons/4/48/Sabritas-logo.png" alt="">
            <div class="flex flex-col text-left w-2/4">
                <h2>{{$product -> name}}</h2>
                <p>Color: {{$product -> color}}</p>
            </div>
            <p class="w-1/4">${{$product -> price}} MXN</p>
            <form action="{{ route('producto.delete', $product->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este elemento?');">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <svg class="absolute w-3 h-3 top-2 right-0" xmlns="http://www.w3.org/2000/svg" fill="red" stroke="black" viewBox="0 0 448 512">
                        <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                    </svg>
                </button>
            </form>
          
            <a href="{{route('producto.edit', $product)}}">
                <svg class="absolute w-3 h-3 bottom-2 right-0" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
            </a>
        </div>
        @empty
        <p>¡No existen productos registrados en la base de datos! </p>
        @endforelse
    </div>
    </section>

</x-app-layout>