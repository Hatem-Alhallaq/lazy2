<?php
// read session message
$msg = session()->get('msg');

if($msg)
    {
        $status =strtolower(substr($msg,0,2));
        if($status == "s:")
            {
                $msg_class="alert-success";
            }
        elseif ($status == "w:")
        {
            $msg_class="alert-warning";
        }
        elseif ($status == "i:")
        {
            $msg_class="alert-info";
        }
        elseif ($status == "d:")
        {
            $msg_class="alert-danger";
        }
        else
        {
            $msg_class="alert-default-";
        }
    }

?>
@if($msg)
    <div class="alert  {{$msg_class}}">
        <ul>
        <li>{{substr($msg,2)}}</li>
        </ul>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
