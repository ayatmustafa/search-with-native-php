<?php
namespace App\Services;

use App\Repositories\DataAdaptor;

class DataAdapterService{
    public $dataAdaptor;
    public function __construct(DataAdaptor $dataAdaptor)
    {
        $this->dataAdaptor = $dataAdaptor;   
    }
    public function search($created, $language, $per_page, $sort)
    {
        $url = $this->dataAdaptor->url();
        if($created)
        {
            $url=$url."created=".$created;
        }
        if($language)
        {
            $url=$url."+language:".$language;	
        }
        if($per_page)
        {
            $url=$url."&per_page=".$per_page;	
        }
        if($sort)
        {
            $url=$url."&sort=".$sort;	
        }
        return $url;
    }

}