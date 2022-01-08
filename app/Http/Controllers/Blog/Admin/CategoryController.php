<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\EloquentBlogCategory;
use App\Repositories\Interfaces\BlogCategoryRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{


    /**
     * @var BlogCategoryRepositoryInterface
     */
    private $repository;

    public function __construct(BlogCategoryRepositoryInterface $blogRepository)
    {
        $this->repository = $blogRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        $pagination = $this->repository->getAllWithPaginate(5);
        return view('blog.admin.category.index',
            compact('pagination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(EloquentBlogCategory $repository)
    {
        $item = new BlogCategory();
        $allCategories = $this->repository->getComboBox();
        return view('blog.admin.category.edit',
            compact('item', 'allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCategoryUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BlogCategoryUpdateRequest $request): RedirectResponse
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $item = new BlogCategory($data);
        $item->save();
        if ($item instanceof BlogCategory) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Item save successful']);
        } else {
            return back()
                ->withErrors(['msg' => 'Invalid save item'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $item = $this->repository->getById($id);
        $allCategories = $this->repository->getComboBox();
        return view('blog.admin.category.edit', compact('item', 'allCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function update(BlogCategoryUpdateRequest $request, $id): RedirectResponse
    {
        $item = $this->repository->getById($id);
        if (is_null($item)) {
            return back()
                ->withErrors(['msg' => 'No such item ' . $id])
                ->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Item updated successfully']);
        } else {
            return back()
                ->withErrors(['msg' => 'Invalid save item'])
                ->withInput();
        }
    }
}
