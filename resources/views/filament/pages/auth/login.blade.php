<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fat Touré — Administration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Instrument+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .font-script { font-family: 'Great Vibes', cursive; }

        /* Surcharge minimale des éléments natifs Filament non stylés */
        [wire\:loading] { opacity: 0.6; pointer-events: none; }
    </style>
</head>
<body class="min-h-screen bg-[#0d0d0d] flex items-center justify-center p-4">

    <div class="w-full max-w-sm">

        {{-- Brand --}}
        <div class="text-center mb-10">
            <span class="font-script text-[72px] leading-none text-[#c5053c] block">Fat Touré</span>
            <p class="text-[10px] tracking-[0.5em] uppercase text-white/30 mt-3 font-light">Administration</p>
        </div>

        {{-- Carte login --}}
        <div class="bg-white rounded-3xl px-10 py-10 shadow-2xl">

            {{-- Erreur générale --}}
            @if ($errors->has('data.email'))
            <div class="mb-6 px-4 py-3 rounded-xl bg-red-50 border border-red-100 text-xs text-red-600 font-medium tracking-wide">
                {{ $errors->first('data.email') }}
            </div>
            @endif

            <form wire:submit="authenticate" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-[10px] font-bold tracking-[0.2em] uppercase text-gray-400 mb-2">
                        Adresse e-mail
                    </label>
                    <input
                        type="email"
                        id="email"
                        wire:model="data.email"
                        autocomplete="email"
                        autofocus
                        required
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#c5053c]/30 focus:border-[#c5053c] transition"
                        placeholder="votre@email.com"
                    >
                </div>

                {{-- Mot de passe --}}
                <div>
                    <label for="password" class="block text-[10px] font-bold tracking-[0.2em] uppercase text-gray-400 mb-2">
                        Mot de passe
                    </label>
                    <input
                        type="password"
                        id="password"
                        wire:model="data.password"
                        autocomplete="current-password"
                        required
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#c5053c]/30 focus:border-[#c5053c] transition"
                        placeholder="••••••••"
                    >
                </div>

                {{-- Se souvenir de moi --}}
                <div class="flex items-center gap-3 pt-1">
                    <input
                        type="checkbox"
                        id="remember"
                        wire:model="data.remember"
                        class="w-4 h-4 rounded border-gray-300 text-[#c5053c] focus:ring-[#c5053c] cursor-pointer"
                    >
                    <label for="remember" class="text-xs text-gray-500 cursor-pointer select-none">
                        Se souvenir de moi
                    </label>
                </div>

                {{-- Bouton --}}
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="w-full mt-2 bg-[#c5053c] hover:bg-[#a0042f] active:bg-[#850336] text-white text-xs font-bold uppercase tracking-[0.2em] py-4 rounded-xl transition-colors disabled:opacity-60 disabled:cursor-not-allowed"
                >
                    <span wire:loading.remove>Connexion</span>
                    <span wire:loading class="inline-flex items-center gap-2">
                        <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                        </svg>
                        Connexion…
                    </span>
                </button>
            </form>

        </div>

        {{-- Footer --}}
        <p class="text-center text-[10px] tracking-[0.3em] uppercase text-white/15 mt-8 font-light">
            © {{ date('Y') }} Fat Touré
        </p>

    </div>

    @livewireScripts
</body>
</html>
