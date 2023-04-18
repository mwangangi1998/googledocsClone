<?php
namespace App\Helpers\Routes;

class RoutesHelper
{
public static function includeRouteFiles(String $folder)
{
 /*@var \RecursiveIteratorIterator |\RecursiveIteratorIterator
/**
 *
 */
    $dirItarator=new \RecursiveDirectoryIterator($folder);
    $It=new \RecursiveIteratorIterator($dirItarator);


            // require the  file by looping in dir
            while ($It->valid()) {
                if (!$It->isDot()
                    && $It->isFile()
                    && $It->isReadable()
                    && $It->current()->getExtension() === 'php'
                ) {
                    require $It->key();
                }

                $It->next();
            }


}
}
