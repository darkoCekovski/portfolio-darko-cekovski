{{--<div>--}}

{{--    @php--}}
{{--        $curr = $available[$current] ?? ['name' => 'English', 'flag' => '/images/flags/us.svg'];--}}
{{--    @endphp--}}

{{--    <div x-data="{ open: false }" class="relative">--}}
{{--        <button type="button"--}}
{{--                @click="open = !open"--}}
{{--                class="p-2 bg-gray-200 dark:bg-gray-700 rounded flex items-center gap-2">--}}
{{--            <img src="{{ asset($curr['flag']) }}" alt="{{ $curr['name'] }}" class="w-5 h-5 rounded-full">--}}
{{--            <span>{{ strtoupper($current) }}</span>--}}
{{--        </button>--}}

{{--        <div x-show="open" @click.away="open = false"--}}
{{--             class="absolute mt-2 right-0 w-44 bg-white dark:bg-gray-800 rounded shadow z-50">--}}
{{--            @foreach ($available as $code => $data)--}}
{{--                @php--}}
{{--                    $flag = $data['flag'] ?? '/images/flags/us.svg';--}}
{{--                    $name = $data['name'] ?? strtoupper($code);--}}
{{--                @endphp--}}
{{--                <button type="button"--}}
{{--                        wire:click="switch('{{ $code }}')"--}}
{{--                        class="flex items-center gap-2 w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-700 {{ $current === $code ? 'font-bold' : '' }}">--}}
{{--                    <img src="{{ asset($flag) }}" alt="{{ $name }}" class="w-5 h-5 rounded-full">--}}
{{--                    <span>{{ $name }}</span>--}}
{{--                </button>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
