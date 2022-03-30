<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Exception;

function batchChangeDomain(Request $request)
{
	// 批量更換域名  Android URL ,iOS URL ,Other URL
	$message = 'ok';
	$status_code = 200;

	DB::beginTransaction();
	try {
		$new_domain = Request::get('new_domain', NULL);
		if (is_null($new_domain)) {
			throw new Exception('missing new_domain argument.');
		}
		$old_domain = Request::get('old_domain', NULL);
		if (is_null($old_domain)) {
			throw new Exception('missing old_domain argument.');
		}

		// 縮網址設定
		$datas = ShorturlSetting::all();
		foreach ($datas as $data) {
			$pat = '/[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+\.?/';
			try {
				if (!is_null($data->android_url)) {
					preg_match($pat, $data->android_url, $matches_android_url);
					if ($matches_android_url[0] == $old_domain) {
						$new_android_url = preg_replace($pat, $new_domain, $data->android_url);
						$data->android_url = $new_android_url;
						$data->save();
					}
				}
				if (!is_null($data->ios_url)) {
					preg_match($pat, $data->ios_url, $matches_ios_url);
					if ($matches_ios_url[0] == $old_domain) {
						$new_ios_url = preg_replace($pat, $new_domain, $data->ios_url);
						$data->ios_url = $new_ios_url;
						$data->save();
					}
				}
				if (!is_null($data->other_url)) {
					preg_match($pat, $data->other_url, $matches_other_url);
					if ($matches_other_url[0] == $old_domain) {
						$new_other_url = preg_replace($pat, $new_domain, $data->other_url);
						$data->other_url = $new_other_url;
						$data->save();
					}
				}
			} catch (Exception $e) {
				$message = 'replace error';
				$status_code = 500;
			}
		}
	} catch (Exception $e) {
		$message = 'unknow error';
		$status_code = 500;
	}
	DB::commit();

	return response()->json([
		'message' => $message,
	], $status_code);
}
