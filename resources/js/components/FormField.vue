<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <div class="relative">
                <select-control
                :id="field.attribute"
                v-model="value"
                class="w-full form-control form-select"
                :class="errorClasses"
                :options="field.options"
                :disabled="isReadonly"
                >
                <option value="" selected>{{ __('Choose an option') }}</option>
            </select-control>
            <button
            @click="openModal = true"
            type="button"
            class="text-primary hover:text-black font-light absolute pin-r pin-t mr-8"
            style="margin-top: 10px"
            v-if="field.addMore">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <portal to="modals">
        <transition name="fade">
            <modal :class="field.addMore.size" class="mx-auto" v-if="openModal" @modal-close="openModal = false">
                <div class="bg-white relative rounded-lg">
                    <button @click.prevent="openModal = false" type="button" class="btn px-2 pin-t z-50 pin-r  absolute flex items-center btn-default btn-danger mr-1 mt-1"><i class="fa fa-close"></i></button>
                    <nova-original-create
                    :resource-name="field.addMore.resourceName"
                    :via-resource="$route.query.viaResource"
                    :via-resource-id="$route.query.viaResourceId"
                    :via-relationship="$route.query.viaRelationship"
                    />
                </div>


            </modal>
        </transition>
    </portal>

</template>
</default-field>
</template>

<script>
    import NovaOriginalCreate from './NovaOriginalCreate';

    import { FormField, HandlesValidationErrors } from 'laravel-nova'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        components: {
            NovaOriginalCreate
        },

        data:() => ({
            openModal: false
        }),

        methods: {
        /*
         * Set the initial, internal value for the field.
         */
         setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
         fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
         handleChange(value) {
            this.value = value
        },
    },
}
</script>
