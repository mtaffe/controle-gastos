<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Classe de serviço utilizada para abstrair do controller a responsabilidade de realizar chamadas para
 * métodos do repositório e tratar regras de negócio.
 *
 * @package Users
 * @author  Matheus taffe <matheus.taffe@hotmail.com>
 */
class UserRepository extends BaseRepository
{
     /**
     * __construct
     *
     * @param  Subject $model
     * @return void
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}