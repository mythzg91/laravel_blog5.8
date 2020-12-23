<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'publish_date' => 'required',
            'publish_time' => 'required',
            'layout' => 'required',
            'meta_description' => 'required',
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {

        $publish_date = Carbon::parse($this->publish_date)->format("Y-m-d");
        $publish_time = strtotime($this->publish_time);
        $publish_time = Carbon::parse($publish_time)->format('h:i:s');

        $published_at = $publish_date.' '.$publish_time;
        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'page_image' => $this->page_image,
            'content_raw' => $this->get('content'),
            'meta_description' => $this->meta_description,
            'is_draft' => (bool)$this->is_draft,
            'published_at' => $published_at,
            'layout' => $this->layout,
        ];
    }
}