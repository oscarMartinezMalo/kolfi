<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<head>
    <title></title>
    <meta charset="utf-8" />
    <script src="Scripts/jquery-3.0.0.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sellJewelry.css" rel="stylesheet" />

<!--    <script src="Scripts/sellJewelry.js"></script>-->
</head>
<body>
    <div ng-controller="customersCrtl" >

        <input type="checkbox" id="sideBarToggler" />
        <header>    
            <div id="logoWrap">
                <label class="logoBurguer" for="sideBarToggler">
                    <span id="burguerStyle"></span>
                </label>
                <a href="index.php">
                    <img src="icons/logoType.png" alt="Logo" class="logo" />
                </a>
            </div>
            <nav class="navBarHeader" id="gooo">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="AddUpdateRemove.php">LogIn</a></li>
                </ul>
            </nav>
        </header>

        <div id="container" >

            <div id="wrapH3"><h3>Jewelry</h3></div>
            <div id="imageDiv"></div>
                                
            <div id="asideImageboxWrap">
            
                <div id="ImagesBoxSection">
                
                    <div id="SellJewelryContainer">    

                        <div id="sortBar" >

                            <!--<select id="sortByPrice"  ng-change="sort_by()" >
                                <option class="optionSelect" value="lowToHight" >Price: Low to High</option>
                                <option class="optionSelect" value="hightToLow" >Price: Hight to Low</option>
                            </select>-->
                        <!-- <select id="sortByPrice" ng-options="option for option in listOfOptions"  ng-model="selectedItem"   ng-change="selectedItemChanged('price');">
                                    <option value=" ">- Please Choose -</option>
                            </select>-->
                            <select id="sortByPrice"  ng-model="predicate"  >
                                <option value="">Please select one</option>
                                <option value="+price">Price: Low to High</option>
                                <option value="-price">Price: Hight to Low</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                        
                                <h5> PageSize:</h5>
                                <select ng-model="entryLimit" class="form-control" >
                                    <option>5</option>
                                    <option>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
                                <input type="text" ng-model="showTypee" ng-change="filter()" placeholder="Filter" class="form-control" />
                            </div>
                            <!-- <div class="col-md-4">
                                <h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
                            </div>-->
                        </div>
                        <div class="col-md-12" ng-show="filteredItems > 0">

                                <div class="imageElement" ng-repeat="data in filtered = (list | filter:showType:true |  filter:showTypee:false |  orderBy : predicate ) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                    <img class="productImage" src="{{data.imageone}}" id="imageOneId">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Material</strong></div>
                                        <div class=col-md-4>{{data.material}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><strong>Inch</strong></div>
                                        <div class="col-md-4">{{data.size}}</div>
                                    </div>                  
                                    <div class="row" >
                                        <div class="col-md-3"><strong>Maker</strong></div>
                                        <div class="col-md-4">{{data.maker}}</div>
                                    </div>
        
                                    <hr>
                                    <h4> ${{data.price}}</h4>
                                
                                    <input type="button" id="previewButton" ng-click="quickViewButton(data)"  value="quick View">
                                </div>
                        
                        </div>
                        <div class="col-md-12" ng-show="filteredItems == 0">
                            <div class="col-md-12">
                                <h4>No Products found</h4>
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
                <img class="logo" src="icons/logoType.png" />
                <div id="footerWrap">
                    <nav class="navBarfooter">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="AddUpdateRemove.php">LogIn</a></li>
                        </ul>
                    </nav>
                    <p id="copyRight">All Content Copyright</p>
                </div>
            </div>
        </footer>
                
        <div id="sideBar" class="sideBarScroll">
            <h1></h1>
        
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1" data-parent="#accordion">Mental</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <ul class="list-group" >
                                <li class="list-group-item">
                                    <label for="goldElement">Gold</label>
                                    <input class="metal" type="checkbox" ng-model="goldCheckbox" ng-true-value="gold" data-ng-false-value=''  id="goldElement"    ng-change="filter()"/>
                                </li>
                                <li class="list-group-item">
                                    <label for="silverElement">Silver</label>
                                    <input class="metal" type="checkbox"  ng-model="silverCheckbox" ng-true-value="silver" data-ng-false-value='' id="silverElement"  ng-change="filter()"/>
                                </li>
                                <li class="list-group-item">
                                    <label for="platinumElement">Platinum</label>
                                    <input class="metal" type="checkbox"  ng-model="platinumCheckbox" ng-true-value="platnium" data-ng-false-value='' id="platinumElement"  ng-change="filter()"/>
                                </li>
                            </ul>
                            <!-- <div class="panel-footer">Footer</div> -->
                        </div>

                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse2" data-parent="#accordion">Type</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                            <label for="platinumElement">Ring</label>
                                            <input class="type" type="checkbox" ng-model="ringCheckbox" ng-true-value="ring" data-ng-false-value='' id="ringElement"  ng-change="filter()" />
                            </li>
                    
                            <li class="list-group-item">
                                            <label for="watchElement">Watch</label>
                                            <input class="type" type="checkbox" ng-model="watchCheckbox" ng-true-value="watch" data-ng-false-value='' id="watchElement"  ng-change="filter()" />
                                </li>
                            <li class="list-group-item">
                                            <label for="earingsElement">Earings</label>
                                            <input class="type" type="checkbox" ng-model="earingsCheckbox" ng-true-value="earings" data-ng-false-value='' id="earingsElement"  ng-change="filter()" />
                                </li>
                            <li class="list-group-item">
                                            <label for="necklaceElement">Necklace</label>
                                            <input class="type" type="checkbox" ng-model="necklaceCheckbox" ng-true-value="necklace" data-ng-false-value='' id="necklaceElement"  ng-change="filter()" />
                                </li>
                            <li class="list-group-item">
                                            <label for="diamondElement">Diamond</label>
                                            <input class="type" type="checkbox" ng-model="diamondCheckbox" ng-true-value="diamond" data-ng-false-value='' id="diamondElement"  ng-change="filter()" />
                                </li>
                            <li class="list-group-item">
                                            <label for="braceletElement">Bracelate</label>
                                            <input class="type" type="checkbox" ng-model="braceletCheckbox" ng-true-value="bracelet" data-ng-false-value='' id="braceletElement"  ng-change="filter()" />
                                </li>
                            <li class="list-group-item">
                                            <label for="diamRingElment">DiamRing</label>
                                            <input class="type" type="checkbox" ng-model="diamondRingCheckbox" ng-true-value="diamondRing" data-ng-false-value='' id="diamRingElment"  ng-change="filter()" />
                                </li>
                        </ul>
                        <!--<div class="panel-footer"></div> -->
                    </div>
                </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse3" data-parent="#accordion">Price</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse ">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label for="fiftyElement">$0-50</label>
                                    <input class="price" type="checkbox" ng-model="fiftyCheckbox" ng-true-value="platinum" data-ng-false-value='' id="fiftyElement"  ng-change="filter()" />
                                </li>
                                <li class="list-group-item">
                                    <label for="onehundredElement">$50-100</label>
                                    <input class="price" type="checkbox" ng-model="onehundredCheckbox" ng-true-value="platinum" data-ng-false-value='' id="onehundredElement"  ng-change="filter()" />
                                </li>
                                <li class="list-group-item">
                                    <label for="twoHundredElement">$100-200</label>
                                    <input class="price" type="checkbox" ng-model="twoHundredCheckbox" ng-true-value="platinum" data-ng-false-value='' id="twoHundredElement"  ng-change="filter()" />
                                </li>
                                <li class="list-group-item">
                                    <label for="threehundredElement">$200-300</label>
                                    <input class="price" type="checkbox" ng-model="threehundredCheckbox" ng-true-value="platinum" data-ng-false-value='' id="threehundredElement"  ng-change="filter()" />
                                </li>
                                <li class="list-group-item">
                                    <label for="overElement">over-300</label>
                                    <input class="price" type="checkbox" ng-model="overCheckbox" ng-true-value="platinum" data-ng-false-value=''id="overElement" ng-change="filter()" />
                                </li>
                            </ul>
                            <!-- <div class="panel-footer">Footer</div>-->
                        </div>
                    </div>
            </div>

            <h1></h1>
        </div>
        
    </div>
       
    <script src="js/angular.min.js"></script>
    <script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="app/app.js"></script>
</body>
</html>
