@props([
    'years'   => '',
    'company' => '',
    'role'    => '',
    'bullets' => [],
    'active'  => false,
])

<div class="flex gap-4 relative">
    <div class="w-3.5 h-3.5 rounded-full border-2 flex-shrink-0 mt-1 relative z-10 bg-white dark:bg-[#080b14]
                {{ $active ? 'border-indigo-500' : 'border-slate-300 dark:border-slate-600' }}">
    </div>
    <div class="flex-1">
        @if($years)
            <div class="text-xs text-indigo-500 font-bold">{{ $years }}</div>
        @endif
        <div
            class="font-bold text-sm mt-0.5 {{ $active ? 'text-slate-800 dark:text-slate-200' : 'text-slate-700 dark:text-slate-300' }}">
            {{ $company }}
        </div>
        @if($role)
            <div
                class="text-xs font-medium mb-3 {{ $active ? 'text-indigo-400' : 'text-slate-400 dark:text-slate-500' }}">
                {{ $role }}
            </div>
        @endif
        @if(count($bullets) > 0)
            <ul class="space-y-1.5">
                @foreach($bullets as $bullet)
                    <li class="flex gap-2 text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                        <span class="text-indigo-400 flex-shrink-0 mt-0.5">›</span>{{ $bullet }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
