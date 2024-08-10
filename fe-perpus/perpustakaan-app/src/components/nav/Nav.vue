<template>
  <!-- ========== HEADER ========== -->
  <header
    class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white dark:bg-black border-b text-sm py-2.5 lg:ps-[260px]"
  >
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
      <div class="lg:hidden flex flex-row gap-3">
        <!-- Navigation Toggle -->
        <button
          type="button"
          class="flex justify-center items-center text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none"
          aria-haspopup="dialog"
          aria-expanded="false"
          aria-controls="hs-application-sidebar"
          aria-label="Toggle navigation"
          data-hs-overlay="#hs-application-sidebar"
        >
          <span class="sr-only">Toggle Navigation</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            class="size-6"
          >
            <title>menu</title>
            <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
          </svg>
        </button>
        <!-- End Navigation Toggle -->
        <!-- Logo -->
        <a
          class="w-7 flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
          href="#"
          aria-label="Pustaka"
        >
          <img src="../icons/logo3.png" alt="" />
        </a>
        <!-- End Logo -->
      </div>

      <div
        class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3"
      >
        <div class="hidden md:block">
          <!-- Search Input -->
          <div class="relative">
            <div
              class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5"
            >
              <svg
                class="w-5 h-5 text-gray-400"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
              >
                <title>Search</title>
                <path
                  d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"
                />
              </svg>
            </div>
            <input
              type="text"
              class="py-2 ps-10 pe-16 block w-full bg-white dark:bg-black border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Search"
            />
            <div
              class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1"
            >
              <button
                type="button"
                class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                aria-label="Close"
              ></button>
            </div>
          </div>
          <!-- End Search Input -->
        </div>

        <div class="flex flex-row items-center justify-end sm:gap-2 gap-1">
          <button
            type="button"
            class="hidden sm:inline-flex text-gray-400 relative justify-center items-center gap-x-2 text-sm rounded-full border border-transparent"
          >
            <span
              class="group inline-flex shrink-0 justify-center items-center size-9"
            >
              <svg
                class="size-5"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
              >
                <title>Notification</title>
                <path
                  d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z"
                />
              </svg>
            </span>
            <span class="sr-only">Notification</span>
          </button>

          <!-- Dark Mode Toggle -->
          <button
            type="button"
            class="hs-dark-mode-active:hidden block hs-dark-mode font-medium text-gray-800 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200"
            data-hs-theme-click-value="dark"
          >
            <span
              class="group inline-flex shrink-0 justify-center items-center size-9"
            >
              <svg
                class="shrink-0 size-5"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <title>Dark</title>
                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
              </svg>
            </span>
          </button>
          <button
            type="button"
            class="hs-dark-mode-active:block hidden hs-dark-mode font-medium text-gray-800 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200"
            data-hs-theme-click-value="light"
          >
            <span
              class="group inline-flex shrink-0 justify-center items-center size-9"
            >
              <svg
                class="shrink-0 size-5"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <title>Light</title>
                <circle cx="12" cy="12" r="4"></circle>
                <path d="M12 2v2"></path>
                <path d="M12 20v2"></path>
                <path d="m4.93 4.93 1.41 1.41"></path>
                <path d="m17.66 17.66 1.41 1.41"></path>
                <path d="M2 12h2"></path>
                <path d="M20 12h2"></path>
                <path d="m6.34 17.66-1.41 1.41"></path>
                <path d="m19.07 4.93-1.41 1.41"></path>
              </svg>
            </span>
          </button> 
          <!-- End Dark Mode Toggle -->

          <!-- Dropdown -->
          <div
            class="hs-dropdown [--placement:bottom-right] relative inline-flex"
            v-if="authStore.tokenUser"
          >
            <button
              id="hs-dropdown-account"
              type="button"
              class="size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-gray-200 bg-gray-200 dark:bg-black text-gray-800 dark:text-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
              aria-haspopup="menu"
              aria-expanded="false"
              aria-label="Dropdown"
            >
              <span class="shrink-0 size-[38px] rounded-full content-center">
                {{ authStore.currentUser.name.slice(0, 2).toUpperCase() }}
              </span>
            </button>

            <div
              class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="hs-dropdown-account"
            >
              <div class="py-3 px-5 bg-gray-100 rounded-t-lg">
                <p class="text-sm text-gray-500">Signed in as</p>
                <p class="text-sm font-medium text-blue-600">
                  {{ authStore.currentUser.email }}
                </p>
              </div>
              <div class="p-1.5 space-y-0.5">
                <RouterLink
                  class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-medium text-sm"
                  to="profile"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="20"
                    height="20"
                  >
                    <title>account-outline</title>
                    <path
                      d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6M12,13C14.67,13 20,14.33 20,17V20H4V17C4,14.33 9.33,13 12,13M12,14.9C9.03,14.9 5.9,16.36 5.9,17V18.1H18.1V17C18.1,16.36 14.97,14.9 12,14.9Z"
                    />
                  </svg>
                  Profile
                </RouterLink> 
                <RouterLink
                  class="flex sm:hidden items-center gap-x-3.5 py-2 px-3 rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-medium text-sm"
                  to=""
                >
                  <svg
                    class="size-5"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                  >
                    <title>Notification</title>
                    <path
                      d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z"
                    />
                  </svg>
                  Notification
                </RouterLink>
                <RouterLink
                  class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-medium text-sm"
                  to=""
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="20"
                    height="20"
                  >
                    <title>cog-outline</title>
                    <path
                      d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z"
                    />
                  </svg>
                  Setting
                </RouterLink>
                <hr />
                <a
                  @click="handleLogout"
                  class="rounded-lg border border-transparent text-gray-800 hover:text-red-600 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none flex items-center gap-x-3.5 py-2 px-3 font-medium text-sm"
                  href="#"
                >
                  <svg
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="20"
                    height="20"
                  >
                    <title>logout</title>
                    <path
                      d="M17 7L15.59 8.41L18.17 11H8V13H18.17L15.59 15.58L17 17L22 12M4 5H12V3H4C2.9 3 2 3.9 2 5V19C2 20.1 2.9 21 4 21H12V19H4V5Z"
                    />
                  </svg>
                  Logout
                </a>
              </div>
            </div>
          </div>
          <!-- End Dropdown -->
        </div>
      </div>
    </nav>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- Sidebar -->
  <div
    id="hs-application-sidebar"
    class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-[260px] h-full hidden fixed inset-y-0 start-0 z-[60] bg-white dark:bg-black border-e lg:block lg:translate-x-0 lg:end-auto lg:bottom-0"
    role="dialog"
    tabindex="-1"
    aria-label="Sidebar"
  >
    <div class="relative flex flex-col h-full max-h-full">
      <div class="px-6 pt-4">
        <!-- Logo -->
        <a
          class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
          href="#"
          aria-label="Pustaka"
        >
          <img class="w-36" src="../icons/logo2.png" alt="" />
        </a>
        <!-- End Logo -->
      </div>

      <!-- Content -->
      <div
        class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-col justify-between"
      >
        <nav
          class="hs-accordion-group p-3 w-full flex flex-col flex-wrap"
          data-hs-accordion-always-open
        >
          <ul class="flex flex-col space-y-1 gap-3">
            <li
              v-if="
                authStore.currentUser &&
                authStore.currentUser.role.name === 'owner'
              "
            >
              <RouterLink
                class="flex items-center gap-x-3.5 py-2 px-4 text-base font-bold text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                to="/dashboard"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                >
                  <title>view-dashboard-outline</title>
                  <path
                    d="M19,5V7H15V5H19M9,5V11H5V5H9M19,13V19H15V13H19M9,17V19H5V17H9M21,3H13V9H21V3M11,3H3V13H11V3M21,11H13V21H21V11M11,15H3V21H11V15Z"
                  />
                </svg>
                Dashboard
              </RouterLink>
            </li>

            <li>
              <RouterLink
                class="flex items-center gap-x-3.5 py-2 px-4 text-base font-bold text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                to="/"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                >
                  <title>home-variant-outline</title>
                  <path
                    d="M9,13H15V19H18V10L12,5.5L6,10V19H9V13M4,21V9L12,3L20,9V21H4Z"
                  />
                </svg>
                Home
              </RouterLink>
            </li>

            <li>
              <RouterLink
                class="w-full flex items-center gap-x-3.5 py-2 px-4 text-base font-bold text-gray-800 rounded-lg hover:bg-gray-100"
                to="/category"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                >
                  <title>Search</title>
                  <path
                    d="M15.5,12C18,12 20,14 20,16.5C20,17.38 19.75,18.21 19.31,18.9L22.39,22L21,23.39L17.88,20.32C17.19,20.75 16.37,21 15.5,21C13,21 11,19 11,16.5C11,14 13,12 15.5,12M15.5,14A2.5,2.5 0 0,0 13,16.5A2.5,2.5 0 0,0 15.5,19A2.5,2.5 0 0,0 18,16.5A2.5,2.5 0 0,0 15.5,14M13,4V12L10.5,9.75L8,12V4H6V20H10C10.54,20.81 11.23,21.5 12.03,22H6A2,2 0 0,1 4,20V4A2,2 0 0,1 6,2H18A2,2 0 0,1 20,4V11.81C19.42,11.26 18.75,10.81 18,10.5V4H13Z"
                  />
                </svg>
                Explore<span
                  class="inline-flex items-center gap-x-1.5 py-0.5 px-2 rounded-full text-xs font-medium border border-blue-600 text-white bg-blue-600 dark:text-blue-500"
                  >New</span
                >
              </RouterLink>
            </li>

            <li v-if="authStore.currentUser">
              <RouterLink
                class="w-full flex items-center gap-x-3.5 py-2 px-4 text-base font-bold text-gray-800 rounded-lg hover:bg-gray-100"
                to="/mybook"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                >
                  <title>book-multiple-outline</title>
                  <path
                    d="M19 2A2 2 0 0 1 21 4V16A2 2 0 0 1 19 18H9A2 2 0 0 1 7 16V4A2 2 0 0 1 9 2H19M19 4H16V10L13.5 7.75L11 10V4H9V16H19M3 20A2 2 0 0 0 5 22H17V20H5V6H3Z"
                  />
                </svg>
                My Book
              </RouterLink>
            </li>

            <li v-if="authStore.currentUser">
              <a
                class="w-full flex items-center gap-x-3.5 py-2 px-4 text-base font-bold text-gray-400 rounded-lg hover:bg-gray-100"
                href=""
              >
                <svg
                  fill="currentColor"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                >
                  <title>bookmark-outline</title>
                  <path
                    d="M17,18L12,15.82L7,18V5H17M17,3H7A2,2 0 0,0 5,5V21L12,18L19,21V5C19,3.89 18.1,3 17,3Z"
                  />
                </svg>
                Bookmarks
                <span
                  class="inline-flex items-center gap-x-1.5 py-0.5 px-2 rounded-full text-xs font-medium border border-blue-600 text-blue-600 dark:text-blue-500"
                  >Soon</span
                >
              </a>
            </li>

            <li class="hidden hs-accordion" id="projects-accordion">
              <button
                type="button"
                class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-4 text-base text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                aria-expanded="true"
                aria-controls="projects-accordion-child"
              >
                <svg
                  class="shrink-0 size-6"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                  <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                </svg>
                Projects

                <svg
                  class="hs-accordion-active:block ms-auto hidden size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="m18 15-6-6-6 6" />
                </svg>

                <svg
                  class="hs-accordion-active:hidden ms-auto block size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="m6 9 6 6 6-6" />
                </svg>
              </button>

              <div
                id="projects-accordion-child"
                class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                role="region"
                aria-labelledby="projects-accordion"
              >
                <ul class="ps-8 pt-1 space-y-1">
                  <li>
                    <button
                      class="flex items-center gap-x-3.5 py-2 px-4 text-base text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                      href="#"
                    >
                      Link 1
                    </button>
                  </li>
                  <li>
                    <a
                      class="flex items-center gap-x-3.5 py-2 px-4 text-base text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                      href="#"
                    >
                      Link 2
                    </a>
                  </li>
                  <li>
                    <a
                      class="flex items-center gap-x-3.5 py-2 px-4 text-base text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                      href="#"
                    >
                      Link 3
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>

        <div class="p-3 w-full flex flex-col flex-wrap gap-5">
          <div
            class="p-3 w-full flex flex-col flex-wrap"
            v-if="!authStore.tokenUser"
          >
            <p class="text-base text-gray-500 px-4 pb-3">
              Login to borrow books, review and save your bookmark
            </p>
            <RouterLink
              class="w-full flex items-center gap-x-3.5 py-2 px-4 text-base font-bold rounded-lg border border-transparent border-blue-600 text-blue-600 hover:text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
              to="/login"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
              >
                <title>login</title>
                <path
                  fill="currentColor"
                  d="M11 7L9.6 8.4L12.2 11H2V13H12.2L9.6 15.6L11 17L16 12L11 7M20 19H12V21H20C21.1 21 22 20.1 22 19V5C22 3.9 21.1 3 20 3H12V5H20V19Z"
                />
              </svg>
              Login
            </RouterLink>
          </div>
          <div v-if="authStore.tokenUser">
            <a
              @click="handleLogout"
              class="hover:text-red-600 w-full flex items-center gap-x-3.5 py-2 px-4 text-base font-bold rounded-lg border border-transparent focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
              href="#"
            >
              <svg
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
              >
                <title>logout</title>
                <path
                  d="M17 7L15.59 8.41L18.17 11H8V13H18.17L15.59 15.58L17 17L22 12M4 5H12V3H4C2.9 3 2 3.9 2 5V19C2 20.1 2.9 21 4 21H12V19H4V5Z"
                />
              </svg>
              Logout
            </a>
          </div>
          <p class="text-sm text-gray-500 px-4">
            © 2024 Pustaka <br />
            All rights reserved
          </p>
        </div>
      </div>
      <!-- End Content -->
    </div>
  </div>
  <!-- End Sidebar -->
</template>

<script setup>
import { useAuthStore } from "@/stores/authStore";
import { onMounted, ref } from "vue";
import { RouterLink } from "vue-router";

const authStore = useAuthStore();
const handleLogout = () => {
  authStore.logout();
};

onMounted(() => {
  // getUser();
  authStore.message = false;
});
</script>
