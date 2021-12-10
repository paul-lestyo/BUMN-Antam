<?php

namespace App\Services;

use Illuminate\Support\Str;

class UploadService
{
	public function uploadToPublicPath($file, $folder)
	{
		$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$newImageName = time() . '_' . Str::slug($filename) . '.' . $file->extension();
		$file->move(public_path($folder), $newImageName);
		return $folder . $newImageName;
	}
}
