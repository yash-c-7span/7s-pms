<template>
    <AdminLayout>
        <div class="container-fluid mt-3">
            <div class="card p-2">
                <div class="card-body">
                    <div class="row">
                        <h2 class="col">Edit City</h2>
                    </div>
                    <hr>
                    <form @submit.prevent="submitForm" action="" autocomplete="off" class="col-md-6">

                        <div class="form-group">
                            <label class="form-label">State</label>
                            <select name="state_id" v-model="form.state_id" class="form-control">
                                <option value="">--SELECT--</option>
                                <option v-for="item in states" :key="item.id" :value="item.id">{{ item.name }}</option>
                            </select>
                            <span class="text-danger">{{ $page.props.errors.state_id }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label" for="">Name</label>
                            <input class="form-control" v-model="form.name" name="name" placeholder="Name" type="text">
                            <span class="text-danger">{{ $page.props.errors.name }}</span>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label" for="">Status</label>
                            <div class="">
                                <div class="form-check form-check-inline">
                                    <input type="radio" value="active" name="status" v-model="form.status" checked class="form-check-input">
                                    <label class="form-check-label"  for="">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" value="in_active" v-model="form.status" name="status" class="form-check-input">
                                    <label class="form-check-label" for="">In Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary col-2">Save</button>
                            <Link :href="route('admin.city.index')" class="btn btn-secondary col-2 ms-2">Cencel</Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/Admin/Layout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    states:Array,
    city:Object
});

const form = useForm({
    state_id:props.city.state_id,
    name:props.city.name,
    status:props.city.status,
});

const submitForm = () => {
    form.put(route('admin.city.update', props.city.id))
}
</script>