import Vue from 'vue'
import ContactForm from './components/ContactForm'
import Heading from './components/Heading'

new Vue({
    el: `#root`,
    components: {
        ContactForm,
        Heading
    }
})

Vue.config.productionTip = false
