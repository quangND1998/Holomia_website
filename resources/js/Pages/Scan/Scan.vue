<template>
  <div>
    <div
      id="exampleModal"
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
              Update Scan
            </h3>
            <h3 v-else class="text-xl font-semibold text-gray-900">
              Create scan
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
              <form @submit.prevent="save">
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div
                      class="form-group"
                      :class="errors.name ? 'is-valid' : ''"
                    >
                      <label for="nameTour" class="col-form-label">Name:</label>
                      <input
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        :class="errors.name ? 'border-red-500' : ''"
                        v-model="form.name"
                        id="nameTour"
                      />
                      <div class="text-red-500" v-if="errors.name">
                        {{ errors.name }}
                      </div>
                    </div>
                  </div>
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div
                      class=""
                      :class="errors.name ? 'is-valid' : ''"
                    >
                      <label for="nameTour" class="col-form-label"
                        >Category:</label
                      >
                      <select
                        v-model="form.category"
                        :class="errors.category ? 'border-red-500' : ''"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      >
                        <option
                          v-for="(category, index) in categorys"
                          :key="index"
                          :value="category.id"
                        >
                          {{ category.name }}
                        </option>
                      </select>
                      <div class="text-red-500" v-if="errors.category">
                        {{ errors.category }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div
                      class="form-group"
                      :class="errors.model_code ? 'is-valid' : ''"
                    >
                      <label for="nameTour" class="col-form-label"
                        >Model Code:</label
                      >
                      <input
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        :class="errors.model_code ? 'border-red-500' : ''"
                        v-model="form.model_code"
                        id="nameTour"
                      />
                      <div class="text-red-500" v-if="errors.model_code">
                        {{ errors.model_code }}
                      </div>
                    </div>
                  </div>
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div
                      class=""
                      :class="errors.expired_date ? 'is-valid' : ''"
                    >
                      <label for="nameTour" class="col-form-label"
                        >Expired Date:</label
                      >
                      <input
                        type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        :class="errors.expired_date ? 'border-red-500' : ''"
                        v-model="form.expired_date"
                        id="nameTour"
                      />
                      <div class="text-red-500" v-if="errors.expired_date">
                        {{ errors.expired_date }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group" :class="errors.image ? 'is-valid' : ''">
                  <label for="recipient-name" class="col-form-label my-2">
                    Upload Logo (jpg,png)
                  </label>
                  <div class="flex items-center justify-center w-full">
                    <div class="col-md-3 col-sm-6 col-12 mt-5" v-if="logo">
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
                          :src="logo"
                          alt="Card image cap"
                        />
                      </div>
                    </div>

                    <label
                      v-if="logo == null"
                      class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300"
                    >
                      <div
                        class="flex flex-col items-center justify-center pt-7"
                      >
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
                        @input="form.logo = $event.target.files[0]"
                        :class="errors.logo ? 'border-red-500' : ''"
                        @change="onFileChangeLogo"
                        class="opacity-0"
                        accept=".jpg, .png"
                      />
                    </label>
                    <div class="text-red-500" v-if="errors.logo">
                      {{ errors.logo }}
                    </div>
                  </div>
                </div>

                <div class="modal-footer my-2">
                  <button
                    type="button"
                    class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                    data-dismiss="modal"
                    @click="reset()"
                  >
                    Close
                  </button>
                  <button
                    @click.prevent="save()"
                    type="submit"
                    class="inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
                  >
                    Save changes
                  </button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <h2 class="text-3xl font-medium text-blue-600 mt-5">List scan</h2>
    <button
      type="button"
      class="inline-block px-2 py-2 bg-blue-600 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
      data-toggle="modal"
      data-target="#exampleModal"
      @click="clickModal()"
    >
      Create Scan
    </button>
    <button
      type="button"
      class="inline-block px-2 py-2 bg-blue-600 text-white font-black text-sm leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
      data-toggle="modal"
      data-target="#exampleModalGroup"
      @click="clickModalGroup()"
    >
      Create Group
    </button>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="py-3 px-3">
              <input type="checkbox" id="check_all" v-model="selectAll" />
            </th>
            <th scope="col" class="py-3 px-3">STT</th>
            <th scope="col" class="py-3">Name</th>

            <th scope="col" class="py-3">Group</th>
            <th scope="col" class="py-3">Model Code</th>
            <th scope="col" class="py-3">Preview Link</th>
            <th scope="col" class="py-3">Create by</th>
            <th scope="col" class="py-3">Category</th>
            <th scope="col" class="py-3">Active</th>
            <th scope="col" class="py-3">Expired Date</th>
            <th scope="col" class="py-3">Logo</th>
            <th scope="col" class="py-3">Action</th>
          </tr>
        </thead>
        <!-- sắp xếp -->
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="scan in scans.data"
            :key="scan.id"
            class="bg-white border-b"
          >
            <td>
              <input
                type="checkbox"
                class="checkbox"
                v-model="selected"
                :value="scan.id"
              />
            </td>
            <td
              scope="row"
              class="font-medium text-gray-900 whitespace-nowrap px-4"
            >
              {{ scan.id }}
            </td>
            <td class="">
              {{ project.name }}
            </td>
            <td class="">
              <div class="text-xl text-gray-900">
                {{ scan.group != null ? scan.group.title : null }}
              </div>
            </td>
            <td class="py-2">
              {{ scan.model_code }}
            </td>
            <td class="">
              <div class="text-xl text-gray-900">
                <a
                  :href="'scan/' + scan.code"
                  class="text-blue-500"
                  target="_blank"
                >
                  <i class="fa fa-external-link"></i>View
                </a>
              </div>
            </td>
            <td class="">
              <div class="text-xl text-gray-900">
                <span
                  class="text-xl inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded-full"
                  >{{ scan.user.name }}</span
                >
              </div>
            </td>
            <td>
              <div class="text-xl text-gray-900">
                <span
                  class="text-xl inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-600 text-white rounded-full"
                  >{{ scan.category_scan.name }}</span
                >
              </div>
            </td>
            <td>
              <div class="text-xl text-gray-900">
                <input
                  :checked="scan.active == 1 ? true : false"
                  @change="onChangeActive(scan, $event)"
                  class="toggle-class-public"
                  type="checkbox"
                />
              </div>
            </td>
            <td>
              <div class="text-xl text-gray-900">
                {{ formatDate(scan.expired_date) }}
              </div>
              <span
                v-if="scan.is_expired"
                class="text-xl inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full"
                >Expired</span
              >
              <span
                v-else
                class="text-xl inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-600 text-white rounded-full"
                >Countinue</span
              >
            </td>
            <td>
              <img
                class="card-img-top w-50 h-20"
                :src="scan.logo"
                alt="Card image cap"
              />
            </td>
            <td class="">
              <button
                data-toggle="modal"
                data-target="#exampleModal"
                class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-xl leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                @click="edit(scan)"
              >
                Update
              </button>
              <!-- <button
                      @click="deleteRow(scan.id)"
                      class="inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-xl leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
                    >Delete</button>-->
            </td>
          </tr>
        </tbody>
      </table>
      <pagination class="mt-6" :links="scans.meta.links" />
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
    scans: Object,
    categorys: Array,
    groupScans: Array,
    listScans: Array,
    errors: Object,
  },
  components: {
    Pagination,
    Icon,
    draggable,
  },
  computed: {
    selectAll: {
      get: function () {
        return this.scans ? this.selected.length == this.scans : false;
      },
      set: function (value) {
        var selected = [];
        if (value) {
          this.scans.forEach(function (scan) {
            selected.push(scan.id);
          });
        }
        this.selected = selected;
      },
    },
  },
  data() {
    return {
      showModel: false,
      editMode: false,
      listScanDefault: this.listScans ? this.listScans : [],
      listScanCurrent: this.listScans ? this.listScans : [],
      selected: [],
      term: null,
      logo: null,
      editMode: false,
      editGroupMode: false,
      form: this.$inertia.form({
        id: null,
        name: null,
        model_code: null,
        category: null,
        expired_date: null,
        logo: null,
      }),
      form2: this.$inertia.form({
        id: null,
        title: null,
        expired_date: null,
        scans_list: null,
      }),
      crumbs: [
        {
          route: "scan.index",
          parma: null,
          name: "Scan",
        },
      ],
    };
  },
  methods: {
    closeModel() {
      this.showModel = false;
      this.editMode = false;
      this.reset();
    },
    reset() {
      (this.logo = null),
        (this.form = this.$inertia.form({
          id: null,
          name: null,
          model_code: null,
          category: null,
          expired_date: null,
          logo: null,
        }));
    },
    resetGroup() {
      this.form2 = this.$inertia.form({
        id: null,
        title: null,
        expired_date: null,
        scans_list: null,
      });
    },
    search() {
      this.$inertia.get(
        this.route("scan.index"),
        { term: this.term },
        {
          preserveState: true,
        }
      );
    },
    save() {
      if (this.editMode) {
        this.form.post(route("scan.update", this.form.id), {
          preserveState: true,
          onError: (errors) => {
            if (Object.keys(errors).length > 0) {
              this.editMode = true;
            }
          },
          onSuccess: (page) => {
            $("#exampleModal").modal("hide");
            this.reset();
          },
        });
      } else {
        this.form.post(route("scan.store"), {
          preserveState: true,
          onError: (errors) => {
            if (Object.keys(errors).length > 0) {
              this.editMode = false;
            }
          },
          onSuccess: (page) => {
            $("#exampleModal").modal("hide");
            this.reset();
          },
        });
      }
    },
    saveGroup() {
      if (this.editGroupMode) {
        this.form2.post(route("groupScans.update", this.form2.id), {
          preserveState: true,
          onError: (errors) => {
            if (Object.keys(errors).length > 0) {
              this.editGroupMode = true;
            }
          },
          onSuccess: (page) => {
            $("#exampleModalGroup").modal("hide");
            this.reset();
            console.log("success");
            this.listScanDefault = this.listScans ? this.listScans : [];
          },
        });
      } else {
        this.form2.post(route("groupScans.store"), {
          preserveState: true,
          onError: (errors) => {
            if (Object.keys(errors).length > 0) {
              this.editGroupMode = false;
            }
          },
          onSuccess: (page) => {
            $("#exampleModalGroup").modal("hide");
            this.reset();
            this.listScanDefault = this.listScans ? this.listScans : [];
          },
        });
      }
    },
    clickModal() {
      this.showModel = true;
      this.editMode = false;
      $("#exampleModal").on("shown.bs.modal", function () {
        $("#nameTour").focus();
      });
      this.reset();
    },
    clickModalGroup() {
      this.listScanCurrent = this.listScanDefault ? this.listScanDefault : [];
      console.log(this.listScanCurrent, "listScanCurrent");
      this.editGroupMode = false;
      $("#exampleModalGroup").on("shown.bs.modal", function () {
        $("#nameTour").focus();
      });
      this.resetGroup();
    },
    edit(data) {
      console.log(data, "data edit scan");
      this.editMode = true;
      this.form.id = data.id;
      this.form.name = data.name;
      this.form.model_code = data.model_code;
      this.form.category = data.category_scan_id;
      (this.form.expired_date = data.expired_date), (this.editMode = true);
      $("#exampleModal").on("shown.bs.modal", function () {
        $("#nameTour").focus();
      });
    },
    editGroup(data) {
      this.listScanCurrent = [];
      this.listScanDefault.forEach((item, index) => {
        this.listScanCurrent.push(item);
      });

      this.editGroupMode = true;
      this.form2.id = data.id;
      this.form2.title = data.title;
      this.form2.expired_date = data.expired_date;
      let scans_list = [];

      let object = data.scans;
      object.forEach((item, index) => {
        if (!this.listScanCurrent.includes(item)) {
          this.listScanCurrent.push(item);
        }
      });
      $.each(object, function (key, value) {
        scans_list.push(parseInt(value.id));
      });
      this.form2.scans_list = scans_list;
      console.log(this.listScanCurrent, "listScanCurrent");

      $("#exampleModalGroup").on("shown.bs.modal", function () {
        $("#nameTour").focus();
      });
    },
    deleteRow(id) {
      if (!confirm("Are you sure want to remove?")) return;
      this.$inertia.delete(route("scan.delete", id));
    },
    onChangeActive(data, event) {
      let query = {
        id: data.id,
        active: event.target.checked,
      };
      this.$inertia.post(route("scan.removeProject"), query, {
        preserveState: false,
        // only: ["image360s", "errors", 'flash'],
      });
    },
    onFileChangeLogo(e) {
      const file = e.target.files[0];
      this.logo = URL.createObjectURL(file);
    },
    hideLogo() {
      this.logo = null;
    },
  },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style >
.forum-excerpt-toggle {
  align-items: center;
  border-radius: 0.5rem;
  cursor: pointer;
  display: flex;
  padding-bottom: 0.5rem;
  padding-top: 0.5rem;
}
.forum-excerpt-toggle .forum-excerpt-toggle-lines {
  opacity: 0.402;
}
.multiselect-tags-search {
  font-size: 1.25rem;
}
</style>
