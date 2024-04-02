<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionRequest;
use App\Models\Promotion;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index (Promotion $promotion) : View
    {
        $promotions = Promotion::paginate(5);

        return view('scolarite.parametres.parametre', compact('promotions'));
    }

    public function store (PromotionRequest $promotionRequest) : RedirectResponse
    {
        $promotion = Promotion::create($promotionRequest->all());

        return redirect()->route('scolarite.parametre')->with('info', 'La promotion a été ajoutée avec succès !');

    }

    public function edit (Promotion $promotion) : view
    {
        $promotions = Promotion::paginate(10);
        return View('scolarite.parametres.promotions.edit', compact('promotion', 'promotions'));
    }

    public function update (PromotionRequest $promotionRequest, Promotion $promotion) : RedirectResponse
    {
        $promotion = Promotion::find($promotion->id);

        $promotion->promotion = $promotionRequest->promotion;
        $promotion->save();

        return redirect()->route('promotion.edit', compact('promotion'))->with('info', 'Modification effectuée avec succès !');
    }

    public function delete (Promotion $promotion) : RedirectResponse
    {
        try {

            $promotion->delete();

            return redirect()->route('scolarite.parametre')->with('info', 'La promotion a été supprimée avec succès !');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
