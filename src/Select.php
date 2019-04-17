<?php

namespace Jobcerto\NovaAddMore;

use Laravel\Nova\Fields\Select as NovaSelect;

class Select extends NovaSelect
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-add-more';

    public function addMore($resource, $size = 'w-4/5')
    {
        return $this->withMeta([
            'addMore' => [
                'visible'      => true,
                'size'         => $size,
                'resourceName' => strtolower(str_plural(class_basename($resource))),
            ],
        ]);
    }
}
