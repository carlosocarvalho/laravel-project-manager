<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 23:17
 */

namespace CocProject\Presenters;

use CocProject\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ProjectPresenter extends FractalPresenter
{

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */public function getTransformer()
      {
          return new ProjectTransformer();
      }
}