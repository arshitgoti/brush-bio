<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPortfolioUrlRequest;
use App\Models\User;
use App\Models\UserPortfolioUrl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPortfolioUrlController extends Controller
{
    public function create()
    {
        return view('user_portfolio_url.ajax.create');
    }

    public function store(StoreUserPortfolioUrlRequest $request)
    { if(count($request->portfolio_url)<=1)
        { $user_portfolio_url=null;
            return uniResponse(true, 'Your portfolio urls has been updated', $user_portfolio_url, 200);
        }
        $user_portfolio_url = new UserPortfolioUrl();
        $dataToInsert = [];
        $user_id = Auth::user()->id;
        $created_at = Carbon::now()->format('Y-m-d H:i:s');
        if ($request->has('portfolio_url')) {
            for ($i=0; $i < count($request->portfolio_url['title']); $i++) {
                $dataToInsert[] = [
                    'user_id' => $user_id,
                    'title' => $request->portfolio_url['title'][$i],
                    'url' => $request->portfolio_url['url'][$i],
                    'created_at' => $created_at,
                    'updated_at' => $created_at
                ];
            }
        }
        $user_portfolio_url->insert($dataToInsert);
        return uniResponse(true, 'Your portfolio urls has been updated', $user_portfolio_url, 200);
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        $user_portfolio_urls = $user->portfolio_urls;
        return view('user_portfolio_url.ajax.edit', compact('user_portfolio_urls', 'user'));
    }

    public function update(StoreUserPortfolioUrlRequest $request, $user_id)
    {

        $user = User::find($user_id);
        $user->portfolio_urls()->delete();
           if(count($request->portfolio_url)<=1)
        { $user_portfolio_url=null;
            return uniResponse(true, 'Your portfolio urls has been updated', $user_portfolio_url, 200);
        }
        $user_portfolio_url = new UserPortfolioUrl();
        $dataToInsert = [];
        $user_id = Auth::user()->id;
        $created_at = Carbon::now()->format('Y-m-d H:i:s');
        if ($request->has('portfolio_url')) {
            for ($i=0; $i < count($request->portfolio_url['title']); $i++) {
                $dataToInsert[] = [
                    'user_id' => $user_id,
                    'title' => $request->portfolio_url['title'][$i],
                    'url' => $request->portfolio_url['url'][$i],
                    'created_at' => $created_at,
                    'updated_at' => $created_at
                ];
            }
        }

        $user_portfolio_url->insert($dataToInsert);

        return uniResponse(true, 'Your portfolio urls has been updated', $user_portfolio_url, 200);
    }
}
