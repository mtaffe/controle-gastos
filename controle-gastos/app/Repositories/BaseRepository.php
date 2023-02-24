<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Repository responsável por realizar as operações básicas de CRUD genéricos.
 *
 * Métodos implementados para listagem completa, listagem específica, criação, atualização, reativação e delete (lógico).
 *
 * @package Bases
 * @author  Marcos Medeiros <marcos.medeiros@deliverit.com.br>
 */
class BaseRepository
{
    /**
     * Model que será utilizado para buscar as entidades
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Campos que serão exibidos na listagem
     *
     * @var array
     */
    protected array $fieldsToShow = ['*'];

    /**
     * Campos que serão exibidos na lista
     *
     * @var array
     */
    protected array $listFields = [
        'id',
        'name',
    ];

    /**
     * __construct
     *
     * @param  $model
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Listagem de entidades utilizando filtros e paginação.
     *
     * @param \App\Classes\QueryBuilder\Sort|array $sort
     * @param \App\Classes\QueryBuilder\Filter $filter
     * @param int $perPage
     * @param bool $withTrashed Se deve retornar registros excluidos ou não
     * @param array $with Tabelas relacionadas que devem ser retornadas
     *
     * @return object
     */
    public function findAll(): object
    {
        return $this->model->all();
    }

    /**
     * Cadastro de nova entidade.
     *
     * @param  array $attributes Dados da entidade que será persistida no BD
     * @return object
     */
    public function create(array $attributes): object
    {
        return $this->model->create($attributes);
    }

    /**
     * Lista os dados de determinada entidade.
     *
     * @param  int $id Identificador único do que será buscado.
     * @param  array $with Tabelas relacionadas que devem ser retornadas
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @return object
     */
    public function findOne(int $id): object
    {
        $model = $this->model
            ->whereId($id)
            ->first();

        if (empty($model)) {
            throw new ModelNotFoundException('Não foi possível encontrar o registro', 404);
        }

        return $model;
    }

    /**
     * Atualiza os dados da entidade.
     *
     * @param  int $id Identificador único do que será buscado
     * @param  array $attributes Dados que serão atualizados
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        $model = $this->findOne($id);

        return $model->update($attributes);
    }

    /**
     * Exclusão da entidade (lógica ou não)
     *
     * @param  int $id Identificador único do que será buscado
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        $model = $this->findOne($id);

        return $model->delete();
    }
}