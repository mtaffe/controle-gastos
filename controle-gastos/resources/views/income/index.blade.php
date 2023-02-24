<x-layout title="Dashboard">

  @section('body')
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2>Receitas</h2>
      </div>
      <div class="col-md-4" >
      </div>
      <div class="col-md-4">
        <a style="margin-left: 60%;" type="button" href="{{ route('addReceitas')}}" class="btn btn-primary">Adicionar receita</a>
      </div>
    </div>
    <div class="row">
      <table class="styled-table">
        <thead>
            <tr>
                <th>Origem</th>
                <th>Valor</th>
                <th>Tipo de renda</th>
                <th>Frequência</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($incomes as $income)
            <tr>
                <td>{{ $income->name }}</td>
                <td>R$ {{ $income->value }}</td>
                <td>{{ $income->income_type }}</td>
                <td>{{ $income->frequency }}</td>
                <td><a class="btn" style="color: #6F8F72;" type="button" href="{{ route('editReceitas', ['id' => $income->id]) }}">Editar</a><i class="fa-regular fa-pen-to-square"></i></td>
            </tr>
          @endforeach
            <!-- and so on... -->
        </tbody>
    </table>
    </div>
  </div>
  <style>
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
        background-color: #6F8F72;
        border-radius: 100%;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
      
      padding: 12px 15px;
    }
    .styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
    }
    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #6F8F72;
    }
    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
  </style>
  @endsection('body')

  

</x-layout>