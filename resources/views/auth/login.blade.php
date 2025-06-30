<x-guest-layout>
    <div class="min-h-screen w-full bg-gray-100 flex items-center justify-center flex-col">
        <h1 class="text-center text-blue-600 text-5xl font-extrabold mb-6">facebook</h1>
        <div class="bg-white shadow-md rounded p-8 w-full max-w-md">

            <p class="text-center text-gray-700 mb-4 text-lg">Log in to Fakebook</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="Email address"
                        class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input type="password" name="password" required placeholder="Password"
                        class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Login Button -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded font-semibold hover:bg-blue-700 transition">
                        Log In
                    </button>
                </div>

                <!-- Forgot Password -->
                <div class="text-center mb-4">
                    <a href="{{ route('password.request') }}" class="text-blue-600 text-sm hover:underline">Forgot
                        Password?</a>
                </div>

                <hr class="mb-4">

                <!-- Create Account -->
                <div class="text-center">
                    <a href="{{ route('register') }}"
                        class="bg-green-600 text-white py-3 px-6 rounded font-semibold hover:bg-green-700">
                        Create New Account
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>