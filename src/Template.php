<?php

namespace Addgod\NovaTemplateField;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Select;

class Template extends Select
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-template-field';

    public function fillField($fill)
    {
        return $this->withMeta([
            'fillField' => str_replace(' ', '_', Str::lower($fill)),
        ]);
    }

    public function templates(array $templates)
    {
        return $this->withMeta([
            'templates' => $templates,
        ]);
    }
}
