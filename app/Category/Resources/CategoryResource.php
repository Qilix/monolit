<?php

namespace App\Category\Resources;


class CategoryResource
{
    public int $id;

    public string $name;

    public ?int $parent_id;

    public ?array $products;
}
