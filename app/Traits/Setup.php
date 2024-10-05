<?php
namespace App\Traits;
use Illuminate\Support\Str;

trait Setup
{
    public function uniqidReal($lenght = 13)
    {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        return uniqid_real($lenght);
    }

    public function createCodeUser()
    {
        return 'U' . $this->uniqidReal(5) . time();
    }

    public function generateTokenGetPassword()
    {
        return (string) Str::uuid() . '-' . time();
    }
}