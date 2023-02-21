<?php
namespace Manta\LaravelUsers\Traits;

trait WithSorting
{
    public $sortBy = '';
    public $sortDirection = 'asc';

    /**
     * @param mixed $field
     * @return void
     */
    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';
        $this->sortBy = $field;
    }

    /** @return string  */
    public function reverseSort() :string
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
}
