<x-guest-layout>
    <div class="glass-card rounded-2xl p-8 w-full max-w-md animate-fade-in">
        <div class="text-center mb-8">
<<<<<<< HEAD
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-white flex items-center justify-center shadow-lg shadow-white/10 overflow-hidden">
                <img src="{{ asset('images/logoweb.png') }}" alt="Logo" class="w-16 h-16 object-contain">
=======
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-red-500 to-red-700 flex items-center justify-center shadow-lg shadow-red-500/30">
                <img src="{{ asset('images/logoweb.png') }}" alt="Pagar Nusa Logo" class="w-12 h-12">
>>>>>>> dd60b4aef3b641429d222b5c58502391f2ce0bb8
            </div>
            <h1 class="text-2xl font-bold mb-2">Sistem Penilaian UKT</h1>
            <p class="text-gray-400">Pagar Nusa</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm text-gray-300 mb-2">Email Address</label>
                <input id="email" class="input-field w-full px-4 py-3 rounded-lg text-white placeholder-gray-500" 
                       type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                       placeholder="admin@pagarnusa.or.id">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm text-gray-300 mb-2">Password</label>
                <input id="password" class="input-field w-full px-4 py-3 rounded-lg text-white placeholder-gray-500" 
                       type="password" name="password" required autocomplete="current-password"
                       placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded bg-white/10 border-white/20 text-[#e94560] shadow-sm focus:ring-[#e94560]" name="remember">
                    <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
                </label>
            </div>

            <button type="submit" class="btn-primary w-full py-3 rounded-lg font-semibold text-white mt-6">
                {{ __('Masuk') }}
            </button>
            
            <div class="text-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-400 hover:text-white" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif
            </div>
        </form>
        
        <p class="text-center text-gray-500 text-sm mt-6">
            Copyright © SEMZZ-DEV
        </p>
    </div>
</x-guest-layout>
