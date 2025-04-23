<template>
  <div>
    <div
      id="defaultModal"
      tabindex="-1"
      v-if="showModel"
      class="fixed top-0 left-0 right-0 z-50 w-full overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-[#00000069]"
    >
      <div class="relative w-full max-w-2xl max-h-full m-auto">
        <div class="relative bg-white rounded-lg shadow">
          <div class="flex items-start justify-between p-4 border-b rounded-t">
            <h3
              class="text-xl font-semibold text-gray-900"
              v-if="editMode == true"
            >
              Edit Category Scan
            </h3>
            <h3 v-else class="text-xl font-semibold text-gray-900">
              Create Category Scan
            </h3>
            <button
              type="button"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
              data-modal-hide="defaultModal"
              @click="closeModel()"
            >
              <svg
                aria-hidden="true"
                class="w-5 h-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>

          <div class="p-6 space-y-6">
            <div class="grid  gap-4">
              <div class="form-group">
                <label
                  class="block text-gray-700 text-sm font-bold mb-2"
                  for="username"
                >
                  Name
                </label>
                <input
                  v-model="form.name"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                  id="username"
                  type="text"
                  placeholder="Name"
                />
                <div class="text-red-700" v-if="errors.name">
                  {{ errors.name }}
                </div>
              </div>
              <div class="form-group" :class="errors.image ? 'is-valid' : ''">
                <label for="recipient-name" class="col-form-label">
                  Upload Logo PC (jpg,png)
                </label>
                <div class="flex items-center justify-center w-full">
                  <div class="col-md-3 col-sm-6 col-12 mt-5" v-if="logo_pc">
                    <div class="amentites__info">
                      <div class="action-btn">
                        <button
                          @click="hideLogo()"
                          class="btn btn-xs deleteRecord"
                          id="deleteRecord"
                          style="position: absolute; right: 0"
                        >
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                      <img
                        class="card-img-top"
                        :src="logo_pc"
                        alt="Card image cap"
                      />
                    </div>
                  </div>

                  <label
                    v-if="logo_pc == null"
                    class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300"
                  >
                    <div class="flex flex-col items-center justify-center pt-7">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-12 h-12 text-gray-400 group-hover:text-gray-600"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      <p
                        class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600"
                      >
                        Select a photo
                      </p>
                    </div>

                    <input
                      type="file"
                      @input="form.logo_pc = $event.target.files[0]"
                      :class="errors.logo_pc ? 'border-red-500' : ''"
                      @change="onFileChangeLogo"
                      class="opacity-0"
                      accept=".jpg, .png"
                    />
                  </label>
                  <div class="text-red-500" v-if="errors.logo_pc">
                    {{ errors.logo_pc }}
                  </div>
                </div>
              </div>
              <div class="form-group" :class="errors.image ? 'is-valid' : ''">
                <label for="recipient-name" class="col-form-label">
                  Upload Logo Mobile (jpg,png)
                </label>
                <div class="flex items-center justify-center w-full">
                  <div class="col-md-3 col-sm-6 col-12 mt-5" v-if="logo_mb">
                    <div class="amentites__info">
                      <div class="action-btn">
                        <button
                          @click="hideLogo()"
                          class="btn btn-xs deleteRecord"
                          id="deleteRecord"
                          style="position: absolute; right: 0"
                        >
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                      <img
                        class="card-img-top"
                        :src="logo_mb"
                        alt="Card image cap"
                      />
                    </div>
                  </div>

                  <label
                    v-if="logo_mb == null"
                    class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300"
                  >
                    <div class="flex flex-col items-center justify-center pt-7">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-12 h-12 text-gray-400 group-hover:text-gray-600"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      <p
                        class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600"
                      >
                        Select a photo
                      </p>
                    </div>

                    <input
                      type="file"
                      @input="form.logo_mb = $event.target.files[0]"
                      :class="errors.logo_mb ? 'border-red-500' : ''"
                      @change="onFileChangeLogoMB"
                      class="opacity-0"
                      accept=".jpg, .png"
                    />
                  </label>
                  <div class="text-red-500" v-if="errors.logo_mb">
                    {{ errors.logo_mb }}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div
            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b justify-end"
          >
            <button
              data-modal-hide="defaultModal"
              type="button"
              class="text-white bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
              @click="closeModel()"
            >
              Cancel
            </button>
            <button
              data-modal-hide="defaultModal"
              type="button"
              @click.prevent="saveCategory"
              class="text-white bg-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10"
            >
              Save Change
            </button>
          </div>
        </div>
      </div>
    </div>

    <h2 class="font-medium text-blue-600 text-3xl">Category Scan</h2>
    <button
      class="px-3 py-2  rounded-lg text-black my-3 text-md font-semibold"
      @click="addCategory()"
    >
      Create
    </button>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">STT</th>
            <th scope="col" class="px-6 py-3">Name</th>

            <th scope="col" class="px-6 py-3">logo PC</th>
            <th scope="col" class="px-6 py-3">logo Mobile</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <!-- sắp xếp -->
        <tbody class="bg-white divide-y divide-gray-200">
            <tr
              v-for="(category, index) in category_scans"
              :key="index"
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ index + 1 }}
              </th>
              <td class="px-6 py-4">
                {{ category.name }}
              </td>
              <td class="px-6 py-4">
                <img class="card-img-top w-30 h-20" :src="category.logo_pc" alt="Card image cap" />
              </td>
              <td class="px-6 py-4">
                <img class="card-img-top w-30 h-20" :src="category.logo_mb" alt="Card image cap" />
              </td>
              <td class="px-6 py-4">
                <button
                  class="font-medium text-blue-600 hover:underline mx-1 hover:text-blue-700"
                  @click="edit(category)"
                >
                  Edit
                </button>
                <button
                  class="text-[#e71212] font-medium mx-1 hover:text-red-700"
                  @click="onDelete(category.id)"
                >
                  Delete
                </button>
              </td>
            </tr>
            </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Icon from "@/Components/Icon";
import Layout from "@/Components/Layout";
import Pagination from "@/Components/Pagination";
// sắp xếp
import draggable from "vuedraggable";
export default {
  layout: Layout,
  props: {
    category_scans: Array,
    errors: Object,
  },
  components: {
    Pagination,
    Icon,
    draggable,
  },
  data() {
    return {
      showModel: false,
      editMode: false,
      logo_pc : null,
      logo_mb : null,
      image: null,
      form: this.$inertia.form({
        id: null,
        name: null,
        content: null,
        logo_pc : null,
        logo_mb : null
      }),
    };
  },
  computed: {
    // sắp xếp
    dragOptions() {
      return {
        animation: 100,
        group: "description",
        disabled: false,
        ghostClass: "ghost",
        scrollSensitivity: 100,
        forceFallback: true,
      };
    },
  },
  methods: {
    onUnpublishedChange() {
      let query = {
        data: this.categories,
      };
      // console.log("drag");
      this.$inertia.post(this.route("category_holo360.priority"), query, {
        preserveState: false,
      });
    },
    closeModel() {
      this.showModel = false;
      this.editMode = false;
      this.reset();
    },
    addCategory() {
      this.showModel = true;
      this.editMode = false;
    },
    saveCategory() {
      if (this.editMode) {
        this.form.post(this.route("category-scan.update", this.form.id), {
          preserveState: true,

          onError: (errors) => {
            if (Object.keys(errors).length > 0) {
            }
            this.showModel = true;
            this.editMode = true;
          },
          onSuccess: (page) => {
            this.showModel = false;
            this.editMode = false;
            this.reset();
          },
        });
      } else {
        this.form.post(this.route("category-scan.store"), {
          preserveState: true,

          onError: (errors) => {
            if (Object.keys(errors).length > 0) {
            }
            this.showModel = true;
            this.editMode = false;
          },
          onSuccess: (page) => {
            this.showModel = false;
            this.editMode = false;
            this.reset();
          },
        });
      }
    },
    edit(data) {
      this.showModel = true;
      this.editMode = true;
      this.form.id = data.id;
      this.form.name = data.name;
    },
    reset() {
      this.form = this.$inertia.form({
        id: null,
        name: null,
        logo_pc : null,
        logo_mb : null
      });
    },
    onDelete(id) {
        if (!confirm("Are you sure want to remove?")) return;
        this.$inertia.delete(route("category-scan.delete", id));
    },
    deleteRow(id) {
      if (!confirm("Are you sure want to remove?")) return;
      this.$inertia.delete(route("category-scan.delete", id));
    },
    onFileChangeLogo(e) {
      const file = e.target.files[0];
      this.logo_pc = URL.createObjectURL(file);
    },
    hideLogo() {
      this.logo_pc = null;
    },
    onFileChangeLogoMB(e) {
      const file = e.target.files[0];
      this.logo_mb = URL.createObjectURL(file);
    },
    hideLogoMB() {
      this.logo_mb = null;
    }
  },
};
</script>

<style></style>
