<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ResourcesProduct;
use App\Http\Services\ResourceService;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller {

    public function __construct() {
        $resource = new ResourcesProduct;
        $this->service = new ResourceService(
            $resource->model,
            $resource->getFields()
        );
    }
    public function index()
    {
        $items = $this->service->index();
        return Inertia::render('Product/Index', [
            'items' => $items,
        ]);
    }


    public function show($resource, $id = null)
    {
        if(is_null($id)){
            $id = $resource;
        }
        $item = $this->service->show($id);
        return response()->json(['item' => $item]);
    }
    public function create()
    {
        return Inertia::render('Product/Create');
    }

    public function store(Request $request)
    {
        $item = $this->service->store(request()->all());
        return redirect()->route('products.index');
    }
    public function edit($id)
    {
        $item = $this->service->show($id);
        return Inertia::render('Product/Edit', [
            'item' => $item,
        ]);
    }
    public  function update($id)
    {
        $item = $this->service->update(request()->all(), $id);
        return redirect()->route('products.index');
    }

    public function destroy($id = null)
    {
        $item = $this->service->destroy($id);
        return redirect()->route('products.index');
    }
}