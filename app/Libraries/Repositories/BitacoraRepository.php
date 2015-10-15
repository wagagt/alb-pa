<?php

namespace App\Libraries\Repositories;


use App\Models\Bitacora;
use Illuminate\Support\Facades\Schema;

class BitacoraRepository
{

	/**
	 * Returns all Bitacoras
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Bitacora::all();
	}

	public function search($input)
    {
        $query = Bitacora::query();

        $columns = Schema::getColumnListing('bitacoras');
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
	 * Stores Bitacora into database
	 *
	 * @param array $input
	 *
	 * @return Bitacora
	 */
	public function store($input)
	{
		return Bitacora::create($input);
	}

	/**
	 * Find Bitacora by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Bitacora
	 */
	public function findBitacoraById($id)
	{
		return Bitacora::find($id);
	}

	/**
	 * Updates Bitacora into database
	 *
	 * @param Bitacora $bitacora
	 * @param array $input
	 *
	 * @return Bitacora
	 */
	public function update($bitacora, $input)
	{
		$bitacora->fill($input);
		$bitacora->save();

		return $bitacora;
	}
}