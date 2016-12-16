<?php

namespace App;
use Illuminate\Support\Facades\App;

class AwsUploader{
	public static function up($key, $path){
		$s3 = App::make('aws')->createClient('s3');
		$result = $s3->putObject([
			'Bucket'     => 'linker',
    		'Key'        => $key,
    		'SourceFile' => $path
		]);
		return $result;
	}
}