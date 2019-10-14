<?php

namespace Addgod\NovaTemplateField;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Select;

class Template extends Select
{
    /**
     * Do not show this component on index pages.
     *
     * @var bool
     */
    public $showOnIndex = false;

    /**
     * Do not show this component on detail.
     *
     * @var bool
     */
    public $showOnDetail = false;

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
