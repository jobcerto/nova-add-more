Nova.booting((Vue, router, store) => {
    Vue.component('index-nova-add-more', require('./components/IndexField'))
    Vue.component('detail-nova-add-more', require('./components/DetailField'))
    Vue.component('form-nova-add-more', require('./components/FormField'))
})
