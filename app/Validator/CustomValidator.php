<?php namespace App\Validator;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator {

  /**
  *メールアドレスがOICドメインであるか
  */
  public function validateOic($attribute, $value, $parameters, $validator){
      $explode = explode('@', $value);
      $value = $explode[ count($explode) -1 ];
      return $value === 'oic.jp' || $value === 'oic.ac.jp';
  }

}
