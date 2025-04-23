<template>
    <section class="content">
      <alert :dismissible="true"></alert>
      <button
        type="button"
        class="inline-block px-8 py-4 bg-blue-600 text-white font-black text-xl leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        data-toggle="modal"
        data-target="#exampleModal"
        @click="clickModal()"
      >Create Schedule</button>
      <BreadCrumb :crumbs="crumbs" />
      <!-- Modal -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" v-if="editMode">Update Schedule</h5>
              <h5 class="modal-title" id="exampleModalLabel" v-else>Create Schedule</h5>

              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
                :disabled="form.processing"
                @click="reset()"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="save">
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="form-group" :class="errors.name ? 'is-valid' :''">
                      <label for="nameTour" class="col-form-label">Name:</label>
                      <input
                        type="text"
                        class="form-control text-xl"
                        :class="errors.name ? 'border-red-500' :''"
                        v-model="form.name"
                        id="nameTour"
                      />
                      <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
                    </div>
                  </div>

                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="form-group" :class="errors.description ? 'is-valid' :''">
                      <label for="Description" class="col-form-label">Description:</label>
                      <input
                        type="text"
                        class="form-control text-xl"
                        :class="errors.description ? 'border-red-500' :''"
                        v-model="form.description"
                        id="Description"
                      />
                      <div class="text-red-500" v-if="errors.description">{{ errors.description }}</div>
                    </div>
                  </div>
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="form-group" :class="errors.time_reminder ? 'is-valid' :''">
                      <label for="Expired" class="col-form-label">Time reminder:</label>
                      <input
                        type="date"
                        class="form-control text-xl"
                        :class="errors.time_reminder ? 'border-red-500' :''"
                        v-model="form.time_reminder"
                        id="Expired"
                      />
                      <div class="text-red-500" v-if="errors.time_reminder">{{ errors.time_reminder }}</div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-xl leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                    data-dismiss="modal"
                    @click="reset()"
                  >Close</button>
                  <button
                    @click.prevent="save()"
                    type="submit"
                    class="inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-xl leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
                  >Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full max-w-md mr-4 mb-8 mt-8">
        <input
          @keyup="search"
          class="relative w-full px-8 py-3 text-xl rounded-r focus:shadow-outline"
          autocomplete="off"
          type="text"
          name="search"
          placeholder="Search…"
        />
      </div>

      <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xl font-back text-gray-500 uppercase tracking-wider"
                    >id</th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xl font-back text-gray-500 uppercase tracking-wider"
                    >Name</th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xl font-back text-gray-500 uppercase tracking-wider"
                    >Description</th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xl font-back text-gray-500 uppercase tracking-wider"
                    >Mail List</th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xl font-back text-gray-500 uppercase tracking-wider"
                    >Active</th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xl font-back text-gray-500 uppercase tracking-wider"
                    >Time reminder</th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Action</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="schedule in  schedules.data" :key="schedule.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div class="text-xl font-medium text-gray-900">{{ schedule.id }}</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">{{ schedule.name }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">{{ schedule.description }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">
                        <span
                          class="text-xl inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded-full"
                        ></span>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">
                        <input
                          :checked="schedule.state == 1 ? true : false"
                          @change="onChangeActive(schedule, $event)"
                          class="toggle-class-public"
                          type="checkbox"
                        />
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">{{formatDate(schedule.time_reminder)}}</div>
                      <span
                        class="text-xl inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full"
                      >Time Reminder</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <button
                        data-toggle="modal"
                        data-target="#exampleModal"
                        class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-black text-xl leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                        @click="edit(schedule)"
                      >Update</button>
                      <button
                        @click="deleteRow(schedule.id)"
                        class="inline-block px-6 py-2.5 bg-gray-800 text-white font-black text-xl leading-tight uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
                      >Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- <pagination class="mt-6" :links="schedules.meta.links" /> -->
    </section>
  </template>

  <script>
  import { Link, Head } from "@inertiajs/inertia-vue";
  import Alert from "@/Components/Alert";
  import Layout from "@/Components/Layout";
  import Icon from "@/Components/Icon";
  import Pagination from "@/Components/Pagination";
  export default {
    layout: Layout,
    components: {
      Link,
      ContentHeaderVue,
      Pagination,
      Alert,
      BreadCrumb,
      Head,
      Icon
    },
    props: {
        schedules: Object,
      errors: Object
    },
    data() {
      return {
        editMode: false,
        form: this.$inertia.form({
          id: null,
          name: null,
          description: null,
          time_reminder: null,
          active: null
        }),
        crumbs: [
          {
            route: "schedule.index",
            parma: null,
            name: "Schedule"
          }
        ]
      };
    },
    methods: {
      reset() {
        (this.logo = null),
          (this.form = this.$inertia.form({
            id: null,
            name: null,
            description: null,
            time_reminder: null,
            active: null
          }));
      },
      search() {
        this.$inertia.get(
          this.route("schedule.index"),
          {
            preserveState: true
          }
        );
      },
      save() {
        if (this.editMode) {
          this.form.post(route("schedule.update", this.form.id), {
            preserveState: true,
            onError: errors => {
              if (Object.keys(errors).length > 0) {
                this.editMode = true;
              }
            },
            onSuccess: page => {
              $("#exampleModal").modal("hide");
              this.reset();
            }
          });
        } else {
          this.form.post(route("schedule.store"), {
            preserveState: true,
            onError: errors => {
              if (Object.keys(errors).length > 0) {
                this.editMode = false;
              }
            },
            onSuccess: page => {
              $("#exampleModal").modal("hide");
              this.reset();
            }
          });
        }
      },
      clickModal() {
        this.editMode = false;
        $("#exampleModal").on("shown.bs.modal", function() {
          $("#nameTour").focus();
        });
        this.reset();
      },
      edit(data) {
        this.editMode = true;
        this.form.id = data.id;
        this.form.name = data.name;
        this.form.description = data.description;
        (this.form.time_reminder = data.time_reminder), (this.editMode = true);
        $("#exampleModal").on("shown.bs.modal", function() {
          $("#nameTour").focus();
        });
      },
      deleteRow(id) {
        if (!confirm("Are you sure want to remove?")) return;
        this.$inertia.delete(route("schedule.delete", id));
      },
      onChangeActive(data, event) {
        let query = {
          id: data.id,
          active: event.target.checked
        };
        this.$inertia.post(route("schedule.changestate"), query, {
          preserveState: false
          // only: ["image360s", "errors", 'flash'],
        });
      },
      onFileChangeLogo(e) {
        const file = e.target.files[0];
        this.logo = URL.createObjectURL(file);
      },
      hideLogo() {
        this.logo = null;
      }
    }
  };
  </script>

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
  </style>
