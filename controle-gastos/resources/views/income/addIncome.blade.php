<x-layout title="Dashboard">

  @section('body')
  <div class="container">
    <h2>Adicionar Receitas</h2>
    <form action="/income/store" method="post">
        @csrf
        <div class="container">
          <div class="row" style="align-itens: center">
            <div class="col-4 col-md-4">
              <label for="name" class="form-label">Fonte</label>
              @if (isset($income->name))
              <input type="text" id="name" name="name" class="form-control col-md-4" value="{{$income->name}}">
              @else
              <input type="text" id="name" name="name" class="form-control col-md-4">
              @endif
              @if ($errors->has('name'))
              @foreach ($errors->get('name') as $erro)
                  <strong class="name">{{ $erro }}</strong>
              @endforeach
              @endif
            </div>
            <div class="col-4 col-md-4">
              <label for="frequency" class="form-label">Frequencia</label>
              <select name="frequency" class="form-select" aria-label="Default select example">
                @if (isset($income->frequency))
                  <option>Selecione a Frequência</option>
                @else
                <option selected>Selecione a Frequência</option>
                @endif
                @if (isset($income->frequency) && $income->frequency == 1)
                  <option value="1" selected>Semanal</option>
                @else
                  <option value="1">Semanal</option>
                @endif
                @if (isset($income->frequency) && $income->frequency == 2)
                  <option value="2" selected>Mensal</option>
                @else
                  <option value="2">Mensal</option>
                @endif
                @if (isset($income->frequency) && $income->frequency == 3)
                  <option value="3" selected>Anual</option>
                @else
                  <option value="3">Anual</option>
                @endif
              </select>
              @if ($errors->has('frequency'))
              @foreach ($errors->get('frequency') as $erro)
                  <strong class="frequency">{{ $erro }}</strong>
              @endforeach
              @endif
            </div>
            <div class="col-4 col-md-4">
              <label for="value" class="form-label">Valor</label>
              @if (isset($income->value))
              <input type="number" id="value" name="value" class="form-control col-md-4" value="{{$income->value}}">
              @else
              <input type="number" id="value" name="value" class="form-control col-md-4">
              @endif
              @if ($errors->has('value'))
                @foreach ($errors->get('value') as $erro)
                    <strong class="value">{{ $erro }}</strong>
                @endforeach
              @endif
            </div>
            <div class="col-4 col-md-4">
              <select id="income_type" name="income_type" class="form-select" style="margin-top: 20px" aria-label="Default select example">
                <option selected>Selecione o tipo de renda</option>
                <option value="fixa">Fixa</option>
                <option value="variavel">Variável</option>
              </select>
              @if ($errors->has('income_type'))
                @foreach ($errors->get('income_type') as $erro)
                    <strong class="income_type">{{ $erro }}</strong>
                @endforeach
              @endif
            </div>
            <div class="col-4 col-md-4">
              <div class="form-check" style="margin-top: 28px">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Fonte de renda principal
                </label>
              </div>
            </div>
           </div>
           <button type="submit" class="btn btn-primary" style="margin-top: 20px">Adicionar</button>
        </div>
        
    </form>
</div>
  @endsection('body')

</x-layout>