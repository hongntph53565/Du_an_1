<?php
class SearchController
{
    public function search()
    {
        $keyword = $_GET['keyword'] ?? '';
        $product = (new Product)->searchProductName($keyword);
        $categories = (new Category)->getParentCategory();
        return view('client/search', compact('categories', 'product','keyword'));
    }
}
