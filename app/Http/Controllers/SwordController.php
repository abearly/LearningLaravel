<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sword;
use App\Repositories\SwordRepository;


class SwordController extends Controller
{
    /**
     * The sword repository instance
     *
     * @var SwordRepository
     */
    protected $swords;

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(SwordRepository $swords)
    {
        $this->swords = $swords;
    }

    /**
     * Display a list of all existing swords
     *
     * @return Response
     */
    public function index()
    {
        return view('swords.index', [
            'swords' => $this->swords->getTypes(),
        ]);
    }

    /**
     * Create a new sword type
     *
     * @return Reponse
     */
    public function create(Request $request)
    {
        $values = ['Not Curved', 'Curved'];
        $this->validate($request, [
            'name' => 'required|max:255',
            'curved' => 'required|in:'.implode(",", $values)
        ]);

        $curved = ($request->curved === 'Curved' ? true : false);
        $sword = new Sword();
        $sword->name = $request->name;
        $sword->curved = $curved;
        $sword->save();

        return redirect('/swords');
    }
}
