<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Nhớ import model nếu bạn có

class ProductController extends Controller
{
    // Lấy danh sách sản phẩm
    public function index()
    {
        return Product::all(); // Trả về tất cả sản phẩm
    }

    // Tạo mới sản phẩm
    public function store(Request $request)
    {
        $product = Product::create($request->all()); // Tạo sản phẩm mới với dữ liệu từ request
        return response()->json($product, 201); // Trả về sản phẩm vừa tạo với mã phản hồi 201
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id); // Tìm sản phẩm theo ID
        $product->update($request->all()); // Cập nhật sản phẩm
        return response()->json($product, 200); // Trả lại sản phẩm đã cập nhật
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id); // Tìm sản phẩm theo ID
        $product->delete(); // Xóa sản phẩm
        return response()->json(null, 204); // Trả về mã phản hồi 204 No Content
    }
}
