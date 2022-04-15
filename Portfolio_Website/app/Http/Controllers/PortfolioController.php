<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return redirect()->route('index');
    }


    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('show', compact('portfolio'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('photo') && $request->file('photo')->isValid()){
            $data['photo'] = $request->photo->storePublicly('.', 'public');
        }
        $data['user_id'] = auth()->id();
        Portfolio::query()->create($data);
        return redirect()->route('master',['username' => Auth::user()->name]);
    }

    public function edit($id)
    {
        $portfolio = Portfolio::query()->findOrFail($id);
        return view('edit', compact('portfolio'));
    }

    public function update($id,CreateRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = $request->photo->storePublicly('.', 'public');
        Portfolio::query()->where(['id'=>$id, 'user_id'=>auth()->id()])->update($data);
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        Portfolio::query()->where(['id'=>$id, 'user_id'=>auth()->id()])->delete();
        return redirect()->route('index');
    }


}
