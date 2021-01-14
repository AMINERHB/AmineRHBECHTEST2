<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vuejs + Laravel | TEST</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                
                justify-content: center;
                margin-left: 20%;
                margin-right: 20%;
            }
            .position-ref {
                position: relative;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Produit</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Category</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><div  id="app_Pr" >
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        Produit 
                    </div>
                    <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
                        All fields are required!
                    </div>
                    <div class="form-group">
                        <label for="name">Produit name </label>
                        <input type="text" class="form-control" id="name" required placeholder="Name" name="name" v-model="newProduit.name">
                    </div>
                                        
                    <div class="form-group">
                        <label for="description">description </label>
                        <input type="text" class="form-control" id="description" required placeholder="description" name="description" v-model="newProduit.description">
                    </div>
                    <div class="form-group">
                        <label for="price">price </label>
                        <input type="text" class="form-control" id="price" required placeholder="price" name="price" v-model="newProduit.price">
                    </div>
                    <div class="form-group">
                        <label for="image">Picture</label>
                        <input type="file" name="image" class="form-control-file" id="image" v-model="newProduit.image">
                    </div>

                    <button class="btn btn-primary" @click.prevent="createProduit()">
                        Add Produit
                    </button>

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">description</th>
                        <th scope="col">price</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for ="Produit in Produit">
                        <th scope="row">@{{Produit.id}}</th>
                        <td>@{{Produit.name}}</td>
                        <td>@{{Produit.description}}</td>
                        <td>@{{Produit.price}}</td>
                        <td @click="setVal(Produit.id, Produit.name, Produit.description,Produit.price,Produit.image)"  class="btn btn-info" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>
                        </td>
                        <td  @click.prevent="deleteProduit(Produit)" class="btn btn-danger"> 
                        <i class="fa fa-trash"></i>
                        </td>
                        </tr>
                    </tbody>
                </table>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Produit</h4>
                        </div>
                        <div class="modal-body">
                            
                        <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                                    required  :value="this.e_id">
                                    Name: <input type="text" class="form-control" id="e_name" name="name"
                                                    required  :value="this.e_name">
                                    description: <input type="text" class="form-control" id="e_description" name="description" required  :value="this.e_description">
                                    price: <input type="text" class="form-control" id="e_price" name="price"
                                            required  :value="this.e_price">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="editProduit()">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div></div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> <div  id="app" >
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        Category 
                    </div>
                    <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
                        All fields are required!
                    </div>
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" class="form-control" id="name" required placeholder="Name" name="name" v-model="newCategory.name">
                    </div>
                                        
                    <div class="form-group">
                        <label for="CategoryP">ParentCategory</label>
                        <input type="text" class="form-control" id="CategoryP" required placeholder="CategoryP" name="CategoryP" v-model="newCategory.CategoryP">
                    </div>

                    <button class="btn btn-primary" @click.prevent="createCategory()">
                        Add Category
                    </button>

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">CategoryP</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for ="category in categorys">
                        <th scope="row">@{{category.id}}</th>
                        <td>@{{category.name}}</td>
                        <td>@{{category.CategoryP}}</td>

                        <td @click="setVal(category.id, category.name, category.CategoryP)"  class="btn btn-info" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalEDIT"><i class="fa fa-pencil"></i>
                        </td>
                        <td  @click.prevent="deleteCategory(category)" class="btn btn-danger"> 
                        <i class="fa fa-trash"></i>
                        </td>
                        </tr>
                    </tbody>
                </table>

                    <!-- Modal -->
                    <div id="myModalEDIT" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit category</h4>
                        </div>
                        <div class="modal-body">
                            
                        <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                                    required  :value="this.e_id">
                                    Name: <input type="text" class="form-control" id="e_name" name="name"
                                                    required  :value="this.e_name">
                                            CategoryP: <input type="text" class="form-control" id="e_CategoryP" name="CategoryP"
                                            required  :value="this.e_CategoryP">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="editCategory()">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>

        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
