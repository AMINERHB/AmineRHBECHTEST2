/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('modal', {
    template: '#modal-template'
  })

const app = new Vue({
    el: '#app',
    data: {
        newCategory: {'name': '', 'CategoryP': ''},
        hasError: true,
        categorys: [],
        e_id: '',
        e_name: '',
        e_CategoryP: '',
    },
    mounted: function mounted(){
        this.getCategory();
    },
    methods: {
        getCategory: function getCategory(){
            var _this = this;
            axios.get('/getCategory').then(function(response){
                _this.categorys = response.data;
            }).catch(error=>{
                console.log("Get All: "+error);
            });
        },
        createCategory: function createCategory() {
            var input = this.newCategory;
            var _this = this;
            if(input['name'] == '' || input['CategoryP'] == '') {
                this.hasError = false;
            }
            else {
                this.hasError= true;
                axios.post('/storeCategory', input).then(function(response){
                    _this.newCategory = {'name': '', 'CategoryP': ''}
                    _this.getCategory();
                }).catch(error=>{
                    console.log("Insert: "+error);
                });
            }
        },
        deleteCategory: function deleteCategory(category) {
            var _this = this;
            axios.post('/deleteCategory/' + category.id).then(function(response){
                _this.getCategory();
            }).catch(error=>{
                console.log("Delete category: "+error);
            });
        },
        setVal(val_id, val_name, val_CategoryP) {
            this.e_id = val_id;
            this.e_name = val_name;
            this.e_CategoryP = val_CategoryP;
        },
        editCategory: function(){
            var _this = this;
            var id_val_1 = document.getElementById('e_id');
            var name_val_1 = document.getElementById('e_name');
            var categoryP_val_1 = document.getElementById('e_CategoryP');
            var model = document.getElementById('myModal').value;
             axios.post('/editCategory/' + id_val_1.value, {val_1: name_val_1.value, val_2: categoryP_val_1.value})
               .then(response => {
                 _this.getCategory();
               });
     },
    }
});
const app_Pr = new Vue({
    el: '#app_Pr',
    data: {
        newProduit: {'name': '', 'description': '', 'price':'' , 'image': ''},
        hasError: true,
        Produit: [],
        e_id: '',
        e_name: '',
        e_description: '',
        e_price: '',
        e_image: '',
    },
    mounted: function mounted(){
        this.getProduit();
    },
    methods: {
        getProduit: function getProduit(){
            var _this = this;
            axios.get('/getProduit').then(function(response){
                _this.Produit = response.data;
            }).catch(error=>{
                console.log("Get All: "+error);
            });
        },
        createProduit: function createProduit() {
            var input = this.newProduit;
            var _this = this;
            if(input['name'] == '' || input['description'] == ''|| input['price'] == ''|| input['image'] == '') {
                this.hasError = false;
            }
            else {
                this.hasError= true;
                axios.post('/storeProduit', input).then(function(response){
                    _this.newProduit = {'name': '', 'description': '','price': '','image': ''}
                    _this.getProduit();
                }).catch(error=>{
                    console.log("Insert: "+error);
                });
            }
        },
        deleteProduit: function deleteProduit(Produit) {
            var _this = this;
            axios.post('/deleteProduit/' + Produit.id).then(function(response){
                _this.getProduit();
            }).catch(error=>{
                console.log("Delete Produit: "+error);
            });
        },
        setVal(val_id, val_name, val_description,val_price,val_image) {
            this.e_id = val_id;
            this.e_name = val_name;
            this.e_description = val_description; 
            this.e_price = val_price;
            this.e_image = val_image;

        },
        editProduit: function(){
            var _this = this;
            var id_val_1 = document.getElementById('e_id');
            var name_val_1 = document.getElementById('e_name');
            var description_val_1 = document.getElementById('e_description');
            var price_val_1 = document.getElementById('e_price');
            var image_val_1 = document.getElementById('e_image');

            var model = document.getElementById('myModal').value;
             axios.post('/editProduit/' + id_val_1.value, {val_1: name_val_1.value, val_2: description_val_1.value , val_3: price_val_1.value, val_4: image_val_1.value})
               .then(response => {
                 _this.getProduit();
               });
     },
    }
});