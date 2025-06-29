<x-guest-layout>
    <div class="min-h-screen w-full flex items-center justify-center px-4">
        <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6">
            <h1 class="text-blue-600 text-4xl font-bold text-center mb-2">facebook</h1>
            <p class="text-center text-lg font-semibold">Create a new account</p>
            <p class="text-center text-sm text-gray-600 mb-4">It's quick and easy.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="flex gap-2 mb-3">
                    <input type="text" name="first_name" placeholder="First name" required
                        class="w-1/2 p-2 border rounded">
                    <input type="text" name="last_name" placeholder="Last name" required
                        class="w-1/2 p-2 border rounded">
                </div>

                <!-- Birthday -->
                <label class="text-sm text-gray-600 mb-1 block">Birthday</label>
                <div class="flex gap-2 mb-3">
                    <select name="birth_month" class="w-1/3 p-2 border rounded">
                        @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $month)
                            <option>{{ $month }}</option>
                        @endforeach
                    </select>
                    <select name="birth_day" class="w-1/3 p-2 border rounded">
                        @for ($i = 1; $i <= 31; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="birth_year" class="w-1/3 p-2 border rounded">
                        @for ($i = date('Y'); $i >= 1905; $i--)
                            <option>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Gender -->
                <label class="text-sm text-gray-600 mb-1 block">Gender</label>
                <div class="flex gap-2 mb-3">
                    <label class="w-1/3 border rounded p-2 flex items-center justify-between">
                        <span>Female</span>
                        <input type="radio" name="gender" value="female">
                    </label>
                    <label class="w-1/3 border rounded p-2 flex items-center justify-between">
                        <span>Male</span>
                        <input type="radio" name="gender" value="male">
                    </label>
                    <label class="w-1/3 border rounded p-2 flex items-center justify-between">
                        <span>Custom</span>
                        <input type="radio" name="gender" value="custom">
                    </label>
                </div>

                <div id="customFields" class="hidden">
                    <select name="pronoun" class="w-full p-2 border rounded mb-3">
                        <option value="">Select your pronoun</option>
                        <option value="She: 'Wish her a happy birthday!'">She</option>
                        <option value="He: 'Wish him a happy birthday!'">He</option>
                        <option value="They: 'Wish them a happy birthday!'">They</option>
                    </select>
                    <input type="text" name="custom_gender" placeholder="Gender (optional)"
                        class="w-full p-2 border rounded mb-3">

                </div>
                <!-- Contact -->
                <input type="text" name="email" placeholder="Mobile number or email" required
                    class="w-full p-2 border rounded mb-3">

                <!-- Password -->
                <input type="password" name="password" placeholder="New password" required
                    class="w-full p-2 border rounded mb-3">
                <input type="password" name="password_confirmation" placeholder="Confirm password" required
                    class="w-full p-2 border rounded mb-4">

                <!-- Sign Up -->
                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 font-semibold rounded text-lg hover:bg-green-700 transition">
                    Sign Up
                </button>
            </form>

            <!-- Link to Login -->
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline text-sm">Already have an
                    account?</a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const genderRadios = document.querySelectorAll('input[name="gender"]');
            const customFields = document.getElementById('customFields');

            genderRadios.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.value === 'custom') {
                        customFields.classList.remove('hidden');
                    } else {
                        customFields.classList.add('hidden');
                    }
                });
            });
        });
    </script>
</x-guest-layout>