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
                    <div
                        class="flex items-start justify-between p-4 border-b rounded-t "
                    >
                        <h3 class="text-xl font-semibold text-gray-900 " v-if="editMode == true ">
                            Edit Category Holo360
                        </h3>
                        <h3 v-else class="text-xl font-semibold text-gray-900 ">
                            Create Category Holo360
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
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-2">
                                <label
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    for="username"
                                >
                                    Name
                                </label>
                                <input
                                    v-model="form.name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    id="username"
                                    type="text"
                                    placeholder="Name"
                                />
                                <div class="text-red-700" v-if="errors.name">
                                    {{ errors.name }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <label
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    for="username"
                                >
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
                                <label
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    for="username"
                                >
                                    Content
                                </label>
                                <textarea
                                    v-model="form.content"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    id="username"
                                    rows="5"
                                    type="text"
                                    placeholder="Content..."
                                ></textarea>
                                <div class="text-red-700" v-if="errors.content">
                                    {{ errors.content }}
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

        <h2 class=" font-medium text-blue-600 text-3xl">Category Holo360</h2>
        <button
            class="px-3 py-2 bg-[#0f1d89] rounded-lg text-white my-3 text-md font-semibold"
            @click="addCategory()"
        >
            Create
        </button>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">STT</th>
                        <th scope="col" class="px-6 py-3">Name</th>

                        <th scope="col" class="px-6 py-3">content</th>
                        <th scope="col" class="px-6 py-3">image</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <!-- sắp xếp -->
                <draggable v-model="categories" tag="tbody" @change="onUnpublishedChange" v-bind="dragOptions"
                    @start="isDragging = true" @end="isDragging = false" item-key="id_priority">
                    <template>
                    <tr
                        v-for="(category, index) in categories"
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
                            {{ category.content }}
                        </td>
                        <td class="px-6 py-4">
                            <img :src="category.image" class="w-16"  alt="">
                        </td>
                        <td class="px-6 py-4">
                            <button

                                class="font-medium text-blue-600 hover:underline mx-1 hover:text-blue-700" @click="edit(category)"
                                >Edit</button
                            >
                            <button class="text-[#e71212] font-medium mx-1 hover:text-red-700" @click = "onDelete(category.id)">
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
        categories: Array,
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
            form: this.$inertia.form({
                id: null,
                name: null,
                content: null,
                image: null,
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
                data: this.categories
            };
            // console.log("drag");
            this.$inertia.post(this.route("category_holo360.priority"), query, {
                preserveState: false
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
            if(this.editMode){
                this.form.post(this.route("category_holo360.update",this.form.id), {
                preserveState: true,

                onError: (errors) => {
                    if (Object.keys(errors).length > 0) {
                    }
                    this.showModel=true;
                    this.editMode = true;
                },
                onSuccess: (page) => {
                    this.showModel = false;
                    this.editMode = false;
                    this.reset();
                },
            });
            }
            else{
                this.form.post(this.route("category_holo360.store"), {
                preserveState: true,

                onError: (errors) => {
                    if (Object.keys(errors).length > 0) {
                    }
                    this.showModel=true;
                    this.editMode = false;
                },
                onSuccess: (page) => {
                    this.showModel=false;
                    this.editMode = false;
                    this.reset();
                },
            });
            }

        },
        edit(data){
            this.showModel=true;
            this.editMode = true;
            this.form.id=data.id;
            this.form.name=data.name;
            this.form.content=data.content;
        },
        reset() {
            this.form = this.$inertia.form({
                id: null,
                name: null,
                content: null,
                image: null,
            });
        },
        onDelete(id) {
            if (!confirm("Are you sure want to remove?")) return;
            this.$inertia.delete(this.route("category_holo360.delete", id));
        },
    },
};
</script>

<style></style>
