<template>
    <div class="row">
        <div v-if="links.length > 3" class="col">
            <ul class="pagination justify-content-end">
                <li v-for="(link, p) in links" :key="p" class="page-item" :class="{ 'active': link.active }">
                    <span v-if="link.url === null" v-html="link.label" class="page-link"></span>
                    <Link v-else :href="`${link.url}&limit=${form.limit}`" v-html="link.label" class="page-link" :only="['states']"></Link>
                </li>
            </ul>
        </div>
        <div class="col-2">
            <select @change.prevent="submitForm" v-model="form.limit" name="limit" class="form-control">
                <option value="">Per Page</option>
                <option value="3">3</option>
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
import { onMounted } from 'vue';

const urlParams = new URLSearchParams(window.location.search);

const props = defineProps({
    links: Array,
    route: String
})


const form = useForm({
    page:urlParams.get('page'),
    limit:urlParams.get('limit') ?? '',
});

const submitForm = () => {
    form.get(route(props.route));
}

onMounted(() => {
})
</script>