<?php

class Repopulator {

    public static $templates = array(
        "todos" => '<div class="field-group controls-row">
			<input type="text" class="span6" name="todos[{?}][task]" value="{task}" placeholder="Task to do">
			<input type="text" class="span2" name="todos[{?}][duedate]" value="{duedate}" placeholder="Due by">
			<input type="button" class="btn btn-danger span-2 delete" value="X" />
		</div>',
        "todos_labels" => '<div class="field-group row">
                            <div class="form-group col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <label for="specific_{?}">ویژگی</label>
                            <input type="text" class="span6 form-control" name="specific_{?}"  id="specific_{?}">
                            </div>
                            <div class="form-group col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                            <label for="specific_detail_{?}">توضیح ویژگی</label>
                            <input type="text" class="form-control" name="specific_detail_{?}"  id="specific_detail_{?}">
                            </div>
                            <input type="button" class="btn btn-danger delete fa fa-window-close" value="&#xf2d3" />
		</div>',
        "people" => '<div class="field-group controls-row">
			<input type="text" class="span4" name="people[{?}][firstname]" value="{firstname}" placeholder="First name">
			<input type="text" class="span4" name="people[{?}][lastname]" value="{lastname}" placeholder="Last name">
			<input type="button" class="btn btn-danger span-2 delete" value="X" />
		</div>'
    );

    public static function repopulate($key, $post, $counter) {
        if (empty($post[$key]))
            return;
        if (empty($counter)) {
            $i = 0;
        } else {
            $i = $counter;
        }

        foreach ($post[$key] as $formField) {
            $template = preg_replace("/\{\?\}/", $i++, Repopulator::$templates[$key]);
            foreach ($formField as $k => $v) {
                $template = preg_replace("/\{{$k}\}/", $v, $template);
            }
            echo $template;
        }
    }

}
