<template>
  <nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-gray-800 flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
   id="sidenavExample" >
    <div
      class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
    >
      <button
        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
       
        v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
      >
        <i class="fas fa-bars"></i>
      </button>
 
    
      <ul class="md:hidden items-center flex flex-wrap list-none">
        <li class="inline-block relative">
          <notification-dropdown />
        </li>
        <li class="inline-block relative">
          <user-dropdown />
        </li>
      </ul>
      <!-- Collapse -->
      <div
        class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
        v-bind:class="collapseShow"
      >
        <!-- Collapse header -->
        <div
          class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
        >
          <div class="flex flex-wrap">
            <div class="w-6/12">
              <!-- <router-link
                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                to="/"
              >
                Vue Notus
              </router-link> -->
            </div>
            <div class="w-6/12 flex justify-end">
              <button
                
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                v-on:click="toggleCollapseShow('hidden')"
              >
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-6 mb-4 md:hidden">
          <div class="mb-3 pt-0">
            <input
              type="text"
              placeholder="Search"
              class="border-0 px-3 py-2 h-12 border border-solid border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
            />
          </div>
        </form>

        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
          <li class="items-center">
           
          </li>

          <li class="items-center">
           
          </li>

          <li class="items-center">
          
          </li>

          <li class="items-center">
          
          </li>
        </ul>

        
        <hr class="my-4 md:min-w-full" />

        <h6
          class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
        >
          Auth Layout Pages
        </h6>
          <LanguageSelector></LanguageSelector>
      

        <ul v-if="$page.props.auth.user == null" class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
          <link class="items-center">
            <Link
              class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
              :href="route('login')"
            >
              <i class="fas fa-fingerprint text-blueGray-300 mr-2 text-sm"></i>
              Login
            </Link>
          </li>

          <li class="items-center">
            <Link
              class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                :href="route('register')"
            >
              <icon name="book"
                class=" text-blueGray-300 mr-2 text-sm"
              ></icon>
              Register
            </Link>
          </li>
        </ul>


        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        <h6
          class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
        >
          Documentation
        </h6>
        <!-- Navigation -->
        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-1 " lass="relative">
    

          <Link   :class="[$page.url.startsWith('/admin/pages') ? 'opacity-75 text-blue-300 bg-coolGray-900' : '']"  :href="route('pages')" class=" px-4 py-2.5 flex flex-wrap text-blueGray-300 hover:text-blueGray-400 text-sm  mb-1 no-underline font-semibold">
            <icon name="page" class="mr-1 text-blueGray-300 text-base"></icon>
              Pages
          </Link>
           <Link   :class="[$page.component === 'Blog/Tintuc' ? 'opacity-75 text-blue-300 bg-coolGray-900' : '']"  :href="route('tintuc.index')" class=" px-4 py-2.5 flex flex-wrap text-blueGray-300 hover:text-blueGray-400 text-sm  mb-1 no-underline font-semibold">
            <icon name="new" class="mr-1 text-blueGray-300 text-base"></icon>
              News
          </Link>
          <li class="ml-4 menu_dropdown">
            <a  class="text-white flex"><icon name="page" class="mr-1 text-blueGray-300  text-sm"></icon>Holo360</a>
            <ul class="sub_menu ml-6">
              <li class="my-3">
                <Link  :href="route('category_holo360.index')"  class="italic text-white text-blueGray-300 hover:text-blueGray-400 text-sm">Category </Link>
              </li>
              <li class="my-3">
                <Link  :href="route('project_holo360.index')"  class="italic text-white text-blueGray-300 hover:text-blueGray-400 text-sm">Project</Link>
              </li>
            </ul>
          </li>
          

          <Link  v-if="hasAnyPermission(['users_manage'])" :class="[$page.url.startsWith('/admin/themes') ? 'opacity-75 text-blue-300 bg-coolGray-900 ' : '']"  :href="route('themes.index')" class=" px-4 py-2.5 flex flex-wrap text-blueGray-300 hover:text-blueGray-400 text-sm  mb-1 no-underline font-semibold">
            <icon name="theme" class="mr-1 text-blueGray-300 text-base"></icon>
              Theme
          </Link>
           <Link  v-if="hasAnyPermission(['users_manage'])" :class="[$page.component === 'Language' ? 'opacity-75 text-blue-300 bg-coolGray-900 ' : '']"  :href="route('languages')" class=" px-4 py-2.5 flex flex-wrap text-blueGray-300 hover:text-blueGray-400 text-sm  mb-1 no-underline font-semibold">
            <icon name="language" class="mr-1 text-blueGray-300 text-base"></icon>
              Languages
          </Link>
       
          <Link  v-if="hasAnyPermission(['users_manage'])" :class="[$page.component === 'Mail/Mail' ? 'opacity-75 text-blue-300 bg-coolGray-900 ' : '']"  :href="route('mail.index')" class=" px-4 py-2.5 flex flex-wrap text-blueGray-300 hover:text-blueGray-400 text-sm  mb-1 no-underline font-semibold">
            <icon name="mail" class="mr-1 text-blueGray-300 text-base"></icon>
              Mail
          </Link>
            <Link  v-if="hasAnyPermission(['users_manage'])" :class="[$page.component === 'Contact' ? 'opacity-75 text-blue-300 bg-coolGray-900 ' : '']"  :href="route('contact.index')" class=" px-4 py-2.5 flex flex-wrap text-blueGray-300 hover:text-blueGray-400 text-sm  mb-1 no-underline font-semibold">
            <icon name="contact" class="mr-1 text-blueGray-300 text-base"></icon>
              Contact
          </Link>
              <Link  v-if="hasAnyPermission(['users_manage'])" :class="[$page.component === 'Project/Index' ? 'opacity-75 text-blue-300 bg-coolGray-900 ' : '']"  :href="route('project.index')" class=" px-4 py-2.5 flex flex-wrap text-blueGray-300 hover:text-blueGray-400 text-sm  mb-1 no-underline font-semibold">
            <icon name="project" class="mr-1 text-blueGray-300 text-base"></icon>
              Project
          </Link>
       
          <li class="inline-flex" v-if="hasAnyPermission(['users_manage'])"></li>
        
        

          <li class="inline-flex" v-if="$page.props.auth.user">
                <Link   :href="route('logout')" method="post" class=" px-4 py-2.5 flex flex-wrap text-blueGray-300 hover:text-blueGray-400 text-sm  mb-1 no-underline font-semibold"  v-if="$page.props.auth.user">

            <icon name="logout" class="mr-1 text-blueGray-300 text-base"></icon>
            <div class="text-sm">Logout</div>
          </Link>
           
          </li>



         
        </ul>
      </div>
    </div>
  </nav>
</template>


<script>
import NotificationDropdown from "@/Components/Dropdowns/NotificationDropdown.vue";
import UserDropdown from "@/Components/Dropdowns/UserDropdown.vue";
import { Link } from "@inertiajs/inertia-vue";
// import NewQuestionButton from '@/Components/NewQuestionButton'
// import ReplyButtom from "@/Components/ReplieComponent/ReplyButtom";
import Icon from "@/Components/Icon";
import LanguageSelector from "@/Components/LanguageSelector";
export default {
  data() {
    return {
      collapseShow: "hidden",
    };
  },
  mounted(){
// $('.menu_dropdown').click(function(){
//   $('.sub_menu').ToggleClass()
// })
  },
  methods: {
    toggleCollapseShow: function (classes) {
      this.collapseShow = classes;
    },
  },
  components: {
    NotificationDropdown,
    UserDropdown,
    Link,
    LanguageSelector,
    // NewQuestionButton,
    // ReplyButtom,
    Icon
  },
};
</script>
