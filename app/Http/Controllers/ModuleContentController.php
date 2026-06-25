<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModuleContentService;

class ModuleContentController extends Controller
{
  protected $moduleContent;

  public function __construct(ModuleContentService $moduleContent)
  {
    $this->moduleContent = $moduleContent;
  }

  public function store(Request $request)
  {
    $input = $request->all();

    $dataId = "";
    $submitData = $this->moduleContent->storeOrUpdate($dataId, $input);

    // if ($input['type'] == 'slideshow') {
    //   $redirectPage = 'adbmin/page/edit/home';
    // }

    if ($submitData) {
      return response()->json([
				'success' => true,
				'message' => 'Berhasil update data'
			], 200); 
    }
  }

  public function update(Request $request)
  {
    $input = $request->all();

    if (is_array($input)) {
      foreach($input as $item) {
        $dataId = $item['id'];
        $updateData = $this->moduleContent->storeOrUpdate($dataId, $item);
      }
    } else {
      $dataId = $input['id'];
      $updateData = $this->moduleContent->storeOrUpdate($dataId, $input);
    }

    if ($updateData) {
      return response()->json([
				'success' => true,
				'message' => 'Berhasil update data'
			], 200); 
    }
  }

  public function delete(Request $request)
  {
    $input = $request->all();
    // $id = $input[0]['id'];
    $id = $input['id'];

    $deleteData = $this->moduleContent->destroyById($id);

    if ($deleteData) {
      return response()->json([
				'success' => true,
				'message' => 'Berhasil hapus data'
			], 200); 
    }
  }
}
