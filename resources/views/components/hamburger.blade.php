<!-- Hamburger Button -->
<button type="button"
    @click="open = !open"
    class="lg:hidden cursor-pointer relative z-[9999]"
>
    <div class="hamburger relative w-8 h-8 flex items-center justify-center">
        <!-- Line 1 -->
        <span
            class="line absolute h-[3px] w-8 bg-primary dark:bg-white rounded transition-all duration-300 origin-center"
            :class="{
                'rotate-45 translate-y-0 !bg-white': open,
                '-translate-y-[9px]': !open
            }"
        ></span>
        <!-- Line 2 (Middle) -->
        <span
            class="line absolute h-[3px] w-8 bg-primary dark:bg-white rounded transition-all duration-300"
            :class="{ 'opacity-0 scale-75': open }"
        ></span>
        <!-- Line 3 -->
        <span
            class="line absolute h-[3px] w-8 bg-primary dark:bg-white rounded transition-all duration-300 origin-center"
            :class="{
                '-rotate-45 -translate-y-0 !bg-white': open,
                'translate-y-[9px]': !open
            }"
        ></span>
    </div>
</button>
