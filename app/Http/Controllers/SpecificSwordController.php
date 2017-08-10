<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpecificSword;
use App\Sword;
use App\Repositories\SpecificSwordRepository;
use Illuminate\Support\Facades\DB;

class SpecificSwordController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(SpecificSwordRepository $specific_swords)
    {
        $this->specific_swords = $specific_swords;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $swords = Sword::all();
        $options = [];
        foreach ($swords as $sword)
            $options[] = strtolower($sword->name);
        if (!in_array($type, $options))
            abort(404);
        return view('specific_swords.index', [
            'specific_swords' => $this->specific_swords->getAll($type),
            'type' => ucwords($type)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specific_swords.admin', [
            'types' => Sword::all(),
            'specifics' => DB::table('specific_swords')
                ->join('swords', 'specific_swords.sword_id', '=', 'swords.id')
                ->select('specific_swords.nickname', 'swords.name', 'specific_swords.id')
                ->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $swords = Sword::all();
        $options = [];
        foreach ($swords as $sword)
            $options[] = $sword->id;
        $this->validate($request, [
            'sword_id' => 'required|in:'.implode(",",$options),
            'nickname' => 'required|max:255|alpha_spaces',
            'length' => 'numeric',
            'avg_width' => 'numeric',
            'weight' => 'numeric'
        ]);

        $spec_sword = new SpecificSword();
        $spec_sword->sword_id = $request->sword_id;
        $spec_sword->nickname = $request->nickname;
        if (!is_null($request->length) && $request->length !== '')
            $spec_sword->length = $request->length;
        else
            $spec_sword->length = null;
        if (!is_null($request->avg_width) && $request->avg_width !== '')
            $spec_sword->avg_width = $request->avg_width;
        else {
            $spec_sword->avg_width = null;
        }
        if (!is_null($request->weight) && $request->weight !== '')
            $spec_sword->weight = $request->weight;
        else
            $spec_sword->weight = null;

        $spec_sword->save();

        return redirect('/admin/add-sword');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // NOTE This isn't done
        print_r(SpecificSword::where('id', $id)->get());
        die();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $swords = SpecificSword::where('id', $id)->get();
        foreach ($swords as $sword)
            $sword->delete();
        return redirect('/admin/add-sword');
    }
}
