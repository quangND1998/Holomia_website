<template>
  <div class="mt-10 sm:mt-0 overflow-auto">
    <h1 class="mt-2">
      <i class="fa fa-newspaper-o"></i>
      {{__('update')}} {{__('news')}}
    </h1>

    <div class="md:mt-0 md:col-span-3 mt-8">
      <form @submit.prevent="save">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-2">
                <label for="country" class="block text-sm font-medium text-gray-700">Tags</label>
                <Multiselect
                  v-model="form.tags"
                  mode="tags"
                  :appendNewTag="false"
                  :createTag="false"
                  :searchable="true"
                  label="name"
                  valueProp="id"
                  trackBy="name"
                  :options="tags"
                  class="multiselect-blue"
                />

                <div class="text-red-500" v-if="errors.tags">{{ errors.tags }}</div>
              </div>
              <div class="col-span-6 sm:col-span-2">
                <label for="country" class="block text-sm font-medium text-gray-700">Thể Loại</label>
                <select
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  id="grid-state"
                  v-model="form.category_id"
                >
                  <option
                    v-for="(category, index) in category_news"
                    :key="index"
                    :value="category.id"
                  >{{ category.name }}</option>
                </select>
                <div class="text-red-500" v-if="errors.category_id">{{ errors.category_id }}</div>
              </div>
              <div class="col-span-6 sm:col-span-2">
                <label for="news-update-image" class="block text-sm font-medium text-gray-700">Image</label>
                <input
                  id="news-update-image"
                  type="file"
                  name="image"
                  accept=".png,.jpeg,.jpg"
                  autocomplete="off"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  @change="onImageChange"
                />
                <div class="mt-3">
                  <template v-if="imagePreview">
                    <p class="text-xs text-gray-500 mb-1">
                      {{ imagePreviewIsNew ? "Ảnh mới (chưa lưu)" : imagePreviewFromContent ? "Ảnh lấy từ nội dung (chưa có ảnh đại diện)" : "Ảnh đại diện hiện tại" }}
                    </p>
                    <img
                      :src="imagePreview"
                      alt="Preview"
                      class="max-h-48 max-w-full rounded border border-gray-200 object-contain bg-gray-50"
                      @error="onPreviewImageError"
                    />
                  </template>
                  <div
                    v-else
                    class="rounded border border-dashed border-gray-300 bg-gray-50 px-3 py-6 text-center text-xs text-gray-500"
                  >
                    Chưa có ảnh để xem trước. Thêm ảnh ở cột Image bên trên, hoặc ảnh chỉ nằm trong nội dung bài (editor) thì không hiện ở đây.
                  </div>
                </div>
                <div class="text-red-500" v-if="errors.image">{{ errors.image }}</div>
              </div>
            </div>

            <div class="grid grid-cols-6 gap-6 mt-4">
              <div class="col-span-6 sm:col-span-2">
                <label
                  for="news-title-en"
                  class="block text-sm font-medium text-gray-700"
                >{{__('title')}} {{__('en')}}</label>
                <input
                  id="news-title-en"
                  v-model="form.title_en"
                  type="text"
                  name="title_en"
                  autocomplete="off"
                  placeholder="Title English"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.title_en">{{ errors.title_en }}</div>
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label
                  for="news-title-vn"
                  class="block text-sm font-medium text-gray-700"
                >Tiêu Đề Tiếng Việt</label>
                <input
                  id="news-title-vn"
                  v-model="form.title_vn"
                  type="text"
                  name="title_vn"
                  autocomplete="off"
                  placeholder="Title VietNamese"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
                <div class="text-red-500" v-if="errors.title_vn">{{ errors.title_vn }}</div>
              </div>
              <div class="col-span-6 sm:col-span-2">
                <label for="street_address" class="block text-sm font-medium text-gray-700">Nổi Bật</label>
                <div class="mt-1">
                  <input
                    type="radio"
                    v-model="form.outstanding"
                    name="inlineRadioOptions"
                    id="inlineRadio1"
                    value="0"
                    class="form-check-input form-check-input ml-2 appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                  />
                  <div class="ml-2 text-sm">
                    <span
                      value="0"
                      for="helper-checkbox"
                      class="font-medium text-gray-900 dark:text-gray-300"
                    >Không</span>
                  </div>
                  <input
                    type="radio"
                    v-model="form.outstanding"
                    name="inlineRadioOptions"
                    id="inlineRadio1"
                    value="1"
                    class="form-check-input form-check-input ml-2 appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                  />
                  <div class="ml-2 text-sm">
                    <span
                      for="helper-checkbox"
                      class="font-medium text-gray-900 dark:text-gray-300"
                    >Có</span>
                  </div>
                </div>
                <div class="text-red-500" v-if="errors.outstanding">{{ errors.outstanding }}</div>
                <label class="block text-sm font-medium text-gray-700 mt-3">Hiển thị trên site</label>
                <select
                  v-model="form.state"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                >
                  <option value="public">Công khai (public)</option>
                  <option value="private">Riêng tư (private)</option>
                </select>
                <div class="text-red-500" v-if="errors.state">{{ errors.state }}</div>
              </div>
              <div class="col-span-6 sm:col-span-2">
                <label
                  for="street_address"
                  class="block text-sm font-medium text-gray-700"
                >{{__('content')}} {{__('en')}}</label>
                <div class="mt-1">
                  <tinymce-editor
                    v-model="form.content_en"
                    :init="editorInit"
                    :tinymce-script-src="tinymceScriptSrc"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
                <div class="text-red-500" v-if="errors.content_en">{{ errors.content_en }}</div>
              </div>
              <div class="col-span-6 sm:col-span-2">
                <label
                  for="street_address"
                  class="block text-sm font-medium text-gray-700"
                >Content {{__('vn')}}</label>
                <div class="mt-1">
                  <tinymce-editor
                    v-model="form.content_vn"
                    :init="editorInit"
                    :tinymce-script-src="tinymceScriptSrc"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
                <div class="text-red-500" v-if="errors.content_vn">{{ errors.content_vn }}</div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <Link
              :href="route('tintuc.index')"
              class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-800 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
            >Back</Link>
            <button
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
import { tinymceScriptSrc, createTinyInit } from "@/config/tinymceDefaults";
import Multiselect from "@vueform/multiselect/dist/multiselect.vue2.js";
import Icon from "@/Components/Icon";
import Layout from "@/Components/Layout";
import { Link } from "@inertiajs/inertia-vue";

export default {
  layout: Layout,
  props: {
    tags: Array,
    new: Object,
    category_news: Array,
    errors: Object
  },
  components: {
    Link,
    Icon,
    Multiselect
  },
  data() {
    return {
      tinymceScriptSrc,
      editorInit: createTinyInit(),
      /** URL hiển thị: ảnh gốc hoặc blob khi chọn file mới */
      imagePreview: "",
      imagePreviewIsNew: false,
      /** true khi không có news.image nhưng lấy được thẻ img đầu tiên trong HTML nội dung */
      imagePreviewFromContent: false,
      imageObjectUrl: null,
      form: this.$inertia.form({
        id: null,
        title: null,
        title_en: null,
        title_vn: null,
        content: null,
        content_en: null,
        content_vn: null,
        image: null,
        outstanding: 0,
        state: "public",
        tags: this.getData(),
        category_id: null
      })
    };
  },
  mounted() {
    this.form.id = this.new.id;
    this.form.title = this.new.title;
    this.form.content = this.new.content;

    const langs = Array.isArray(this.new.languages) ? this.new.languages : [];
    const titleRow = this.findLanguageRow(langs, this.new.title);
    this.form.title_en = titleRow && titleRow.en != null ? titleRow.en : "";
    this.form.title_vn = titleRow && titleRow.vn != null ? titleRow.vn : "";

    const contentRow = this.findLanguageRow(langs, this.new.content);
    this.form.content_en = contentRow && contentRow.en != null ? contentRow.en : "";
    this.form.content_vn = contentRow && contentRow.vn != null ? contentRow.vn : "";

    this.form.outstanding = this.new.outstanding;
    this.form.category_id = this.new.category_id;
    this.form.state = this.new.state === "private" ? "private" : "public";

    this.applyExistingImagePreview();
  },
  beforeDestroy() {
    this.revokeImageObjectUrl();
  },
  computed: {},

  methods: {
    findLanguageRow(languages, key) {
      if (key == null || key === "") {
        return null;
      }
      const k = String(key);
      let row = languages.find(l => String(l.key) === k);
      if (row) {
        return row;
      }
      return languages.find(l => l.key == key);
    },

    publicAssetUrl(path) {
      if (!path || typeof path !== "string") {
        return "";
      }
      const p = path.trim().replace(/\\/g, "/");
      if (!p) {
        return "";
      }
      if (/^https?:\/\//i.test(p)) {
        return p;
      }
      return `/${p.replace(/^\/+/, "")}`;
    },

    firstSrcFromHtml(html) {
      if (!html || typeof html !== "string") {
        return "";
      }
      const m = html.match(/<img[^>]+src\s*=\s*["']([^"']+)["']/i);
      return m && m[1] ? m[1].trim() : "";
    },

    /** Chuẩn hóa src trong HTML editor (tương đối / tuyệt đối) thành URL tải được trên trình duyệt */
    normalizeSrcForPreview(src) {
      if (!src || typeof src !== "string") {
        return "";
      }
      let u = src.trim();
      if (/^https?:\/\//i.test(u)) {
        return u;
      }
      if (u.startsWith("//")) {
        return `${window.location.protocol}${u}`;
      }
      u = u.replace(/^(\.\.\/)+/, "").replace(/^\.\//, "");
      if (u.startsWith("/")) {
        return `${window.location.origin}${u}`;
      }
      return `${window.location.origin}/${u.replace(/^\/+/, "")}`;
    },

    onPreviewImageError() {
      this.imagePreview = "";
      this.imagePreviewFromContent = false;
    },

    revokeImageObjectUrl() {
      if (this.imageObjectUrl) {
        URL.revokeObjectURL(this.imageObjectUrl);
        this.imageObjectUrl = null;
      }
    },

    applyExistingImagePreview() {
      this.revokeImageObjectUrl();
      this.imagePreviewIsNew = false;
      this.imagePreviewFromContent = false;

      let url = "";
      if (this.new.image_url) {
        url = this.new.image_url;
      } else if (this.new.image) {
        url = this.publicAssetUrl(this.new.image);
      } else {
        const fromEn = this.firstSrcFromHtml(this.form.content_en);
        const fromVn = this.firstSrcFromHtml(this.form.content_vn);
        const raw = fromEn || fromVn;
        if (raw) {
          url = this.normalizeSrcForPreview(raw);
          this.imagePreviewFromContent = true;
        }
      }
      this.imagePreview = url || "";
    },

    onImageChange(e) {
      const file = e.target.files && e.target.files[0];
      this.form.image = file || null;
      this.revokeImageObjectUrl();
      if (file) {
        this.imageObjectUrl = URL.createObjectURL(file);
        this.imagePreview = this.imageObjectUrl;
        this.imagePreviewIsNew = true;
        this.imagePreviewFromContent = false;
      } else {
        this.applyExistingImagePreview();
      }
    },

    getData() {
      const array = [];
      const tags = this.new.tags;
      if (!tags || !tags.length) {
        return array;
      }
      tags.forEach(value => {
        array.push(parseInt(value.id, 10));
      });
      return array;
    },

    save() {
      this.form.post(this.route("tintuc.update", this.new.id), {
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
    reset() {
      this.form.title = this.new.title;
      this.form.content = this.new.content;
      const langs = Array.isArray(this.new.languages) ? this.new.languages : [];
      const titleRow = this.findLanguageRow(langs, this.new.title);
      this.form.title_en = titleRow && titleRow.en != null ? titleRow.en : "";
      this.form.title_vn = titleRow && titleRow.vn != null ? titleRow.vn : "";

      const contentRow = this.findLanguageRow(langs, this.new.content);
      this.form.content_en = contentRow && contentRow.en != null ? contentRow.en : "";
      this.form.content_vn = contentRow && contentRow.vn != null ? contentRow.vn : "";

      this.form.outstanding = this.new.outstanding;
      this.form.category_id = this.new.category_id;
      this.form.state = this.new.state === "private" ? "private" : "public";
      this.form.image = null;
      this.form.tags = this.getData();
      this.applyExistingImagePreview();
    }
  }
};
</script>
<style src="@vueform/multiselect/themes/default.css">
</style>
<style>
</style>