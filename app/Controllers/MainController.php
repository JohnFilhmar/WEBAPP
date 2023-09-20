<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TableProducts;
use App\Models\TableCategory;

class MainController extends BaseController
{
    public function index()
    {
        $main = new TableProducts();
        $data['products'] = $main->findAll();
        $data['prod'] = [];
        return view('products', $data);
    }
    public function save()
    {
        $main = new TableProducts();
        $data = [
            'ProductName' => $this->request->getVar('ProductName'),
            'ProductDescription' => $this->request->getVar('ProductDescription'),
            'ProductCategory' => $this->request->getVar('ProductCategory'),
            'ProductQuantity' => $this->request->getVar('ProductQuantity'),
            'ProductPrice' => $this->request->getVar('ProductPrice'),
        ];
        $id = $this->request->getVar('id');
        if($id != null){
            $main->set($data)->where('id',$id)->update();
        }else{
            unset($data['id']);
            $main->save($data);
        }
        return redirect()->to('/main');
    }
    public function edit($id)
    {
        $main = new TableProducts();
        $data = [
            'products'=>$main->findAll(),
            'prod'=>$main->where('id',$id)->first(),
        ];
        return view('products', $data);
    }
    public function delete($id)
    {
        $main = new TableProducts();
        $record = $main->find($id);
        if($record){
            $main->delete($id);
            return redirect()->to('/main');
        }else{
            return "Record Not Found";
        }
    }
}
