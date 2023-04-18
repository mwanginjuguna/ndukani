<template>
    <div
        id="small_image"
        class="mx-1 border border-gray-300 hover:border-green-300 rounded-sm"
        :class="{ 'border-green-300': isActive }"
        @click="selectImage"
    >
        <img class="rounded object-cover max-h-12" :src="image.path" :alt="image.alt" />
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    image: Object,
    isActive: Boolean,
});

const emits = defineEmits(['select']);


function selectImage() {
    if (props.image) {
        emits('select', props.image.id)
    }
}
</script>
