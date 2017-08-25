<?php
namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\News;
use App\FileHandler;
use App\File;
use Illuminate\Http\Request;
use App\Http\Requests\News\UpdateNewsRequest;

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
    $news = new News;
    $news->title = "По умолчанию";
    $news->url_key = \Slug::make($news->title);
    $news->save();
    $id = $news->id;
    return view('news.add',compact('id','news'));
  }

  /**
   *  Update News
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update($id, UpdateNewsRequest $request)
  {
    $file = $request->file;
    $newsRequest = $request->except('_token','file');
    $id = (int)$id;
    $normTitle = str_replace("/"," ",$request["title"]);
    $newsRequest['url_key'] = \Slug::make($normTitle);
    News::where('id', $id)->update($newsRequest);
    if($file) {
      $currentFile = File::where('fileable_id',$id)->where('fileable_type','App\News')->first();
      if($currentFile)
      {
        $currentFile->delete();
      }
      $fileHandler = new FileHandler();
      $fileHandler->upload($file, false, 'App\News',$id);
    }
    return redirect()->route('wacker');
  }
}