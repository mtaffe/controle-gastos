<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * Classe de serviço utilizada para abstrair do controller a responsabilidade de realizar chamadas para
 * métodos do repositório e tratar regras de negócio.
 *
 * @package Users
 * @author  Matheus taffe <matheus.taffe@hotmail.com>
 */
class UserService extends BaseService
{
    private UserRepository $userRepository;

    /**
     * __construct
     *
     * @param  UserRepository $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}