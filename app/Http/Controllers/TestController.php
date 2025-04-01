<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testAdd(Request $request)
    {
        $a = $request->input('val1',10);
        $b = $request->input('val2',5);
        return response($a + $b, 200);
    }

    public function Sub(Request $request){
        $id = $request->id;
        $user = User::select('name')->where('id', $id)->first();
        return response($user,202);
    }

    public function searchClients(Request $request)
    {
      //return response("hi", 200);
        $perPage = $request->input('perpage', 10);
        $filterType = $request->input('filter_type');
        $filterData = $request->input('filter_data');
        return response($perPage,$filterType,$filterData,200);
        /*
        if (count($request->all()) >= 1) {

            $client = User::with('pandetails:id,pan_number');

            if (Auth::user()->role == 3) {
                $client->where('branch', Auth::user()->name);
            }

            $client->where(function ($query) use ($filterType, $filterData) {
                switch ($filterType) {
                    case 'id':
                        $query->where('id', $filterData);
                        break;
                    case 'email':
                        $query->where('email', $filterData);
                        break;
                    case 'mobile_number':
                        $query->where('mobile_number', $filterData);
                        break;
                    case 'pan_number':
                        $query->whereHas('pandetails', function ($q) use ($filterData) {
                            $q->where('pan_number', $filterData);
                        });
                        break;
                    default:
                        break;
                }
            });

            $client_details = $client->paginate($perPage);

            if (Auth::user()->role == 3) {
                $final_client_details = $client_details->map(function ($value) {
                    return [
                        'id' => $value->id,
                        'name' => $value->name,
                        'mobile_number' => $value->mobile_number,
                        'email' => $value->email,
                        'pan_number' => $value->pandetails->pan_number,
                        'branch' => $value->branch,
                        'created_at' => $value->created_at,
                    ];
                });

                return $this->userSuccessResponse('Client details by request parameter.', $final_client_details);
            }

            return $this->userSuccessResponse('Client details by request parameter.', $client_details);
        }

        return $this->userSuccessResponse('No filter parameters provided.'); */
    }

}
