<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\IncomeRepository;

/**
 * Classe de serviço utilizada para abstrair do controller a responsabilidade de realizar chamadas para
 * métodos do repositório e tratar regras de negócio.
 *
 * @package Users
 * @author  Matheus taffe <matheus.taffe@hotmail.com>
 */
class IncomeService extends BaseService
{
    private IncomeRepository $incomeRepository;

    /**
     * __construct
     *
     * @param  UserRepository $userRepository
     * @return void
     */
    public function __construct(IncomeRepository $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
    }
}