<?php include "../components/navbar.html" ?>

<!-- component -->
<script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/dist/perfect-scrollbar.min.js"></script>

<div
  class="flex flex-col min-h-screen antialiased bg-gray-900"
>
  <div x-data="tabs" class="overflow-hidden rounded-2xl" x-cloak>
    <!-- Tabs -->
    <div
         x-show="isTabsActive"
         x-collapse
         class="bg-gray border-t-4 border-rose-500 border-x-4 rounded-t-2xl"
    >
      <div id="tabs-container" class="relative h-90 overflow-hidden">
        <ul class="p-6">
          <template x-for="(tab, index) in tabs" x-key="index">
            <li x-show="activeTab == tab.title" class="space-y-4">
              <h2
                  x-text="(new String(tab.title)).replace(/\w\S*/g, (w) => (w.replace(/^\w/, (c) => c.toUpperCase())))"
                  class="text-3xl text-rose-400"
                  ></h2>
                <div class="grid grid-cols-4 gap-6 justify-self-auto">
                  <template x-for="(src, index) in tab.src" x-key="index">
                      <img :src="src" alt="img" class="w-64 h-44">
                  </template>
              </div>
            </li>
          </template>
        </ul>
      </div>
    </div>

    <div
      class="relative flex items-center overflow-hidden bg-gray border-4 border-rose-500 rounded-b-2xl"
    >
      <!-- Links -->
      <nav class="flex items-center justify-center h-20 gap-8 px-6">
        <template x-for="(link, index) in links" x-key="index">
          <a
             href="#"
             @click="setActiveTab($event, link.title, index)"
             class="grid w-16 h-16 grid-cols-1 grid-rows-1"
             >
            <span class="sr-only" x-text="link.title"></span>
            <div
                 class="col-[1/1] row-[1/1] flex items-center justify-center w-16 h-16 transition-opacity duration-300"
                 :class="activeTab != link.title ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'"
                 x-html="link.inActiveIcon"
                 ></div>
            <div
                 class="col-[1/1] row-[1/1] flex items-center justify-center w-16 h-16 transition-opacity duration-300"
                 :class="activeTab == link.title ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'"
                 x-html="link.activeIcon"
                 ></div>
          </a>
        </template>
      </nav>

      <!-- Show/Hide button -->
      <button
              @click="isTabsActive = !isTabsActive"
              class="absolute z-10 flex items-center justify-center gap-2 transition-all bg-rose-500"
              :class="isTabsActive ? 'left-0 top-0 w-8 h-8 rounded-br-lg' : 'w-full h-full inset-0'"
              >
        <svg
             x-show="!isTabsActive"
             class="w-6 h-6 text-white animate-pulse"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg"
             >
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                ></path>
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                ></path>
        </svg>

        <svg
             x-show="isTabsActive"
             class="w-6 h-6 text-gray"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg"
             >
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
                ></path>
        </svg>

        <span x-show="!isTabsActive" class="text-white">Click to Open</span>
      </button>

      <!-- Indicator -->
      <div
           id="indicator"
           class="absolute w-6 h-8 transition-all duration-300 bg-rose-500 rounded-full -bottom-4 left-11"
           >
        <div
             style="box-shadow: 0 10px 0 rgb(244 63 94)"
             class="absolute w-5 h-5 bg-gray -left-4 bottom-1/2 rounded-br-3xl"
             ></div>
        <div
             style="box-shadow: 0 10px 0 rgb(244 63 94)"
             class="absolute w-5 h-5 bg-gray -right-4 bottom-1/2 rounded-bl-3xl"
             ></div>
      </div>
    </div>
  </div>
</div>

<script>
const tabs = () => {
  let ps;
  const init = () => {
    const tabsContainer = document.querySelector("#tabs-container");
    ps = new PerfectScrollbar(tabsContainer);
  };

  return {
    init,

    isTabsActive: false,

    activeTab: "Basant-e-jashan",

    links: [
      {
        title: "Basant-e-jashan",
        inActiveIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                ></path>
              </svg>
              `,
        activeIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path 
                  d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"
                ></path>
              </svg>
              `,
      },
      {
        title: "sports-day",
        inActiveIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"
                ></path>
              </svg>
              `,
        activeIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
              <path 
                d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z"
              ></path>
              </svg>
              `,
      },
      {
        title: "Extention Lecture",
        inActiveIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" stroke-width="2" 
                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                ></path>
              </svg>
              `,
        activeIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path 
                  fill-rule="evenodd" 
                  d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"
                ></path>
              </svg>
              `,
      },
      {
        title: "Women Day",
        inActiveIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"
                ></path>
              </svg>
              `,
        activeIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z"
                ></path>
              </svg>
              `,
      },
      {
        title: "Youth Festival",
        inActiveIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                ></path>
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                ></path>
              </svg>
              `,
        activeIcon: `
              <svg
                aria-hidden="true"
                class="w-8 h-8 text-rose-500"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              `,
      },
    ],

    tabs: [
      {
        title: "Basant-e-jashan",
        src: ["../images/activites/1.jpeg", "../images/activites/2.jpeg", "../images/activites/3.jpeg", "../images/activites/1.jpeg", "../images/activites/2.jpeg", "../images/activites/3.jpeg"]
      },
      {
        title: "sports-day",
        src: ["../images/activites/1 (1).jpeg", "../images/activites/2 (1).jpeg", "../images/activites/3 (1).jpeg", "../images/activites/6.jpeg"]
      },
      {
        title: "Extention Lecture",
        src: ["../images/activites/2.jpeg", "../images/activites/3.jpeg"]
      },
      {
        title: "Women Day",
        src: ["../images/activites/2.jpeg", "../images/activites/3.jpeg"]
      },
      {
        title: "Youth Festival",
        src: ["../images/activites/1.jpeg", "../images/activites/2.jpeg"]
      },
    ],

    setActiveTab(e, link, index) {
      e.preventDefault();

      this.activeTab = link;

      if (ps) {
        ps.update();
      }

      document.querySelector(
        "#indicator"
        /* TODO: use link (width / 2 ) */
      ).style.transform = `translateX(calc(${96 * index}px))`;
    },
  };
};  
</script>

<?php include "../components/footer.html" ?>