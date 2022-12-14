<template>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login </h3>
                    </div>
                    <div @submit.prevent="submitForm" class="card-body">
                        <h4 v-if="$page.props.flash.error" class="alert alert-danger">{{$page.props.flash.error}}</h4>
                        <form autocomplete="off">
                            <div class="form-group mt-2">
                                <input type="email" name="email" class="form-control" v-model="loginForm.email"
                                    placeholder="Email">
                                <span class="text-danger">{{ $page.props.errors.email}}</span>
                            </div>
                            <div class="form-group mt-2">
                                <input type="text" name="password" class="form-control" v-model="loginForm.password"
                                placeholder="Password">
                                <span class="text-danger">{{ $page.props.errors.password }}</span>
                            </div>
                            <div class="form-group mt-2">
                                <button class="btn btn-primary form-control">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { onUpdated } from "vue";
let loginForm = useForm({
    email: '',
    password: '',
});

onUpdated(() => {
    console.log("updated");
    setTimeout(() => {
        usePage().props.errors = [];
    }, 3000);
})

const submitForm = () => {
    loginForm.post(route('auth.login'), {
        onFinish: (response) => {
            console.log(computed(() => usePage().props));
            // loginForm.reset('password')
        }
    })
}
</script>