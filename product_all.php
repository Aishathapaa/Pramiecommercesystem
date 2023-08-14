<?php
    require('./top.php');
?>
<style>
    .ht__cat__thumb a img {
    width: 290px !important;
    height: 350px !important;
}
</style>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(./img/banner3.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->              
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <?php
                                        $get_product=get_product($con);
                                        foreach($get_product as $list){
                                        ?>
                                        <!-- Start Single Category -->
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product.php?id=<?php echo $list['id']?>">
                                                        <img src="<?php echo './media/product/'.$list['image']?>" alt="product images">
                                                    </a>
                                                </div>
                                                <!-- mouse hover effect on products -->
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
                                                        <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html"><?php echo $list['name']?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize"><?php if($list['mrp']>0){
                                                            echo '$'.$list['mrp'];
                                                        }else{
                                                            echo '';
                                                        }?></li>
                                                        <li>$<?php echo $list['price']?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="htc__product__leftsidebar">
                            <div class="htc__recent__product">
                                <h2 class="title__line--4">Brands</h2>
                                <?php
                                        // getting all products
                                    
                                    global $con;

                                    // condition to check isset ot not
                                    $select_query = "Select * from brands";
                                    $result_query = mysqli_query($con,$select_query);

                                    //$row = mysqli_fetch_assoc($result_query);
                                    //echo $row['product_title'];
                                    while($row = mysqli_fetch_assoc($result_query)){
                                      $brand_id = $row['id'];
                                      $brand_title = $row['brands'];
                                        ?>
                                <div class="htc__recent__product__inner">
                                    <!-- End Single Product -->
                                    <!-- Start Single Product -->
                                    <ul class="Row">
                                    <li><h4><a href="brands.php?id=<?php echo $brand_id?>"><?php echo $brand_title ?></a></h4></li>
                                    </ul>
                              
                                   <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="htc__recent__product">
                            <h2 class="title__line--4">Categories</h2>
                                <?php
                                // getting all products
                                global $con;
                                    // condition to check isset ot not
                                    $select_query = "Select * from categories where status=1";
                                    $result_query = mysqli_query($con,$select_query);
                                    while($row = mysqli_fetch_assoc($result_query)){
                                      $cat_id = $row['id'];
                                      $cat_title = $row['categories'];
                                        ?>
                                <div class="htc__recent__product__inner">
                                    <ul class="Row">
                                        <li><h4><a href="categories.php?id=<?php echo $cat_id?>"><?php echo $cat_title ?></a></h4></li>
                                    </ul>
                                   <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
<?php
include('./footer.php');
?>