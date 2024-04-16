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
                    v-on:click="onAddClass()">
                    <icon class="w-6 h-6" name="create" />Course
                </button>
            </div>
        </div>
        <div  class=" overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">{{ __('title') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('sub_title') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('time') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('number_student') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('price') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('info') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('roadmap') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('open_schedule') }}</th>
                        <th scope="col" class="px-6 py-3">
                            {{ __("action") }}
                        </th>
                    </tr>
                </thead>
                <template>
                    <tr v-for="(course, index) in courses.data" :key="course.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ index + 1 }}</th>
                        <td class="px-6 py-4">
                            <Link :href="route('section.index', course.id)">{{ __(course.title) }}</Link>
                        </td>
                        <td class="px-6 py-4">{{ __(course.sub_title) }}</td>
                        <td class="px-6 py-4">{{ __(course.time) }} month</td>
                        <td class="px-6 py-4">{{ __(course.number_student)}} đã học</td>
                        <td class="px-6 py-4">{{ __(course.price) }}</td>
                        <td class="px-6 py-4">{{ __(course.info) }}</td>
                        <td class="px-6 py-4">{{ __(course.roadmap)}}</td>
                        <td class="px-6 py-4">{{ __(course.open_schedule)}}</td>
                        <td class="px-6 py-4">
                            <a @click="onEdit(course)"
                                class="inline-block px-4 py-1.5 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                <icon name="edit" />
                            </a>

                            <a @click="onDelete(course.id)"
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
                            <div class="flex flex-wrap w-full">
                                <div class="w-1/2 px-2" >
                                    <div class="mb-4">
                                        <label>{{ __('title') }} </label>
                                        <input type="text" v-model="form.title"
                                            :class="[errors.title ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.title">{{ errors.title }}</div>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('sub_title') }} </label>
                                        <input type="text" v-model="form.sub_title"
                                            :class="[errors.sub_title ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.sub_title">{{ errors.sub_title }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('number_student') }}</label>
                                        <input type="text" v-model="form.number_student"
                                            :class="[errors.number_student ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.number_student">{{ errors.number_student }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('time') }}</label>
                                        <input type="text" v-model="form.time"
                                            :class="[errors.time ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.time">{{ errors.time }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('info') }}</label>
                                        <input type="text" v-model="form.info"
                                            :class="[errors.info ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.info">{{ errors.info }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('roadmap') }}</label>
                                        <input type="text" v-model="form.roadmap"
                                            :class="[errors.roadmap ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.roadmap">{{ errors.roadmap }}
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 px-2">
                                    <div class="mb-4">
                                        <label>{{ __('open_schedule') }}</label>
                                        <input type="text" v-model="form.open_schedule"
                                            :class="[errors.open_schedule ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.open_schedule">{{ errors.open_schedule }}
                                        </div>
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
        courses: Object,
        errors: Object
    },
    data() {
        return {
            showModal: false,
            editMode: false,
            form: this.$inertia.form({
                id: null,
                title: null,
                sub_title: null,
                time: null,
                number_student: null,
                info: null,
                roadmap: null,
                open_schedule: null,
            })
        };
    },
    methods: {
        onEdit : function (data) {
            this.editMode = true;
            this.showModal = true;
            this.form.id = data.id;
            this.form.title = data.title;
            this.form.sub_title = data.sub_title;
            this.form.time = data.time;
            this.form.number_student = data.number_student;
            this.form.info = data.info;
            this.form.roadmap = data.roadmap;
            this.form.open_schedule = data.open_schedule;
        },
        onAddClass: function() {
            this.showModal = true;
            this.editMode = false;
        },
        closeModal: function() {
            this.showModal = false;
            this.editMode = false;
        },
        update: function() {
            this.form.put(this.route("course.update", this.form.id), {
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
