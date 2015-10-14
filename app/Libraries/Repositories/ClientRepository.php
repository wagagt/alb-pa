<?php

namespace App\Libraries\Repositories;


use App\Models\Client;
use Illuminate\Support\Facades\Schema;

class ClientRepository
{

	/**
	 * Returns all Clients
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Client::all();
	}

	public function search($input)
    {
        $query = Client::query();

        $columns = Schema::getColumnListing('clients');
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
	 * Stores Client into database
	 *
	 * @param array $input
	 *
	 * @return Client
	 */
	public function store($input)
	{
		return Client::create($input);
	}

	/**
	 * Find Client by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Client
	 */
	public function findClientById($id)
	{
		return Client::find($id);
	}

	/**
	 * Updates Client into database
	 *
	 * @param Client $client
	 * @param array $input
	 *
	 * @return Client
	 */
	public function update($client, $input)
	{
		$client->fill($input);
		$client->save();

		return $client;
	}
}