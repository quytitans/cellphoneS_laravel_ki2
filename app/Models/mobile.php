<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobile extends Model
{
    use HasFactory;

    public function getMainThumbnailAttribute(){
        $defaultThumbnail = 'https://res.cloudinary.com/quynv300192/image/upload/v1634800182/ixdpahcfqqmee12obutt.png';
        if($this->thumbnail != null && strlen($this->thumbnail) >0){
            $this->thumbnail = substr($this->thumbnail, 0, -1);
            $arrayThumbnail = explode(',', $this->thumbnail);
            if(sizeof($arrayThumbnail)>0){
                return $arrayThumbnail[0];
            }
        }
        return $defaultThumbnail;
    }

    public function getArrayThumbnailAttribute(){
        if($this->thumbnail != null && strlen($this->thumbnail) >0){
            $this->thumbnail = substr($this->thumbnail, 0, -1);
            $arrayThumbnail = explode(',', $this->thumbnail);
            if(sizeof($arrayThumbnail)>0){
                return $arrayThumbnail;
            }
        }
        return [];
    }

    public function getStrStatusAttribute(){
        $strStatus = '';
        if($this->status ==1){
            $strStatus = 'Hàng sắp về';
        }
        if($this->status ==2){
            $strStatus = 'Còn hàng';
        }
        if($this->status ==3){
            $strStatus = 'Hết hàng';
        }
        if($this->status ==4){
            $strStatus = 'Nhận pre-oder';
        }
        return $strStatus;
    }

    public function brandName(){
        return $this->belongsTo(brand::class, 'brandID', 'id');
    }

    //local scope, filter
    public function scopeNameFilter($query, $request)
    {
        if ($request->has('name')) {
            if(isset($request->name)){
                $query->where('name', 'LIKE', '%' . $request->name . '%');
                return $query;
            }
        }
        return $query;
    }

    public function scopeBrandFilter($query, $request)
    {
        if ($request->has('brandID')) {
            if (isset($request->brandID)) {
                $query->where('brandID', $request->brandID);
                return $query;
            }
        }
        return $query;
    }

    public function scopeRamFilter($query, $request)
    {
        if ($request->has('ramID')) {
            if(isset($request->ramID)){
                $query->where('ramID', $request->ramID);
            }
        }
        return $query;
    }

    public function scopePriceFilter($query, $request)
    {
        if ($request->has('from_price') && $request->has('to_price')) {
            if(isset($request->from_price) && isset($request->to_price)){
                $query->whereBetween('price', [$request->from_price, $request->to_price]);
            }
        }
        return $query;
    }

    public function scopeDateFilter($query, $request)
    {
        if ($request->has('start_date') && $request->has('end_date')) {
            if(isset($request->start_date) && isset($request->end_date)){
                $query->whereBetween('updated_at', [$request->start_date, $request->end_date]);
            }
        }
        return $query;
    }
    //end local scope, filter
}
