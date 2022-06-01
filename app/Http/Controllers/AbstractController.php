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

    public function show($id)
    {
        $item = $this->service->show($id);
        return response()->json(['item' => $item]);
    }

    public function store()
    {
        $item = $this->service->store(request()->all());
        return response()->json(['item' => $item]);
    }

    public  function update($id)
    {
        $item = $this->service->update(request()->all(), $id);
        return response()->json(['item' => $item]);
    }
}