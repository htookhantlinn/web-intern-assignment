<template>
  <div>
    <div id="dropdown" />
    <div class="md:flex md:flex-col">
      <div class="md:flex md:flex-col md:h-screen">
        <div class="md:flex md:flex-shrink-0">
          <!-- Spring School Logo -->
          <div
            class="
              flex
              items-center
              justify-between
              px-6
              py-4
              bg-slate-100
              dark:bg-slate-800
              border-b
              dark:border-b-0
              md:flex-shrink-0 md:justify-center md:w-56
            "
          >
            <Link
              class="mt-1 text-black dark:text-white font-semibold text-2xl"
              :href="route('admin.home')"
            >
              Spring School
            </Link>

            <!-- hunburger icon -->
            <dropdown class="md:hidden" placement="bottom-end">
              <template #default>
                <svg
                  class="w-6 h-6 fill-black dark:fill-white"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
              </template>
              <template #dropdown>
                <div
                  class="
                    mt-2
                    px-8
                    py-4
                    bg-slate-300
                    dark:bg-slate-800
                    rounded
                    shadow-lg
                  "
                >
                  <main-menu />
                </div>
              </template>
            </dropdown>
          </div>
          <div
            class="
              md:text-md
              flex
              items-center
              justify-between
              p-4
              w-full
              text-sm
              border-b
              md:px-12 md:py-0
              bg-slate-100
              dark:bg-slate-800 dark:border-b-0
            "
          >
            <div class="mr-4 mt-1">
              <ToggleDarkModeButton></ToggleDarkModeButton>
            </div>
            <!-- logout button dropdown -->
            <dropdown class="mt-1" placement="bottom-end">
              <template #default>
                <div class="group flex items-center cursor-pointer select-none">
                  <div
                    class="
                      mr-1
                      text-gray-700
                      group-hover:text-slate-600
                      focus:text-slate-600
                      whitespace-nowrap
                      dark:text-white
                    "
                  >
                    <span>{{ this.$page.props.auth_admin_user.name }} </span>
                  </div>
                  <icon
                    class="
                      dark:fill-white
                      w-5
                      h-5
                      fill-gray-700
                      group-hover:fill-slate-600
                      focus:fill-slate-600
                    "
                    name="cheveron-down"
                  />
                </div>
              </template>
              <template #dropdown>
                <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                  <Link
                    class="block px-6 py-2 hover:text-white hover:bg-slate-500"
                    >My Profile</Link
                  >
                  <Link
                    class="block px-6 py-2 hover:text-white hover:bg-slate-500"
                    >Manage Users</Link
                  >
                  <Link
                    class="
                      block
                      px-6
                      py-2
                      w-full
                      text-left
                      hover:text-white hover:bg-slate-500
                    "
                    method="Delete"
                    :href="route('admin.logout')"
                    >Logout</Link
                  >
                </div>
              </template>
            </dropdown>
          </div>
        </div>

        <!-- Main content -->
        <div class="md:flex md:flex-grow md:overflow-hidden">
          <main-menu
            class="
              hidden
              flex-shrink-0
              p-12
              w-56
              dark:bg-slate-800
              bg-slate-100
              overflow-y-auto
              md:block
            "
          />
          <div
            class="
              px-4
              py-3
              md:flex-1 md:p-12 md:overflow-y-auto
              bg-slate-100
              dark:bg-slate-800
            "
            scroll-region
          >
            <slot />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ToggleDarkModeButton from "../OwnComponents/ToggleDarkModeButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Icon from "@/Shared/Icon.vue";
import Logo from "@/Shared/Logo.vue";
import Dropdown from "@/Shared/Dropdown.vue";
import MainMenu from "@/Shared/MainMenu.vue";

export default {
  components: {
    ToggleDarkModeButton,
    Dropdown,
    Icon,
    Link,
    Logo,
    MainMenu,
  },

  data() {
    return {
      lightIcon: false,
      darkIcon: false,
    };
  },
};
</script>
