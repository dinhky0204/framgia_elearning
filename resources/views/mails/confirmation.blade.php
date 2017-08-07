<?php
/**
 * Created by PhpStorm.
 * User: ky
 * Date: 11/03/2017
 * Time: 14:00
 */
?>
Hi {{$name}},
<p>@lang('auth.checklink')</p>
{{route('confirmation',$token)}}