<input type="checkbox" id="drawerToggle" class="lg:hidden relative sr-only peer">
<label for="drawerToggle" class="drawer-toggle-icon lg:hidden z-10 fixed top-0 left-0 inline-block p-4 transition-all duration-500 bg-capri rounded-lg peer-checked:rotate-180 xs-max:peer-checked:left-68 peer-checked:left-80 mt-4 ml-4 cursor-pointer">
    <!-- <div class="w-6 h-1 mb-3 -rotate-45 bg-white rounded-lg"></div>
     <div class="w-6 h-1 rotate-45 bg-white rounded-lg"></div> -->
    <svg width="28px" height="28px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#1f2937">
        <path d="M3 5H21" stroke="#1f2937" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M3 12H21" stroke="#1f2937" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M3 19H21" stroke="#1f2937" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
</label>
<aside class="xs-max:w-68 h-screen px-4 py-8 overflow-y-auto bg-white border-r dark:bg-gray-900 dark:border-gray-700 lg:block fixed lg:sticky top-0 left-0 z-20 transition-all duration-500 transform lg:-translate-x-0 -translate-x-full peer-checked:translate-x-0">
    <div class="theme-toggle absolute top-4 right-4">
        <button id="btnDark" class="hidden focus:outline-hidden" aria-label="Light mode">
                <svg class="stroke-gray-500 hover:stroke-gray-400 transition ease-in-out delay-75 duration-300" width="30px" height="30px" stroke-width="1" viewBox="0 0 24 24" fill="#6b7280" xmlns="http://www.w3.org/2000/svg"><path d="M3 11.5066C3 16.7497 7.25034 21 12.4934 21C16.2209 21 19.4466 18.8518 21 15.7259C12.4934 15.7259 8.27411 11.5066 8.27411 3C5.14821 4.55344 3 7.77915 3 11.5066Z" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </button>
        <button id="btnLight" class="hidden focus:outline-hidden" aria-label="Dark mode">
               <svg class="stroke-yellow-500 hover:stroke-yellow-400 transition ease-in-out delay-75 duration-300" width="30px" height="30px" stroke-width="1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18Z" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M22 12L23 12" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 2V1" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 23V22" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20 20L19 19" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20 4L19 5" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M4 20L5 19" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M4 4L5 5" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path><path d="M1 12L2 12" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </button>
    </div>
    <div class="flex flex-col items-center mt-6 -mx-2">
        <a href="#hero" class="pal-border" aria-label="Hacene Ouserir's photo" title="Hacene Ouserir's photo">
            <img class="object-cover w-24 h-24 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar">
        </a>
        <h4 class="mx-2 mt-2 text-lg text-gray-800 dark:text-gray-200">Hacene Ouserir</h4>
        <p class="mx-2 mt-1 text-sm text-gray-700 dark:text-gray-400">Web Developer</p>
    </div>

    <div class="mt-8 mx-2">
        <h2 class="mb-4 text-lg text-gray-800 dark:text-gray-200 text-center">Follow me:</h2>
        <div class="flex flex-row justify-center social-links">
            <a href="https://web.facebook.com/haceneouserir" class="px-2 group facebook" target="_blank" aria-label="Hacene Ouserir's Facebook" title="Hacene Ouserir's Facebook">
                <svg class="stroke-gray-700 dark:stroke-gray-400 group-hover:stroke-capri transition ease-in-out delay-75 duration-300" width="28px" height="28px" stroke-width="1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 2H14C12.6739 2 11.4021 2.52678 10.4645 3.46447C9.52678 4.40215 9 5.67392 9 7V10H6V14H9V22H13V14H16L17 10H13V7C13 6.73478 13.1054 6.48043 13.2929 6.29289C13.4804 6.10536 13.7348 6 14 6H17V2Z" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
            <a href="https://x.com/haceneouserir" class="px-2 group twitter" target="_blank" aria-label="Hacene Ouserir's Twitter" title="Hacene Ouserir's Twitter">
                <svg class="stroke-gray-700 dark:stroke-gray-400 group-hover:stroke-capri transition ease-in-out delay-75 duration-300" width="28px" height="28px" viewBox="0 0 24 24" stroke-width="1" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.8198 20.7684L3.75317 3.96836C3.44664 3.57425 3.72749 3 4.22678 3H6.70655C6.8917 3 7.06649 3.08548 7.18016 3.23164L20.2468 20.0316C20.5534 20.4258 20.2725 21 19.7732 21H17.2935C17.1083 21 16.9335 20.9145 16.8198 20.7684Z" stroke-width="1"></path>
                    <path d="M20 3L4 21" stroke-width="1" stroke-linecap="round"></path>
                </svg>
            </a>
            <a href="https://www.linkedin.com/in/haceneouserir" class="px-2 group linkedin" target="_blank" aria-label="Hacene Ouserir's LinkedIn" title="Hacene Ouserir's LinkedIn">
                <svg class="stroke-gray-700 dark:stroke-gray-400 group-hover:stroke-capri transition ease-in-out delay-75 duration-300" width="28px" height="28px" stroke-width="1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8Z" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M7 17V13.5V10" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M11 17V13.75M11 10V13.75M11 13.75C11 10 17 10 17 13.75V17" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M7 7.01L7.01 6.99889" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
            <a href="https://www.instagram.com/haceneouserir" class="px-2 group instagram" target="_blank" aria-label="Hacene Ouserir's Instagram" title="Hacene Ouserir's Instagram">
                <svg class="stroke-gray-700 dark:stroke-gray-400 group-hover:stroke-capri transition ease-in-out delay-75 duration-300" width="28px" height="28px" stroke-width="1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16Z" stroke-width="1"></path>
                    <path d="M17.5 6.51L17.51 6.49889" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
            <a href="https://github.com/haceneouserir" class="px-2 group github" target="_blank" aria-label="Hacene Ouserir's GitHub" title="Hacene Ouserir's GitHub">
                <svg class="stroke-gray-700 dark:stroke-gray-400 group-hover:stroke-capri transition ease-in-out delay-75 duration-300" width="28px" height="28px" stroke-width="1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 22.0268V19.1568C16.0375 18.68 15.9731 18.2006 15.811 17.7506C15.6489 17.3006 15.3929 16.8902 15.06 16.5468C18.2 16.1968 21.5 15.0068 21.5 9.54679C21.4997 8.15062 20.9627 6.80799 20 5.79679C20.4558 4.5753 20.4236 3.22514 19.91 2.02679C19.91 2.02679 18.73 1.67679 16 3.50679C13.708 2.88561 11.292 2.88561 8.99999 3.50679C6.26999 1.67679 5.08999 2.02679 5.08999 2.02679C4.57636 3.22514 4.54413 4.5753 4.99999 5.79679C4.03011 6.81549 3.49251 8.17026 3.49999 9.57679C3.49999 14.9968 6.79998 16.1868 9.93998 16.5768C9.61098 16.9168 9.35725 17.3222 9.19529 17.7667C9.03334 18.2112 8.96679 18.6849 8.99999 19.1568V22.0268" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M9 20.0267C6 20.9999 3.5 20.0267 2 17.0267" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
        </div>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-8">
        <nav>
            <a class="flex justify-center px-4 py-2 transform rounded-lg text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-800 dark:hover:text-gray-200 sidebar-link transition ease-in-out delay-75 duration-300" href="#bio" aria-label="Bio section" title="Hacene Ouserir's Bio">
                <span class="mx-4 font-medium">Bio</span>
            </a>
            <a class="flex justify-center px-4 py-2 mt-5 transform rounded-lg text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-800 dark:hover:text-gray-200 sidebar-link transition ease-in-out delay-75 duration-300" href="#mySkills" aria-label="My Skills section" title="My Skills section">
                <span class="mx-4 font-medium">My Skills</span>
            </a>
            <a class="flex justify-center px-4 py-2 mt-5 transform rounded-lg text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-800 dark:hover:text-gray-200 sidebar-link transition ease-in-out delay-75 duration-300" href="#education" aria-label="Education section" title="Education section">
                <span class="mx-4 font-medium">Education</span>
            </a>
            <a class="flex justify-center px-4 py-2 mt-5 transform rounded-lg text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-800 dark:hover:text-gray-200 sidebar-link transition ease-in-out delay-75 duration-300" href="#experience" aria-label="Experience section" title="Experience section">
                <span class="mx-4 font-medium">Experience</span>
            </a>
            <a class="flex justify-center px-4 py-2 mt-5 transform rounded-lg text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-800 dark:hover:text-gray-200 sidebar-link transition ease-in-out delay-75 duration-300" href="#myWorks" aria-label="My Works section" title="My Works section">
                <span class="mx-4 font-medium">My Works</span>
            </a>
            <a class="flex justify-center px-4 py-2 mt-5 transform rounded-lg text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-800 dark:hover:text-gray-200 sidebar-link transition ease-in-out delay-75 duration-300" href="#blog" aria-label="Blog section" title="Blog section">
                <span class="mx-4 font-medium">Blog</span>
            </a>
            <a class="flex justify-center px-4 py-2 mt-5 transform rounded-lg text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-800 dark:hover:text-gray-200 sidebar-link transition ease-in-out delay-75 duration-300" href="#contactMe" aria-label="Contact Me section" title="Contact Me section">
                <span class="mx-4 font-medium">Contact Me</span>
            </a>
        </nav>
    </div>
    <div class="mt-12">
        <p class="text-sm text-gray-700 dark:text-gray-400 text-center">Designed & Coded With
            <span class="text-2xl text-red-600">&hearts;</span> By Hacene Ouserir.
        </p>
        <p class="text-xs text-gray-700 dark:text-gray-400 text-center">Note: AI was used.</p>
    </div>
</aside>