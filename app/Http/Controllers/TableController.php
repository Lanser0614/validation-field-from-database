<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = array();
        $table = Table::where('module_id', '1')->get();
        $tableArray = $table->toArray();

        foreach ($tableArray as $key => $value) {
            //    var_dump($value["filable"]) ;
            if ($value["required"] == 0) {
                $required =  $value["required"] = '';
            } elseif ($value["required"] == 1) {
                $required =    $value["required"] = 'required';
            }
            $filable = $value["filable"];
            $type = $value["fillable_type"];

            // $data = array(
            //     'field' => $filable,
            //     'required' => $required,
            //     'type' => $type,

            // );
            $validated = $request->validate([
                '' . $filable . '' => ['' . $type . '', '' . $required . ''],

            ]);
            $user::create($validated);
            //   $value["required"] ;


        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        
        $table = Table::where('module_id', '1')->get();
        $tableArray = $table->toArray();
        $validated = [];

        foreach ($tableArray as $key => $value) {
            if ($value["required"] == 0) {
                $required =  $value["required"] = '';
            } elseif ($value["required"] == 1) {
                $required =    $value["required"] = 'required';
            }
            $filable = $value["filable"];
            $type = $value["fillable_type"];

            $validated = array_merge($validated, $request->validate([
                '' . $filable . '' => ['' . $type . '', '' . $required . ''],
            ]));

        }
        $user::create($validated);
        
      //  var_dump(dd());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTableRequest  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
    }
}
