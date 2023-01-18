<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->select([
                'categories.*',
                'parents.name as parent_name',
            ])
            ->orderBy('categories.parent_id')
            ->orderBy('categories.name', 'ASC')
            ->get();


        return view('dashboard.categories.index', [
            'categories' => $categories,
           
        ]);
        // return view('dashboard.categories.index',[
        //     'categories'=>$categories,

        //   ]);
    }

    public function create()
    {
        $parents = Category::orderBy('name')->pluck('name' , 'id');
        return view('dashboard.categories.create' , [
            'category' => new Category() ,
            'parents'=> $parents ,
              ]);
    }
    public function store(Request $request)
    {
// الكود الخاص بال validation لحماية السيرفر من الاختراق 
            $data = $this->validateRequest($request) ;

            if(!$data['slug']){
                $data['slug'] = Str::slug($data['name']);
            }
        // $category = new Category();
        // $category->name = $request->post('name');
        // $category->slug = $request->post('slug');
        // $category->parent_id = $request->post('parent_id');
        // $category->save();

        // dd($request->all()); // عبارة عن فحص وطباعة المعلومات 
        // Category::create([
        //     'name' => $request->post('name'),
        //     'slug' => $request->post('slug'),
        //     'parent_id' => $request->post('parent_id'),
        //     // 'created_at' => now(),
        //     'time'=>now(),

        // ]);

        $category = Category::create($data);


        // هلقيت بدنا نعمل عملية redairect عشان انحول من post ل get 
        // هلقيت بدنا انطلع رسالة تحكيلنا انو تمت العملية بنجاح 
        return redirect()->route('dashboard.categories.index')
            ->with('success', "Category ({$category->name}) Created !");
    }

    public function edit($id){ //'$query' , '<>' , $id

       $category = Category::findOrfail($id);
       $parents = Category::where('id' , '<>' ,$id)
       ->where(function($query) use($id) {
            $query->whereNull('parent_id')
            ->orWhere('parent_id' , '<>' , $id) ;
       })
       ->orderBy('name')
       ->pluck('name' , 'id');

       return View('dashboard.categories.edit',[
        'category'=>$category ,
        'parents'=>$parents ,
       ]);

    }

    public function update(CategoryRequest $request , $id){

        $category = Category::findOrfail($id);
       // $data = $this->validateRequest($request);
       $data = $request->validated();

       if(!$data['slug']){
           $data['slug'] = Str::slug($data['name']);
       }
        $category->update($data);

        return redirect()->route('dashboard.categories.index')
        ->with('success', "Category ({$category->name}) Updated !")
        ->with('info' , 'Category Data Changed !');

    }

    public function destroy($id){

        Category::destroy($id);
        // $category = Category::findOrfail($id);
        return redirect()->route('dashboard.categories.index')
        ->with('success', "Category delete !")
        ->with('warning' , 'You Deleted A Category !');
    }

    protected function validateRequest(Request $request , $id=0){
       return  $request->validate([

            'name' => 'required|string|max:255' ,
            'slug' => "nullable|string|unique:categories,slug,$id" ,
            'parent_id' => 'nullable|int|exists:categories,id' ,
            'image' => [
                'nullable',
                'image',
                'max:200' ,
                // 'dimensions:min_width=300,min_height=300,max_width=800,max_height=300' ,
                Rule::dimensions()->minWidth(300)->minHeight(300)->maxWidth(800)->maxHeight(300) ,
            ]


          ]);
    }
}
