<template>
    <div class="mt-10 sm:mt-0 overflow-auto">
    <BreadCrumbVue :page="page" :section="section" :category="category" name="Create"/>
    
    <div class="mt-5 md:mt-0 md:col-span-3">
     
      <form @submit.prevent="save">
        <div class="shadow overflow-hidden sm:rounded-md">
              <div class="flex justify-center">
                 <div class="form-check form-check-inline">
                    <!-- <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  name="inlineRadioOptions" id="inlineRadio1"   @change="onChangeEventTitle($event)"  :checked="showTitle  ? true : false" >
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">Have Title</label> -->
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions" id="inlineRadio2"   @change="onChangeEventDes($event)"  :checked="showDes  ? true : false">
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">Have Description</label>
                </div>

                 <div class="form-check form-check-inline"  v-if="section.theme.type ==0 ||section.theme.type ==1">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  name="inlineRadioOptions" id="inlineRadio1"   @change="onChangeEventVideo($event)"  :checked="showVideo ? true : false" >
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">Video</label>
                </div>
                <div class="form-check form-check-inline"  v-if="section.theme.type ==0 ||section.theme.type ==1">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox"  name="inlineRadioOptions" id="inlineRadio1"   @change="onChangeEventLink($event)"  :checked="showLink ? true : false" >
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">Link</label>
                </div>
                <div class="form-check form-check-inline" v-if="section.theme.type ==0 ||section.theme.type ==1">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="inlineRadioOptions" id="inlineRadio2"   @change="onChangeEventImage($event)"  :checked="showImage ? true : false">
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">Icon</label>
                </div>
                
                </div>
          <div class="px-4 py-5 bg-white sm:p-6">
                 
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-2" v-if="showTitle">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Title Key</label>
                <input
                  v-model="form.title"
                  type="text"
                  name="first_name"
                  id="first_name"
                  placeholder="key"
                  autocomplete="given-name"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
              </div>

              <div class="col-span-6 sm:col-span-2" v-if="showTitle">
                <label
                  for="email_address"
                  class="block text-sm font-medium text-gray-700"
                >{{__('title')}} {{__('en')}}</label>
                <input
                  v-model="form.title_en"
                  type="text"
                  name="email_address"
                  id="email_address"
                  autocomplete="email"
                  placeholder="Title English"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.title_en">{{ errors.title_en }}</div>
              </div>

              <div class="col-span-6 sm:col-span-2" v-if="showTitle">
                <label
                  for="country"
                  class="block text-sm font-medium text-gray-700"
                >{{__('title')}} {{__('vn')}}</label>
                <input
                  v-model="form.title_vn"
                  type="text"
                  name="email_address"
                  id="email_address"
                  placeholder="Title VietNamese"
                  autocomplete="email"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.title_vn">{{ errors.title_vn }}</div>
              </div>
              


              <div class="col-span-6 sm:col-span-2" v-if="showDes">
                <label
                  for="street_address"
                  class="block text-sm font-medium text-gray-700"
                >Description Key</label>
                <input
                  type="text"
                  v-model="form.description"
                  name="street_address"
                  id="street_address"
                  autocomplete="street-address"
                  placeholder="key"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.description">{{ errors.description }}</div>
              </div>
              <div class="col-span-6 sm:col-span-2" v-if="showDes">
                <label
                  for="street_address"
                  class="block text-sm font-medium text-gray-700"
                >{{__('description')}} {{__('en')}}</label>
                <div class="mt-1">

                    <ckeditor
                    v-model="form.description_en"
                    :config="editorConfig"
                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                    placeholder="Description English"
                  ></ckeditor>
                </div>
                 <div class="text-red-500" v-if="errors.description_en">{{ errors.description_en }}</div>
              </div>
              <div class="col-span-6 sm:col-span-2" v-if="showDes">
                <label
                  for="street_address"
                  class="block text-sm font-medium text-gray-700"
                >{{__('description')}} {{__('vn')}}</label>
                <div class="mt-1">
                    <ckeditor
                    v-model="form.description_vn"
                    :config="editorConfig2"
                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                    placeholder="Description VietNamese"
                  ></ckeditor>
                </div>
                  <div class="text-red-500" v-if="errors.description_vn">{{ errors.description_vn }}</div>
              </div>

                  <div class="col-span-6 sm:col-span-2" v-if="showLink">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Link Tour</label>
                <input
                  v-model="form.link"
                  type="text"
                  name="first_name"
                  id="first_name"
                  placeholder="Link tour"
                  autocomplete="given-name"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.link">{{ errors.link }}</div>
              </div>

              <div class="col-span-6 sm:col-span-2" v-if="showVideo">
                <label
                  for="email_address"
                  class="block text-sm font-medium text-gray-700"
                >Video</label>
                <input
                  v-model="form.video"
                  type="text"
                  name="email_address"
                  id="email_address"
                  autocomplete="email"
                  placeholder="Link Embed Youtube"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.title_en">{{ errors.title_en }}</div>
              </div>

              <div class="col-span-6 sm:col-span-2" v-if="showImage">
                <label
                  for="country"
                  class="block text-sm font-medium text-gray-700"
                >Image</label>
                <input
                    @input="form.images  = $event.target.files"
                  type="file"
                  name="email_address"
                  id="email_address"
                  placeholder="Title VietNamese"
                  autocomplete="Image"
                  multiple
                  accept=".png, .jpeg , .jpg"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.images">{{ errors.images }}</div>
              </div>
               <div class="col-span-6 sm:col-span-2">
                <label
                  for="country"
                  class="block text-sm font-medium text-gray-700"
                >Icon</label>
                <input
                    @input="form.icon  = $event.target.files[0]"
                  type="file"
                  name="email_address"
                  id="email_address"
                  placeholder="Title VietNamese"
                  autocomplete="Image"
                  accept=".png, .jpeg , .jpg"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.icon">{{ errors.icon }}</div>
              </div>
              <!-- <div class="col-span-6">
                <label
                  for="street_address"
                  class="block text-sm font-medium text-gray-700"
                >Choose Theme</label>
                <div class="mt-5">
                  <div class="flex">
                    <div v-for="(theme,index) in themes" :key="index" class="flex items-center h-5">
                      <input
                        type="radio"
                        v-model="form.theme_id"
                        name="inlineRadioOptions"
                        id="inlineRadio1"
                        :value="theme.id"
                        class="form-check-input form-check-input ml-2 appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                      />
                      <div class="ml-2 text-sm">
                        <span
                          for="helper-checkbox"
                          class="font-medium text-gray-900 dark:text-gray-300"
                        ></span>
                      </div>
                      <div class="ml-2 text-sm mt-4">
                        <span
                          v-if="theme.type ==0"
                          class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-purple-600 text-white rounded"
                        >No Category Content</span>
                        <span
                          v-else-if="theme.type ==1"
                          class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-purple-600 text-white rounded"
                        >Category Content</span>
                        <img
                          :src="theme.image_template"
                          width="200px"
                          id="helper-checkbox-text"
                          class="max-w-full h-auto rounded-lg"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                    <div class="text-red-500" v-if="errors.theme_id">{{ errors.theme_id }}</div>
              </div> -->
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <div
                    v-if="checkRadio ==false"
                    class="flex flex-wrap justify-center space-x-2 text-xs py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full"
                  >
                    <icon name="warning" class="w-6 ml-3"></icon>
                    <span
                      class="text-xs py-1 px-1.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full"
                    >
                      
                      <button
                        class="bg-transparent hover focus:outline-none"
                      >Must Have input value content</button>
                    </span>
                  </div>
             <Link
              
                 :href="route('category.contents',category.title)"
              class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-800 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
            >Back</Link>
            <button  v-if="checkRadio"
              type="submit"
              class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Icon from "@/Components/Icon";
import Layout from "@/Components/Layout";
import { Link } from "@inertiajs/inertia-vue";
import BreadCrumbVue from "./BreadCrumb.vue";
export default {
    layout:Layout,
    props:{
        page:Object,
        section:Object,
        category:Object,
        errors:Object
        
    },
    components:{
        Link,
        Icon,
        BreadCrumbVue
    },
    data() {
    return {
        editorData: "<p>Content of the editor.</p>",
      editorConfig: {
        // The configuration of the editor.
      },
      editorConfig2: {
        // The configuration of the editor.
      },
      showVideo:   this.section.theme.type == 1 || this.section.theme.type == 0
          ? true
          : false,
      showLink:  this.section.theme.type == 1 || this.section.theme.type == 0
          ? true
          : false,
      showImage:true,
      showTitle:true,
      showDes:true,
      form: this.$inertia.form({
        id: null,
        title: null,
        title_en: null,
        title_vn: null,
        description: null,
        description_en: null,
        description_vn: null,
        link:null,
        video:null,
        images:null,
        icon:null
      })
    };
  },
  computed:{
    checkRadio(){
      if((this.showVideo == false) && (this.showLink == false) && (this.showDes == false)&& (this.showImage  == false) &&  (this.showTitle == false)){
        return false;
      }
      else{
        return true;
      }
    }
  },

  methods: {

    save() {
      this.form.post(this.route("content.category_store", this.category.id), {
        preserveState: true,

        onError: errors => {
          if (Object.keys(errors).length > 0) {
          }
        },
        onSuccess: page => {
          this.reset();
        }
      });
    },
    reset: function() {
      this.form = this.$inertia.form({
        id: null,
        title: null,
        title_en: null,
        title_vn: null,
        description: null,
        description_en: null,
        description_vn: null,
        video:null,
        images:null,
        link:null,
        icon:null
        // audio360: null
      });
    },
    // update() {
    //   this.form.put(this.route("section.update", this.form.id), {
    //     preserveState: true,
    //     onError: errors => {
    //       if (Object.keys(errors).length > 0) {
    //         this.showModal = true;
    //         this.editMode = true;
    //       }
    //     },
    //     onSuccess: page => {
    //       this.showModal = false;
    //       this.editMode = false;
    //       this.reset();
    //     }
    //   });
    // }

     onChangeEventDes(event){
          this.showDes = event.target.checked;
    },
    onChangeEventTitle(event){
      this.showTitle = event.target.checked;
    },
    onChangeEventVideo(event){
      this.showVideo = event.target.checked;
    },
    onChangeEventImage(event){
      this.showImage = event.target.checked;
    },
    onChangeEventLink(event){
      this.showLink = event.target.checked;
    },
  }
}
</script>

<style>

</style>