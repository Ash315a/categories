<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // لعرض جميع الأقسام
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // لإنشاء قسم جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($category, 201); // يعيد القسم الذي تم إنشاؤه
    }

    // لعرض قسم معين باستخدام الـ ID
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // لتعديل قسم معين
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($category);
    }

    // لحذف قسم
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
