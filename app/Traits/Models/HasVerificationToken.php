<?php 

namespace App\Traits\Models;

use App\Verification;

trait HasVerificationToken
{
	public function generateVerificationToken()
	{
		$this->verificationToken()->create([
			'token' => $token = strtoupper(str_random(6)),
			'expires_at' => $this->getVerificationTokenExpiry()
		]);		

		return $token;
	}	

	protected function getVerificationTokenExpiry()
	{
		return $this->freshTimestamp()->addMinutes(15);
	}

	public function verificationToken()
	{
		return $this->hasOne(Verification::class);
	}
}