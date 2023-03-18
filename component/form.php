<?php function formInput($type, $name, $placeholder = '', $value = '', $required = false) {
    $requiredAttr = $required ? 'required' : '';
    return <<<HTML
        <div class="mb-4 flex justify-between place-items-center mb-9 ">
            <label class="
            self-auto 
            text-gray-700 
            font-bold 
            self-center 
            mb-2 w-1/4" for="$name">$name</label>
            <div class="flex-end font-bold">:</div>
            <input class="
            appearance-none 
            border 
            rounded 
            py-2 px-3 
            text-gray-700 
            w-2/3 
            leading-tight 
            focus:shadow-outline
            focus:outline-none 
            focus:ring 
            focus:ring-offset-2 
            
            focus:ring-indigo-400" type="$type" id="$name" name="$name" placeholder="$placeholder" value="$value" $requiredAttr>
        </div>
    HTML;
}



