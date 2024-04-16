<template>
    <div class="mt-10 sm:mt-0">
        <PageModal :errors="errors"></PageModal>
        <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-blue-600 flex">
            <icon name="page" class="w-8 h-8" />
            <span>Setting</span>
        </h3>
        <!-- <div class="mb-1 mt-4 flex justify-between items-center">
            <div class="flex items-center justify-end">
                <button
                    class="flex items-center bg-gray-500 text-white active:bg-pink-600 font-sans text-sm px-4 py-1.5 rounded shadow-md hover:bg-gray-700 hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    v-on:click="onAddClass()">
                    <icon class="w-6 h-6" name="create" />Setting
                </button>
            </div>
        </div> -->
        <div  class=" overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">{{ __('phone') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('email') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('address') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('time') }}</th>
                        <th scope="col" class="px-6 py-3">
                            {{ __("action") }}
                        </th>
                    </tr>
                </thead>
                <template>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <Link :href="route('section.index', setting.id)">{{ __(setting.phone) }}</Link>
                        </td>
                        <td class="px-6 py-4">{{ __(setting.email) }}</td>
                        <td class="px-6 py-4">{{ __(setting.address) }}</td>
                        <td class="px-6 py-4">{{ __(setting.time) }}</td>
                        <td class="px-6 py-4">
                            <a @click="onEdit(setting)"
                                class="inline-block px-4 py-1.5 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                <icon name="edit" />
                            </a>

                            <a @click="onDelete(setting.id)"
                                class="inline-block px-4 py-1.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                <icon name="delete" />
                            </a>
                        </td>
                    </tr>
                </template>

            </table>
            <form v-if="editMode == true" class="space-y-4 text-gray-700">
                <div
                    class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
                    <div class="relative w-auto my-6 mx-auto max-w-3xl">
                        <div
                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--body-->
                            <div class="md:flex grid grid-rows-2 grid-flow-col gap-4">
                                <div class="p-3 row-span-3" >
                                    <div class="mb-4">
                                        <label>{{ __('phone') }} </label>
                                        <input type="text" v-model="form.phone"
                                            :class="[errors.phone ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.phone">{{ errors.phone }}</div>
                                    </div>
                                </div>
                                <div class="p-3 col-span-2">
                                    <div class="mb-4">
                                        <label>{{ __('email') }} </label>
                                        <input type="text" v-model="form.email"
                                            :class="[errors.email ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.email">{{ errors.email }}
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 row-span-2 col-span-2">
                                    <div class="mb-4">
                                        <label>{{ __('address') }}</label>
                                        <input type="text" v-model="form.address"
                                            :class="[errors.address ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.address">{{ errors.address }}
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="mb-4">
                                        <label>{{ __('time') }}</label>
                                        <input type="text" v-model="form.time"
                                            :class="[errors.time ? 'border-red-500' : '']"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                        <div class="text-red-500 font-bold" v-if="errors.time">{{ errors.time }}
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
        setting: Object,
        errors: Object
    },
    data() {
        return {
            editMode: false,
            form: this.$inertia.form({
                id: null,
                address: null,
                phone: null,
                email: null,
                time: null,
            })
        };
    },
    methods: {
        onEdit : function (data) {
            this.editMode = true;
            this.showModal = true;
            this.form.id = data.id;
            this.form.email = data.email;
            this.form.address = data.address;
            this.form.phone = data.phone;
            this.form.time = data.time;
        },
        closeModal: function() {
            this.showModal = false;
            this.editMode = false;
        },
        update: function() {
            this.form.put(this.route("setting.update", this.form.id), {
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
