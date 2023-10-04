<template>
    <select
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="select"
    >
        <option disabled value="">Select your region</option>
        <option v-for="(value, key) in options" :value="key" :key="key">{{ value }}</option>
    </select>
</template>

<script setup>
import { defineProps, defineEmits, ref } from 'vue';

const { modelValue, options } = defineProps(['modelValue', 'options']);

const select = ref(null);

const handleSelection = (event) => {
    select.value.value = event.target.value;
    defineEmits('update:modelValue', select.value.value);
};

defineExpose({ focus: () => select.value.focus() });
</script>
