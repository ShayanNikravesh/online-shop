<?php
function getLatestProducts() {
    global $cn;
    $sql = "select products.*, p.src photo_src, p.name photo_name, c.title category_title from products
            left join photo_product on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            join categories c on c.id = products.category_id
            group by products.created_at order by products.created_at DESC limit 12";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getSuggestProducts() {
    global $cn;
    $sql = "select products.*, p.src photo_src, p.name photo_name, c.title category_title from products
            left join photo_product on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            join categories c on c.id = products.category_id
            order by RAND() limit 5";
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getDetailsProducts($tracking_code) {
    global $cn;
    $sql = "select products.*, c.title category_title, c.parent_id category_parent_id from products
            join categories c on c.id = products.category_id and c.status = 'active'
            join brands b on b.id = products.brand_id and b.status = 'active'
            where products.status != 'inactive' and products.tracking_code=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $tracking_code);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function getDetailsProductsByID($id) {
    global $cn;
    $sql = "select products.*, p.src photo_src, p.name photo_name, c.title category_title, c.parent_id category_parent_id from products
            join categories c on c.id = products.category_id and c.status = 'active'
            join brands b on b.id = products.brand_id and b.status = 'active'
            left join photo_product on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            where products.status != 'inactive' and products.id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function updateProductStock($id, $quantity) {
    global $cn;
    $sql = "update products set stock = stock - ? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $quantity);
    $result->bindValue(2, $id);
    $result->execute();
    return ($result->rowCount() > 0);
}

function getCategoryProducts($category_id) {
    global $cn;
    $sql = "select products.*, p.src photo_src, p.name photo_name, c.title category_title from products
            left join photo_product on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            join categories c on c.id = products.category_id
            where products.status != 'inactive' and products.category_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $category_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function getBrandProducts($brand_id) {
    global $cn;
    $sql = "select products.*, p.src photo_src, p.name photo_name, c.title category_title from products
            left join photo_product on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            join categories c on c.id = products.category_id
            join brands b on b.id = products.brand_id                                                                  
            where products.status != 'inactive' and products.brand_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $brand_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function addFavorites($user_id,$product_id) {
    global $cn;
    $sql = "insert into favorites (user_id,product_id) values(?,?)";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->bindValue(2,$product_id);
    return $result->execute();
}

function GetFavorite($user_id,$product_id) {
    global $cn;
    $sql = "select * from favorites where user_id = ? and product_id = ? ";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->bindValue(2, $product_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function deleteFavorite($user_id,$product_id) {
    global $cn;
    $sql = "DELETE from favorites where user_id=? and product_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->bindValue(2, $product_id);
    return $result->execute();
}

function GetFavorites($user_id) {
    global $cn;
    $sql = "select favorites.*, p.title product_title , p.price product_price ,p.price_discounted product_price_discounted , p.tracking_code product_tracking_code from favorites
            join products p on p.id = favorites.product_id where user_id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $user_id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}

function searchProduct($search){
    global $cn;
    $sql = "select products.*, p.src photo_src, p.name photo_name, c.title category_title, c.parent_id category_parent_id from products
            join categories c on c.id = products.category_id and c.status = 'active'
            join brands b on b.id = products.brand_id and b.status = 'active'
            left join photo_product on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            where products.status != 'inactive' and products.title LIKE ?";
    $result = $cn->prepare($sql);
    $product = "%$search%" ;
    $result->bindValue(1, $product);
    $result->execute();
    if ($result ->rowCount()>0){
        return $result->fetchAll();
    }
    return null;
}

function searchByPrice($minPrice,$maxPrice){
    global $cn;
    $sql = "select products.*, p.src photo_src, p.name photo_name, c.title category_title, c.parent_id category_parent_id from products
            join categories c on c.id = products.category_id and c.status = 'active'
            join brands b on b.id = products.brand_id and b.status = 'active'
            left join photo_product on products.id = photo_product.product_id
            left join photos p on photo_product.photo_id = p.id
            where products.status != 'inactive' and price > ? and price < ? 
            group by products.created_at
            order by products.id desc";
    $result = $cn->prepare($sql);
    $result->bindValue(1,$minPrice);
    $result->bindValue(2,$maxPrice);
    $result->execute();
    if ($result ->rowCount()>0){
        return $result->fetchAll();
    }
    return null;
}
