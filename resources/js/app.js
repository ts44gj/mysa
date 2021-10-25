import './bootstrap'
import Vue from 'vue'
//==========ここから追加==========
import BuyTagsInput from './components/BuyTagsInput'
//==========ここまで追加==========

const app = new Vue({
    el: '#app',
    components: {
        //==========ここから追加==========
        BuyTagsInput,
        //==========ここまで追加==========
    }
})
