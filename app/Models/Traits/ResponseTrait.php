<?php

namespace App\Models\Traits;

trait ResponseTrait
{
    public function responseSuccess($params = [])
	{
		$default = [
			'code'    => 200,
			'status'  => true,
			'message' => 'Success',
		];

		if (is_string($params)) {
			$default['message'] = $params;
			$params = [];
		}

		$data = array_merge($default, $params);
		return response()->json($data);
	}

	public function responseStateStill($params = [])
	{
		$default = [
			'code'    => 300,
			'status'  => true,
			'message' => 'Success',
		];

		if (is_string($params)) {
			$default['message'] = $params;
			$params = [];
		}

		$data = array_merge($default, $params);
		return response()->json($data, $data['code']);
	}
	
	public function responseError($params = [])
	{
		$default = [
			'code'    => 500,
			'status'  => false,
			'message' => 'Error',
		];

		if (is_string($params)) {
			$default['message'] = $params;
			$params = [];
		}

		$data = array_merge($default, $params);

		if (!empty($data['errors']) && is_string($data['errors'])) {
			if (strpos($data['errors'], 'MESSAGE--', 0) !== false) {
				$data['message'] = trim(str_replace('MESSAGE--', '', $data['errors']));
				$data['errors'] = [];
			}
		}
		return response()->json($data, $data['code']);
	}

	// Select2
	public function responseSelect2($items, $text, $id = 'id')
	{
		$results = [];
		$more = false;
		foreach ($items as $item) {
			$results[] = ['id' => $item->$id, 'text' => $item->$text];
		}
		if (method_exists($items, 'hasMorePages')) {
			$more = $items->hasMorePages();
		}
		return response()->json(compact('results', 'more'));
	}

	public function responseSelect2ProcedureAudit($items, $text, $id = 'id')
	{
		$results = [];
		$more = false;
		foreach ($items as $item) {
			$results[] = ['id' => $item->$id, 'text' => $item->procedureAudit->procedure];
		}
		if (method_exists($items, 'hasMorePages')) {
			$more = $items->hasMorePages();
		}
		return response()->json(compact('results', 'more'));
	}

	// Transaction
	public function beginTransaction()
	{
		\DB::beginTransaction();
	}

	public function commit($params = [])
	{
		\DB::commit();
		$message = __('base.success.saved');
		return $this->responseSuccess(array_merge(compact('message'), $params));
	}

	public function rollback($params = [])
	{
		\DB::rollback();
		return $this->responseError($params);
	}

	// Saved
	public function commitSaved($params = [])
	{
		\DB::commit();
		$message = __('base.success.saved');
		return $this->responseSuccess(array_merge(compact('message'), $params));
	}

	public function commitStateStill($params = [])
	{
		\DB::commit();
		$message = __('base.success.saved');
        $data = $this;
        $request = request()->all();
		return $this->responseStateStill(array_merge(compact('message', 'data', 'request'), $params));
	}

	public function rollbackSaved($e, $params = [])
	{
		\DB::rollback();
		$message = __('base.error.saved');
		$errors = $e->getMessage();
		$traces = $e->getTrace();
		return $this->responseError(array_merge(compact('message', 'errors', 'traces'), $params));
	}

	// Deleted
	public function commitDeleted($params = [])
	{
		\DB::commit();
		$message = __('base.success.deleted');
		return $this->responseSuccess(array_merge(compact('message'), $params));
	}

	public function rollbackDeleted($e, $params = [])
	{
		\DB::rollback();
		$message = __('base.error.deleted');
		$errors = $e->getMessage();
		if ($e->getCode() == 23000) {
			$message = __('base.error.related');
			$errors = [];
		}
		$traces = $e->getTrace();
		return $this->responseError(array_merge(compact('message', 'errors', 'traces'), $params));
	}
}
