<x-app-layout>
    <div class="w-full h-screen flex flex-col gap-y-4 justify-center items-center">
        <form action="{{route('producto.update', $product)}}" class="w-full flex flex-col gap-y-4 justify-center items-center" method="POST"> 
            @csrf
            @method('PUT')
            <div
                class="w-8/12 h-[200px] grid grid-flow-row grid-cols-3 place-items-center border-2 rounded-md shadow-md bg-white">
                <h2>Nombre de Producto</h2>
                <h2>Color de producto</h2>
                <h2>Precio del producto</h2>
                <input value="{{ old('name', $product->name) }}" name="name" type="text">
                <input value="{{ old('color', $product->color) }}"  name="color" type="text">
                <input value="{{ old('price', $product->price) }}"name="price" type="number">
            </div>
            <button type="submit" class="border-2 rounded-md px-4 py-2 bg-lime-400 text-white font-bold">Actualizar</button>
        </form>
    </div>
</x-app-layout>