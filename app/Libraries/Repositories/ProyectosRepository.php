<?php

namespace App\Libraries\Repositories;


use App\Models\Proyectos;
use Illuminate\Support\Facades\Schema;

class ProyectosRepository
{

	/**
	 * Returns all Proyectos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Proyectos::all();
	}

	public function search($input)
    {
        $query = Proyectos::query();

        $columns = Schema::getColumnListing('proyectos');
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
	 * Stores Proyectos into database
	 *
	 * @param array $input
	 *
	 * @return Proyectos
	 */
	public function store($input)
	{
		return Proyectos::create($input);
	}

	/**
	 * Find Proyectos by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Proyectos
	 */
	public function findProyectosById($id)
	{
		return Proyectos::find($id);
	}

	/**
	 * Updates Proyectos into database
	 *
	 * @param Proyectos $proyectos
	 * @param array $input
	 *
	 * @return Proyectos
	 */
	public function update($proyectos, $input)
	{
		$proyectos->fill($input);
		$proyectos->save();

		return $proyectos;
	}
}