<?php

namespace App\Http\Controllers\Scan;

use App\Console\Commands\NotiExpridTimeLimit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scan;
use App\Models\CategoryScan;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Str;
use Inertia\Inertia;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Mail\NotiMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ScanResource;
use App\Models\GroupScan;

class ScanController extends Controller
{
    use FileUploadTrait;
    function __construct()
    {
        // $this->middleware('permission:view-tour|create-tour|delete-tour|edit-tour', ['only' => ['index']]);
        // $this->middleware('permission:create-tour', ['only' => ['store']]);
        // $this->middleware('permission:edit-tour', ['only' => ['update']]);
        // $this->middleware('permission:delete-tour', ['only' => ['removeProject']]);
    }
    public function index(Request $request)
    {
        // $scan = Scan::find(1);
        // $url = url('/scan/' . $scan->code);
        // $date = Carbon::parse($scan->expired_date)->format('d/m/Y');
        // $data = array('email' => 'quangND620@wru.vn', 'content' => "
        //     sắp hết thời hạn Hosting. Hãy thông báo thủ tục gia hạn tới khách hàng nhé
        //         ", 'title' => "[Holo360] {$date} -{$scan->name}", 'name' => $scan->name, 'url' => $url);

        // Mail::to('quangND620@wru.vn')->send(new NotiMail($data));
        // return (new NotiMail($data))->render();

        $categorys = CategoryScan::get();

        if (Auth::user()->hasRole('administrator')) {
            $scans =  Scan::with('category_scan', 'user','group')->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->term . '%');
            })->paginate(10)->appends(['term' => $request->term]);
        } else {
            $scans =  Scan::with('category_scan', 'user','group')->where('user_id', Auth::user()->id)->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->term . '%');
            })->paginate(10)->appends(['term' => $request->term]);;
        }
        $scans = ScanResource::collection($scans);
        $listScans = Scan::where('group_id', null)->get();
        $groupScans = GroupScan::with('scans')->get();

        return Inertia::render('Scan/Scan', compact('scans', 'categorys','groupScans','listScans'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'model_code' => 'required',
                'category' => 'required',
                'expired_date' =>  'required|date|after:now',
                'logo' => 'nullable|mimes:jpeg,jpg,png'
            ]
        );
        $destinationpath = 'scans/';
        if (!file_exists($destinationpath)) {
            mkdir($destinationpath, 0777, true);
        }

        Scan::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'model_code' => $request->model_code,
            'code' => Str::random(15),
            'user_id' => Auth::user()->id,
            'expired_date' => $request->expired_date,
            'category_scan_id' => $request->category,
            'logo' => $request->hasFile('logo') ? $this->image($request->file('logo'), $destinationpath) : null,
        ]);

        return back()->with('success', 'Add successful');
    }

    public function edit($id)
    {
        $categorys = CategoryScan::get();

        $project = Scan::find($id);
        return view('client.scan.edit', compact('project', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'name' => 'required',
                'model_code' => 'required',
                'category' => 'required',
                'expired_date' =>  'required|date',
                'logo' => 'nullable|mimes:jpeg,jpg,png'
            ]
        );
        $scan = Scan::find($id);
        $destinationpath = 'scans/';
        if (!file_exists($destinationpath)) {
            mkdir($destinationpath, 0777, true);
        }
        $name = time();
        $scan->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'model_code' => $request->model_code,
            'user_id' => Auth::user()->id,
            'expired_date' => $request->expired_date,
            'category_scan_id' => $request->category,
            'logo' => $request->hasFile('logo') ? $this->update_image($request->file('logo'), $name, $destinationpath, $scan->logo) :  $scan->logo,
        ]);
        if ($request->expired_date > Carbon::now()) {
            if ($scan->history_mail) {
                $scan->history_mail->delete();
            }
        }
        return back()->with('success', 'Update successful');
    }


    public function removeProject(Request $request)
    {

        $project = Scan::findOrFail($request->id);
        $project->active = $request->active;
        $project->save();

        return back()->with('success', 'Change successful');
    }

    public function delete($id)
    {
        $extension = " ";
        $project = Scan::findOrFail($id);
        $this->DeleteFolder($project->logo, $extension);
        $project->save();

        return back()->with('success', 'Delete successful');
    }

    public function public($code)
    {
        $project = Scan::with('category_scan')->where('code', '=', $code)->first();
        $now = Carbon::now();
        // dd($project);
        if ($project && $project->active == 1) {

            if (strtotime($project->expired_date) - strtotime($now) > 0) {
                return view('scan.public.index', compact('project'));
            } else {

                $status = 409;
                return Inertia::render('Error', ['status' => $status]);
            }
        } else {
            abort(404);
        }
    }
    public function getGraph(Request $request){
        $token = "43462e8c1ec2ea21";
        $secret = "0cdacc02a1c9da6ff24e0890def31fa9";
        $auth = base64_encode($token + ':' + $secret);
        $url = "https://api.matterport.com/api/models/graph";
        $client = new Client([
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => $auth
            ],
        ]);
        $res = $client->request("POST",$url);
        return $res->getBody()->getContents();
    }
    public function convertBase64toImage(Request $request){

        $image = $request->image;  // your base64 encoded
        $image = str_replace('data:image/jpg;base64,', '', $image);


        $image = str_replace(' ', '+', $image);
        $imageName ='2d_image.jpg';
        Storage::disk('public')->put($imageName, base64_decode($image));
        return url($imageName);
    }
}
