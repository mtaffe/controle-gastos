<?php

namespace App\Repositories;

use App\Models\Income;

/**
 * Classe de serviço utilizada para abstrair do controller a responsabilidade de realizar chamadas para
 * métodos do repositório e tratar regras de negócio.
 *
 * @package Users
 * @author  Matheus taffe <matheus.taffe@hotmail.com>
 */
class IncomeRepository extends BaseRepository
{
     /**
     * __construct
     *
     * @param  Subject $model
     * @return void
     */
    public function __construct(Income $model)
    {
        $this->model = $model;
    }
}