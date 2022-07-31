<?php

namespace App\Resolvers;

use App\Services\IsinExcelExportService;
use App\Services\IsinXmlExportService;
use Illuminate\Support\Arr;

class RouteExportResolver
{
    /**
     * @throws \Exception
     */
    public static function resolveExportByRoute()
    {
        $resource = Arr::get(self::mapResource(), app()->request->type);

        if(!$resource) {
            abort(404);
        }

        return $resource;

    }

    public static function mapResource(): array
    {
        return [
            'excel' => new IsinExcelExportService(),
            'xml' => new IsinXmlExportService()
        ];
    }
}
