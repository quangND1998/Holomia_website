<template>
  <div v-if="groups.length > 0" class="flex flex-wrap md:flex-row gap-4 mt-10">
    <div>
      <draggable
        tag="element"
        v-model="groups"
        @change="onUnpublishedChange"
        v-bind="dragOptions"
        @start="isDragging = true"
        @end="isDragging = false"
      >
        <transition-group name="list" tag="div" class="flex flex-wrap">
          <div v-for="group in groups" :key="group.id">
            <div class="flex justify-center mt-2 mr-3">
              <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ group.title }}</h5>
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Date Expire: {{ group.expired_date }}</h5>
                <button
                  type="button"
                  @click="onEdit(group)"
                  data-toggle="modal"
                data-target="#exampleModalGroup"
                  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                >Edit</button>

                <button
                  type="button"
                  @click="onDelete(group.id)"
                  class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                >Delete</button>
              </div>
            </div>
          </div>
        </transition-group>
      </draggable>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";
export default {
  props: {
    groups: Array
  },
  components: {
    draggable
  },
  data() {
    return {
      form: {}
    };
  },
  computed: {
    dragOptions() {
      return {
        animation: 100,
        group: "description",
        disabled: false,
        ghostClass: "ghost"
      };
    }
  },
  methods: {
    onEdit(data) {
      Bus.$emit("EditGroup", data);
    },
    onDelete(id) {
      if (!confirm("Are you sure want to remove?")) return;
    //   this.$inertia.delete(this.route("project.image360.deleteGroup", id));
    },
    onUnpublishedChange() {
      let query = {
        data: this.groups
      };
    //   this.$inertia.post(this.route("project.image360.groupPriority"), query, {
    //     preserveState: false
    //   });
    }
  }
};
</script>

<style src="@vueform/multiselect/themes/default.css">
</style>
<style scoped>
.ghost {
  opacity: 0.5;
  background: #c8ebfb;
}
</style>
