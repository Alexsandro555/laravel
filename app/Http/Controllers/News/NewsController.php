<?php
namespace App\Http\Controllers\News;

class NewsController extends Controller
{
  /**
   *
   * Add News
   *
   * @return \Illuminate\Http\Response
   */
  public function add()
  {
    $news = new News();
    $news->title = "По умолчанию";
    $news->url_key = \Slug::make($news->title);
    $news = News::create($news);
    $id = $news->id;
    return view('news.add','id','news');
  }

  /**
   *  Update News
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update($id, UpdateNewsRequest $request)
  {
    $file = $request->file;
    $id = (int)$id;
    News::where('id', $id)->update($request);
  }
}