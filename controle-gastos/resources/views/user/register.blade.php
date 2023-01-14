<x-layout title="Novo Usuário">

    @section('body')
        
            <div class="container">
                <form action="/user/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
            
    @endsection
    
</x-layout>