<script setup>
import { ref } from "vue";

const counter = ref(0);
</script>

<template>
    <button
        type="button"
        @click="counter++"
        class="btn btn-danger p-2 text-white bg-gray-500 rounded"
    >
        <a href="create">Counter is: {{ counter }}</a>
        <router-link
            exact-active-class="active"
            to="/"
            class="nav-item nav-link"
            >Home</router-link
        >
        <router-link
            exact-active-class="active"
            to="/create"
            class="nav-item nav-link"
            >Create</router-link
        >
    </button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody v-if="categories.length > 0">
            <tr v-for="(category, key) in categories" :key="key">
                <td>{{ category.id }}</td>
                <td>{{ category.title }}</td>
                <td>{{ category.description }}</td>
                <td>
                    <router-link
                        :to="{
                            name: 'categoryEdit',
                            params: { id: category.id },
                        }"
                        class="btn btn-success"
                        >Edit</router-link
                    >
                    <button
                        type="button"
                        @click="deleteCategory(category.id)"
                        class="btn btn-danger"
                    >
                        Delete
                    </button>
                </td>
            </tr>
        </tbody>
        <tbody v-else>
            <tr>
                <td colspan="4" align="center">No Categories Found.</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "categories",
    data() {
        return {
            categories: [],
        };
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        async getCategories() {
            await this.axios
                .get("/api/category")
                .then((response) => {
                    this.categories = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.categories = [];
                });
        },
        deleteCategory(id) {
            if (confirm("Are you sure to delete this category ?")) {
                this.axios
                    .delete(`/api/category/${id}`)
                    .then((response) => {
                        this.getCategories();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
