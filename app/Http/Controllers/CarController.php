<?php
namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarPhoto;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CarController extends Controller
{
    public function ManageCars()
    {

        $Cars = Car::all();

        $data = [

            'Page'       => 'sys.cars.ManageCars',
            'Title'      => 'Car Inventory Management',
            'ReturnCars' => $Cars,

        ];

        return view('sys.index', $data);
    }

    /**
     * @param request $request
     */
    public function CreateNewCar(request $request)
    {

        $NewCar = new Car();

        $unique_id = Hash::make(date('Y-m-d H:i:s') . '_' . time());

        $NewCar->brand     = $request->input('brand');
        $NewCar->model     = $request->input('model');
        $NewCar->reg_no    = $request->input('reg_no');
        $NewCar->eng_no    = $request->input('eng_no');
        $NewCar->chasis_no = $request->input('chasis_no');
        $NewCar->price     = $request->input('price');
        $NewCar->color     = $request->input('color');

        $NewCar->car_unique_id = $unique_id;

        $NewCar->save();

        return redirect()->route('ManageCars')->with('status', 'New car added to inventory  successfully');
    }

    /**
     * @param request $request
     */
    public function DeleteCar(request $request)
    {
        $id = $request->input('id');

        $Car = Car::find($id);

        $Car->delete();

        return redirect()->route('ManageCars')->with('status', 'Car deleted successfully');

    }

    /**
     * @param request $request
     */
    public function UpdateCar(request $request)
    {

        $id = $request->input('id');

        $NewCar = Car::find($id);

        $NewCar->brand             = $request->input('brand');
        $NewCar->model             = $request->input('model');
        $NewCar->reg_no            = $request->input('reg_no');
        $NewCar->eng_no            = $request->input('eng_no');
        $NewCar->chasis_no         = $request->input('chasis_no');
        $NewCar->price             = $request->input('price');
        $NewCar->color             = $request->input('color');
        $NewCar->body_type         = $request->input('body_type');
        $NewCar->engine_type       = $request->input('engine_type');
        $NewCar->fuel_type         = $request->input('fuel_type');
        $NewCar->transmission_type = $request->input('transmission_type');

        $NewCar->save();

        return redirect()->route('ManageCars')->with('status', 'Car data update successfully');

    }

    /**
     * @param reques $request
     */
    public function AttachCarPhoto(request $request)
    {

        $request->validate([

            'photo_url' => 'required|mimes:png,jpg,jpeg|max:3048',

        ]);

        $unique_id = $request->input('unique_id');
        // $photo_url = $request->input('photo_url');

        $fileName = time() . '.' . $request->photo_url->extension();

        $request->photo_url->move(public_path('uploads/car_photos'), $fileName);

        $CarPhoto = new CarPhoto();

        $CarPhoto->car_unique_id = $unique_id;
        $CarPhoto->photo_url     = 'uploads/car_photos/' . $fileName;
        $CarPhoto->save();

        return redirect()->route('ManageCars')->with('status', 'Car photo uploaded successfully');

    }

    /**
     * @param $id
     */
    public function ViewCarPhoto($id)
    {

        $Car = Car::find($id);

        $car_unique_id = $Car->car_unique_id;

        $CarModel = $Car->model;

        $ReturnCarsPhotos = DB::table('cars AS C')
            ->join('car_photos AS CP', 'C.car_unique_id', '=', 'CP.car_unique_id')
            ->select('C.*', 'CP.*', 'CP.id AS uni')
            ->get();

        $data = [

            'Page'         => 'sys.cars.ViewImage',
            'Title'        => 'View Car Photos',
            'CarModel'     => $CarModel,
            'ReturnPhotos' => $ReturnCarsPhotos,

        ];

        return view('sys.index', $data);

    }

    /**
     * @param $id
     */
    public function DeleteCarPhotos($id)
    {
        $CarPhoto = CarPhoto::find($id);

        unlink(public_path($CarPhoto->photo_url));

        $CarPhoto->delete();

        return redirect()->route('ManageCars')->with('status', 'Car photo deleted successfully');

    }
}
