<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Http\Requests\IncomeRequest;
use App\Models\PrimaryIncome;
use App\Services\IncomeService;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class IncomeController extends Controller
{
    public function __construct(PrimaryIncome $model) {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Session::get('user')->id;
        $incomes = PrimaryIncome::all()->where('user_id', '=', $userId);
        return view('income.index', ['incomes' => $incomes]);
    }

    /**
     * Função responsável por retornar página de cadastro de receita.
     *
     * @return View
     */
    public function create()
    {
        return view('income.addIncome');
    }

    public function store(IncomeRequest $request)
    {
        try{
            $validated = $request->validated();
            $validated['user_id'] = $request->session()->get('user')->id;
            $response = $this->model->create($validated);
            

            return $this->index();
        } catch (ValidationException $e) {
            $response = $e->errors();
            return $response;
        }
    }

    public function edit($incomeId)
    {
        $income = Income::find($incomeId);
        return view('income.addIncome', ['income' => $income]);
    }
}
