<?php

namespace App\Http\Controllers;
use App\Packages;
use Illuminate\Http\Request;

class packageController extends Controller
{





public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::paginate(3);
        return view('Packages.index', ['packages' => $packages]);
        
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        Packages::create($request->all());
        return redirect()->route('packages.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package= Packages::find($id);
        return view('packages.show',['package'=>$package]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package= Packages::find($id);
        return view('packages.update',['package'=>$package]);
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
        
  request()->validate([
            'title' => 'required',
            'details' => 'required',
        ]);
 
        //save data into database
//        Post::update($request->all());
Packages::find($id)->update($request->all());
        //redirect to post index page
        return redirect()->route('packages.index')
                        ->with('success','Post updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Packages::destroy($id);
 
        return redirect()->route('packages.index')
                        ->with('success','Post deleted successfully');
    }
}
