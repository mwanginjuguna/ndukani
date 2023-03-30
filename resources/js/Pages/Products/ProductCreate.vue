<template>
    <form @submit.prevent="submitForm" class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Create Product</h2>

        <div class="mb-4">
            <label for="name" class="block font-bold mb-2">Name:</label>
            <input type="text" id="name" v-model="formData.name" class="w-full rounded-lg border-gray-300 px-4 py-2" />
            <span v-if="formErrors.name" class="text-red-500">{{ formErrors.name[0] }}</span>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-bold mb-2">Category:</label>
            <select id="category_id" v-model="formData.category_id" class="w-full rounded-lg border-gray-300 px-4 py-2">
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>
            <span v-if="formErrors.category_id" class="text-red-500">{{ formErrors.category_id[0] }}</span>
        </div>

        <div class="mb-4">
            <label for="tag_id" class="block font-bold mb-2">Tag:</label>
            <input type="text" id="tag_id" v-model="formData.tag_id" class="w-full rounded-lg border-gray-300 px-4 py-2" />
            <span v-if="formErrors.tag_id" class="text-red-500">{{ formErrors.tag_id[0] }}</span>
        </div>

        <div class="mb-4">
            <label for="brand_id" class="block font-bold mb-2">Brand:</label>
            <input type="text" id="brand_id" v-model="formData.brand_id" class="w-full rounded-lg border-gray-300 px-4 py-2" />
            <span v-if="formErrors.brand_id" class="text-red-500">{{ formErrors.brand_id[0] }}</span>
        </div>

        <div class="mb-4">
            <label for="seller_id" class="block font-bold mb-2">Seller:</label>
            <input type="text" id="seller_id" v-model="formData.seller_id" class="w-full rounded-lg border-gray-300 px-4 py-2" />
            <span v-if="formErrors.seller_id" class="text-red-500">{{ formErrors.seller_id[0] }}</span>
        </div>

        <div class="mb-4">
            <label for="rating_id" class="block font-bold mb-2">Rating:</label>
            <input type="text" id="rating_id" v-model="formData.rating_id" class="w-full rounded-lg border-gray-300 px-4 py-2" />
            <span v-if="formErrors.rating_id" class="text-red-500">{{ formErrors.rating_id[0] }}</span>
        </div>
        <div class="mb-4">
            <label for="price" class="block font-bold mb-2">Price:</label>
            <input type="text" id="price" name="price" v-model="form.price"
                   placeholder="Enter price" class="w-full rounded-lg border-gray-400 px-4 py-2" />
            <p v-if="formErrors.price" class="text-red-500 mt-1">{{ formErrors.price[0] }}</p>
        </div>

        <div class="mb-4">
            <label for="currency" class="block font-bold mb-2">Currency:</label>
            <select id="currency" name="currency" v-model="form.currency"
                    class="w-full rounded-lg border-gray-400 px-4 py-2">
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
            <textarea id="description" name="description" v-model="form.description"
                      placeholder="Enter description" class="w-full rounded-lg border-gray-400 px-4 py-2"></textarea>
            <p v-if="formErrors.description" class="text-red-500 mt-1">{{ formErrors.description[0] }}</p>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block font-bold mb-2">Quantity:</label>
            <input type="text" id="quantity" name="quantity" v-model="form.quantity"
                   placeholder="Enter quantity" class="w-full rounded-lg border-gray-400 px-4 py-2" />
            <p v-if="formErrors.quantity" class="text-red-500 mt-1">{{ formErrors.quantity[0] }}</p>
        </div>

        <div class="mb-4">
            <label for="in_stock" class="block font-bold mb-2">In Stock:</label>
            <input type="checkbox" id="in_stock" name="in_stock" v-model="form.in_stock"
                   class="w-5 h-5 text-gray-600 border-gray-400 rounded" />
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
        </div>

    </form>
</template>

<script setup>
import {defineProps, ref} from 'vue'
import {useForm} from "@inertiajs/vue3";

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

// Here you would use fetch to submit the data to the backend API
const submitForm = async () => {
    const response = await fetch('/api/products', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(product.value)
    })

    if (response.ok) {
        // Do something on success, e.g. show a success message
    } else {
        // Handle the error case, e.g. show an error message
    }
}

</script>

