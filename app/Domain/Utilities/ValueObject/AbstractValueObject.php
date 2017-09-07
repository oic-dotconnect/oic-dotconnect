<?php

namespace App\Domain\Utilities\ValueObject;

use Exception;
use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;
use ReflectionFunction;

abstract class AbstractValueObject implements ValueObjectInterface
{
    protected $rules =[];
    private $validates = [];

    public function __construct(array $data)
    {
        /* VOの項目でnullは許されないので
         * $dataにVOの全項目が入っているかの判定
        */
        $this->checkArgsDataComplete($data);

        foreach ($this as $key=>$value) {
            $this->{$key} = array_get($data, $key, $value);
        }

        $this->setUpValidate();
        /*
         * データが正しいかの判定
        */
        $this->acceptValidator($data);
    }

    private function checkArgsDataComplete($data)
    {
        $parentKeys = array_keys(get_class_vars(self::class));
        $myKeys = array_keys($this->toArray());
        $keys1 = array_diff($myKeys, $parentKeys);
        $keys2 = array_keys($data);
        $diff_key = array_diff_assoc($keys1, $keys2);

        if(count($diff_key) > 0) {
            $keys = array_keys($diff_key);
            throw new Exception('The following items are missing. ' . implode(',', $keys));
        }
    }

    private function acceptValidator($data)
    {
        /* @var Factory $factory */
        $factory = app(Factory::class);
        $validator = $factory->make($data, $this->rules);
        if(!$validator->passes()) {
            throw new ValidationException($validator);
        }

        $errors = [];
        foreach ($this->validates as $key => $validate) {
            $func = new ReflectionFunction($validate);
            $parameters = $func->getParameters();
            $params = [];
            foreach($parameters as $parameter)
            {
                $params[] = app($parameter->getClass()->name);
            }
            if(!$func->getClosure()->call($this, $params)) throw new Exception('バリデーションエラー ' . $key);
        }
    }

    protected function setValidate($key, $func)
    {
        $this->validates[$key] = $func;
    }

    public function toArray():array
    {
        $data = [];
        foreach ($this as $key => $value) {
                $data[$key] = $value;
        }
        return $data;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

}