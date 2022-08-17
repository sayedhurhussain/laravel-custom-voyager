<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class MyAction extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        // return $this->data->{'status'}=="PUBLISHED"?'Pending':'Publish';
        return 'Download';
    }
    
    public function getIcon()
    {
        // Action icon which display in left of button based on current status
        // return $this->data->{'status'}=="PUBLISHED"?'voyager-x':'voyager-external';
        return 'voyager-book-download';
    }

    public function getPolicy()
    {
        return 'read';
    }
    
    public function getAttributes()
    {
        // Action button class
        return [
            'class' => 'btn btn-sm btn-primary edit',
        ];
    }

    // public function getAttributes()
    // {
    //     // Action button class
    //     return [
    //         // button show in righ side of voyager
    //         // warning means yellow
    //         // 'class' => 'btn btn-sm btn-warning pull-right view',
    //         // primary means blue
    //         // 'class' => 'btn btn-sm btn-primary pull-right edit',
    //         // danger means red
    //         // 'class' => 'btn btn-sm btn-danger pull-right delete',
    //         // success means green
    //         // 'class' => 'btn btn-sm btn-success pull-right restore',
    //         // button show in left side of voyager
    //         // 'class' => 'btn btn-sm btn-warning pull-left view',
    //         'data-id' => $this->data->{$this->data->getKeyName()},
    //         'id'      => 'restore-'.$this->data->{$this->data->getKeyName()},
    //     ];
    // }   

    public function getDefaultRoute()
    {
        // URL for action button when click
        // return route('posts.publish', array("id"=>$this->data->{$this->data->getKeyName()}));
        // return route('my.route');
        // return route('voyager.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return $this->dataType->slug == 'users';
    }
    public function shouldActionDisplayOnRow($row)
    {
        return route('vendors', $this->data->id);
    }
    public function massAction($ids, $comingFrom)
    {
        // Do something with the IDs
        return redirect($comingFrom);
    }

    // public function massAction($ids)
    // {
    //     $users = User::wherein('id',$ids)->get();
    //     return Excel::download(new UsersExport($users),'users.xlsx');
    // }

}