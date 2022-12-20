<template>
    <AdminLayout>
        <div class="container-fluid mt-3">
            <div class="card p-2">
                <div class="card-body">
                    <div class="row">
                        <h2 class="col">Cities</h2>
                        <Link :href="route('admin.city.create')" class="btn btn-primary col-1 mb-2">Add</Link>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>State</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in cities.data" :key="item.id">
                                <td>{{ item.id }}</td>
                                <td>{{ item.state.name }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.status }}</td>
                                <td>
                                    <Link :href="route('admin.city.edit', item.id)" class="btn btn-warning btn-sm">Edit</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-3" :links="cities.links" route="admin.city.index" />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import Pagination from "@/Components/Page/Pagination.vue";
import AdminLayout from "@/Layouts/Admin/Layout.vue"
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    cities:Object
});
</script>