<?php

namespace App\Repositories\Master;

use App\Models\Master\Pegawai;

class PegawaiRepository
{
	protected $pegawai;

	public function __construct(Post $pegawai)
	{
        //Instance model User ke dalam property user
	    $this->pegawai = $pegawai;
    }

    public function getAll()
    {
        return $this->pegawai->all();
    }

    public function getData()
    {
        return $this->pegawai->get();
    }
    
    public function getPaginate($per_page)
    {
        return $this->pegawai->orderBy('created_at', 'DESC')->paginate($per_page);
    }

	public function find($id)
	{
		return $this->pegawai->find($id);
	}

	public function findBy($column, $data)
	{
		return $this->pegawai->where($column, $data)->get();
    }

    public function getPegawaiNotHaveUser($match)
	{
        if (!empty($match)) {
            $data = Pegawai::select("id","nama","nip")
                ->where('name','LIKE',"%$match%")
                ->orWhere('nip','LIKE',"%$match%")
                ->whereNull('user_id')
                ->get()
            ;
        }

        $data = Pegawai::select("id","nama","nip")
            ->whereNull('user_id')
            ->get()
        ;
        
		return $data;
    }
    
    /**
     * Delete item by primary key id.
     * 
     * @param  Integer $id integer of primary key id.
     * @return boolean
     */
    public function delete($id)
    {
        return $this->pegawai->destroy($id);
    }
}