<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AwsS3Controller;

class FileManagerController extends Controller
{
  private $s3Controller;
  private $useAws;
  private $diskType;
  
  public function __construct()
  {
    $this->s3Controller = new AwsS3Controller();
    $this->useAws = env('USE_AWS');
    $this->diskType = 'public';

    // if ($this->useAws) {
    //   $this->diskType = 's3';
    // }
  }

  public function index(Request $request)
  {
    $page = 'filemanager';
    $path = $request->input('path', '');
    $files = Storage::disk($this->diskType)->files($path);
    $folders = Storage::disk($this->diskType)->directories($path);

    $filesFormatted = $this->formatFiles($files, $path);
    $foldersFormatted = $this->formatFolders($folders, $path);

    // Sort files by 'created_at' in descending order (newest first)
    usort($filesFormatted, function ($a, $b) {
      return $b['created_at_unformatted'] <=> $a['created_at_unformatted'];
    });

    // Sort folders by 'created_at' in descending order (newest first)
    usort($foldersFormatted, function ($a, $b) {
      return $b['created_at_unformatted'] <=> $a['created_at_unformatted'];
    });

    return view('components.filemanager.index', [
      'page' => $page,
      'path' => $path, // Pass the current path to the view
      'folders' => $foldersFormatted,
      'files' => $filesFormatted
    ]);
  }

  public function loadModal(Request $request)
  {
    $path = $request->input('path', ''); // Get the path from the request, or default to root

    $folders = Storage::disk($this->diskType)->directories($path);
    $files = Storage::disk($this->diskType)->files($path);

    $filesFormatted = $this->formatFiles($files, $path);
    $foldersFormatted = $this->formatFolders($folders, $path);

    // Sort files by 'created_at' in descending order (newest first)
    usort($filesFormatted, function ($a, $b) {
      return $b['created_at_unformatted'] <=> $a['created_at_unformatted'];
    });

    // Sort folders by 'created_at' in descending order (newest first)
    // usort($foldersFormatted, function ($a, $b) {
    //   return $b['created_at_unformatted'] <=> $a['created_at_unformatted'];
    // });

    return view('components.filemanager.content', [
      'path' => $path, // Pass the current path to the view
      'folders' => $foldersFormatted,
      'files' => $filesFormatted
    ]);
  }

  protected function formatFolders($folders, $currentPath)
  {
    return array_map(function ($folder) use ($currentPath) {
      return [
        'name' => basename($folder),
        'path' => $currentPath ? $currentPath . '/' . basename($folder) : basename($folder),
        'created_at_unformatted' => Storage::disk($this->diskType)->lastModified($folder),
        'created_at' => date('d-m-Y H:m:s', Storage::disk($this->diskType)->lastModified($folder)),
      ];
    }, $folders);
  }

  protected function formatFiles($files, $currentPath)
  {
    return array_map(function ($file) use ($currentPath) {
      return [
        'name' => basename($file),
        'path' => $currentPath ? $currentPath . '/' . basename($file) : basename($file),
        'size' => number_format(Storage::disk($this->diskType)->size($file)),
        'created_at_unformatted' => Storage::disk($this->diskType)->lastModified($file),
        'created_at' => date('d-m-Y H:m:s', Storage::disk($this->diskType)->lastModified($file)),
      ];
    }, $files);
  }

  public function upload(Request $request)
  {
    // Validate the request
    $request->validate([
      'file' => 'required|file|max:10240', // max 10MB
    ]);

    $path = $request->input('path', '');
    $file = $request->file('file');

    if ($file) {
      // Storage::disk('public')->put($path, $file, $file->getClientOriginalName());
      // Save the file using storeAs
      $filename = $file->getClientOriginalName();
      $file->storeAs($path, $filename, 'public');
      
      if ($this->useAws) {
        $uploadS3 = $this->s3Controller->uploadFile($path, $file);
        $responsUpload = $uploadS3->getContent();
        $response = json_decode($responsUpload, true);

        return response()->json([
          'success' => $response['success'],
          'message' => $response['message'],
          'file_link' => $response['file_link'],
        ]);
      }

      return response()->json([
        'success' => true,
        'message' => 'Success upload file'
      ]);
    }

    return response()->json(['success' => false, 'error' => 'No file uploaded']);
  }

  public function createFolder(Request $request)
  {
    $path = $request->input('path', '');
    $folderName = $request->input('folder_name');

    if ($folderName && Storage::disk('public')->makeDirectory($path . '/' . $folderName)) {
      // Set permissions (e.g., 0777 for full read, write, execute access)
      chmod(storage_path('app/public/' . $path . '/' . $folderName), 0775);

      if ($this->useAws) {
        $createFolderS3 = $this->s3Controller->createFolder($path, $folderName);
        $responseCreateFolderS3 = $createFolderS3->getContent();
        $response = json_decode($responseCreateFolderS3, true);
        
        return response()->json([
          'success' => $response['success'],
          'message' => $response['message'],
          'folder_path' => $response['folder_path']
        ]);
      }

      return response()->json([
        'success' => true,
        'message' => 'Success create folder'
      ]);
    }

    return response()->json(['success' => false, 'error' => 'Failed to create folder']);
  }

  public function copy(Request $request)
  {
    $source = $request->input('source');
    $destination = $request->input('destination');
    Storage::disk('public')->copy($source, $destination);
    return back();
  }

  public function move(Request $request)
  {
    $source = $request->input('source');
    $destination = $request->input('destination');
    Storage::disk('public')->move($source, $destination);
    return back();
  }

  public function delete(Request $request)
  {
    // Get the path of the file/folder to delete
    $path = $request->input('path');

    // Check if path is not null or empty
    if (!$path) {
      return response()->json(['success' => false, 'message' => 'Invalid path.'], 400);
    }

    // Get the full path on the server (you can use storage_path or public_path if needed)
    $fullPath = storage_path('app/public/' . $path);

    // Check if it is a directory or file and delete accordingly
    if (Storage::disk('public')->exists($path)) {
      // Check if the path is a directory
      if (is_dir($fullPath)) {
        // Delete directory recursively
        if ($this->useAws) {
          $deleteFolderS3 = $this->s3Controller->deleteFolder($path);
          $responseDeleteFolderS3 = $deleteFolderS3->getContent();
          $response = json_decode($responseDeleteFolderS3, true);

          if ($response['success']) {
            Storage::disk('public')->deleteDirectory($path);
            return response()->json([
              'success' => true, 
              'message' => 'Success delete folder'
            ]);
          }

          return response()->json([
            'success' => false, 
            'message' => 'Failed delete folder'
          ]);
        }

        if (Storage::disk('public')->deleteDirectory($path)) {
          return response()->json([
            'success' => true, 
            'message' => 'Success delete folder'
          ]);
        }

        return response()->json([
          'success' => false, 
          'message' => 'Failed delete folder'
        ]);
      } else {
        // For files, delete them directly
        if ($this->useAws) {
          $deleteFileS3 = $this->s3Controller->deleteFile($path);
          $responseDeleteFileS3 = $deleteFileS3->getContent();
          $response = json_decode($responseDeleteFileS3, true);

          if ($response['success']) {
            Storage::disk('public')->delete($path);
            return response()->json([
              'success' => true, 
              'message' => 'Success delete file'
            ]);
          }

          return response()->json([
            'success' => false, 
            'message' => 'Failed delete file'
          ]);
        }

        if (Storage::disk('public')->delete($path)) {
          return response()->json([
            'success' => true, 
            'message' => 'Success delete file'
          ]);
        }

        return response()->json([
          'success' => false, 
          'message' => 'Failed delete file'
        ]);
      }
    }

    return response()->json(['success' => false, 'message' => 'Error deleting file/folder']);
  }

  public function parentDirectory(Request $request)
  {
    $currentPath = $request->input('path', '');
    $parentPath = dirname($currentPath);
    return redirect()->route('filemanager', ['path' => $parentPath]);
  }

  public function saveViewOption(Request $request)
  {
    $request->validate([
      'view' => 'required|in:grid-view,list-view', // Validate allowed values
    ]);

    // Save the selected view in session
    session(['view_option' => $request->view]);

    return response()->json(['success' => true]);
  }
}
