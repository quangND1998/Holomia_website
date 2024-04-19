<template>
    <div>
        <slot />
    </div>

</template>
<script>

import AdminNavbar from "@/Components/Navbars/AdminNavbar.vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";
import HeaderStats from "@/Components/Headers/HeaderStats.vue";
import FooterAdmin from "@/Components/Footers/FooterAdmin.vue";
import { initFlowbite } from 'flowbite'


export default {
    name: "admin-layout",
    props: {
        chanels: Array,
        errors: Object
    },

    components: {
    //  HeaderStats,

    },
};
</script>
<style scoped>
.section,
section {
    margin-left: auto;
    margin-right: auto;
    max-width: 1700px;
    padding: 20px;
    position: relative;
}
</style>
