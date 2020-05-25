<?php


namespace app\controllers;

use app\models\Category;
use Yii;

use app\models\Book;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class t1 extends Controller
{
    public function actionCreate()
    {
        $book= new Book();
        $message='';
        if(isset($_GET['message']))
            $message = $_GET['message'];
        if ($book->load(Yii::$app->request->post()) && $book->save()) {
            $this->redirect(\yii\helpers\Url::to(['book/create', 'message' => 'success']));
        }
        return $this->render('edit', ['model' => $book,'message'=>$message]);

    }
    public function actionIndex(){
        $listBook= Book::find();
        $data = new ActiveDataProvider([
            'query' => $listBook,
        ]);
//        print_r($listBook);
//        die();
        return $this->render('index',[ 'listBook' => $data]);
    }
//    public function actionView($id)
//    {
//        $book= Book::findOne($id);
//
//        return $this->render('view', [
//            'book' =>$book ,
//        ]);
//    }
    public function actionView()
    {
        $book= Book::findOne("us");
        print_r($book);
        die();
        return $this->render('view', [
            'book' =>$book ,
        ]);
    }
    public function actionTest(){
//        $book=Book::findOne(1);
//        print_r($book->getCategory());
        $category = Category::findOne(1);
        print_r($category);
        die();
        return $this->render('view', [
            'book' =>$book ,
        ]);
    }

}