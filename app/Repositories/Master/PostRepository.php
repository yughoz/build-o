<?php

namespace App\Repositories\Master;

//PANGGIL MODEL USER
use App\Models\Master\Post;

class PostRepository
{
	protected $post;

	public function __construct(Post $post)
	{
        //Instance model User ke dalam property user
	    $this->post = $post;
    }

    public function getLastPost()
    {
        return $this->post->latest()->first();
    }

    public function getData()
    {
        return $this->post->get();
    }
    
    public function getPaginate($per_page)
    {
        return $this->post->orderBy('created_at', 'DESC')->paginate($per_page);
    }

	public function find($id)
	{
		return $this->post->find($id);
	}

	public function findBy($column, $data)
	{
		return $this->post->where($column, $data)->get();
	}
}