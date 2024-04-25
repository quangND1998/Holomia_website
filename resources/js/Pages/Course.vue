<template>
  <div class="mt-10 sm:mt-0">
    <PageModal :errors="errors"></PageModal>
    <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-blue-600 flex">
      <icon name="page" class="w-8 h-8" />
      <span>Course</span>
    </h3>
    <div class="mb-1 mt-4 flex justify-between items-center">
      <div class="flex items-center justify-end">
        <button
          class="flex items-center bg-gray-500 text-white active:bg-pink-600 font-sans text-sm px-4 py-1.5 rounded shadow-md hover:bg-gray-700 hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          v-on:click="onAddClass()"
        >
          <icon class="w-6 h-6" name="create" />Course
        </button>
        <Link
          :href="route('category_course.index')"
          class="flex items-center bg-gray-500 text-white active:bg-pink-600 font-sans text-sm px-4 py-1.5 rounded shadow-md hover:bg-gray-700 hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          data-toggle="tooltip"
          data-placement="bottom"
          title="Thể Loại"
        >
          <icon class="w-6 h-6" name="create" />
          <icon class="w-5 h-5" name="theloai" />
        </Link>
      </div>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">{{ __("STT") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("title") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("category") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("sub_title") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("time") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("number_student") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("image_thumb") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("price") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("info") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("roadmap") }}</th>
            <th scope="col" class="px-6 py-3">{{ __("open_schedule") }}</th>
            <th scope="col" class="px-6 py-3">
              {{ __("action") }}
            </th>
          </tr>
        </thead>
        <template>
          <tr
            v-for="(course, index) in courses.data"
            :key="course.id"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          >
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
            >
              {{ index + 1 }}
            </th>
            <td class="px-6 py-4">
              <Link :href="route('section.index', course.id)">{{
                __(course.title)
              }}</Link>
            </td>
            <td class="px-6 py-4">
              <span
                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-400 text-white rounded-full"
                >{{ course.category.name }}</span
              >
            </td>
            <td class="px-6 py-4">{{ __(course.sub_title) }}</td>
            <td class="px-6 py-4">{{ __(course.time) }} month</td>
            <td class="px-6 py-4">{{ __(course.number_student) }} đã học</td>
            <td class="px-6 py-4 max-w-2">
              <img class="w-20" :src="course.image" alt="" />
            </td>
            <td class="px-6 py-4">{{ __(course.price) }}</td>
            <td class="px-6 py-4 crop-content">
                {{ __(course.info) }}
            </td>
            <td class="px-6 py-4 crop-content">
              <p style="height: 20px">{{ __(course.roadmap) }}</p>
            </td>
            <td class="px-6 py-4 crop-content">
              <p style="height: 20px">{{ __(course.open_schedule) }}</p>
            </td>
            <td class="px-6 py-4">
              <a
                @click="onEdit(course)"
                class="inline-block px-4 py-1.5 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
              >
                <icon name="edit" />
              </a>

              <a
                @click="onDelete(course.id)"
                class="inline-block px-4 py-1.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
              >
                <icon name="delete" />
              </a>
            </td>
          </tr>
        </template>
      </table>
      <form v-if="showModal == true" class="space-y-4 text-gray-700">
        <div
          class="h-[600px] fixed mt-14 inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
        >
          <div class="relative w-auto my-6 mx-auto max-w-6xl">
            <div
              class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
            >
              <!--body-->
              <div
                class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t"
              >
                <h3 class="text-3xl font-semibold" v-if="editMode == false">
                  {{ __("create_Course") }}
                </h3>
                <h3 class="text-3xl font-semibold" v-else>
                  {{ __("update_Course") }}
                </h3>
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
              <div class="h-96 overflow-auto flex flex-wrap w-full mx-2">
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("title") }} {{ __("en") }} </label>
                    <input
                      type="text"
                      v-model="form.title_en"
                      :class="[errors.title_en ? 'border-red-500' : '']"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                    <div class="text-red-500 font-bold" v-if="errors.title_en">
                      {{ errors.title_en }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("title") }} {{ __("vn") }} </label>
                    <input
                      type="text"
                      v-model="form.title_vn"
                      :class="[errors.title_vn ? 'border-red-500' : '']"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                    <div class="text-red-500 font-bold" v-if="errors.title_vn">
                      {{ errors.title_vn }}
                    </div>
                  </div>
                </div>
                <div class="w-full px-2 my-2">
                  <label
                    for="country"
                    class="block text-sm font-medium text-gray-700"
                    >{{ __("category") }}</label
                  >
                  <select
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    id="grid-state"
                    v-model="form.category_id"
                  >
                    <option
                      v-for="(category, index) in category_courses"
                      :key="index"
                      :value="category.id"
                    >
                      {{ category.name }}
                    </option>
                  </select>
                  <div class="text-red-500" v-if="errors.category_id">
                    {{ errors.category_id }}
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("sub_title") }} {{ __("en") }} </label>
                    <input
                      type="text"
                      v-model="form.sub_title_en"
                      :class="[errors.sub_title_en ? 'border-red-500' : '']"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                    <div
                      class="text-red-500 font-bold"
                      v-if="errors.sub_title_en"
                    >
                      {{ errors.sub_title_en }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("sub_title") }} {{ __("vn") }} </label>
                    <input
                      type="text"
                      v-model="form.sub_title_vn"
                      :class="[errors.sub_title_vn ? 'border-red-500' : '']"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                    <div
                      class="text-red-500 font-bold"
                      v-if="errors.sub_title_vn"
                    >
                      {{ errors.sub_title_vn }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("number_student") }}</label>
                    <input
                      type="text"
                      v-model="form.number_student"
                      :class="[errors.number_student ? 'border-red-500' : '']"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                    <div
                      class="text-red-500 font-bold"
                      v-if="errors.number_student"
                    >
                      {{ errors.number_student }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("price") }}</label>
                    <input
                      type="number"
                      v-model="form.price"
                      :class="[errors.price ? 'border-red-500' : '']"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                    <div class="text-red-500 font-bold" v-if="errors.price">
                      {{ errors.price }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <label
                    for="country"
                    class="block text-sm font-medium text-gray-700"
                    >{{ __("image_thumb") }}</label
                  >
                  <input
                    @input="form.image = $event.target.files[0]"
                    type="file"
                    name="email_address"
                    id="email_address"
                    placeholder="Title VietNamese"
                    autocomplete="Image"
                    accept=".png, .jpeg, .jpg"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  />
                  <div class="text-red-500" v-if="errors.image">
                    {{ errors.image }}
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("time") }}</label>
                    <input
                      type="text"
                      v-model="form.time"
                      :class="[errors.time ? 'border-red-500' : '']"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    />
                    <div class="text-red-500 font-bold" v-if="errors.time">
                      {{ errors.time }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("info") }} {{ __("en") }}</label>
                    <div class="mt-1">
                      <ckeditor
                        v-model="form.info_en"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Description VietNamese"
                      ></ckeditor>
                    </div>
                    <div class="text-red-500" v-if="errors.info_en">
                      {{ errors.info_en }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("info") }} {{ __("vn") }}</label>
                    <div class="mt-1">
                      <ckeditor
                        v-model="form.info_vn"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Description VietNamese"
                      ></ckeditor>
                    </div>
                    <div class="text-red-500" v-if="errors.info_vn">
                      {{ errors.info_vn }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("roadmap") }} {{ __("en") }}</label>
                    <div class="mt-1">
                      <ckeditor
                        v-model="form.roadmap_en"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Description VietNamese"
                      ></ckeditor>
                    </div>
                    <div class="text-red-500" v-if="errors.roadmap_en">
                      {{ errors.roadmap_en }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("roadmap") }} {{ __("vn") }}</label>
                    <div class="mt-1">
                      <ckeditor
                        v-model="form.roadmap_vn"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Description VietNamese"
                      ></ckeditor>
                    </div>
                    <div class="text-red-500" v-if="errors.roadmap_vn">
                      {{ errors.roadmap_vn }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("open_schedule") }} {{ __("en") }}</label>
                    <div class="mt-1">
                      <ckeditor
                        v-model="form.open_schedule_en"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Description VietNamese"
                      ></ckeditor>
                    </div>
                    <div class="text-red-500" v-if="errors.open_schedule_en">
                      {{ errors.open_schedule_en }}
                    </div>
                  </div>
                </div>
                <div class="w-1/2 px-2">
                  <div class="mb-4">
                    <label>{{ __("open_schedule") }} {{ __("vn") }}</label>
                    <div class="mt-1">
                      <ckeditor
                        v-model="form.open_schedule_vn"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Description VietNamese"
                      >
                      </ckeditor>
                    </div>
                    <div class="text-red-500" v-if="errors.open_schedule_vn">
                      {{ errors.open_schedule_vn }}
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b"
              >
                <button
                  class="inline-block px-3 py-2 mr-1 mb-1 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  @click="closeModal()"
                >
                  {{ __("cancel") }}
                </button>
                <button
                  class="inline-block px-3 py-2 mr-1 mb-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  type="submit"
                  v-if="editMode == false"
                  @click.prevent="save"
                >
                  {{ __("save") }}
                </button>
                <button
                  class="inline-block px-3 py-2 mr-1 mb-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  type="submit"
                  v-else
                  @click.prevent="update"
                >
                  {{ __("update") }}
                </button>
              </div>
            </div>
          </div>
        </div>
        <div
          v-if="showModal"
          class="opacity-25 fixed inset-0 z-40 bg-black"
        ></div>
      </form>
    </div>
  </div>
</template>

<script>
import Icon from "@/Components/Icon";
import PageModal from "@/Components/Modal/PageModal";
import Layout from "@/Components/Layout";
import { Link } from "@inertiajs/inertia-vue";
import draggable from "vuedraggable";
export default {
  layout: Layout,
  components: {
    PageModal,
    Icon,
    Link,
    draggable,
  },
  props: {
    courses: Object,
    category_courses: Array,
    errors: Object,
  },
  data() {
    return {
      showModal: false,
      editMode: false,
      form: this.$inertia.form({
        id: null,
        title: null,
        title_vn: null,
        title_en: null,
        sub_title: null,
        sub_title_vn: null,
        sub_title_en: null,
        time: null,
        number_student: null,
        info: null,
        info_vn: null,
        info_en: null,
        roadmap: null,
        roadmap_vn: null,
        roadmap_en: null,
        open_schedule: null,
        open_schedule_vn: null,
        open_schedule_en: null,
        image: null,
        price: null,
        category_id: null,
      }),
    };
  },
  methods: {
    onEdit: function (data) {
      this.reset();
      this.editMode = true;
      this.showModal = true;
      this.form.id = data.id;
      this.form.title = data.title;
      this.form.sub_title = data.sub_title;
      this.form.info = data.info;
      this.form.roadmap = data.roadmap;
      this.form.open_schedule = data.open_schedule;
      this.form.price = data.price;
      const result = data.languages.find(
        (element) => element.key == this.form.title
      );
      this.form.title_vn = result == undefined ? null : result.vn;
      this.form.title_en = result == undefined ? null : result.en;

      const result2 = data.languages.find(
        (element) => element.key == this.form.sub_title
      );
      console.log(result2);
      this.form.sub_title_vn = result2 == undefined ? null : result2.vn;
      this.form.sub_title_en = result2 == undefined ? null : result2.en;
      this.form.time = data.time;
      this.form.number_student = data.number_student;

      const result3 = data.languages.find(
        (element) => element.key == this.form.info
      );
      console.log(result3);
      this.form.info_vn = result3 == undefined ? null : result3.vn;
      this.form.info_en = result3 == undefined ? null : result3.en;

      const result4 = data.languages.find(
        (element) => element.key == this.form.roadmap
      );
      this.form.roadmap_vn = result4 == undefined ? null : result4.vn;
      this.form.roadmap_en = result4 == undefined ? null : result4.en;

      const result5 = data.languages.find(
        (element) => element.key == this.form.open_schedule
      );
      this.form.open_schedule_vn = result5 == undefined ? null : result5.vn;
      this.form.open_schedule_en = result5 == undefined ? null : result5.en;

      this.form.category_id = data.category_id;
    },
    reset: function () {
      this.form = this.$inertia.form({
        id: null,
        title: null,
        title_vn: null,
        title_en: null,
        sub_title: null,
        sub_title_vn: null,
        sub_title_en: null,
        time: null,
        number_student: null,
        info: null,
        info_vn: null,
        info_en: null,
        roadmap: null,
        roadmap_vn: null,
        roadmap_en: null,
        open_schedule: null,
        open_schedule_vn: null,
        open_schedule_en: null,
        image: null,
        price: null,
        category_id: null,
      });
    },
    onAddClass: function () {
      this.showModal = true;
      this.editMode = false;
      this.reset();
    },
    closeModal: function () {
      this.showModal = false;
      this.editMode = false;
    },
    save: function () {
      this.form.post(this.route("course.save"), {
        preserveState: true,
        onError: (errors) => {
          if (Object.keys(errors).length > 0) {
            this.showModal = true;
            this.editMode = true;
          }
        },
        onSuccess: (page) => {
          this.showModal = false;
          this.editMode = false;
          this.reset();
        },
      });
    },
    update: function () {
      this.form.put(this.route("course.update", this.form.id), {
        preserveState: true,
        onError: (errors) => {
          if (Object.keys(errors).length > 0) {
            this.showModal = true;
            this.editMode = true;
          }
        },
        onSuccess: (page) => {
          this.showModal = false;
          this.editMode = false;
          this.reset();
        },
      });
    },
    onDelete: function (id) {
      if (!confirm("Are you sure want to remove?")) return;
      this.$inertia.delete(this.route("course.delete", id));
    },
  },
};
</script>
<style>
.crop-content {
  max-width: 120px;
  overflow-x: auto;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
