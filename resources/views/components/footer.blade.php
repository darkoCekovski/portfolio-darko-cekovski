<footer class="relative z-10 text-gray-800 dark:text-gray-200">
    <div class="container mx-auto px-6 pb-8 text-center group">
        <div class="h-px w-full dark:bg-gray-800 shadow-[0px_0px_50px_9px_rgba(0,0,0,0.20)] dark:shadow-[0px_0px_20px_5px_rgba(255,255,255,0.20)]"></div>
        <div class=" w-fit my-4 mx-auto opacity-0 group-hover:opacity-100 transform-all duration-1000 easy-in-out">
            <a href="{{ localized_route('home') }}"
               class="{{ request()->routeIs('home') ? 'pointer-events-none cursor-default' : '' }}">
                <img src="/images/logo-light.svg" alt="{{ __('Darko Cekovski Logo') }}" class="h-20 dark:hidden">
                <img src="/images/logo-dark.svg" alt="{{ __('Darko Cekovski Logo') }}" class="h-20 hidden dark:block">
            </a>
        </div>
        <div class="flex items-center justify-center space-x-6 mb-4">
            <a href="https://github.com/your-username"
               class="hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200 ease-in-out">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2.2467C9.6255 2.2468 7.32849 3.09182 5.51999 4.63055C3.71149 6.16929 2.50953 8.30133 2.12916 10.6452C1.74879 12.989 2.21485 15.3918 3.44393 17.4235C4.67301 19.4551 6.58491 20.9832 8.83755 21.7342C9.33755 21.8217 9.52505 21.5217 9.52505 21.2592C9.52505 21.0217 9.51254 20.2342 9.51254 19.3967C7.00003 19.8592 6.35003 18.7842 6.15003 18.2217C5.9281 17.6747 5.5763 17.1899 5.12503 16.8092C4.77503 16.6217 4.27503 16.1592 5.11252 16.1467C5.4323 16.1814 5.73901 16.2927 6.00666 16.4711C6.2743 16.6495 6.49499 16.8899 6.65003 17.1717C6.7868 17.4174 6.97071 17.6337 7.19122 17.8082C7.41173 17.9827 7.6645 18.112 7.93506 18.1886C8.20562 18.2652 8.48864 18.2877 8.76791 18.2548C9.04717 18.2219 9.3172 18.1342 9.56251 17.9967C9.6058 17.4883 9.83237 17.013 10.2 16.6592C7.97503 16.4092 5.65003 15.5467 5.65003 11.7217C5.63597 10.7279 6.00271 9.76631 6.67503 9.03423C6.36931 8.17045 6.40508 7.22252 6.77503 6.38423C6.77503 6.38423 7.6125 6.12172 9.52503 7.40923C11.1613 6.95921 12.8887 6.95921 14.525 7.40923C16.4375 6.10923 17.275 6.38423 17.275 6.38423C17.645 7.22251 17.6808 8.17046 17.375 9.03423C18.0494 9.76506 18.4164 10.7275 18.4 11.7217C18.4 15.5592 16.0625 16.4092 13.8375 16.6592C14.0762 16.9011 14.26 17.1915 14.3764 17.5107C14.4929 17.83 14.5393 18.1705 14.5125 18.5092C14.5125 19.8468 14.5 20.9217 14.5 21.2592C14.5 21.5217 14.6875 21.8342 15.1875 21.7342C17.4362 20.9771 19.3426 19.4455 20.5664 17.4128C21.7903 15.38 22.2519 12.9785 21.8689 10.6369C21.4859 8.29535 20.2832 6.16608 18.4755 4.62922C16.6678 3.09235 14.3727 2.24794 12 2.2467Z"/>
                </svg>
            </a>
            <a href="https://linkedin.com/in/your-username"
               class="flex flex-col items-center hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200 ease-in-out">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M5 1.25C3.48122 1.25 2.25 2.48122 2.25 4C2.25 5.51878 3.48122 6.75 5 6.75C6.51878 6.75 7.75 5.51878 7.75 4C7.75 2.48122 6.51878 1.25 5 1.25ZM3.75 4C3.75 3.30964 4.30964 2.75 5 2.75C5.69036 2.75 6.25 3.30964 6.25 4C6.25 4.69036 5.69036 5.25 5 5.25C4.30964 5.25 3.75 4.69036 3.75 4Z"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M2.25 8C2.25 7.58579 2.58579 7.25 3 7.25H7C7.41421 7.25 7.75 7.58579 7.75 8V21C7.75 21.4142 7.41421 21.75 7 21.75H3C2.58579 21.75 2.25 21.4142 2.25 21V8ZM3.75 8.75V20.25H6.25V8.75H3.75Z"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M9.25 8C9.25 7.58579 9.58579 7.25 10 7.25H14C14.4142 7.25 14.75 7.58579 14.75 8V8.43402L15.1853 8.24748C15.9336 7.92676 16.7339 7.72565 17.5433 7.65207C20.3182 7.3998 22.75 9.58038 22.75 12.3802V21C22.75 21.4142 22.4142 21.75 22 21.75H18C17.5858 21.75 17.25 21.4142 17.25 21V14C17.25 13.6685 17.1183 13.3505 16.8839 13.1161C16.6495 12.8817 16.3315 12.75 16 12.75C15.6685 12.75 15.3505 12.8817 15.1161 13.1161C14.8817 13.3505 14.75 13.6685 14.75 14V21C14.75 21.4142 14.4142 21.75 14 21.75H10C9.58579 21.75 9.25 21.4142 9.25 21V8ZM10.75 8.75V20.25H13.25V14C13.25 13.2707 13.5397 12.5712 14.0555 12.0555C14.5712 11.5397 15.2707 11.25 16 11.25C16.7293 11.25 17.4288 11.5397 17.9445 12.0555C18.4603 12.5712 18.75 13.2707 18.75 14V20.25H21.25V12.3802C21.25 10.4759 19.589 8.97227 17.6791 9.14591C17.025 9.20536 16.3784 9.36807 15.7762 9.6262L14.2954 10.2608C14.0637 10.3601 13.7976 10.3363 13.5871 10.1976C13.3767 10.0588 13.25 9.82354 13.25 9.57143V8.75H10.75Z"/>
                </svg>
            </a>
            <a href="https://twitter.com/your-username"
               class="hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200 ease-in-out">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_481_1305)">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M15.4201 11.0092L24.8911 0H22.6468L14.4231 9.55916L7.85493 0H0.279297L10.2117 14.4551L0.279297 26H2.52374L11.2081 15.9052L18.1446 26H25.7202L15.4196 11.0092H15.4201ZM12.346 14.5825L11.3397 13.1431L3.33244 1.68957H6.77977L13.2417 10.9329L14.2481 12.3723L22.6478 24.3873H19.2005L12.346 14.583V14.5825Z"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_481_1305">
                            <rect width="26" height="26" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
        </div>
        <p>Build with Laravel, AlpineJS, Tailwind CSS</p>
        <p class="mt-2">&copy; 2025 Darko Cekovski. All rights reserved.</p>
    </div>
    <img src="{{asset('images/moon.svg')}}" alt="Moon"
         class="absolute -z-10 bottom-0 right-0 filter drop-shadow-[0_0_30px_rgba(156,163,175,0.7)]">
    <img src="{{asset('images/glow-gradient-vector.svg')}}" alt="Gray Planet"
         class="absolute -z-10 bottom-0 left-0">
</footer>
