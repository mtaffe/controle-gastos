<?php

namespace App\Services;

class BaseService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * Listagem de entidades
     *
     * @return object
     */
    public function findAll(): object
    {
        return $this->repository->findAll();
    }

    /**
     * Cadastro de nova entidade.
     *
     * @param  array $attributes Dados da entidade que será persistida no BD
     * @return object
     */
    public function create(array $attributes): object
    {
        if (!empty($attributes['created_by'])) {
            $attributes['updated_by'] = $attributes['created_by'];
        }

        return $this->repository->create($attributes);
    }

    /**
     * Lista os dados de determinada entidade.
     *
     * @param  int $id Identificador único do que será buscado.
     *
     * @return object
     */
    public function findOne(int $id): object
    {
        return $this->repository->findOne($id);
    }

    /**
     * Atualiza os dados da entidade.
     *
     * @param  int $id Identificador único do que será buscado
     * @param  array $attributes Dados que serão atualizados
     *
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        return $this->repository->update($id, $attributes);
    }
    
     /**
     * Exclusão da entidade (lógica ou não)
     *
     * @param  int $id Identificador único do que será buscado
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}