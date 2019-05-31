<?php

function countProductByStore($storeid){
    return \DB::table('products')->where('store_id', $storeid)->count();
}

function getStoreNameByStoreId($id){

    return \DB::table('store')->where('id', $id)->value('name');

}