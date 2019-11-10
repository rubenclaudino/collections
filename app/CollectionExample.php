<?php


namespace App;


use function foo\func;

class CollectionExample
{
    public function example()
    {
       $collection = collect([10, 20, 50]);

       return $collection->diffUsing([.1, .25], function ($a, $b){

       });
    }

    public function diffKeys_test()
    {
        $collection = collect([10 => 'apple', 20 => 'banana']);

        return $collection->diffKeys([30 => 'pears', 20 => 'bananas']);
    }

    public function diffAssoc_test()
    {
        $collection = collect([10 => 'apple', 20 => 'banana']);

        return $collection->diffAssoc([30 => 'pears', 21 => 'banana']);
    }

    public function diff_test()
    {
        $collection = collect([1, 2, 3]);

        return $collection->diff([1, 2]);
    }

    public function crossJoin_test()
    {
        $collection = collect(['Mustang', 'GT', 'F150']);

        return $collection->crossJoin(
            ['automatic', 'manual'],
            ['blue', 'red', 'white', 'black', 'yellow'],
            ['2018', '2019'])->count();
    }

    public function count_test()
    {
        $data = [
            1,
            2 => [5, 6],
            3,
            4,
            'seven'
        ];

        return collect($data)->count();
    }

    public function containsStrict_test()
    {
        return collect([
            ['0035']
        ])
            ->contains(35);
    }

    public function contains_test()
    {
        return collect([
            [1, 2, 3, 4, 5]
        ])
            ->contains(function ($value, $key){
            return $value > 4;
        });
    }

    // CONCAT IGNORES KEYS
    public function concat_test()
    {
        $data = collect(['value1']);

        return $data->concat(['value2']);
    }

    public function combine_test()
    {
        $keys = collect(['column1', 'column2', 'column3']);

        return collect($keys)->combine(['val1', 'val2', 'val3']);
    }

    public function chunk_test()
    {
        $data = [
            ['id' => 1, 'price' => 10, 'tax' => 1, 'active' => true],
            ['id' => 2, 'price' => 30, 'tax' => 3, 'active' => false],
            ['id' => 3, 'price' => 44, 'tax' => 4, 'active' => true],
            ['id' => 4, 'price' => 56, 'tax' => 5, 'active' => false],
            ['id' => 5, 'price' => 64, 'tax' => 6, 'active' => true],
            ['id' => 6, 'price' => 76, 'tax' => 7, 'active' => false],
            ['id' => 7, 'price' => 88, 'tax' => 8, 'active' => true]
        ];

        return collect($data)->chunk(3);
    }

    public function collapse_test()
    {
        $data = [
            ['id' => 1, 'price' => 10, 'tax' => 1, 'active' => true],
            ['id' => 2, 'price' => 30, 'tax' => 2, 'active' => false],
            ['id' => 3, 'price' => 50, 'tax' => 3, 'active' => true]
        ];

        return collect($data)->collapse();
    }

    public function median_test()
    {
        $data = [
            ['price' => 10, 'tax' => 1, 'active' => true],
            ['price' => 30, 'tax' => 2, 'active' => false],
            ['price' => 50, 'tax' => 3, 'active' => false]
        ];

        return collect($data)->median(function ($value) {

            if ($value['active'] === false) {
                return null;
            }

            return $value['price'] + $value['tax'];

        });
    }

    public function average_test()
    {
        $data = [
            ['price' => 10, 'tax' => 1, 'active' => true],
            ['price' => 30, 'tax' => 2, 'active' => false],
            ['price' => 50, 'tax' => 3, 'active' => false]
        ];

        return collect($data)->average(function ($value) {

            if ($value['active'] === false) {
                return null;
            }

            return $value['price'] + $value['tax'];

        });
    }

    public function max_test()
    {
        $data = [
            ['price' => 10, 'tax' => 1, 'active' => true],
            ['price' => 30, 'tax' => 2, 'active' => false],
            ['price' => 50, 'tax' => 3, 'active' => true]
        ];

        return collect($data)->max(function ($value) {

            if ($value['active'] === false) {
                return null;
            }

            return $value['price'] + $value['tax'];

        });
    }

    public function min_test()
    {
        $data = [
            ['price' => 10, 'tax' => 1, 'active' => true],
            ['price' => 30, 'tax' => 2, 'active' => false],
            ['price' => 50, 'tax' => 3, 'active' => true]
        ];

        return collect($data)->min(function ($value) {

            if ($value['active'] === false) {
                return null;
            }

            return $value['price'] + $value['tax'];

        });
    }
}
