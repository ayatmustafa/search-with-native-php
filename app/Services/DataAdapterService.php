<?php
namespace App\Services;

use App\Repositories\DataAdaptorInterface;

class DataAdapterService{
    public $dataAdaptor;
    public function __construct(DataAdaptorInterface $dataAdaptor)
    {
        $this->dataAdaptor = $dataAdaptor;   
    }
    public function gitRepositories( $inputs) 
    {
        return  $this->dataAdaptor->getData($inputs) ;
    }
}