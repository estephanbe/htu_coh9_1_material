<?php

namespace Core\Controller;

class Items
{

    function __construct()
    {
        echo 'hi from construct <br>';
    }

    /**
     * Get all items
     *
     * @return void
     */
    public function index()
    {
        echo "hi from items.index";
    }

    /**
     * Get single items
     *
     * @return void
     */
    public function single()
    {
        echo "hi from items.single";
    }

    /**
     * Creates an item
     *
     * @return void
     */
    public function create()
    {
        echo "hi from items.create";
    }

    /**
     * Updates an item
     *
     * @return void
     */
    public function update()
    {
        echo "hi from items.update";
    }

    /**
     * deletes an item
     *
     * @return void
     */
    public function delete()
    {
        echo "hi from items.delete";
    }
}
