<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class AwsS3Controller extends Controller
{
  private $s3;
  private $bucket;

  public function __construct()
  {
    $this->s3 = new S3Client([
      'version' => 'latest',
      'region'  => env('AWS_DEFAULT_REGION'),
      'credentials' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
      ],
    ]);

    $this->bucket = env('AWS_BUCKET');
  }

  /**
   * Upload file to S3
   */
  public function uploadFile($path, $file)
  {
    // defined keyname with filename
    $keyname = !empty($path) ? $path . '/' . $file->getClientOriginalName() : $file->getClientOriginalName();

    //upload file
    try {
      $result = $this->s3->putObject([
        'Bucket'      => $this->bucket,
        'Key'         => $keyname,
        'Body'        => file_get_contents($file->getRealPath()),
        'ACL'         => 'public-read',
        'ContentType' => $file->getClientMimeType() // Auto-detect file type
      ]);
      // return success
      return response()->json([
        'success' => true,
        'message' => 'Upload success',
        'file_link' => $result['ObjectURL']
      ]);
    } catch (S3Exception $e) {
      Log::error('S3 Upload Failed: ' . $e->getMessage());
      return response()->json([
        'success' => false,
        'message' => $e->getMessage(),
        'file_link' => ""
      ]);
    }
  }

  /**
   * Create folder to S3
   */
  public function createFolder($path, $folderName)
  {
    // Create folder on AWS S3
    try {
      // Ensure folder name ends with a slash "/"
      if (!str_ends_with($folderName, '/')) {
        $folderName .= '/';
      }

      // Create a "folder" in S3 by adding an empty object with a trailing slash
      $this->s3->putObject([
        'Bucket' => $this->bucket,
        'Key'    => !empty($path) ? $path . '/' . $folderName : $folderName,
        'Body'   => '', // Empty body to create the "folder"
        'ACL'    => 'public-read', // Change based on your needs
      ]);

      // Print the URL to the object.
      return response()->json([
        'success' => true,
        'message' => 'Success create folder',
        'folder_path' => !empty($path) ? $path . '/' . $folderName : $folderName
      ]);
    } catch (S3Exception $e) {
      return response()->json([
        'success' => false,
        'message' => $e->getMessage(),
        'folder_path' => !empty($path) ? $path . '/' . $folderName : $folderName
      ]);
    }
  }

  /**
   * Delete a file from S3
   */
  public function deleteFile($file)
  {
    try {
      $this->s3->deleteObject([
        'Bucket' => $this->bucket,
        'Key'    => $file, // Example: 'images/photo.jpg'
      ]);

      return response()->json([
        'success' => true,
        'message' => 'Success delete file'
      ]);
    } catch (S3Exception $e) {
      Log::error('S3 Delete Failed: ' . $e->getMessage());
      return response()->json([
        'success' => false,
        'message' => $e->getMessage()
      ]);
    }
  }

  /**
   * Delete a folder from S3 (Deletes all files inside)
   */
  public function deleteFolder($folderPath)
  {
    try {
      // Ensure folder path ends with "/"
      if (!str_ends_with($folderPath, '/')) {
        $folderPath .= '/';
      }

      // List objects inside the folder
      $objects = $this->s3->listObjectsV2([
        'Bucket' => $this->bucket,
        'Prefix' => $folderPath,
      ]);

      if (!isset($objects['Contents'])) {
        return response()->json([
          'success' => true,
          'message' => 'Folder is empty or does not exist',
        ]);
      }

      // Collect all file keys to delete
      $keys = array_map(fn($object) => ['Key' => $object['Key']], $objects['Contents']);

      // Delete multiple objects
      $this->s3->deleteObjects([
        'Bucket'  => $this->bucket,
        'Delete'  => ['Objects' => $keys],
      ]);

      return response()->json([
        'success' => true,
        'message' => 'Folder deleted successfully',
      ]);
    } catch (\Exception $e) {
      Log::error('S3 Folder Deletion Failed: ' . $e->getMessage());
      return response()->json([
        'success' => false,
        'message' => 'Folder deletion failed',
      ], 500);
    }
  }
}
