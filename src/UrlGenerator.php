<?php

namespace LaravelTrailingSlash;

use Illuminate\Routing\UrlGenerator as BaseUrlGenerator;

class UrlGenerator extends BaseUrlGenerator
{

  public function route($name, $parameters = [], $absolute = true)
  {
    $route = parent::route($name, $parameters, $absolute);
    if (!str_start($name, 'frontend.')) {
      return $route;
    }

    $route_query_pie = explode('?', $route);
    $route_query_pie[0] .= '/';
    return implode('?', $route_query_pie);
  }
}
