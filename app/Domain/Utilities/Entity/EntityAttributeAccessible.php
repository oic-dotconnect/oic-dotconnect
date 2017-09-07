<?php

namespace App\Domain\Utilities\Entity;

use App\Domain\Common\Student\StudentRepository;
use Exception;

trait EntityAttributeAccessible
{
    protected $attribute_data = [];
    protected $repository_data = [];
    protected $attributes = [];
    protected $fillable = [];
    protected $repositories = [];

    public function __construct(array $aryData = [], array $aryRepository = [])
    {
        $this->fill($aryData);
        $this->setRepositories($aryRepository);
    }

    // use先のfillableでフィルタした項目のみで作成
    public function fill(array $aryData)
    {
        foreach ($this->fillable as $strName) {
            if (array_key_exists($strName, $aryData)) {
                $this->$strName = $aryData[$strName];
            }
        }
    }

    // use先のrepositoriesで指定したもののみ追加
    public function setRepositories($aryRepository)
    {
        $setRepositories = [];
        foreach ($aryRepository as $repository) {
            $repositoryPath = get_class($repository);
            if (!in_array($repositoryPath, $this->repositories)) break;
            $this->repository_data[$repositoryPath] = $repository;
            $setRepositories[] = $repositoryPath;
        }
        $notIncludeRepositories = array_diff($this->repositories, $setRepositories);

        if(count($notIncludeRepositories) > 0) {
            throw new Exception("必要とされているリポジトリが入っていません。". implode(',', $notIncludeRepositories));
        }
    }

    public function getRepository($repositoryPath) {
        if(!array_key_exists($repositoryPath, $this->repository_data)) {
            throw new Exception($repositoryPath." はrepository_dataに存在しません");
        }
        return $this->repository_data[$repositoryPath];
    }

    public function __set($strName, $mxdValue)
    {
        if (in_array($strName, $this->identifierKeys)) {
            throw new Exception("SET ".$strName." は識別子に利用されているため、書き換えることはできません");
        }

        //use先でフィールド名が存在しているか
        if (!in_array($strName,$this->attributes)) {
            throw new Exception("SET Entityに ".$strName." が存在していない");
        }

        // set+フィールド名+Attribute の関数が定義されている場合はそちらを呼び出す
        $strMethod = $this->toMethodName('set',$strName);
        if (method_exists($this, $strMethod)){
            return $this->$strMethod($mxdValue);
        }

        $this->attribute_data[$strName] = $mxdValue;
    }

    public function __get($strName)
    {
        //use先でフィールド名が存在しているか
        if (!in_array($strName,$this->attributes)) {
            throw new Exception("GET Entityに ".$strName." が存在していない");
        }

        // get+フィールド名+Attribute の関数が定義されている場合はそちらを呼び出す
        $strMethod = $this->toMethodName('get',$strName);
        if(method_exists($this, $strMethod)){
            return $this->$strMethod();
        }

        // 関数が定義されていないフィールドがあれば取り出す
        if (array_key_exists($strName, $this->attribute_data)) {
            return $this->attribute_data[$strName];
        }

        return null;
    }

    // attribute_dataにまとめて保存してあるフィールド情報にセットする
    public function setRawData ($strName, $mxdValue)
    {
        $this->attribute_data[$strName] = $mxdValue;
    }

    // attribute_dadaにまとめて保存してあるフィールド情報から取り出す
    public function getRawData ($strName)
    {
        if( !isset( $this->attribute_data[$strName])){
            return null;
        }
        return $this->attribute_data[$strName];
    }

    // 渡されたフィールド名をメソッド名に変換する
    public function toMethodName($strPrefix, $strName)
    {
        // メソッド名のスネークケースごとの単語の頭文字を大文字に
        $strName = ucwords($strName, '_');
        // メソッドの処理名+スネークケースの_を消しキャメルケースへ変換+Attribueをつける
        return $strPrefix. str_replace('_', '', $strName) . "Attribute";
    }

    // 持っている全てのデータを出す
    public function toArray(){
        $aryData = [];
        foreach( array_keys($this->attribute_data) as $strName){
            // getterを経由して取得
            $aryData[$strName] = $this->$strName;
        }
        return $aryData;
    }
}