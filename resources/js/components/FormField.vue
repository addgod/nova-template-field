<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <select-control
                :id="field.attribute"
                :dusk="field.attribute"
                v-model="value"
                @input="handleChange"
                class="w-full form-control form-select"
                :class="errorClasses"
                :options="field.options"
                :disabled="isReadonly"
            >
                <option value="" selected :disabled="!field.nullable">{{ placeholder }}</option>
            </select-control>
        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova';

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        methods: {
            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                if (value) {
                    Nova.$emit(this.field.fillField + '-value', this.field.templates[value]);
                }
            },
        },

        computed: {
            /**
             * Return the placeholder text for the field.
             */
            placeholder() {
                return this.field.placeholder || this.__('Choose an option');
            },
        },
    };
</script>
