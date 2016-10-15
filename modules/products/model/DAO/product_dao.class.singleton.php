<?php
class productDAO {

    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_product_DAO($db, $arrArgument) {
        $product_name = $arrArgument['product_name'];
        $product_description = $arrArgument['product_description'];
        $product_price = $arrArgument['product_price'];
        $product_id = $arrArgument['product_id'];
        $enter_date = $arrArgument['enter_date'];
        $obsolescence_date = $arrArgument['obsolescence_date'];
        $product_category = $arrArgument['product_category'];
        $availability = $arrArgument['availability'];
        //$avatar = $arrArgument['avatar'];
        $avatar = "/fakelocation/untilIimplementIt.png";

        $web = 0;
        $warehouse = 0;
        $physical_store = 0;

        foreach ($availability as $indice) {
            if ($indice === 'Web')
                $web = 1;
            if ($indice === 'Warehouse')
                $warehouse = 1;
            if ($indice === 'Physical_store')
                $physical_store = 1;
        }

        $sql = "INSERT INTO products (product_name, product_description, product_price, product_id, enter_date, obsolescence_date, product_category, Web, Warehouse, Physical_store, avatar) VALUES ('". $product_name
        ."', '". $product_description ."', '". $product_price ."', '". $product_id ."' , '". $enter_date ."', '". $obsolescence_date
        ."', '". $product_category ."', '". $web ."','". $warehouse ."', '". $physical_store ."' ,'". $avatar ."')";

        return $db->ejecutar($sql);
    }

}
