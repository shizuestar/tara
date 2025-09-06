namespace App\Http\Controllers;

use App\Models\Komunitas;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function show($id)
    {
        $komunitas = Komunitas::with(['posts', 'events', 'notifications', 'moderators'])->findOrFail($id);
        $recommended = Komunitas::whereNot('id', $id)->take(3)->get(); // Rekomendasi
        return view('forum.show', compact('komunitas', 'recommended'));
    }
}