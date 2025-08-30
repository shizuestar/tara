<?php
namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'all');
        $bookmarks = Bookmark::where('user_id', Auth::id())->with('post')->get();
        $filteredBookmarks = $category === 'all' ? $bookmarks : $bookmarks->filter(function ($bookmark) use ($category) {
            return $bookmark->post->category === $category;
        });

        return view('User.bookmark', compact('bookmarks', 'filteredBookmarks'));
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $bookmark->delete();
        return response()->json(['message' => 'Bookmark deleted']);
    }
}