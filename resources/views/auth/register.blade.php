<x-guest-layout>
    <!-- component -->
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
            <div class="relative sm:max-w-sm w-full">
                <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                    <label for="" class="block text-sm text-gray-700 text-center font-semibold">
                        Registro
                    </label>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <input type="text" placeholder="Name"
                                class="mt-1 block w-full border-solid border border-blue-500 bg-gray-100 h-11 rounded-md shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                id="name" name="name" :value="old('name')" required autofocus autocomplete="name">
                        </div>

                        <div class="mt-7">
                            <input type="email" placeholder="Email"
                                class="mt-1 block w-full border border-blue-500 bg-gray-100 h-11 rounded-md shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                id="email" name="email" :value="old('email')" required>
                        </div>

                        <div class="mt-7">
                            <input type="password" placeholder="Contraseña"
                                class="mt-1 block w-full border border-blue-500 bg-gray-100 h-11 rounded-md shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                id="password" name="password" required autocomplete="new-password">
                        </div>

                        <div class="mt-7">
                            <input type="password" placeholder="Confirmar contraseña"
                                class="mt-1 block w-full border border-blue-500 v bg-gray-100 h-11 rounded-md shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                                id="password_confirmation" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>

                        <div class="mt-7">
                            <button
                                class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
