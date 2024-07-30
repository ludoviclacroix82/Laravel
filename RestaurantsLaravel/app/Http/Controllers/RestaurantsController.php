<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantRequest;
use App\Models\Restaurants;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('restaurants.index', ['restaurants' => Restaurants::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRestaurantRequest $request)
    {
        $data = $request->validated();


        Restaurants::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'zip_code' => $data['zip_code'],
            'town' => $data['town'],
            'country' => $data['country'],
            'description' => $data['description'],
            'review' => $data['review'],
            'updated_at' =>now(),
            'created_at' =>now()
        ]);

        return redirect()->route('restaurants.create')->with('success', 'Restaurant créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view(
            'restaurants.show',
            ['restaurant' => Restaurants::find($id)]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $restaurant = Restaurants::find($id);
        return view(
            'restaurants.edit',
            ['restaurant' => $restaurant]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRestaurantRequest $request, Restaurants $restaurants,$id)
     {
        $data = $request->validated();

        DB::table('restaurants')
            ->where('id',$id)
            ->update([
                'name' => $data['name'],
                'address' => $data['address'],
                'zip_code' => $data['zip_code'],
                'town' => $data['town'],
                'country' => $data['country'],
                'description' => $data['description'],
                'review' => $data['review'],
                'updated_at' =>now(),
            ]);       
        return redirect()->route('restaurants.index')->with('success', 'Restaurant modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurants $restaurants)
    {
        //
    }
}
