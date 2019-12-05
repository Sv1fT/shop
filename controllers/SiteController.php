<?php
require_once ROOT.'/models/Category.php';
require_once ROOT.'/models/Product.php';

class SiteController
{

	public function actionIndex()
	{
		$category = array();
		$category = Category::getCategoryList();

		$lastesProduct = array();
		$lastesproduct = Product::getLatesProducts();

		require_once (ROOT. '/views/site/index.php');
		return true;
	}
}