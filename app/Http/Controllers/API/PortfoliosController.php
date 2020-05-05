<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return $portfolios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
            'title'=> 'required',
            'category'=> 'required',
            'image'=> 'required|max:600000',
            'description' => 'required',
            'link' => 'required|url'
            ]
        );

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->category = $request->category;
        $portfolio->description = $request->description;
        $portfolio->link = $request->link;
        $portfolio->image = $request->image;
        $portfolio->save();
        return [
            'successMsg'=>'Portfolio Item successfully created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $this->validate($request, [
            'title'=> 'required',
            'category'=> 'required',
            'image'=> 'mimes:jpeg,jpg,bmp|max:1500',
            'description' => 'required',
            'image'=> 'mimes:jpeg,jpg,bmp|max:1500'

        ]);
        $portfolio = Portfolio::find($id);

        $portfolio->title = $request->title;
        $portfolio->category = $request->category;
        $portfolio->image = $request->image;
        $portfolio->description = $request->description;
        $portfolio->link = $request->link;
        $portfolio->save();
        return ['successMsg'=>'Portfolio Item Successfully Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        if (file_exists('img/portfolio/'.$portfolio->image))
        {
            unlink('img/portfolio/'.$portfolio->image);
        }
        $portfolio->delete();
        return ['successMsg'=>'Item successfully Deleted'];
    }
}
