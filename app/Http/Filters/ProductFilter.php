<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const CATEGORY_ID = 'category_id';
    public const SORT = 'sort';
    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::SORT => [$this, 'sort'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }
    public function sort(Builder $builder, $value)
    {
        match ((int) $value) {
            1 => $builder->latest('created_at'), // По дате добавления
            2 => $builder->orderBy('sold','desc'), // По популярности
            3 => $builder->orderBy('price', 'asc'), // Цена ↑
            4 => $builder->orderBy('price', 'desc'), // Цена ↓
            5 => $builder->orderBy('title', 'asc'), // Название А-Я
            6 => $builder->orderBy('title', 'desc'), // Название Я-А
            default => $builder->latest('created_at'),
        };
    }
}
