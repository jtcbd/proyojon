<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\VerificationRequest;
use App\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest', 'verification_code.expired']);
    }

    public function index()
    {
    	return view('auth.verification.code');
    }

    public function store(VerificationRequest $request)
    {
        $mobile = $mobile = $request->mobile;
    	$code = Verification::where('token', $request->code)
            ->whereHas('user', function($query) use ($mobile){
                $query->where('mobile', $mobile);
            })->first();
        if ( count($code) == 0 ) { return back()->withError('invalid verification code'); }
        $code->user->update(['active' => true]);

    	$code->delete();

    	Auth::loginUsingId($code->user->id);

    	return redirect()->route('account.dashboard')
    		->withSuccess('you are now signed in');
    }
}
