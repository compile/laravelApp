<?php

namespace App\Http\Controllers;

use App\Models\Thumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ThumbRequest;
use Illuminate\Support\Facades\Input;

class ThumbsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$thumbs = Thumb::paginate();
		return view('thumbs.index', compact('thumbs'));
	}

    public function show(Thumb $thumb)
    {
        return view('thumbs.show', compact('thumb'));
    }

	public function create(Thumb $thumb)
	{
		return view('thumbs.create_and_edit', compact('thumb'));
	}

	public function store(ThumbRequest $request)
	{

	    print_r($request->all());



		$thumb = Thumb::create($request->all());
		return redirect()->route('thumbs.show', $thumb->id)->with('message', 'Created successfully.');
	}

	public function edit(Thumb $thumb)
	{
        $this->authorize('update', $thumb);
		return view('thumbs.create_and_edit', compact('thumb'));
	}

	public function update(ThumbRequest $request, Thumb $thumb)
	{
		$this->authorize('update', $thumb);
		$thumb->update($request->all());

		return redirect()->route('thumbs.show', $thumb->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Thumb $thumb)
	{
		$this->authorize('destroy', $thumb);
		$thumb->delete();

		return redirect()->route('thumbs.index')->with('message', 'Deleted successfully.');
	}

    public function upload(Request $request, Thumb $thumb)
    {
        if ($request->isMethod('POST')) {
            $files = $request->file("file");


            if ($files->isValid()) {
                $oragnalName = $files->getClientOriginalName();
                $ext = $files->getClientOriginalExtension();
                $type = $files->getClientMimeType();
                $realPath = $files->getRealPath();
                $file_new_name = date('Ymd') . '/' . uniqid() . '.' . $ext;

                echo $file_new_name;

                $bool = Storage::disk('public')->put($file_new_name, file_get_contents($realPath));
                var_dump($bool);


                $test = array('path'=>$file_new_name,'status'=>'2','order'=>'1');
                $thumb = Thumb::create($test);

                //return json_encode(['status'=>1,'filepath'=>$file_new_name]);
                return redirect()->route('thumbs.index')->with('message', 'Deleted successfully.');

            }
        }
        return view('upload');
    }

    public function upload_video(Request $request )
    {

        if ($request->isMethod('POST')) { //判断是否是POST上传，应该不会有人用get吧，恩，不会的

            //在源生的php代码中是使用$_FILE来查看上传文件的属性
            //但是在laravel里面有更好的封装好的方法，就是下面这个
            //显示的属性更多
            $fileCharater = $request->file('source');


            if ($fileCharater->isValid()) { //括号里面的是必须加的哦
                //如果括号里面的不加上的话，下面的方法也无法调用的

                //获取文件的扩展名
                $ext = $fileCharater->getClientOriginalExtension();

                //获取文件的绝对路径
                $path = $fileCharater->getRealPath();

                //定义文件名
                $filename = date('Y-m-d-h-i-s') . '.' . $ext;

                //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
                Storage::disk('public')->put($filename, file_get_contents($path));
            }else{
                echo 'false';
            }
        }


        return view('upload_mp4');
    }


    public function test(Request $request)
    {
//        $file=$request->file('logo');

        $file = Input::file('logo');

        //判断上传过来的文件是否合法
        if ($file->isValid()){

           // $path=$file->store('uploads/'.date('Ymd'));
            //return json_encode(asset('/'.$path));


//               $file = $request->file("file");


//                $oragnalName = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
//                $type = $file->getClientMimeType();
                $realPath = $file->getRealPath();
                $file_new_name = date('Ymd') . '/' . uniqid() . '.' . $ext;

                echo $file_new_name;

                $bool = Storage::disk('public')->put($file_new_name, file_get_contents($realPath));
                var_dump($bool);
        }else{
            return json_encode('file is false');
        }

    }
    public function info(){
        phpinfo();
    }
}
