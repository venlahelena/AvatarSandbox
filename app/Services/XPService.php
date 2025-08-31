<?php
namespace App\Services;

use App\Models\UserModel;
use App\Models\AchievementModel;

class XPService
{
    protected $userModel;
    protected $achievementModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->achievementModel = new AchievementModel();
    }

    public function awardXP($userId, $amount, $reason = null)
    {
        $user = $this->userModel->find($userId);
        if ($user) {
            $newXP = $user['xp'] + $amount;
            $this->userModel->update($userId, [
                'xp' => $newXP
            ]);
            return $newXP;
        }
        return false;
    }

    public function awardDailyLoginXP($userId, $amount = 10)
    {
        $user = $this->userModel->find($userId);
        if ($user) {
            $lastLogin = $user['last_login'];
            $today = date('Y-m-d');
            if (!$lastLogin || substr($lastLogin, 0, 10) !== $today) {
                $this->userModel->update($userId, [
                    'last_login' => date('Y-m-d H:i:s')
                ]);
                return $this->awardXP($userId, $amount, 'Daily Login');
            }
        }
        return false;
    }

    public function awardAchievement($userId, $name, $description = null)
    {
        // Check if achievement already exists for user
        $existing = $this->achievementModel
            ->where('user_id', $userId)
            ->where('name', $name)
            ->first();
        if (!$existing) {
            $this->achievementModel->insert([
                'user_id' => $userId,
                'name' => $name,
                'description' => $description,
                'date_earned' => date('Y-m-d H:i:s')
            ]);
            return true;
        }
        return false;
    }
}
