<?php

function component($productname, $productprice,$sp,$des, $productimg, $productid){
    $truncatedDes = strlen($des) > 150 ? substr($des, 0, 150) . "..." : $des;
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\" style=\"margin-bottom:30px !important;\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div style=\"height:250px\">
                            <img src=\"admin/admin_upload/$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\" width=\"50px\"  height=\"50px\" >
                        </div>
                        <div class=\"card-body\" style=\"min-height:220px;background: #f2f2f2;\" >
                            <h5 class=\"card-title\">$productname</h5>
                            
                            <p class=\"card-text\"  style=\"min-height:25px;max-height:25px;max-width:200px; overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                           \">
                                $truncatedDes
                              
                            </p>
                           
                            <h5>
                                <small><s class=\"text-secondary\">$productprice</s></small>
                                <span class=\"price\">₹$sp</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $sellprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"admin/admin_upload/$productimg\" alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: APPLE INc</small>
                                <h5 class=\"pt-2\">₹$sellprice</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

















