<?php namespace App\Validator;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator {

  /**
  *メールアドレスがOICドメインであるか
  */
  public function validateOic($attribute, $value, $parameters, $validator){
      $explode = explode('@', $value);
      $value = $explode[ count($explode) -1 ];
      return strpos($value,'oic.jp') !== false || strpos($value,'oic.ac.jp') !== false;
  }

}
