<?php 

namespace Application\Controllers;

use Application\Model\Category;
use Application\Model\Article;

class Home extends Controller {

    public function index(){
        $article = new Article();
        $articles = $article->all();
        $category = new Category();
        $categories = $category->all();

        return $this->view('app.index', compact('articles', 'categories'));
    }
    public function category($id){
       $ob_category = new Category();
       $categories = $ob_category->all();
       $ob_category = new Category();
       $category = $ob_category->find($id);
       $ob_category = new Category();
       $articles = $ob_category->articles($id);
       return $this->view('app.category', compact('articles', 'categories', 'category'));
    }
    public function show($id){
        $category = new Category();
        $categories = $category->all();
        $ob_article = new Article();
        $article = $ob_article->find($id);
        return $this->view('app.show', compact('categories', 'article'));
    }
}

?>