<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query()->orderBy('created_at', 'desc');

        if ($keyword = $request->input('keyword')) {
            $query->search($keyword);
        }

        $categories = $query->paginate(6);
        $activities = ActivityLog::where('type', 'category')->latest()->take(10)->get();

        return view('administrator.admin.category.index', compact('categories', 'keyword', 'activities'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'category',
            'description' => 'Kategori baru "' . $category->name . '" telah ditambahkan',
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori baru ditambahkan.');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'category',
            'description' => 'Kategori "' . $category->name . '" berhasil diperbarui',
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($category->blogs()->exists()) {
            return redirect()->route('admin.categories.index')->with('error', 'Kategori masih digunakan oleh blog.');
        }

        $categoryName = $category->name;
        $category->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'category',
            'description' => 'Kategori "' . $categoryName . '" berhasil dihapus',
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori dihapus.');
    }
}