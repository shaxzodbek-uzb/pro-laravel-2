<?php
namespace App\Http\Controllers;

class AbstractController extends Controller
{
    protected $service;
    protected $serviceClass;
    protected $storeRequestClass;
    protected $updateRequestClass;
    public function __construct() {
        $this->service = new $this->serviceClass;
    }
    public function index()
    {
        $items = $this->service->index();
        return response()->json(['items' => $items]);
    }

    public function show($resource, $id = null)
    {
        if(is_null($id)){
            $id = $resource;
        }
        $item = $this->service->show($id);
        return response()->json(['item' => $item]);
    }

    public function store()
    {
        $item = $this->service->store(request()->all());
        return response()->json(['item' => $item]);
    }

    public  function update($resource, $id = null)
    {
        if(is_null($id)){
            $id = $resource;
        }
        $item = $this->service->update(request()->all(), $id);
        return response()->json(['item' => $item]);
    }
}