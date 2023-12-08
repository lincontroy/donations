<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{

    public function donation(Request $request)
    {
        $request->validate([
            'amount'      => 'numeric|required|min:1',
            'name'        => 'required_without:anonymous|min:3|max:100',
            'email'       => 'required_without:anonymous|email|max:100',
            'mobile'      => 'required_without:anonymous|numeric',
            'country'     => 'required_without:anonymous|max:100',
            'campaign_id' => 'required'
        ]);
        $campaign = Campaign::running()->findOrFail($request->campaign_id);

        if (auth()->check() && $campaign->user_id == auth()->id()) {
            $notify[] = ['error', 'You can\'t donate your own campaign'];
            return back()->withNotify($notify);
        }

        $donation              = new Donation();
        $donation->user_id     = auth()->check() ? auth()->id() : 0;
        $donation->campaign_id = $campaign->id;
        $donation->anonymous   = $request->anonymous ? Status::YES : Status::NO;
        $donation->fullname    = $request->anonymous ? 'Anonymous' : $request->name;
        $donation->email       = $request->anonymous ? 'anonymous@guest.com' : $request->email;
        $donation->country     = $request->anonymous ? 'Anonymous' :$request->country;
        $donation->mobile      = $request->anonymous ? 'Anonymous' : $request->mobile;
        $donation->donation    = $request->amount;
        $donation->save();

        session()->put('DONATION',$donation);
        return to_route('deposit.index');
    }

}
