<?php

class Product
{
	const SHOW_BY_DEFAULT = 20;


	public static function getLatesProducts($count = self::SHOW_BY_DEFAULT)
	{
		$count = intval($count);

		$db = Db::getConnection();

		$productList = array();

		$result = $db->query('SELECT id, name, price, image, is_new FROM products WHERE status = "1" ORDER BY id DESC LIMIT '.$count);

		$i = 0;

		while($row = $result -> fetch())
		{
			$productList[$i]['id'] = $row['id'];
			$productList[$i]['name'] = $row['name'];
			$productList[$i]['price'] = $row['price'];
			$productList[$i]['image'] = $row['image'];
			$productList[$i]['is_new'] = $row['is_new'];
			$i++;
		}

		return $productList;
	}

	public static function getProductListByCategory($categoryId = false)
	{
		if ($categoryId)
		{
		
		$db = Db::getConnection();

		$product = array();

		$result = $db->query('SELECT id, name, price, image, is_new FROM products WHERE status = "1" AND category_id ='.$categoryId.' ORDER BY id DESC LIMIT '. self::SHOW_BY_DEFAULT);

		$i = 0;

		while($row = $result -> fetch())
		{
			$product[$i]['id'] = $row['id'];
			$product[$i]['name'] = $row['name'];
			$product[$i]['price'] = $row['price'];
			$product[$i]['image'] = $row['image'];
			$product[$i]['is_new'] = $row['is_new'];
			$i++;
		}
		}
		return $product;
	}

	public static function getProductById($id)
	{
		$id = intval($id);

		if($id)
		{
			$db = Db::getConnection();

			$result = $db->query('SELECT * FROM products WHERE id ='.$id);
			$result -> setFetchMode(PDO::FETCH_ASSOC);
			return $result -> fetch();
		}
	}
}