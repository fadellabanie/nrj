<?php

/**
 * Get list of languages
 */

use Carbon\Carbon;
use App\Models\City;
use App\Models\View;
use App\Models\Country;
use App\Models\ContractType;
use App\Models\RealestateType;
use App\Models\Package;
use App\Models\RealEstate;
use Illuminate\Support\Facades\Storage;


if (!function_exists('userType')) {
	function userType($type)
	{
		if ($type == 'personal') {
			return '<div class="badge badge-light-success fw-bolder">' . __("Personal") . '</div>';
		} elseif ($type == 'company') {
			return '<div class="badge badge-light-info fw-bolder">' . __("Company") . '</div>';
		} elseif ($type == 'admin') {
			return '<div class="badge badge-light-warning fw-bolder">' . __("admin") . '</div>';
		}
	}
}
if (!function_exists('userStatus')) {
	function userStatus($type)
	{
		if ($type == true) {
			return '<div class="badge badge-light-success fw-bolder">' . __("Active") . '</div>';
		} elseif ($type == false) {
			return '<div class="badge badge-light-danger fw-bolder">' . __("Freeze") . '</div>';
		}
	}
}
if (!function_exists('realEstatesType')) {
	function realEstatesType($type)
	{
		if ($type == 'normal') {
			return '<div class="badge badge-light-info fw-bolder">' . __("Normal") . '</div>';
		} elseif ($type == 'special') {
			return '<div class="badge badge-light-warning fw-bolder">' . __("Special") . '</div>';
		}
	}
}
if (!function_exists('users')) {
	function users()
	{
		dd( [
			[
				'name' => 'admin',
			],
			[
				'name' => 'personal',
			],
			[
				'name' => 'company',
			],
		]);
	}
}
if (!function_exists('uploadToPublic')) {
	function uploadToPublic($folder, $image)
	{
		return 'uploads/' . Storage::disk('public_new')->put($folder, $image);
	}
}

if (!function_exists('isActive')) {
	function isActive($type,$end_date="")
	{

		if ($type == 1 || $end_date >= now()) {
			return '<div class="badge badge-light-success fw-bolder">' . __("Active") . '</div>';
		} else{
			return '<div class="badge badge-light-danger fw-bolder">' . __("Not Active") . '</div>';
		}
	}
}

if (!function_exists('review')) {
	function review($type)
	{

		if ($type == 1) {
			return '<div class="badge badge-light-success fw-bolder">' . __("Reviewed") . '</div>';
		} elseif ($type == 0) {
			return '<a href="#" class="badge badge-light-danger fw-bolder">' . __("Not Review") . '</a>';
		}
	}
}




/**
 * Upload
 */
if (!function_exists('upload')) {
	function upload($file, $path)
	{
		$baseDir = 'uploads/' . $path;

		$name = sha1(time() . $file->getClientOriginalName());
		$extension = $file->getClientOriginalExtension();
		$fileName = "{$name}.{$extension}";

		$file->move(public_path() . '/' . $baseDir, $fileName);

		return "{$baseDir}/{$fileName}";
	}
}
