<?php

namespace App\Libraries\Repositories;


use App\Models\Comentarios;
use Illuminate\Support\Facades\Schema;

class ComentariosRepository
{

	/**
	 * Returns all Comentarios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Comentarios::all();
	}

	public function search($input)
    {
        $query = Comentarios::query();

        $columns = Schema::getColumnListing('comentarios');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Comentarios into database
	 *
	 * @param array $input
	 *
	 * @return Comentarios
	 */
	public function store($input)
	{
		return Comentarios::create($input);
	}

	/**
	 * Find Comentarios by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Comentarios
	 */
	public function findComentariosById($id)
	{
		return Comentarios::find($id);
	}

	/**
	 * Updates Comentarios into database
	 *
	 * @param Comentarios $comentarios
	 * @param array $input
	 *
	 * @return Comentarios
	 */
	public function update($comentarios, $input)
	{
		$comentarios->fill($input);
		$comentarios->save();

		return $comentarios;
	}
}