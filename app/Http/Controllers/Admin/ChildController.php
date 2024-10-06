<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChildStoreRequest;
use App\Http\Requests\ChildUpdateRequest;
use App\Models\Child;
use App\Models\User;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:child-list|child-create|child-edit|child-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:child-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:child-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:child-delete', ['only' => ['destroy']]);
    }

    /**
     * route: /admin/children
     * name: children.index
     */
    public function index()
    {
        $children = Child::with('parent')->latest()->paginate(8);


        return view('admin.children.index', compact('children'));
    }

    /**
     * route: /admin/children/create
     * name: children.create
     */
    public function create()
    {
        return view('children.create');
    }

    /**
     * route: /admin/children/parent/{id}/child/store
     * name: child.parent.store
     */
    public function storeChildByParent(ChildStoreRequest $request, $id)
    {
        $parent = User::where('id', $id)->first();

        $parent->children()->create($request->validated());
        $grille = $request['affichage-grille'];
        if ($grille) {
            return redirect()->route('parent.children.grille', $id)
                ->with('success', 'Child created successfully.');
        }

        return redirect()->route('parent.children.list', $id)
            ->with('success', 'Child created successfully.');
    }

    /**
     * route: /admin/children/store
     * name: children.store
     */
    public function store(ChildStoreRequest $request)
    {
        Child::create($request->validated());
        return redirect()->route('children.index')
            ->with('success', 'Child created successfully.');
    }

    /**
     * route: /admin/children/{child}
     * name: children.show
     */
    public function show(Child $child)
    {
        return view('admin.children.show', compact('child'));
    }

    /**
     * route: /admin/children/{child}/edit
     * name: children.edit
     */
    public function edit(Child $child)
    {
        return view('admin.children.edit', compact('child'));
    }

    /**
     * route: /admin/children/{child}
     * name: children.update
     */
    public function update(ChildUpdateRequest $request, Child $child)
    {
        $validatedData = $request->validated();
        $photo = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('photos'), $photo);
        $validatedData['photo'] = $photo;

        $userId = $request['user_id'];

        $child->update($validatedData);

        if ($userId) {
            return redirect()->route('parent.children.grille', $userId)
                ->with('success', 'Child updated successfully.');
        }
        return redirect()->route('children.index')
            ->with('success', 'Child updated successfully.');
    }

    /**
     * route: /admin/children/{child}
     * name: children.destroy
     */
    public function destroy(Child $child)
    {
        $child->delete();
        return redirect()->route('children.index')
            ->with('success', 'Child deleted successfully.');
    }
}
