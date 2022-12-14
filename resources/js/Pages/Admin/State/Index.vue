<template>
    <AdminLayout>
        <div class="container-fluid mt-3">
            <div class="card p-2">
                <div class="card-body">
                    <div class="row">
                        <h2 class="col">States</h2>
                        <Link :href="route('admin.state.create')" class="btn btn-primary col-1 mb-2">Add</Link>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in states.data" :key="item.id">
                                <td>{{ item.id }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.status }}</td>
                                <td>
                                    <Link :href="route('admin.state.edit', item.id)" class="btn btn-warning btn-sm">Edit</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <PaginationVue class="mt-3" :links="states.links" route="admin.state.index" />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/Admin/Layout.vue';
import PaginationVue from '@/Components/Page/Pagination.vue';
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    states: Object
})
</script>