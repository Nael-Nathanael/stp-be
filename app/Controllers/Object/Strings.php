<?php

namespace App\Controllers\Object;

use App\Controllers\BaseController;
use App\Models\STPStrings;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class Strings extends BaseController
{
    /**
     * @throws ReflectionException
     */
    public function update($key): ResponseInterface
    {
        $lang = currLang();

        /**
         * @var STPStrings $strings
         */
        $strings = model("STPStrings");
        $string = $strings->getOrCreateByKey($key);

        $json = $this->request->getJSON();
        $string->$lang = $json->value;
        $strings->save($string);
        return $this->response->setJSON(
            $strings->getOrCreateByKey($key)
        );
    }

    public function get(): ResponseInterface
    {
        /**
         * @var STPStrings $strings
         */
        $strings = model("STPStrings");

        /**
         * @type string[] $post
         */
        $post = $this->request->getJSON();

        /**
         * @type string[] $result
         */
        $result = [];

        foreach ($post as $key) {
            $result[$key] = $strings->getOrCreateByKey($key, true);
        }

        return $this->response->setJSON($result);
    }
}
