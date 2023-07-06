<?php

namespace App\Http\Controllers;
use App\Models\Headquarter;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\CreateValidationRequest;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cars = Car::all();
        //$cars = Car::Where('name','=','Audi')->Where('founded','=','1909')->get();
        //$cars = Car::Where('name','=','Audi')->firstOrFail();
        //$cars = Car::where('name','=','Audi')->count();
        //$cars = Car::All()->count();
        // $cars = Car::sum('founded');
        
        
        
       // $cars = Car::all()->toJson();
       // $cars = json_decode($cars);
        //$cars = Car::all();
        
        $cars = Car::paginate(3);

        return view('cars.index',['cars'=>$cars,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $car = new Car;
        //$car->name = $request->input('name');
        //$car->founded = $request->input('founded');
        //$car->description = $request->input('description');
        //$car->save();
        //we get data from request when in was inputed
        //$test = $request->all();
        //$test = $request->except('_token');
        //$test = $request->except('_token','name');
        //$test = $request->only('_token','name');

        //$test = $request->has('founded');
        //if($request->is('cars')){
           //  dd('Endpoint is cars!');
        //}
       // if($request->isMethod('post')){
        //    dd('Method is post');
        //};
       // dd($request->url());
       //Methods we can use on $request
       //guessExtension()
       //getMimeTypes()
       //store()
       //assStore()
       //storePublic()
       //move()
       //getClientOriginalName()
       //getClientMineType()
       //guessClientExtension()
       //getSize()
       //getError()
       //$test = $request->file('image')->guessExtension();
       $newImageName = time().'-'.$request->name.'.'.$request->image->extension();
       $request->image->move(public_path('image'), $newImageName);
       $request->validate([
        'name'=>'required',
        'founded'=> 'required|integer|min:0|max:2021`',
        'description'=>'required',
        'image'=>'required|mimes:png,jpg,jpeg|max:5048'
       ]);

        $car = Car::create([
             'name' => $request->input('name'),
             'founded' => $request->input('founded'),
             'description' => $request->input('description'),
             'image_path' => $newImageName
        ]);
         
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        
        
        return view('cars.show')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $car = Car::find($id);
       
        return view('cars.edit')->with('car', $car);
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
        $car = Car::where('id',$id)->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
       ]);
       return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect('/cars');
    }
}
