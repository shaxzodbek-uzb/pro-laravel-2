<?php
namespace App\Http\Controllers;

class AbstractController extends Controller
{
    protected $service;
    protected $storeRequestClass;
    protected $updateRequestClass;
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
        $request = new $this->storeRequestClass;
        $item = $this->service->store($request->validated());
        return response()->json(['item' => $item]);
    }

    public function update($id)
    {
        $request = new $this->updateRequestClass;
        $item = $this->service->update($request->validated(), $id);
        return response()->json(['item' => $item]);
    }
}