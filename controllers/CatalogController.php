<?php

require_once ROOT.'/models/Product.php';

class CatalogController
{

	public function actionIndex()
	{
		$category = array();
		$category = Category::getCategoryList();

		$lastesProduct = array();
		$lastesProduct = Product::getLatesProducts(12);

		require_once (ROOT. '/views/catalog/index.php');
		return true;
	}

	public function actionCategory($categoryId)
	{

		$category = array();
		$category = Category::getCategoryList();

		$categoryProduct = array();
		$categoryProduct = Product::getProductListByCategory($categoryId);

		require_once (ROOT. '/views/catalog/category.php');
		return true;
	}
}