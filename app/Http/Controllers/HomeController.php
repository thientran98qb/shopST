<?php

namespace App\Http\Controllers;
use App\Model\BillProduct;
use App\Model\Category;
use App\Model\Product;
use App\Model\Slide;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Model\Cart;
use App\Model\Bill;
use Hash;
class HomeController extends Controller
{
    public function getIndex(){
        $slide =Slide::all();
        $product =Product::paginate(8);
        $sp_km=Product::where('promotion_price','<>',0)->paginate(8);
        return view('frontend.home.home',compact('slide','product','sp_km'));
    }
    public function getloaiSP($id){
        $sp_theoloai=Product::where('category_id',$id)->get();
        $sp_khac=Product::where('category_id','<>',$id)->paginate(3);
        $loai =Category::all();
        $loai_sp=Category::where('id',$id)->first();
        return view('frontend.products.type_product',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getdetailSP(Request $req){
        $sanpham=Product::where('id',$req->id)->first();
        $sp_tuongtu=Product::where('category_id',$sanpham->category_id)->paginate(3);
        return view('frontend.detailproducts.detailproduct',compact('sanpham','sp_tuongtu'));
    }
    public function about(){
        return view('frontend.home.about');
    }
    public function contact(){
        return view('frontend.home.contact');
    }
    public function getAddtoCart(Request $req,$id){
        $product =Product::find($id);
        $oldCart =Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->back();
    }
    public function getCheckout(){
        return view('frontend.carts.order');
    }
    public function postCheckout(Request $req){
        $cart= Session::get('cart');
        $user =new User;
        $user->name=$req->name;
        $user->password='';
        $user->gender=$req->gender;
        $user->email=$req->email;
        $user->address=$req->address;
        $user->phone=$req->phone;
        $user->note=$req->notes;
        $user->role_id='2';
        $user->save();

        $bill =new Bill;
        $bill->user_id=$user->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment;
        $bill->note=$req->notes;
        $bill->save();

        foreach ($cart->items as $key=>$value) {
            $bill_detail = new BillProduct;
            $bill_detail->bill_id = $bill->id;
            $bill_detail->product_id = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'] / $value['qty']);
            $bill_detail->save();
        }
            Session::forget('cart');
            return redirect()->back()->with('thongbao','Đặt Hàng Thành Công');
    }
    public function getLogin(){
        return view('frontend.logins.login');
    }
    public function getRegister(){
        return view('frontend.logins.register');
    }
    public function postRegister(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự'
            ]
        );
        $user= new User();
        $user->name=$req->fullname;
        $user->email=$req->email;
        $user->note='';
        $user->role_id='2';
        $user->gender=$req->gender;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');

    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu không quá 20 ký tự'
            ]);
        $creditials=array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($creditials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);

        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }

    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function getSearch(Request $req){
        $product=Product::where('name','like','%'. $req->key.'%')
                        ->orWhere('unit_price',$req->key)
                        ->get();
        return view('frontend.search.search',compact('product'));
    }
}
