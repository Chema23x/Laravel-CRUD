<x-app-layout>
    <div class="w-full h-screen flex flex-col gap-y-4 justify-center items-center">
        <form class="w-full flex flex-col gap-y-4 justify-center items-center" method="POST"> 
            @csrf
            @method('POST')
            <div
                class="w-8/12 h-[200px] grid grid-flow-row grid-cols-3 place-items-center border-2 rounded-md shadow-md bg-white">
                <h2>Nombre de Producto</h2>
                <h2>Color de producto</h2>
                <h2>Precio del producto</h2>
                <input name="name" type="text">
                <input name="color" type="text">
                <input name="price" type="number">
            </div>
            <button type="submit" class="border-2 rounded-md px-4 py-2 bg-lime-400 text-white font-bold">Guardar</button>
        </form>
    </div>
</x-app-layout>