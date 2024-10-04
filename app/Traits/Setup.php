<?php
namespace App\Traits;
use Illuminate\Support\Str;

trait Setup
{
    public function uniqidReal($length = 13)
    {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        return substr(uniqid('', true), 0, $length);
    }

    public function createCodeUser()
    {
        return 'U' . $this->uniqidReal(5) . time();
    }

    public function folderUploadFileForUser($path = '/')
    {
        $path = $path == '/' ? '/' : '/' . Str::finish($path, '/');

        return 'users/' . auth()->user()->id . $path;
    }

    public function generateTokenGetPassword()
    {
        return (string) Str::uuid() . '-' . time();
    }
}
