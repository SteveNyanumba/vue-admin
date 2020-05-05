<template>
   <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Welcome Mr. Steve Nyanumba</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Portfolio</li>
                    <li class="breadcrumb-item active"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newportfolio">New Work</button></li>
                    <li class="breadcrumb-item active"><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#newcategory">New Category</button></li>
                    </ol>

                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="m-5">
            <div class="row justify-content-center">

            <!-- portfolio item -->
                <div class="col-md-4 col-12" v-for="portfolio in portfolios" v-bind:key="portfolio.id" >
                    <div class="card">
                        <img class="card-img-top" v-bind:src="portfolio.image" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ portfolio.title }}</h5>
                            <p class="card-text">{{ portfolio.description }}</p>
                            <a v-bind:href="portfolio.link" class="btn btn-primary">To Project</a>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <section class="my-3 mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-6 table-responsive ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" v-for="category in categories" v-bind:key="category.id" >
                                <td>{{ category.id }}</td>
                                <td> {{ category.category }} </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning mx-1 ">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger mx-1">delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section>
            <!-- Button trigger modal -->


            <!-- Portfolio Modal -->
            <div class="modal fade" id="newportfolio" tabindex="-1" role="dialog" aria-labelledby="newPortfolio" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add a new Portfolio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="createPortfolios() "  >
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Title">Title</label>
                                            <input v-model="portfolioForm.title" type="text" class="form-control" :class="{ 'is-invalid': portfolioForm.errors.has('title') }" name="title" id="Title" aria-describedby="helpId" placeholder="">
                                            <small class="form-text text-muted">Enter the title of your new Portfolio Item</small>
                                            <has-error :form="portfolioForm" field="title"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Title">Category</label>
                                            <select v-model="portfolioForm.category" name="category" id="category" class="form-control">
                                                <option disabled>Select your category</option>
                                                <option v-for="category in categories" v-bind:value="category.category" :class="{ 'is-invalid': portfolioForm.errors.has('category') }" :key="category.id" > {{ category.category }} </option>
                                            </select>

                                            <small class="form-text text-muted">Select the category of your new Portfolio Item</small>
                                            <has-error :form="portfolioForm" field="category"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">image</label>
                                            <input type="file" class="form-control" name="image" id="image" v-on:change="selectFile" :class="{ 'is-invalid': portfolioForm.errors.has('image') }" >
                                            <small class="form-text text-muted">choose the image of your new Portfolio Item</small>
                                            <has-error :form="portfolioForm" field="image"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="Title">Description</label>
                                            <textarea v-model="portfolioForm.description" name="description" id="description" class="form-control" :class="{ 'is-invalid': portfolioForm.errors.has('description') }"></textarea>
                                            <small class="form-text text-muted">Enter the Description of your new Portfolio Item</small>
                                            <has-error :form="portfolioForm" field="description"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input v-model="portfolioForm.link" type="text" class="form-control" name="link" id="link" aria-describedby="helpId" :class="{ 'is-invalid': portfolioForm.errors.has('link') }">
                                            <small class="form-text text-muted">Enter the link to your new Portfolio Item</small>
                                            <has-error :form="portfolioForm" field="link"></has-error>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="submit" @click.prevent="createPortfolio()" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <!-- Categories Modal -->
            <div class="modal fade" id="newcategory" tabindex="-1" role="dialog" aria-labelledby="newCategory" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add a new Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="createCategory() "  >
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="form-group">
                                        <label for="Category">Category</label>
                                        <input v-model="categoryForm.category" type="text" class="form-control" name="category" id="category">
                                        <small class="form-text text-muted">Create a new category</small>
                                        <has-error :form="categoryForm" field="category"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="submit" @click.prevent="createCategory()" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
   </div>
</template>

<script>
import Axios from 'axios'
    export default {
        data(){
            return {
                portfolios:[],
                categories:[],
                portfolio: {
                    id:'',
                    title: '',
                    category: '',
                    image: '',
                    description: '',
                    link: '',
                },
                category: {
                  id: '',
                  category: '',
                  created_at: '',
                  updated_at: '',

                },
                portfolioForm: new Form({
                    title: '',
                    category: '',
                    image: '',
                    description: '',
                    link: '',
                }),
                categoryForm: new Form({
                    category: ''
                })
            }
        },
        mounted() {

            console.log('Component mounted.')
        },

        methods: {
            selectFile(e){
                const file = e.target.files[0]
                const reader = new FileReader()
                console.log(file);


                reader.onloadend = (file)=>{
                    // console.log(reader.result)
                    this.portfolioForm.image = reader.result
                    console.log(reader.result.length)
                }
                reader.readAsDataURL(file)

            },

            loadPortfolios(){
                axios.get('/api/portfolios')
                .then(res => {
                    this.portfolios = res.data
                }).catch((err) => {
                    console.log(err)
                });
            },
            loadCategories(){
                axios.get('/api/categories')
                .then(res => {
                    this.categories = res.data
                }).catch((err) => {
                    console.log(err)
                });
            },
           createCategory(){
               this.categoryForm.post('/api/categories')
               .then((result) => {
                   console.log(result)
               }).catch((err) => {
                   console.log(err)
               });
           },
           createPortfolio(){
               this.portfolioForm.post('/api/portfolios')
               .then((result) => {
                   console.log(result)
               }).catch((err) => {
                   console.log(err);

               });

           },
           deleteCategory(id){
               axios.delete('/api/categories/'+id)
               .then((result) => {
                   console.log(result.message)
               }).catch((err) => {

               });

           }

        },
        created(){
            this.loadPortfolios()
            this.loadCategories()

            setInterval(() => {
                this.loadCategories()
            }, 10000);
            setInterval(() => {
                this.loadPortfolios()
            }, 10000);

        }
    }
</script>
