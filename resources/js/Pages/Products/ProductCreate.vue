<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="mt-4 font-semibold text-xl text-gray-700 uppercase leading-tight">
                Dukani Product
            </h2>
        </template>

        <div class="py-8">
            <div class="max-w-5xl mx-auto sm:px-4 lg:px-12 ">
                <form @submit.prevent="submitFormAPI" class="bg-white rounded-lg shadow-md p-6 lg:py-12 lg:px-10">
                    <h2 class="text-xl text-center font-bold mb-4">Create Product</h2>

                    <div class="mb-4">
                        <label for="name" class="block font-bold mb-2">Name:</label>
                        <input type="text" id="name" v-model="formData.name" placeholder="Enter Product Name" class="w-full rounded-lg border-gray-300 px-4 py-2" />
                        <span v-if="formErrors.name" class="text-red-500">{{ formErrors.name[0] }}</span>
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block font-bold mb-2">Category:</label>
                        <select id="category_id" v-model="formData.category_id" class="w-full rounded-lg border-gray-300 px-4 py-2">
                            <option selected :value="null">Select one</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                        </select>
                        <span v-if="formErrors.category_id" class="text-red-500">{{ formErrors.category_id[0] }}</span>
                    </div>

                    <div class="mb-4">
                        <label for="tag_id" class="block font-bold mb-2">Tag:</label>
                        <select id="tag_id" v-model="formData.tag_id" class="w-full rounded-lg border-gray-300 px-4 py-2">
                            <option selected :value="null">Select one</option>
                            <option v-for="tag in tags" :key="tag.id" :value="tag.id">{{ tag.name }}</option>
                        </select>
                        <span v-if="formErrors.tag_id" class="text-red-500">{{ formErrors.tag_id[0] }}</span>
                    </div>

                    <div class="mb-4">
                        <label for="brand_id" class="block font-bold mb-2">Brand:</label>
                        <select id="brand_id" v-model="formData.category_id" class="w-full rounded-lg border-gray-300 px-4 py-2">
                            <option :value="null">Select one</option>
                            <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
                        </select>
                        <span v-if="formErrors.brand_id" class="text-red-500">{{ formErrors.brand_id[0] }}</span>
                    </div>

                    <!--
                    <div class="mb-4">
                        <label for="seller_id" class="block font-bold mb-2">Seller:</label>
                        <select id="seller_id" v-model="formData.seller_id" class="w-full rounded-lg border-gray-300 px-4 py-2">
                            <option :value="null">Select one</option>
                            <option v-for="seller in sellers" :key="seller.id" :value="seller.id">{{ seller.name }}</option>
                        </select>
                        <span v-if="formErrors.seller_id" class="text-red-500">{{ formErrors.seller_id[0] }}</span>
                    </div>
                    -->

                    <div class="mb-4">
                        <label for="price" class="block font-bold mb-2">Price:</label>
                        <input type="text" id="price" name="price" v-model="formData.price"
                               placeholder="Enter price" class="w-full rounded-lg border-gray-400 px-4 py-2" />
                        <p v-if="formErrors.price" class="text-red-500 mt-1">{{ formErrors.price[0] }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="currency" class="block font-bold mb-2">Currency:</label>
                        <select id="currency" name="currency" v-model="formData.currency"
                                class="w-full rounded-lg border-gray-400 px-4 py-2">
                            <option value="">Select one</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="AUD">AUD</option>
                            <option value="CAD">CAD</option>
                        </select>
                        <p v-if="formErrors.currency" class="text-red-500 mt-1">{{ formErrors.currency[0] }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-bold mb-2">Description:</label>
                        <textarea id="description" name="description" v-model="formData.description"
                                  placeholder="Enter description" rows="10" class="w-full rounded-lg border-gray-400 px-4 py-2"></textarea>
                        <p v-if="formErrors.description" class="text-red-500 mt-1">{{ formErrors.description[0] }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="block font-bold mb-2">Quantity:</label>
                        <input type="text" id="quantity" name="quantity" v-model="formData.quantity"
                               placeholder="Enter quantity" class="w-full rounded-lg border-gray-400 px-4 py-2" />
                        <p v-if="formErrors.quantity" class="text-red-500 mt-1">{{ formErrors.quantity[0] }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="in_stock" class="block font-bold mb-2">In Stock:</label>
                        <input type="checkbox" id="in_stock" name="in_stock"
                               v-model="formData.in_stock"
                               class="w-5 h-5 text-gray-600 border-gray-400 rounded" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import {defineProps, onBeforeMount, ref} from 'vue'
import {useForm, usePage} from "@inertiajs/vue3";
import AppLayout from "../../Layouts/AppLayout.vue";
import {useFlash} from "../../Composables/useFlash.js";

let { flash } = useFlash();


const formData = useForm({
    name: '',
    category_id: null,
    tag_id: null,
    brand_id: null,
    seller_id: null,
    rating_id: null,
    price: '',
    currency: '',
    description: '',
    quantity: '',
    in_stock: ''
});

const formErrors = formData.errors

const product = ref({
    name: '',
    category_id: null,
    tag_id: null,
    brand_id: null,
    seller_id: null,
    rating_id: null,
    price: '',
    currency: '',
    description: '',
    quantity: '',
    in_stock: ''
})

defineProps({
    categories: Object,
    tags: Object,
    brands: Object,
    sellers: Object
})

// Define the options for the select fields
const categoryOptions = [
    { value: 1, label: 'Category 1' },
    { value: 2, label: 'Category 2' },
    { value: 3, label: 'Category 3' },
    { value: 4, label: 'Category 4' },
    { value: 5, label: 'Category 5' },
]

const tagOptions = [
    // Define options for the tag select field here
]

const brandOptions = [
    // Define options for the brand select field here
]

const sellerOptions = [
    // Define options for the seller select field here
]

const ratingOptions = [
    // Define options for the rating select field here
]

// submit form web
const submitForm = () => {
    formData.post(route('products.store'), {
        onError: () => { flash('Err!', 'An error occurred! Try again', 'danger') },
        preserveScroll: false,
        onFinish: () => { formData.reset(); },
    });
    const a = Object.assign(
        document.createElement('a'),
        {
            href: route('product-create'),
            style:"display: none",
        });
    document.body.appendChild(a);
    a.click();
}

// Here you would use fetch to submit the data to the backend API
const submitFormAPI = async () => {
    const response = await fetch(route('products.store'), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': usePage().props.csrfToken,
        },
        body: JSON.stringify({
            name: formData.name,
            category_id: formData.category_id,
            tag_id: formData.tag_id,
            brand_id: formData.brand_id,
            seller_id: formData.seller_id ?? usePage().props.auth.user.id,
            rating_id: formData.rating_id,
            price: formData.price,
            currency: formData.currency,
            description: formData.description,
            quantity: formData.quantity,
            in_stock: formData.in_stock,
            user: usePage().props.auth.user.id
        })
    })

    if (response.ok) {
        // Do something on success, e.g. show a success message
        await flash('Success', "Product added successfully.", "success");
        formData.reset();

    } else if (response.status === 403 ) {
        // Handle the error case, e.g. show an error message
        await flash("Authentication Error", "The server could not authenticate your request!", "danger");
    }else {
        // Handle the error case, e.g. show an error message
        await flash("Failed", "Something went wrong while saving the product. Try Again!", "danger");
    }
}

</script>

