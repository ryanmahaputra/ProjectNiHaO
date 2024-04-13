namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class AkunController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:akun',
            'password' => 'required',
        ]);

        Akun::create($validatedData);

        return redirect('/home')->with('success', 'Akun berhasil dibuat!');
    }
}
