<?php

namespace App\Libraries\Repositories;


use App\Models\Usuarios;
use Illuminate\Support\Facades\Schema;

class UsuariosRepository
{

	/**
	 * Returns all Usuarios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Usuarios::all();
	}

	public function search($input)
    {
        $query = Usuarios::query();

        $columns = Schema::getColumnListing('usuarios');
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
	 * Stores Usuarios into database
	 *
	 * @param array $input
	 *
	 * @return Usuarios
	 */
	public function store($input)
	{
		return Usuarios::create($input);
	}

	/**
	 * Find Usuarios by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Usuarios
	 */
	public function findUsuariosById($id)
	{
		return Usuarios::find($id);
	}

	/**
	 * Updates Usuarios into database
	 *
	 * @param Usuarios $usuarios
	 * @param array $input
	 *
	 * @return Usuarios
	 */
	public function update($usuarios, $input)
	{
		$usuarios->fill($input);
		$usuarios->save();

		return $usuarios;
	}
}