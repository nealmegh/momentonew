<?php namespace App\Http\Controllers\Article;

use App\BookingStatus;
use App\Entity\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesRequest;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;


class ArticlesController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index ()
    {
        $articles = Article::latest('id')->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function show($id,Article $article)
    {
        $article = $article->findORFail($id);
        return view('admin.articles.show', compact('article'));
    }

    public function create ()
    {
      return view('admin.articles.create');
    }

    /**
     *  Create article store here
     * @param ArticlesRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(ArticlesRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        if($request->hasFile('files')) {
            $file = $request->file('files');
            $filename = uniqid().'.jpg';
            $destinationPath = 'images/articles';
            $galleryImage = Image::make($file)->fit(900, 500);
            $galleryImage->save($destinationPath.'/'.$filename);

            $article->images()->create(['path' => $destinationPath, 'name' => $filename, 'type' => 'article']);
        }else {
            $article->images()->create(['path' => 'images', 'name' => 'no-image.png', 'type' => 'article']);
        }

        Flash::success('your article create successfully');
        return redirect('admin/articles');


    }

    public function edit($article)
    {
        $article = Article::findOrFail($article);
         return view('admin.articles.edit', compact('article'));
    }


    /**
     * @param Article $article
     * @param ArticlesRequest $request
     * @return RedirectResponse|Redirect
     * @internal param $id
     */
    public function update($article, ArticlesRequest $request)
    {
        $article = Article::findOrFail($article);
        $article->update($request->all());
        if($request->hasFile('files')) {
            $file = $request->file('files');
            $filename = uniqid().'.jpg';
            $destinationPath = 'images/articles';
            $galleryImage = Image::make($file)->fit(900, 500);
            $galleryImage->save($destinationPath.'/'.$filename);

            $article->images()->updateOrCreate(['path' => $destinationPath, 'name' => $filename, 'type' => 'article']);
        }else {
            $article->images()->updateOrCreate(['path' => 'images', 'name' => 'no-image.png', 'type' => 'article']);
        }
        Flash::success('Article Update Successfully');
        return redirect('admin/articles');
    }

    public function detail($id)
    {
        $article = Article::findOrFail($id);
        return view('article/news/index', compact('article'));
    }

    public function allArticle()
    {
        $articles = Article::paginate(5);
        return view('article/index', compact('articles'));
    }

}
