<?php

namespace App\Repositories;

use App\Repositories\DataAdaptor;

class GitRepository implements DataAdaptor{
    public function URL() {
        return "https://api.github.com/search/repositories?q=";
    }
}