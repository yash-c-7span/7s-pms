<template>
    <div class="row">
        <div v-if="links.length > 3" class="col">
            <ul class="pagination justify-content-end">
                <li v-for="(link, p) in links" :key="p" class="page-item" :class="{ 'active': link.active }">
                    <span v-if="link.url === null" v-html="link.label" class="page-link"></span>
                    <Link v-else :href="link.url" v-html="link.label" class="page-link" :only="['states']"></Link>
                </li>
            </ul>
        </div>
        <div class="col-2">
            <select @change="submitForm" v-model="form.limit" name="limit" class="form-control">
                <option value="">Per Page</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
</template>
<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    links: Array,
    route: String
})


const form = useForm({
    limit:'',
});

const submitForm = () => {
    console.log(form.limit);
    form.get(route(props.route,{
        limit:form.limit
    }));
}
</script>