<?php
namespace App\Libraries;

class AvatarHelper
{
    // Allowed values for avatar fields
    public static function allowedHair()
    {
        return ['none', 'circle', 'square'];
    }
    public static function allowedClothes()
    {
        return ['none', 'shirt', 'dress'];
    }
    public static function allowedAccessory()
    {
        return ['none', 'glasses', 'hat'];
    }
    public static function validateAvatar($data)
    {
        $errors = [];
        if (!in_array($data['avatar_hair'] ?? '', self::allowedHair())) {
            $errors['avatar_hair'] = 'Invalid hair style.';
        }
        if (!in_array($data['avatar_clothes'] ?? '', self::allowedClothes())) {
            $errors['avatar_clothes'] = 'Invalid clothes.';
        }
        if (!in_array($data['avatar_accessory'] ?? '', self::allowedAccessory())) {
            $errors['avatar_accessory'] = 'Invalid accessory.';
        }
        if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $data['avatar_color'] ?? '')) {
            $errors['avatar_color'] = 'Invalid color.';
        }
        return $errors;
    }
}
