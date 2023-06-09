<template>
    <div>
        <div id="defaultModal" tabindex="-1" v-if="showModel"
            class="fixed top-0 left-0 right-0 z-50 w-full overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-[#00000069]">
            <div class="relative w-full max-w-2xl max-h-full m-auto">
                <div class="relative bg-white rounded-lg shadow">
                    <div class="flex items-start justify-between p-4 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900 " v-if="editMode == true ">
                            Edit Project Holo360
                        </h3>
                        <h3 v-else class="text-xl font-semibold text-gray-900 ">
                            Create Project Holo360
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal" @click="closeModel()">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Title
                                </label>
                                <input v-model="form.title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    id="username" type="text" placeholder="Name" />
                                <div class="text-red-700" v-if="errors.title">
                                    {{ errors.title }}
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Link
                                </label>
                                <input v-model="form.link"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    id="username" type="text" placeholder="Link" />
                                <div class="text-red-700" v-if="errors.link">
                                    {{ errors.link }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Image
                                </label>
                                <input @input="form.image = $event.target.files[0]" accept=".jpg, .jpeg, .png"
                                    class="p-1.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none"
                                    id="file_input" type="file" />
                                <div class="text-red-700" v-if="errors.image">
                                    {{ errors.image }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Category
                                </label>
                                <select v-model="form.category_holo360_id" id="countries"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option :value="null">
                                        Choose a category
                                    </option>
                                    <option v-for="(category, index) in categories" :key="index" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <div class="text-red-700" v-if="errors.category_holo360_id">
                                    {{ errors.category_holo360_id }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b justify-end">
                        <button data-modal-hide="defaultModal" type="button"
                            class="text-white bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            @click="closeModel()">
                            Cancel
                        </button>
                        <button data-modal-hide="defaultModal" type="button" @click.prevent="saveProject"
                            class="text-white bg-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">
                            Save Change
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <h2 class="text-3xl font-medium text-blue-600 mt-5">Project Holo360</h2>
        <button class="px-3 py-2 bg-[#0f1d89] rounded-lg text-white my-3 text-md font-semibold" @click="addCategory()">
            Create
        </button>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="py-3 px-3">STT</th>
                        <th scope="col" class="py-3">Title</th>

                        <th scope="col" class="py-3">Link</th>
                        <th scope="col" class="py-3">Image</th>
                        <th scope="col" class="py-3">Category</th>
                        <th scope="col" class="py-3">Action</th>
                    </tr>
                </thead>
                 <!-- sắp xếp -->
                <draggable v-model="projects" tag="tbody" @change="onUnpublishedChange" v-bind="dragOptions"
                    @start="isDragging = true" @end="isDragging = false" item-key="id_priority">
                    <template>
                        <tr v-for="(project, index) in projects" :key="index"
                            class="bg-white border-b ">
                            <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap px-4">
                                {{ index + 1 }}
                            </th>
                            <td class="">
                                {{ project.title }}
                            </td>
                            <td class="">
                                {{ project.link }}
                            </td>
                            <td class="py-2">
                                <img :src="project.image" class="w-16" alt="" />
                            </td>
                            <td class="">
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded  border border-gray-500">{{
                                        project.category_project.name }}</span>
                            </td>
                            <td class="">
                                <button @click="edit(project)" class="font-medium text-blue-600 hover:no-underline hover:text-blue-700   mx-1">
                                    Edit
                                </button>
                                <button class="text-[#e71212] font-medium mx-1 hover:text-red-700" @click="deleteProject(project.id)">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </template>
                </draggable>
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
        projects: Array,
        categories: Array,
        errors: Object,
    },
    components: {
        Pagination,
        Icon,
        draggable,
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
    data() {
        return {
            showModel: false,
            editMode: false,
            form: this.$inertia.form({
                id: null,
                title: null,
                link: null,
                image: null,
                category_holo360_id: null,
            }),
        };
    },
    methods: {
        onUnpublishedChange() {
      let query = {
        data: this.projects
      };
      this.$inertia.post(this.route("project_holo360.priority"), query, {
        preserveState: false
      });
    },
        closeModel() {
            this.showModel = false;
            this.editMode = false;
        },
        addCategory() {
            this.showModel = true;
            this.editMode = false;
        },
        saveProject() {
            if (this.editMode) {
                this.form.post(
                    this.route("project_holo360.update", this.form.id),
                    {
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
                    }
                );
            } else {
                this.form.post(this.route("project_holo360.store"), {
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
        reset() {
            this.form = this.$inertia.form({
                id: null,
                title: null,
                link: null,
                image: null,
                category_holo360_id: null,
            });
        },

        deleteProject(id) {
            if (!confirm("Are you sure want to remove?")) return;
            this.$inertia.delete(this.route("project_holo360.delete", id));
        },
        edit(data) {
            this.showModel = true;
            this.editMode = true;
            this.form.id = data.id;
            this.form.title = data.title;
            this.form.link = data.link;
            this.form.category_holo360_id = data.category_holo360_id;
        },
    },
};
</script>

<style></style>
