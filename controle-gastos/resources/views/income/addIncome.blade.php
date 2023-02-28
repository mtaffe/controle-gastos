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
           </div>
           <button type="submit" class="btn btn-primary" style="margin-top: 20px">Adicionar</button>
        </div>
        
    </form>
</div>
  @endsection('body')

</x-layout>