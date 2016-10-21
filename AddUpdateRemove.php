<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="Scripts/jquery-3.0.0.js"></script>
    <link href="css/AddUpdateRemove.css" rel="stylesheet" type="text/css" />
    <title>Simple Datagrid with search, sort and paging using AngularJS, PHP, MySQL</title>
</head>
<body>
    <input type="checkbox" id="sideBarToggler" />
    <header>
        <div id="logoWrap">
            <label class="logoBurguer" for="sideBarToggler">
                <span id="burguerStyle"></span>
            </label>
            <a href="index.php"><img src="icons/logoType.png" alt="Logo" class="logo" /></a>
        </div>
        <nav class="navBarHeader" id="gooo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="sellPage.php">Jewelry</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="AddUpdateRemove.php">LogIn</a></li>
            </ul>
        </nav>
    </header>
    <div id="container">
            <div ng-controller="customersCrtl">
                <div id="addProduct" ng-click="showAddProduct()" class="addProductLeft">
                    <span id="plusSing"  ng-init="changeX='+'" class="plusSingLeft">{{changeX}}</span>
                </div>
                <div class="blurEverything" ng-click="closeBlur()">
                    <div id="quickView" >

                        <form enctype="multipart/form-data" method="post" ng-submit="myFunc()"  id="formInsert" >
                            <h3 id="contactSectionStyled">Create New Product</h3>
                            <!--<div><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></div>-->
                            <div style="display:none"><input type="text" name="id" class="form-control" ng-model="id" /></div>
                            <div class="wrapInputText">
                                <input type="number" name="price" class="inputContact"   ng-model="price"  required/>
                            <p class="text" id="price">Price</p>
                            </div>
                            <div class="wrapInputText">
                                <select type="select" name="type" class="inputContact"  ng-model="type"  required >
                                    <option value=""></option>
                                    <option value="watch">Watch</option>
                                    <option value="necklace">Necklace</option>
                                    <option value="ring">Ring</option>
                                    <option value="earings">Earings</option>
                                    <option value="diamond">Diamond</option>
                                    <option value="bracelet">Bracelet</option>
                                    <option value="diamondRing">Diamond Ring</option>
                                </select>
                                <p class="text" id="type">Type</p>
                            </div>
                            <!-- <div class="wrapInputText">
                                <input type="text" name="type" class="inputContact"  ng-model="type"  required/>
                                <p class="text" id="type">Type</p>
                            </div> -->
                            <div class="wrapInputText">
                                <select type="text" name="material" class="inputContact"  ng-model="material" required>
                                    <option value=""></option>
                                    <option value="gold">Gold</option>
                                    <option value="silver">Silver</option>
                                    <option value="platinum">Platinum</option>
                                </select>
                                <p class="text" id="material">Material</p>
                            </div>
                            <div class="wrapInputText">
                                <input type="number" name="size" class="inputContact"  ng-model="size" required/>
                            <p class="text" id="size">Size</p>
                            </div>
                            <div class="wrapInputText">
                                <input type="text" name="maker" class="inputContact"  ng-model="maker" required>
                            <p class="text" id="maker">Maker</p>
                            </div>

                            <div class="fileSearch"><input name="imageone" file-model="imageone"  type="file" class="uploadButton" /></div>
                            <div class="fileSearch"><input name="imagetwo" file-model="imagetwo" type="file" class="uploadButton"  /></div>
                            <div class="fileSearch"><input name="imagethree" file-model="imagethree" type="file" class="uploadButton" /></div>
                            <div class="fileSearch"><input name="imagefour" file-model="imagefour" type="file" class="uploadButton"  /></div>
                            <div class="fileSearch"><input name="imagefive" file-model="imagefive" type="file" class="uploadButton"  /></div>

                            <button id="insertProduct" ng-click="uploadFile()" class="actionButtons">Insert</button>
                            <button id="updateProduct" ng-click="updateFile()" class="actionButtons">Update</button>
                        </form>

                    </div>
                </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        PageSize:
                        <select ng-model="entryLimit" class="form-control">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        Filter:
                        <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        <!--             <input type="text" ng-model="search.price" ng-change="filter()" placeholder="Filter" class="form-control" />-->
                    </div>
                    <div class="col-md-4">
                        <h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12 table-responsive" ng-show="filteredItems > 0">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>Action</th>
                            <th>Action</th>
                            <th>Id&nbsp;<a ng-click="sort_by('id');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Price&nbsp;<a ng-click="sort_by('price');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Type&nbsp;<a ng-click="sort_by('type');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Material&nbsp;<a ng-click="sort_by('material');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Size&nbsp;<a ng-click="sort_by('size');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Maker&nbsp;<a ng-click="sort_by('maker');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Images&nbsp;</th>
                            </thead>
                            <tbody>
                                <!--<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">-->
                                <tr ng-repeat="data in filtered = (list | filter:search:false | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                    <td><input type="button" value="Remove" class="actionButtons" ng-click="removeRow(data.id)" /></td>
                                    <td><input type="button" value="Edit" class="actionButtons" ng-click="edit(data.id, $index)" /></td>
                                    <td>{{data.id}}</td>
                                    <td>{{data.price}}</td>
                                    <td>{{data.type}}</td>
                                    <td>{{data.material}}</td>
                                    <td>{{data.size}}</td>
                                    <td>{{data.maker}}</td>
                                    <td>
                                        <img src="{{data.imageone}}" id="imageOneId" />
                                        <img src="{{data.imagetwo}}" id="imageTwoId"/>
                                        <img src="{{data.imagethree}}" id="imageThreeId"/>
                                        <img src="{{data.imagefour}}" id="imageFourId"/>
                                        <img src="{{data.imagefive}}" id="imageFiveId"/>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" ng-show="filteredItems == 0">
                        <div class="col-md-12">
                            <h4>No customers found</h4>
                        </div>
                    </div>
                    <div class="col-md-12" ng-show="filteredItems > 0">
                        <div pagination="" max-size="5" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer>
            <div id="footContainer">
                <img class="logo" src="icons/logoType.png">
                <div id="footerWrap">
                    <nav class="navBarfooter">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="sellPage.php">Jewelry</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="AddUpdateRemove.php">LogIn</a></li>
                        </ul>
                    </nav>
                    <p id="copyRight">All Content Copyright</p>
                </div>
            </div>
    </footer>
    <div id="sideBar" class="sideBarScroll">
        <h1> </h1>
        <ul>
            <li ><a href="index.php">Home</a></li>
            <li><hr /></li>   
            <li><a href="sellPage.php" class="ring">Rings</a></li>
            <li><a href="sellPage.php" class="watch">Watches</a></li>
            <li><a href="sellPage.php" class="earings">Earrings</a></li>
            <li><a href="sellPage.php" class="bracelate">Bracelets</a></li>
            <li><a href="sellPage.php" class="necklace">Necklaces</a></li>
            <li><a href="sellPage.php" class="diamond">Diamonds</a></li>
            <li><hr /></li>          
            <li><a href="sellPage.php" class="platinum">Platinum</a></li>
            <li><a href="sellPage.php" class="silver">Silver</a></li>
            <li><a href="sellPage.php" class="gold">Gold</a></li>
        </ul>
        <h1></h1>
    </div>
    <script src="js/angular.min.js"></script>
    <script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
    <script src="app/app.js"></script>

</body>
</html>