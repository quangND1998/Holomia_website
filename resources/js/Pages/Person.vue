<template>
    <div class="mt-10 sm:mt-0">
        <PageModal :errors="errors"></PageModal>
        <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-blue-600 flex">
            <icon name="page" class="w-8 h-8" />
            <span>Person</span>
        </h3>
        <div class="mb-1 mt-4 flex justify-between items-center">
            <div class="flex items-center justify-end">
                <button
                    class="flex items-center bg-gray-500 text-white active:bg-pink-600 font-sans text-sm px-4 py-1.5 rounded shadow-md hover:bg-gray-700 hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    v-on:click="onAddClass()">
                    <icon class="w-6 h-6" name="create" />Person
                </button>
            </div>
        </div>
        <div  class=" overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">{{ __('stt') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('name') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('image') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('description') }}</th>


                        <th scope="col" class="px-6 py-3">{{ __('type') }}</th>
                        <th scope="col" class="px-6 py-3">
                            {{ __("action") }}
                        </th>
                    </tr>
                </thead>
                <template>
                    <tr v-for="(person, index) in persons.data" :key="person.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ index + 1 }}</th>
                        <td class="px-6 py-4">{{ __(person.name) }}</td>
                        <td class="px-6 py-4">
                            <img loading="lazy" class="w-20" :src="person.image" alt="">
                        </td>
                        <td class="px-6 py-4">{{ __(person.type) }}</td>
                        <td class="px-6 py-4">{{ __(person.description) }}</td>
                        <td class="px-6 py-4">
                            <a @click="onEdit(person)"
                                class="inline-block px-4 py-1.5 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                <icon name="edit" />
                            </a>

                            <a @click="onDelete(person.id)"
                                class="inline-block px-4 py-1.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                <icon name="delete" />
                            </a>
                        </td>
                    </tr>
                </template>

            </table>
            <form v-if="showModal == true" class="space-y-4 text-gray-700">
                <div
                    class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
                    <div class="relative w-auto my-6 mx-auto max-w-3xl">
                        <div
                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--body-->
                            <div
                                class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                                <h3 class="text-3xl font-semibold" v-if="editMode == false">{{ __('create_person') }} </h3>
                                <h3 class="text-3xl font-semibold" v-else>{{ __('update_person') }}</h3>
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
                            <div class="flex flex-wrap w-full mx-2">
                                <div class="w-1/2 px-2" >
                                    <div class="mb-4">
                                        <label>{{ __('name') }} </label>
                                        <input type="text" v-model="form.name"
                                            :class="[errors.name ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.name">{{ errors.name }}</div>
                                    </div>
                                </div>

                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('Type') }} </label>
                                        <select
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            id="grid-state"
                                            v-model="form.type"
                                        >
                                        <option value="teacher"> Teacher</option>
                                        <option value="student"> Student</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('description') }} {{ __('en') }}</label>
                                        <div class="mt-1">
                                            <input type="text"
                                                v-model="form.description_en"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                placeholder="Description VietNamese"
                                            />
                                        </div>
                                        <div class="text-red-500" v-if="errors.description_en">{{ errors.description_en }}</div>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('description') }} {{ __('vn') }}</label>
                                        <div class="mt-1">
                                            <input type="text"
                                                v-model="form.description_vn"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                placeholder="Description VietNamese"
                                            />
                                        </div>
                                        <div class="text-red-500" v-if="errors.description_vn">{{ errors.description_vn }}</div>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2" >
                                        <label for="country" class="block text-sm font-medium text-gray-700">Image thumb</label>
                                        <input
                                        @input="form.image  = $event.target.files[0]"
                                        type="file"
                                        name="email_address"
                                        id="email_address"
                                        placeholder="Title VietNamese"
                                        autocomplete="Image"
                                        accept=".png, .jpeg, .jpg"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        />
                                        <div class="text-red-500" v-if="errors.image">{{ errors.image }}</div>
                                </div>
                                <div v-if="form.type == 'student'" class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('score') }}</label>
                                        <div class="mt-1">
                                            <input type="text"
                                                v-model="form.score"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                placeholder="score"
                                            />
                                        </div>
                                        <div class="text-red-500" v-if="errors.score">{{ errors.score }}</div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                                <button
                                    class="inline-block px-3 py-2 mr-1 mb-1 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    @click="closeModal()">{{ __('cancel') }}</button>
                                <button
                                    class="inline-block px-3 py-2 mr-1 mb-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    type="submit" v-if="editMode == false" @click.prevent="save">
                                    {{ __('save')
                                    }}
                                </button>
                                <button
                                    class="inline-block px-3 py-2 mr-1 mb-1 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    type="submit" v-else @click.prevent="update">{{ __('update') }}</button>
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
        draggable
    },
    props: {
        persons: Object,
        errors: Object
    },
    data() {
        return {
            showModal: false,
            editMode: false,
            form: this.$inertia.form({
                id: null,
                name: null,
                description: null,
                description_vn: null,
                description_en: null,
                type: null,
                image: null,
                score: null
            })
        };
    },
    methods: {

        onEdit : function (data) {
            this.reset();
            this.editMode = true;
            this.showModal = true;
            this.form.id = data.id;
            this.form.name = data.name;
            this.form.description = data.description;
            const result = data.languages.find(
                element => element.key == this.form.description
            );
            this.form.description_vn = result == undefined ? null : result.vn;
            this.form.description_en = result == undefined ? null : result.en;
            this.form.type = data.type;
            this.form.score = data.score;

        },
        reset: function() {
        this.form = this.$inertia.form({
            id: null,
                name: null,
                description: null,
                description_vn: null,
                description_en: null,
                type: null,
                image: null,
                score: null
        });
        },
        onAddClass: function() {
            this.showModal = true;
            this.editMode = false;
        },
        closeModal: function() {
            this.showModal = false;
            this.editMode = false;
        },
        save: function() {
            this.form.post(this.route("person.save"), {
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
        },
        update: function() {
            this.form.post(this.route("person.update", this.form.id), {
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
        },
        onDelete: function(id) {
            if (!confirm("Are you sure want to remove?")) return;
            this.$inertia.delete(this.route("person.delete", id));
        }
    }
};
</script>
