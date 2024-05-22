<?php

namespace App\Models;

use App\Models\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Base;
use Termwind\Components\Span;

class Model extends Base
{
    use HasFactory, ResponseTrait;


    public function getDescriptionRaw($words)
    {
        // Count the number of words in the project name
        $text_content_without_html = strip_tags($words);
        $wordCount = str_word_count($text_content_without_html);

        //    dd($wordCount);
        $str = '<div class="d-flex align-items-center justify-content-center make-td-py-0">
                ';

        // Adjust the width and height for a rectangular shape
        $str .= '<div class="badge badge-warning d-flex align-items-center justify-content-center" tabindex="0" data-toggle="popover" data-trigger="hover"
        title="'.$text_content_without_html.'"
            style="width: 80px; height: 30px;"><h6>' . $wordCount . ' Words</h6>
        </div>';

        $str .= '
            </div>
        ';

        return $str;
    }

    public function getStatus ($value) {
        switch ($value) {
            case 'New':
                
                break;
            
            default:
                # code...
                break;
        }
    }
}
