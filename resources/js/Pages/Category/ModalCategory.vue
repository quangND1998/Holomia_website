<template>
  <div class="mb-6 flex justify-between items-center">
    <div>
      <form class="space-y-4 text-gray-700">
        <div
          v-if="showModal"
          class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
        >
          <div class="relative w-auto my-6 mx-auto max-w-3xl">
            <!--content-->
            <div
              class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
            >
              <!--header-->
              <div
                class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t"
              >
                <h3
                  class="text-3xl font-semibold"
                  v-if="editMode == false"
                >{{ __('create') }} Category Content</h3>
                <h3 class="text-3xl font-semibold" v-else>{{ __('update') }} Category Content</h3>
                <button
                  class="p-1 ml-auto bg-transparent border-0 text-gray-300 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                  @click="closeModal()"
                >
                  <span
                    class="bg-transparent h-6 w-6 text-2xl block outline-none focus:outline-none"
                  >
                    <i class="fas fa-times"></i>
                  </span>
                </button>
              </div>
              <!--body-->
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="col-span-3 sm:col-span-2">
     
                  <div class="mt-1 flex rounded-md shadow-sm" v-if="editMode ==false">
                    <span
                      class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                    >{{__('title')}} </span>
                    <input
                      type="text"
                      v-model="form.title"
                      name="company_website"
                      :class="errors.title ? 'border-red-500' :''"
                      id="company_website"
                      class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                    />
                  </div>
                  <p class="text-red-500 text-xs italic" v-if="errors.title">{{ errors.title }}</p>
                </div>
                  <div class="col-span-3 sm:col-span-2">
                 
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <span
                      class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                    >{{__('title')}} {{__('en')}}</span>
                    <input
                      type="text"
                      v-model="form.title_en"
                      name="company_website"
                      :class="errors.title_en ? 'border-red-500' :''"
                      id="company_website"
                      class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                    />
                  </div>
                  <p class="text-red-500 text-xs italic" v-if="errors.title_en">{{ errors.title_en }}</p>
                </div>
                  <div class="col-span-3 sm:col-span-2">
                 
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <span
                      class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                    >{{__('title')}}  {{__('vn')}}</span>
                    <input
                      type="text"
                      v-model="form.title_vn"
                      name="company_website"
                      :class="errors.title_vn ? 'border-red-500' :''"
                      id="company_website"
                      class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                    />
                  </div>
                  <p class="text-red-500 text-xs italic" v-if="errors.title_vn">{{ errors.title_vn }}</p>
                </div>
              </div>

              <!--footer-->
              <div
                class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b"
              >
                <button
                  class="inline-block px-3 py-2 mr-1 mb-1 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  
                  @click="closeModal()"
                >{{ __('cancel') }}</button>
                <button
                  class="inline-block px-3 py-2 mr-1 mb-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  type="submit"
                  v-if="editMode == false"
                  @click.prevent="save"
                >
                  {{ __('save')
                  }}
                </button>
                <button
                  class="inline-block px-3 py-2 mr-1 mb-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  type="submit"
                  v-else
                  @click.prevent="update"
                >{{ __('update') }}</button>
              </div>
            </div>
          </div>
        </div>
        <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
      </form>
    </div>
  </div>
</template>

<script>
import Icon from "@/Components/Icon";
export default {
  props: {
    errors: Object,
    section: Object
  },
  components: {
    Icon,
    Notification
  },
  data() {
    return {
      editMode: false,
      showModal: false,
      form: this.$inertia.form({
        id: null,
        title: null,
        title_en: null,
        title_vn: null
      })
    };
  },
  mounted() {
    var self = this;
    Bus.$on("onAddCategory", () => {
      this.editMode = false;
      this.reset();
      this.toggleModal();
    });
    Bus.$on("onEditCategory", data => {
      this.edit(data);
    });
  },

  methods: {
    toggleModal: function() {
      this.showModal = !this.showModal;
    },
    closeModal: function() {
      this.showModal = false;
      this.reset();
      this.editMode = false;
    },
    edit: function(data) {
      this.editMode = true;
      this.form.id = data.id;
      const result = data.languages.find(element => element.key == data.title);
      this.form.title_en = result.en;
      this.form.title_vn = result.vn;

      this.toggleModal();
    },

    save() {
      this.form.post(this.route("category.store", this.section.id), {
        preserveState: true,

        onError: errors => {
          if (Object.keys(errors).length > 0) {
            this.showModal = true;
            this.editMode = false;
          }
        },
        onSuccess: page => {
          this.showModal = false;
          this.editMode = false;
          this.reset();
        }
      });
      this.reset();
    },
    reset: function() {
      this.form = this.$inertia.form({
        id: null,
        title: null,
        title_en: null,
        title_vn: null

        // audio360: null
      });
    },
    update() {
      this.form.put(this.route("category.update", this.form.id), {
        preserveState: true,
        onError: errors => {
          if (Object.keys(errors).length > 0) {
            this.showModal = true;
            this.editMode = true;
          }
        },
        onSuccess: page => {
          this.showModal = false;
          this.editMode = false;
          this.reset();
        }
      });
    }
  }
};
</script>
<style scoped>
</style>